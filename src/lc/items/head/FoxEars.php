<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class FoxEars extends BaseItem{

	public string $color;
	public array $colors = [
		"black" => "Черные",
		"yellow" => "Желтые",
		"orange" => "Оранжевые",
	];

	public function getId() : string{return "foxears{$this->color}";}
	public function getType() : string{return "head";}
	public function getName() : string{return "{$this->colors[$this->color]} уши лисы";}

	public function __construct(Lunarity $main, string $color){
		$this->color = $color;
		$this->texture = "fox_ears_{$this->color}.png";
		$this->uv = [0,0];
		$this->cubemap = "foxears.json";
		parent::__construct($main);
	}

}