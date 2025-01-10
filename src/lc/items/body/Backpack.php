<?php

namespace lc\items\body;

use lc\items\BaseItem;
use lc\Lunarity;

class Backpack extends BaseItem{

	public string $color;
	public array $colors = [
		"black" => "Черный",
		"blue" => "Синий",
		"green" => "Зеленый",
		"red" => "Красный",
		"orange" => "Оранжевый",
	];

	public function getId() : string{return "backpack{$this->color}";}
	public function getType() : string{return "body";}
	public function getName() : string{return "{$this->colors[$this->color]} рюкзак";}

	public function __construct(Lunarity $main, string $color){
		$this->color = $color;
		$this->texture = "backpack_{$this->color}.png";
		$this->uv = [0,64];
		$this->cubemap = "backpack.json";
		parent::__construct($main);
	}

}