<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class IceHorns extends BaseItem{

	public function getId() : string{return "icehorns";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Ледяные рога";}

	public function __construct(Lunarity $main){
		$this->texture = "hornshat.png";
		$this->uv = [0,0];
		$this->cubemap = "icehorns.json";
		parent::__construct($main);
	}

}