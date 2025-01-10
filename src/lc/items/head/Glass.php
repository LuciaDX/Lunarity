<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Glass extends BaseItem{

	public function getId() : string{return "glass";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Блок стекла";}

	public function __construct(Lunarity $main){
		$this->texture = "glasshat.png";
		$this->uv = [0,0];
		$this->cubemap = "glass.json";
		parent::__construct($main);
	}

}