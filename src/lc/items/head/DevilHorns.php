<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class DevilHorns extends BaseItem{

	public function getId() : string{return "devilhorns";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Рога демона";}

	public function __construct(Lunarity $main){
		$this->texture = "devil_horns.png";
		$this->uv = [0,0];
		$this->cubemap = "devilhorns.json";
		parent::__construct($main);
	}

}