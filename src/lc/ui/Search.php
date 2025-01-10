<?php

namespace lc\ui;

use cosmicpe\form\CustomForm;
use cosmicpe\form\entries\custom\InputEntry;
use lc\Lunarity;
use pocketmine\player\Player;

class Search extends CustomForm {

	public array $data;

	public function __construct(array $items, string $title, int $page){
		parent::__construct("Search Cosmetics");
		$this->data = [
			"items" => $items,
			"title" => $title,
			"page" => $page
		];
		$this->addEntry(new InputEntry("Search","e.g. Pink Wings"));
	}

	public function handleData($player, $data){
		if(strlen($data[0]) < 1){
			$player->sendForm(new Preview($player));
		} else {
			$title = "Matches for \"{$data[0]}\"";
			$items = [];
			$lower = strtolower($data[0]);
			foreach(Lunarity::$cosmetics as $item){
				if(str_contains(strtolower($item->getName()),$lower)){
					$items[] = $item;
				}
			}
			$player->sendForm(new Preview($player,1,$items,$title));
		}
	}

	public function onClose(Player $player) : void{
		$player->sendForm(new Preview($player,$this->data["page"],$this->data["items"],$this->data["title"]));
	}

}