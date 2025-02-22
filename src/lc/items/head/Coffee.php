<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Coffee extends BaseItem{

	public function getId() : string{return "coffee";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Чашка кофе";}

	public function __construct(Lunarity $main){
		$this->texture = "coffeehat.png";
		$this->uv = [0,0];
		$this->cubemap = "coffee.json";
		parent::__construct($main);
	}

}