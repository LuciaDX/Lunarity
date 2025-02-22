<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Diadem extends BaseItem{

	public function getId() : string{return "diadem";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Диадема";}

	public function __construct(Lunarity $main){
		$this->texture = "wreathtexture.png";
		$this->uv = [0,0];
		$this->cubemap = "diadem.json";
		parent::__construct($main);
	}

}