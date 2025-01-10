<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class FallenAngelNimbus extends BaseItem{

	public function getId() : string{return "fallenangelnimbus";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Нимб падшего ангела";}

	public function __construct(Lunarity $main){
		$this->texture = "fallenangelnimbus.png";
		$this->uv = [0,0];
		$this->cubemap = "fallenangelhalo.json";
		parent::__construct($main);
	}

}