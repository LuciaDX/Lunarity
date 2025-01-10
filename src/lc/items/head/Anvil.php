<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Anvil extends BaseItem{

	public function getId() : string{return "anvil";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Наковаленка";}

	public function __construct(Lunarity $main){
		$this->texture = "anvil.png";
		$this->uv = [0,0];
		$this->cubemap = "anvil.json";
		parent::__construct($main);
	}

}