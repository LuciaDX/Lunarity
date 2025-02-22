<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Bear extends BaseItem{

	public string $type;
	public array $types = [
		"grizzly" => "Гризли",
		"white" => "Белый медведь",
		"panda" => "Панда"
	];
	public array $textures = [
		"grizzly" => 1,
		"white" => 2,
		"panda" => 3
	];

	public function getId() : string{return "bear{$this->type}";}
	public function getType() : string{return "head";}
	public function getName() : string{return $this->types[$this->type];}

	public function __construct(Lunarity $main, string $type){
		$this->type = $type;
		$this->texture = "bearhat{$this->textures[$this->type]}.png";
		$this->uv = [0,0];
		$this->cubemap = "bear.json";
		parent::__construct($main);
	}

}