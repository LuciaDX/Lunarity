<?php

namespace lc\ui;

use cosmicpe\form\SimpleForm;
use cosmicpe\form\entries\simple\Button;
use cosmicpe\form\types\Icon;
use pocketmine\player\Player;

class LunarityUI extends SimpleForm {

	public function __construct(Player $p){
		$items = [];
		$names = ["head"=>"Голова","body"=>"Тело","pet"=>"Питомец"];
		foreach($p->container->items as $part => $item){
			$items[] = "§9".$names[$part].": ".($item ? "§a{$item->getName()}" : "§cПусто");
		}
		$cont = "§6На тебе:\n".implode("\n",$items)."\n ";
		parent::__construct("Кастомизация Персонажа",$cont);

		$equip = new Button("Голова", new Icon("path", "textures/persona_thumbnails/steve_hair_thumbnail_0"));
		$equip->extraData["part"] = "head";

		$this->addButton($equip);

		$equip = new Button("Тело", new Icon("path", "textures/persona_thumbnails/steve_shirt_thumbnail_0"));
		$equip->extraData["part"] = "body";

		$this->addButton($equip);

		$equip = new Button("Питомцы", new Icon("path", "textures/persona_thumbnails/plain_eyes_thumbnail_0"));
		$equip->extraData["part"] = "pet";

		$this->addButton($equip);

		/*$equip = new Button("Chat Tags", new Icon("path", "textures/items/name_tag"));
		$equip->extraData["change"] = "tags";

		$this->addButton($equip);*/

		$named = ["head"=>"голову","body"=>"тело","pet"=>"питомца"];
		foreach($p->container->items as $part => $c){
			if($c){
				$equip = new Button("§cУбрать ".$named[$part], new Icon("path", "textures/ui/cancel"));
				$equip->extraData["remove"] = $part;
				$this->addButton($equip);
			}
		}

	}

	public function onClickButton(Player $player, Button $button, int $button_index) : void{
		if(isset($button->extraData["preview"])){
			$player->sendForm(new Preview($player));
			return;
		}
		if(isset($button->extraData["remove"])){
			$player->container->items[$button->extraData["remove"]] = null;
			$player->refreshSkin();
			$player->sendForm(new self($player));
			return;
		}

		$player->sendForm(new Chooser($player,$button->extraData["part"],1));

	}

	public function onClose(Player $player) : void{
	}
}
