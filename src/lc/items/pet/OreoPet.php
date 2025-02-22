<?php

namespace lc\items\pet;

use lc\items\BaseItem;
use lc\Lunarity;

class OreoPet extends BaseItem{

	public function getId() : string{return "oreopet";}
	public function getType() : string{return "pet";}
	public function getName() : string{return "Печенька Oreo";}

	public function __construct(Lunarity $main){
		$this->texture = "oreo.png";
		$this->uv = [64,64];
		$this->cubemap = "oreopet.json";
		parent::__construct($main);
	}

}