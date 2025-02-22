<?php

namespace lc\cmds;

use lc\ui\LunarityUI;
use pocketmine\command\CommandSender;
use pocketmine\command\defaults\VanillaCommand;

class Locker extends VanillaCommand{

	public function __construct(){
		parent::__construct(
			"locker",
			"Your cosmetics",
			"/locker"
		);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		$sender->sendForm(new LunarityUI($sender));
		return true;
	}


}
