<?php
namespace App\Http\Traits;

use Exception;

trait EncodeDecodeTrait
{
    public function steganize($file, $message, $skip=false) 
    {
        // Encode the message into a binary string.
        $binaryMessage = '';
        for ($i = 0; $i < mb_strlen($message); ++$i) {
          $character = ord($message[$i]);
          $binaryMessage .= str_pad(decbin($character), 8, '0', STR_PAD_LEFT);
        }
      
        // Inject the 'end of text' character into the string.
        $binaryMessage .= '00000011';

        // Load the image into memory.
        $mimeType = $file->getMimeType();
        // dd($mimeType);
        if(str_contains($mimeType, 'png'))
          $img = imagecreatefrompng($file);
        if(str_contains($mimeType, 'jpg')||str_contains($mimeType, 'jpeg'))
          $img = imagecreatefromjpeg($file);

        // Get image dimensions.

        $width = imagesx($img);
        $height = imagesy($img);
      
        $messagePosition = 0;

        for ($y = 0; $y < $height; $y++) {
          for ($x = 0; $x < $width; $x++) {
            // Extract the colour.
            $rgb = imagecolorat($img, $x, $y);
            $colors = imagecolorsforindex($img, $rgb);
            
            $blue = $colors['blue'];
            $red = $colors['red'];
            $green = $colors['green'];
            $alpha = $colors['alpha'];
            
            // Convert the blue to binary.
            $binaryBlue = str_pad(decbin($blue), 8, '0', STR_PAD_LEFT);

            if($messagePosition < strlen($binaryMessage)){

              // Replace the final bit of the blue colour with our message.
              $binaryBlue[strlen($binaryBlue) - 1] = $binaryMessage[$messagePosition];
              $newBlue = bindec($binaryBlue);
              
              // dump($newBlue);
              // Inject that new colour back into the image.
              $newColor = imagecolorallocatealpha($img, $red, $green, $newBlue, $alpha);
              imagesetpixel($img, $x, $y, $newColor);
              
              // Advance message position.
              $messagePosition++;

              if(!$skip){
                // Array for prev
                $this->histoCount(round(($red+$green+$blue)/3),0);
  
                // Array for new
                $this->histoCount(round(($red+$green+$newBlue)/3),1);
              }

            }
            else{
              if(!$skip)
                $this->histoCount(round(($red+$green+$blue)/3),2);
            }
            
          }
        }

        for ($i=0; $i <= 255 ; $i++) 
        { 
            $histoBefore[$i] = $this->previousCount[$i] + $this->totalCount[$i];
            $histoAfter[$i] = $this->afterCount[$i] + $this->totalCount[$i];
        }

        $filename = uniqid('img_').".".$file->extension();
        // Save the image to a file.
        $newImage = 'images/'.$filename;
        // $newImage = 'secret.png';
        if(imagepng($img, $newImage, 9))
        {
          // Destroy the image handler.
          imagedestroy($img);
          return [$filename,$histoBefore??NULL,$histoAfter??NULL];
        }
    }

    public function desteganize($file) {

      try{
        $mimeType = mime_content_type($file);
      }
      catch(Exception $e){
        $mimeType = $file->getMimeType();
      }

      if(str_contains($mimeType, 'png'))
          $img = imagecreatefrompng($file);
        if(str_contains($mimeType, 'jpg')||str_contains($mimeType, 'jpeg'))
          $img = imagecreatefromjpeg($file);
      // Read the file into memory.
      $img = imagecreatefrompng($file);
    
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

  public $previousCount = [0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0];
  
  public $afterCount = [0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0];

  public $totalCount = [0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0,  0];

  public function histoCount($pixels,$operation){

    //[0,1,2,3...,255]
    if($operation == 0)
      $this->previousCount[$pixels]++;
    
    else if($operation == 1)
      $this->afterCount[$pixels]++;
    
    else if($operation == 2)
      $this->totalCount[$pixels]++;

    
  }
}