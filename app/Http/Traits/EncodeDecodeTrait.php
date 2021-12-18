<?php
namespace App\Http\Traits;

trait EncodeDecodeTrait
{
    public function steganize($file, $message,$filename) 
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
      
            if (!isset($binaryMessage[$messagePosition])) {
              // No need to keep processing beyond the end of the message.
              break 2;
            }
      
            // Extract the colour.
            $rgb = imagecolorat($img, $x, $y);
            $colors = imagecolorsforindex($img, $rgb);
      
            $red = $colors['red'];
            $green = $colors['green'];
            $blue = $colors['blue'];
            $alpha = $colors['alpha'];
      
            // Convert the blue to binary.
            $binaryBlue = str_pad(decbin($blue), 8, '0', STR_PAD_LEFT);
      
            // Replace the final bit of the blue colour with our message.
            $binaryBlue[strlen($binaryBlue) - 1] = $binaryMessage[$messagePosition];
            $newBlue = bindec($binaryBlue);
      
            // Inject that new colour back into the image.
            $newColor = imagecolorallocatealpha($img, $red, $green, $newBlue, $alpha);
            imagesetpixel($img, $x, $y, $newColor);
      
            // Advance message position.
            $messagePosition++;
          }
        }
      
        // Save the image to a file.
        $newImage = $filename;
        // $newImage = 'secret.png';
        imagepng($img, $newImage, 9);
        // Destroy the image handler.
        imagedestroy($img);
    }
}