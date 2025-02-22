<?php

namespace lc\skins;

use Imagine\Gd\Imagine;
use Imagine\Image\ImageInterface;

class ImageUtils {

	public static function bytesFromImg($imgd) : string{
		$img = $imgd->getGdResource();
		$size = $imgd->getSize();
		$skinbytes = "";
		for($y = 0; $y < $size->getHeight(); $y++){
			for($x = 0; $x < $size->getWidth(); $x++){
				$colorat = @imagecolorat($img, $x, $y);
				$a = ((~((int)($colorat >> 24))) << 1) & 0xff;
				$r = ($colorat >> 16) & 0xff;
				$g = ($colorat >> 8) & 0xff;
				$b = $colorat & 0xff;
				$skinbytes .= chr($r) . chr($g) . chr($b) . chr($a);
			}
		}
		return $skinbytes;
	}

	public static function imgFromBytes($data, $height = 64, $width = 64) : ImageInterface{
		$imgd = new Imagine();
		$pixelarray = str_split(bin2hex($data), 8);
		$image = imagecreatetruecolor($width, $height);
		imagealphablending($image, false);//do not touch
		imagesavealpha($image, true);
		$position = count($pixelarray) - 1;
		while (!empty($pixelarray)){
			$x = $position % $width;
			$y = ($position - $x) / $height;
			$walkable = str_split(array_pop($pixelarray), 2);
			$color = array_map(function ($val){ return hexdec($val); }, $walkable);
			$alpha = array_pop($color);
			$alpha = ((~((int)$alpha)) & 0xff) >> 1;
			$color[] = $alpha;
			imagesetpixel($image, $x, $y, imagecolorallocatealpha($image, ...$color));
			$position--;
		}
		return $imgd->wrapGd($image,$width,$height);
	}

}