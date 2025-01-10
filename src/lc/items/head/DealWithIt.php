<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class DealWithIt extends BaseItem{

	public function getId() : string{return "dealwithit";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Deal With It";}

	public function __construct(Lunarity $main){
		$this->texture = "deal_with_it.png";
		$this->uv = [0,0];
		$this->cubemap = "dealwithit.json";
		parent::__construct($main);
	}

}