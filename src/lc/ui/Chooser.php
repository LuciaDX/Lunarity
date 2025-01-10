<?php

namespace lc\ui;

use cosmicpe\form\PaginatedForm;
use cosmicpe\form\entries\simple\Button;
use pocketmine\player\Player;

class Chooser extends PaginatedForm {

	private const ENTRIES_PER_PAGE = 10;

	public $total;

	public $type;

	private $player;

	private $page = [];

	public function __construct(Player $player, string $type, int $current_page = 1){
		$this->player = $player;
		$this->type = $type;
		$cosm = array_filter($player->container->contents, function($v){
			return ($v->getType() == $this->type);
		});
		$this->total = count($cosm);

		foreach(array_slice(
			$cosm,
			($current_page - 1) * self::ENTRIES_PER_PAGE,
			self::ENTRIES_PER_PAGE
		) as $c){
			$this->page[] = $c;
		}

		$content = "";
		if(empty($this->page)){
			$content = "Nothing here";
		}
		parent::__construct(
			"Choose Cosmetic",
			$content,
			$current_page
		);
	}

	protected function getPreviousButton() : Button{
		return new Button("<-");
	}

	protected function getNextButton() : Button{
		return new Button("->");
	}

	protected function getPages() : int{
		return (int) ceil($this->total / self::ENTRIES_PER_PAGE);
	}

	public function onClickButton(Player $player, Button $button, int $button_index) : void{
		if(!$button->extraData["chosen"]){
			$player->container->setItem($button->extraData["cosmetic"]);
		} else {
			$player->container->items[($button->extraData["cosmetic"])->getType()] = null;
		}
		$player->refreshSkin();
		$player->sendForm(new self($player, $this->type, $this->current_page));
	}

	protected function populatePage() : void{
		foreach($this->page as $c){
			$text = $c->getName();
			$chosen = false;
			if($this->player->container->items[$c->getType()]) {
				if (($this->player->container->items[$c->getType()])->getId() == $c->getId()) {
					$text .= "\n§aChosen";
					$chosen = true;
				}
			}
			$btn = new Button($text);
			$btn->extraData["chosen"] = $chosen;
			$btn->extraData["cosmetic"] = $c;
			$this->addButton($btn);
		}
	}

	public function onClose(Player $player) : void{
		$player->sendForm(new LunarityUI($player));
	}

	protected function sendPreviousPage(Player $player) : void{
		$player->sendForm(new self($player, $this->type, $this->current_page - 1));
	}

	protected function sendNextPage(Player $player) : void{
		$player->sendForm(new self($player, $this->type, $this->current_page + 1));
	}
}
