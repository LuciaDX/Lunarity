<?php

namespace lc\items\pet;

use lc\items\BaseItem;
use lc\Lunarity;

class AtomPet extends BaseItem{

	public function getId() : string{return "atompet";}
	public function getType() : string{return "pet";}
	public function getName() : string{return "Атом";}

	public function __construct(Lunarity $main){
		$this->texture = "atompet.png";
		$this->uv = [64,56];
		$this->cubemap = "atompet.json";
		parent::__construct($main);
	}

}