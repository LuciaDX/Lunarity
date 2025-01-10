<?php

namespace lc\items\body;

use lc\items\BaseItem;
use lc\Lunarity;

class Katana extends BaseItem{

	public function getId() : string{return "katana";}
	public function getType() : string{return "body";}
	public function getName() : string{return "Катана";}

	public function __construct(Lunarity $main){
		$this->texture = "katana.png";
		$this->uv = [0,64];
		$this->cubemap = "katana.json";
		parent::__construct($main);
	}

}