<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class NinjaHeadband extends BaseItem{

	public string $color;
	public array $colors = [
		"black" => "Черная",
		"red" => "Красная",
	];

	public function getId() : string{return "ninjaheadband{$this->color}";}
	public function getType() : string{return "head";}
	public function getName() : string{return "{$this->colors[$this->color]} повязка";}

	public function __construct(Lunarity $main, string $color){
		$this->color = $color;
		$this->texture = "ninja_headband_{$this->color}.png";
		$this->uv = [0,0];
		$this->cubemap = "ninjaheadband.json";
		parent::__construct($main);
	}

}