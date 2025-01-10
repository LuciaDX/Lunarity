<?php

namespace lc\items\body;

use lc\items\BaseItem;
use lc\Lunarity;

class HogwartsScarf extends BaseItem{

	public string $faculty;
	public array $faculties = [
		"gryffindor" => "Гриффиндора",
		"hufflepuff" => "Пуффендуя",
		"ravenclaw" => "Когтеврана",
		"slytherin" => "Слизерина"
	];

	public function getId() : string{return "hogwartsscarf{$this->faculty}";}
	public function getType() : string{return "body";}
	public function getName() : string{return "Шарф {$this->faculties[$this->faculty]}";}

	public function __construct(Lunarity $main, string $faculty){
		$this->faculty = $faculty;
		$this->texture = "{$this->faculty}_scarf.png";
		$this->uv = [0,64];
		$this->cubemap = "hogwartsscarf.json";
		parent::__construct($main);
	}

}