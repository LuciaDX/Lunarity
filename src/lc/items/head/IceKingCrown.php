<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class IceKingCrown extends BaseItem{

	public function getId() : string{return "icekingcrown";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Ледяная корона";}

	public function __construct(Lunarity $main){
		$this->texture = "crown_ik.png";
		$this->uv = [0,0];
		$this->cubemap = "icekingcrown.json";
		parent::__construct($main);
	}

}