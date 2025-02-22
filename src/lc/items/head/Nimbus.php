<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Nimbus extends BaseItem{

	public function getId() : string{return "nimbus";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Нимб";}

	public function __construct(Lunarity $main){
		$this->texture = "nimbus.png";
		$this->uv = [0,0];
		$this->cubemap = "nimbus.json";
		parent::__construct($main);
	}

}