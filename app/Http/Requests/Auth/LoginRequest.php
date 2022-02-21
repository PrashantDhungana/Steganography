<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'passimg' => ['required'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();
        $user = User::where('email',$this->email)->first();
        if(!$user)
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        // Getting Users' Passwd
        $passFromUser = $user->password;
        //Decrypting image for the hidden encrypted password 
        $passFromImg = $this->desteganize($this->file('passimg'));
        
        if ($passFromImg != $passFromUser) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'validation' => __('auth.failed'),
            ]);
        }
        Auth::login($user);
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
    }

    public function desteganize($file) {
        // Read the file into memory.
        $mimeType = $file->getMimeType();
        if(str_contains($mimeType, 'png'))
            $img = imagecreatefrompng($file);
        if(str_contains($mimeType, 'jpg') || str_contains($mimeType, 'jpeg'))
            $img = imagecreatefromjpeg($file);
      
        // Read the message dimensions.
        $width = imagesx($img);
        $height = imagesy($img);
      
        // Set the message.
        $binaryMessage = '';
      
        // Initialise message buffer.
        $binaryMessageCharacterParts = [];
      
        for ($y = 0; $y < $height; $y++) {
          for ($x = 0; $x < $width; $x++) {
      
            // Extract the colour.
            $rgb = imagecolorat($img, $x, $y);
            $colors = imagecolorsforindex($img, $rgb);
      
            $blue = $colors['blue'];
      
            // Convert the blue to binary.
            $binaryBlue = decbin($blue);
      
            // Extract the least significant bit into out message buffer..
            $binaryMessageCharacterParts[] = $binaryBlue[strlen($binaryBlue) - 1];
      
            if (count($binaryMessageCharacterParts) == 8) {
              // If we have 8 parts to the message buffer we can update the message string.
              $binaryCharacter = implode('', $binaryMessageCharacterParts);
              $binaryMessageCharacterParts = [];
              if ($binaryCharacter == '00000011') {
                // If the 'end of text' character is found then stop looking for the message.
                break 2;
              }
              else {
                // Append the character we found into the message.
                $binaryMessage .= $binaryCharacter;
              }
            }
          }
        }
      
        // Convert the binary message we have found into text.
        $message = '';
        for ($i = 0; $i < strlen($binaryMessage); $i += 8) {
          $character = mb_substr($binaryMessage, $i, 8);
          $message .= chr(bindec($character));
        }
      
        return $message;
    }
}
