<?php

namespace lc\items\body;

use lc\items\BaseItem;
use lc\Lunarity;

class BigWings extends BaseItem{

	public string $color;
	public array $colors = [
		"black" => "черные",
		"white" => "белые",
		"orange" => "оранжевые"
	];

	public function getId() : string{return "bigwings{$this->color}";}
	public function getType() : string{return "body";}
	public function getName() : string{return "Большие {$this->colors[$this->color]} крылья";}

	public function __construct(Lunarity $main, string $color){
		$this->color = $color;
		$this->texture = "{$this->color}_bigwings.png";
		$this->uv = [0,64];
		$this->cubemap = "bigwings.json";
		parent::__construct($main);
	}

}