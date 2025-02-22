<?php

namespace lc\ui;

use cosmicpe\form\entries\simple\Button;
use cosmicpe\form\PaginatedForm;
use lc\Lunarity;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\type\InvMenuTypeIds;
use pocketmine\inventory\Inventory;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class Preview extends PaginatedForm {

	private const ENTRIES_PER_PAGE = 10;

	public $total;

	public $items;

	private $page = [];

	public function __construct(Player $player, int $current_page = 1, array $items = null, string $title = "Preview Cosmetics"){
		$this->player = $player;
		$this->items = $items ?? Lunarity::$cosmetics;
		$this->total = count($this->items);

		foreach(array_slice(
			$this->items,
			($current_page - 1) * self::ENTRIES_PER_PAGE,
			self::ENTRIES_PER_PAGE
		) as $c){
			$this->page[] = $c;
		}
		$content = "";
		if(empty($this->page)){
			$content = "Nothing found";
		}
		parent::__construct(
			$title,
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
		switch($button->extraData["type"]){
			case "preview":
				$menu = InvMenu::create(InvMenuTypeIds::TYPE_HOPPER);
				$menu->setName("Previewing §c".($button->extraData["cosmetic"])->name);
				$menu->setListener(InvMenu::readonly());
				$items = $this->items;
				$page = $this->current_page;
				$title = $this->title;
				$menu->setInventoryCloseListener(function(Player $player, Inventory $inventory) use ($items,$page,$title) : void{
					$player->sendForm(new self($player,$page,$items,$title));
					$player->sendSkin([$player]);
				});
				$menu->send($player);
				break;
			case "search":
				$player->sendForm(new Search($this->items,$this->title,$this->current_page));
				break;
			case "clear":
				$player->sendForm(new self($player));
		}
	}

	protected function populatePage() : void{
		$search = new Button("Search Cosmetics");
		$search->extraData["type"] = "search";
		$this->addButton($search);
		if($this->title !== "Preview Cosmetics"){
			$clear = new Button("Clear Search");
			$clear->extraData["type"] = "clear";
			$this->addButton($clear);
		}
		foreach($this->page as $c){
			$text = $c->name;
			$btn = new Button($text);
			$btn->extraData["cosmetic"] = $c;
			$btn->extraData["type"] = "preview";
			$this->addButton($btn);
		}
	}

	public function onClose(Player $player) : void{
	}

	protected function sendPreviousPage(Player $player) : void{
		$player->sendForm(new self($player,$this->current_page - 1,$this->items,$this->title));
	}

	protected function sendNextPage(Player $player) : void{
		$player->sendForm(new self($player,$this->current_page + 1,$this->items,$this->title));
	}
}
