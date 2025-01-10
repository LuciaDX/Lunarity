<?php

namespace lc\cmds;

use lc\Lunarity;
use pocketmine\command\CommandSender;
use pocketmine\command\defaults\VanillaCommand;
use pocketmine\command\utils\InvalidCommandSyntaxException;

class GiveAll extends VanillaCommand{

	public function __construct(){
		parent::__construct(
			"givecosmetic",
			"Evle",
			"/Evle"
		);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){

		if(!$this->testPermission($sender)){
			return true;
		}

		if(count($args) === 0){
			throw new InvalidCommandSyntaxException();
		}
		$p = $sender->getServer()->getPlayerByPrefix($args[0]);
		$co = Lunarity::$cosmetics[$args[1]];
		$p->container->contents[] = $co;
		$p->sendMessage("Вы получили {$co->getName()}");
		$sender->sendMessage("Выдано");
		return true;
	}


}
