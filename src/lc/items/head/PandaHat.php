<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class PandaHat extends BaseItem{

	public function getId() : string{return "pandahat";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Шапка панды";}

	public function __construct(Lunarity $main){
		$this->texture = "pandahat.png";
		$this->uv = [0,0];
		$this->cubemap = "pandahat.json";
		parent::__construct($main);
	}

}