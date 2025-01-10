<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class Beaver extends BaseItem{

	public function getId() : string{return "beaver";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Шляпа Бобра";}

	public function __construct(Lunarity $main){
		$this->texture = "beaver_hat.png";
		$this->uv = [0,0];
		$this->cubemap = "beaver.json";
		parent::__construct($main);
	}

}