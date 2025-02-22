<?php

namespace lc\skins;

class OnyxGeometry implements \JsonSerializable{

	public string $type;
	public array $bones;

	public function __construct(string $type, array $bones){
		$this->type = $type;
		$this->bones = $bones;
	}

	public function jsonSerialize():string {
		return $this->type;
	}
}