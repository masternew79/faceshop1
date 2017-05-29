<?php
class HTP_Image{
    var $image;
    var $image_type;
    public function __construct($filename) {
        try{
            if(!empty($filename)){
                $image_info = getimagesize($filename);
                $this->image_type = $image_info[2];
                if ($this->image_type == IMAGETYPE_JPEG) {
                    $this->image = imagecreatefromjpeg($filename);
                } elseif ($this->image_type == IMAGETYPE_GIF) {
                    $this->image = imagecreatefromgif($filename);
                } elseif ($this->image_type == IMAGETYPE_PNG) {
                    $this->image = imagecreatefrompng($filename);
                }
            }else{
                $this->image = null;
            }
        }catch(Exception $e){
            throw new Exception('File too large!');
        }
    }
     
    public function getImage(){
        return $this->image;
    }
     
    public function getColorOnImage($x, $y){
        $rgb = imagecolorat ($this->image, $x, $y );
        $colors = imagecolorsforindex($this->image, $rgb);
        return $colors;
    }
     
    public function getColorOnImageInt($x, $y){
        $rgb = imagecolorat ($this->image, $x, $y );
        return $rgb;
    }
     
    public function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 100, $permissions = null){
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }
    public function output($image_type = IMAGETYPE_JPEG) {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }
    public function getWidth() {
        return imagesx($this->image);
    }
    public function getHeight() {
        return imagesy($this->image);
    }
    public function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }
    public function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }
    public function scale($scale) {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize((int)$width, (int)$height);
    }
    public function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, 
        $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
     
    public function __destruct() {
        if($this->image){
            imagedestroy($this->image);
        }
    }
}