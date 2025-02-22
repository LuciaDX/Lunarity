<?php

namespace lc\items\head;

use lc\items\BaseItem;
use lc\Lunarity;

class BrainSlug extends BaseItem{

	public function getId() : string{return "brainslug";}
	public function getType() : string{return "head";}
	public function getName() : string{return "Мозговой слизень";}

	public function __construct(Lunarity $main){
		$this->texture = "brainslug.png";
		$this->uv = [0,0];
		$this->cubemap = "brainslug.json";
		parent::__construct($main);
	}

}