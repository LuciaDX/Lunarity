<?php

namespace lc\skins;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;
use lc\items\BaseItem;
use lc\Lunarity;
use pocketmine\entity\Skin;

class SkinContainer implements \JsonSerializable{

	public ImageInterface $image;
	public array $geometry;
	public array $items = [];
	public array $contents = [];
	public array $size = [128,128];

	public function __construct(ImageInterface $image, array $geometry, array $data){
		$this->image = $image;
		$this->geometry = $geometry;
		foreach($data["items"] as $part => $item){
			$this->items[$part] = $item ? Lunarity::$cosmetics[$item] : null;
		}
		foreach($data["contents"] as $item){
			$this->contents[] = Lunarity::$cosmetics[$item];
		}
		$this->checkForBlocks();
	}

	public function checkForBlocks(){
		foreach($this->items as $item){
			if($item){
				foreach($item->getBlocks() as $part => $ids) {
					if(is_array($ids)){
						foreach($ids as $id){
							if(($this->items[$part])->getId() == $id){
								$this->items[$part] = null;
							}
						}
					} else $this->items[$part] = null;
				}
			}
		}
	}

	public function setItem(BaseItem $item):void {
		foreach($item->getBlocks() as $part => $ids) {
			if(is_array($ids)){
				foreach($ids as $id){
					if(($this->items[$part])->getId() == $id){
						$this->items[$part] = null;
					}
				}
			} else $this->items[$part] = null;
		}
		$this->items[$item->getType()] = $item;
	}

	public function getFull(): array{
		$image = clone $this->image;
		$geometry = $this->geometry;
		$showhelmet = true;
		foreach($this->items as $part => $item){
			if($item){
				$showhelmet = !$item->hiddenByHelmet();
				$geometry["minecraft:geometry"][0]["bones"] = array_merge($geometry["minecraft:geometry"][0]["bones"],$item->getBones());
				$image->paste($item->getTexture(),$item->getTexturePoint());
			}
		}
		return [
			"skin" => new Skin("onyx",ImageUtils::bytesFromImg($image),"","geometry.onyxide",json_encode($geometry, JSON_UNESCAPED_UNICODE)),
			"showhelmet" => $showhelmet
		];
	}

	public function jsonSerialize():array {
		return [
			"items" => $this->items,
			"contents" => $this->contents
		];
	}

}