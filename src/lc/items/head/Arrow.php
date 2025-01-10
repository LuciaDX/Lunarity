<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Arrow extends BaseItem{

	public function getId() : string{return "arrow";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Стрела в голове";}

	public function __construct(Lunarity $main){
		$this->texture = "arrowhat.png";
		$this->uv = [0,0];
		$this->cubemap = "arrow.json";
		parent::__construct($main);
	}

}