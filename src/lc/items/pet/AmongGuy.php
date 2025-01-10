<?php

namespace lc\items\pet;

use lc\items\BaseItem;
use lc\Lunarity;

class AmongGuy extends BaseItem{

	public string $color;
	public array $colors = [
		"blue" => "Синий",
		"yellow" => "Желтый",
		"green" => "Зеленый",
		"red" => "Красный",
	];

	public function getId() : string{return "amongguy{$this->color}";}
	public function getType() : string{return "pet";}
	public function getName() : string{return "{$this->colors[$this->color]} космонавт";}

	public function __construct(Lunarity $main, string $color){
		$this->color = $color;
		$this->texture = "cosmonaut_au_{$this->color}.png";
		$this->uv = [64,64];
		$this->cubemap = "amongguy.json";
		parent::__construct($main);
	}

}