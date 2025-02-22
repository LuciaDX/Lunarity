<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class DogEars extends BaseItem{

	public string $color;
	public array $colors = [
		"brown" => "Коричневые",
		"gray" => "Серые",
		"green" => "Зеленые",
		"red" => "Красные",
		"orange" => "Оранжевые",
		"purple" => "Фиолетовые",
		"white" => "Белые",
	];

	public function getId() : string{return "dogears{$this->color}";}
	public function getType() : string{return "head";}
	public function getName() : string{return "{$this->colors[$this->color]} уши собаки";}

	public function __construct(Lunarity $main, string $color){
		$this->color = $color;
		$this->texture = "dogears_{$this->color}.png";
		$this->uv = [0,0];
		$this->cubemap = "dogears.json";
		parent::__construct($main);
	}

}