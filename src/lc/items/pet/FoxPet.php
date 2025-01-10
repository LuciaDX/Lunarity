<?php

namespace lc\items\pet;

use lc\items\BaseItem;
use lc\Lunarity;

class FoxPet extends BaseItem{

	public string $type;
	public array $types = [
		"default" => "Лиса",
		"snow" => "Белая Лиса",
	];

	public function getId() : string{return "foxpet{$this->type}";}
	public function getType() : string{return "pet";}
	public function getName() : string{return $this->types[$this->type];}

	public function __construct(Lunarity $main, string $type){
		$this->type = $type;
		$this->texture = "fox_{$this->type}.png";
		$this->uv = [64,64];
		$this->cubemap = "foxpet.json";
		parent::__construct($main);
	}

}