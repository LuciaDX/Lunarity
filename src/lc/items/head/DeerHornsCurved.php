<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class DeerHornsCurved extends BaseItem{

	public function getId() : string{return "deerhornscurved";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Оленьи Рога";}

	public function __construct(Lunarity $main){
		$this->texture = "deerhorns_curved_hat.png";
		$this->uv = [0,0];
		$this->cubemap = "deerhornscurved.json";
		parent::__construct($main);
	}

}