<?php

//namespace Avamr\Helpers;

class Thumbnail {
	public static function generate_image_thumbnail($source_image_path, $thumbnail_image_path,$thumbnail_with,$thumbnail_height) {
		list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
		switch ($source_image_type) {
			case IMAGETYPE_GIF :
				$source_gd_image = imagecreatefromgif($source_image_path);
				break;
			case IMAGETYPE_JPEG :
				$source_gd_image = imagecreatefromjpeg($source_image_path);
				break;
			case IMAGETYPE_PNG :
				$source_gd_image = imagecreatefrompng($source_image_path);
				break;
		}
                
		if ($source_gd_image === false) {
			return false;
		}
                
        $thumbnail_image_width = $thumbnail_with;
		$thumbnail_image_height = $thumbnail_height;
		
	    $thumbnail_directory = dirname($thumbnail_image_path);
        if(!file_exists($thumbnail_directory)) {
            mkdir($thumbnail_directory);
        }


        $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
		imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
		imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
		
		imagedestroy($source_gd_image);
		imagedestroy($thumbnail_gd_image);
return true;
		list($originalWidth, $originalHeight, $source_image_type_new) = getimagesize($thumbnail_image_path);
		switch ($source_image_type_new) {
			case IMAGETYPE_GIF :
				$source_gd_image_new = imagecreatefromgif($thumbnail_image_path);
				break;
			case IMAGETYPE_JPEG :
				$source_gd_image_new = imagecreatefromjpeg($thumbnail_image_path);
				break;
			case IMAGETYPE_PNG :
				$source_gd_image_new = imagecreatefrompng($thumbnail_image_path);
				break;
		}
                
		if ($source_gd_image_new === false) {
			return false;
		}

		//$data = getimagesize($thumbnail_image_path);
       	//$originalWidth = $data[0];
        //$originalHeight = $data[1];

        $centreX = round($originalWidth / 2);
		$centreY = round($originalHeight / 2);

		$x1 = $centreX - 50;
		$y1 = $centreY - 50;

		$x2 = $centreX + 50;
		$y2 = $centreY + 50;        

		$x1 = max($x1, 0);
        $y1 = max($y1, 0);
        
        $x2 = min($x2, $originalWidth);
        $y2 = min($y2, $originalHeight);
        
        $width = $x2 - $x1;
        $height = $y2 - $y1;


		$thumbnail_image_path_new = "appfiles/v1/userphoto/thumb_new/".$picture;
		$new = imagecreatetruecolor($width, $height);
		imagecopy($new,$source_gd_image_new,0,0,$x1, $y1,$width, $height);

		imagejpeg($new, $thumbnail_image_path_new, 100);

		imagedestroy($new);
		//imagedestroy($source_gd_image);
		/*$data = getimagesize($source_image_path);
       	$originalWidth = $data[0];
        $originalHeight = $data[1];


        $centreX = round($originalWidth / 2);
		$centreY = round($originalHeight / 2);

		$x1 = $centreX - 400;
		$y1 = $centreY - 400;

		$x2 = $centreX + 400;
		$y2 = $centreY + 400;        

		$x1 = max($x1, 0);
        $y1 = max($y1, 0);
        
        $x2 = min($x2, $originalWidth);
        $y2 = min($y2, $originalHeight);
        
        $width = $x2 - $x1;
        $height = $y2 - $y1;


		$new = imagecreatetruecolor($width, $height);
		imagecopy($new,$source_gd_image,0,0,$x1, $y1,$width, $height);

		imagejpeg($new, $thumbnail_image_path, 100);

		imagedestroy($new);
		imagedestroy($source_gd_image);*/


		//imagedestroy($source_gd_image);
		//imagedestroy($thumbnail_gd_image);
		return true;
	}
	
}
