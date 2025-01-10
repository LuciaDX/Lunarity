<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class BearEars extends BaseItem{

	public function getId() : string{return "bearears";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Ушки мишки";}

	public function __construct(Lunarity $main){
		$this->texture = "bear_ears.png";
		$this->uv = [0,0];
		$this->cubemap = "bearears.json";
		parent::__construct($main);
	}

}