<?php

namespace lc\skins;

use Imagine\Image\ImageInterface;
use Imagine\Image\Point;

class Cosmetic implements \JsonSerializable{

	public string $id;
	public string $name;
	public array $bones;
	public ImageInterface $texture;
	public Point $point;
	public array $blocks;
	public string $type;
	public bool $hidehelmet;

	public function __construct(array $data,ImageInterface $image,array $geo){
		$this->id = $data["id"];
		$this->name = $data["name"];
		$this->type = $data["part"];
		$this->bones = $geo;
		$this->texture = $image;
		$this->point = new Point(...$data["point"]);
		$this->blocks = $data["blocks"];
		$this->hidehelmet = $data["hidehelmet"] ?? false;
	}

	public function jsonSerialize():string {
		return $this->id;
	}

}