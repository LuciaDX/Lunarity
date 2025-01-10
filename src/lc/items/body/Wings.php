<?php

namespace lc\items\body;

use lc\items\BaseItem;
use lc\Lunarity;

class Wings extends BaseItem{

	public string $color;
	public array $colors = [
		"black" => "Черные",
		"blue" => "Синие",
		"green" => "Зеленые",
		"pink" => "Розовые",
		"white" => "Белые",
	];

	public function getId() : string{return "wings{$this->color}";}
	public function getType() : string{return "body";}
	public function getName() : string{return "{$this->colors[$this->color]} крылья";}

	public function __construct(Lunarity $main, string $color){
		$this->color = $color;
		$this->texture = "wings_{$this->color}.png";
		$this->uv = [0,64];
		$this->cubemap = "wings.json";
		parent::__construct($main);
	}

}