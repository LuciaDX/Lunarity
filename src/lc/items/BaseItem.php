<?php

namespace lc\items;

use Imagine\Gd\Imagine;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use Imagine\Image\PointInterface;
use lc\Lunarity;

abstract class BaseItem implements \JsonSerializable{

	public bool $new = false;
	public PointInterface $point;
	public ImageInterface $image;
	public array $bones;
	public array $blocks = [];
	public string $collection = "DEFAULT";

	public function __construct(Lunarity $main){
		$imagine = new Imagine();
		$this->setTexture($imagine->open($main::$load."assets/textures/{$this->getType()}/{$this->texture}"));
		$this->setTexturePoint(new Point(...$this->uv));
		$this->bones = json_decode(
			file_get_contents($main::$load."assets/cubes/{$this->getType()}/{$this->cubemap}"),
		true
		);
	}

	public function getCollectionColor():string{
		return constant(Collection::class."{$this->collection}_COLOR");
	}

	public function getCollectionPrefix():string{
		return constant(Collection::class."{$this->collection}_PREFIX");
	}

	public function getCollectionName():string{
		return constant(Collection::class."{$this->collection}_NAME");
	}

	public function getCollectionId():int{
		return constant(Collection::class."{$this->collection}");
	}

	public function setCollection(string $collection):self{
		$this->collection = strtoupper($collection);
		return $this;
	}

	public function getCreator():string{
		return "";
	}

	public function setNew(bool $new):self{
		$this->new = $new;
		return $this;
	}

	public function isNew():bool{
		return $this->new;
	}

	public function setBlocks(array $blocks):void{
		$this->blocks = $blocks;
	}

	public function getBones() : array{
		return $this->bones;
	}

	public function getBlocks():array{
		return $this->blocks;
	}

	public function hiddenByHelmet():bool{
		return true;
	}

	abstract public function getName():string;

	abstract public function getType():string;

	abstract public function getId():string;

	public function setTexturePoint(PointInterface $point):void{
		$this->point = $point;
	}

	public function getTexturePoint():PointInterface{
		return $this->point;
	}

	public function setTexture(ImageInterface $texture):void{
		$this->image = $texture;
	}

	public function getTexture():ImageInterface{
		return $this->image;
	}

	public function jsonSerialize():string {
		return $this->getId();
	}

}