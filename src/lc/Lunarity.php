<?php

namespace lc;

use lc\items\BaseItem;
use lc\items\body\Backpack;
use lc\items\body\BigWings;
use lc\items\head\FoxEars;
use lc\items\body\HogwartsScarf;
use lc\items\body\Katana;
use lc\items\head\NinjaHeadband;
use lc\items\body\Wings;
use lc\items\head\Anvil;
use lc\items\head\Arrow;
use lc\items\head\Bear;
use lc\items\head\BearEars;
use lc\items\head\Beaver;
use lc\items\head\BrainSlug;
use lc\items\head\Coffee;
use lc\items\head\DealWithIt;
use lc\items\head\DeerHornsCurved;
use lc\items\head\DevilHorns;
use lc\items\head\Diadem;
use lc\items\head\DogEars;
use lc\items\head\FallenAngelNimbus;
use lc\items\head\Glass;
use lc\items\head\IceHorns;
use lc\items\head\IceKingCrown;
use lc\items\head\Nimbus;
use lc\items\head\PandaHat;

use lc\items\pet\AmongGuy;
use lc\items\pet\AtomPet;
use lc\items\pet\FoxPet;
use lc\items\pet\OreoPet;
use lc\skins\ImageUtils;
use lc\skins\SkinContainer;
use Imagine\Gd\Imagine;

use muqsit\invmenu\InvMenuHandler;
use pocketmine\event\player\PlayerChangeSkinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent as Join;
use pocketmine\event\player\PlayerQuitEvent as Quit;

class Lunarity extends PluginBase implements Listener{

    public static array $cosmetics = [];
	public string $path = "...";
	public static string $profiles = "...";
	public static string $load = "";

    public function onEnable():void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getCommandMap()->register("pocketmine", new cmds\Locker());
		$this->getServer()->getCommandMap()->register("pocketmine", new cmds\GiveAll());
		self::$load = $this->getFile()."src/lc/";

		if(!InvMenuHandler::isRegistered()){
			InvMenuHandler::register($this);
		}

		$this->register(new Anvil($this));
		$this->register(new BearEars($this));
		$this->register(new Beaver($this));
		$this->register(new Arrow($this));
		$this->register(new Bear($this,"grizzly"));
		$this->register(new Bear($this,"white"));
		$this->register(new Bear($this,"panda"));
		$this->register(new BrainSlug($this));
		$this->register(new Coffee($this));
		$this->register(new DealWithIt($this));
		$this->register((new DeerHornsCurved($this))->setCollection("WINTER")->setNew(true));
		$this->register(new DevilHorns($this));
		$this->register(new Diadem($this));
		$this->register(new DogEars($this,"brown"));
		$this->register(new DogEars($this,"gray"));
		$this->register(new DogEars($this,"purple"));
		$this->register(new DogEars($this,"green"));
		$this->register(new DogEars($this,"red"));
		$this->register(new DogEars($this,"white"));
		$this->register(new DogEars($this,"orange"));
		$this->register(new FallenAngelNimbus($this));
		$this->register(new Nimbus($this));
		$this->register(new IceKingCrown($this));
		$this->register(new FoxEars($this,"orange"));
		$this->register(new FoxEars($this,"black"));
		$this->register(new FoxEars($this,"yellow"));
		$this->register(new Glass($this));
		$this->register(new IceHorns($this));
		$this->register(new NinjaHeadband($this,"black"));
		$this->register(new NinjaHeadband($this,"red"));
		$this->register(new PandaHat($this));

		$this->register(new Katana($this));
		$this->register(new BigWings($this,"black"));
		$this->register(new BigWings($this,"white"));
		$this->register(new BigWings($this,"orange"));
		$this->register(new Wings($this,"black"));
		$this->register(new Wings($this,"blue"));
		$this->register(new Wings($this,"green"));
		$this->register(new Wings($this,"pink"));
		$this->register(new Wings($this,"white"));
		$this->register(new Backpack($this,"black"));
		$this->register(new Backpack($this,"blue"));
		$this->register(new Backpack($this,"green"));
		$this->register(new Backpack($this,"orange"));
		$this->register(new Backpack($this,"red"));
		$this->register(new HogwartsScarf($this,"gryffindor"));
		$this->register(new HogwartsScarf($this,"hufflepuff"));
		$this->register(new HogwartsScarf($this,"ravenclaw"));
		$this->register(new HogwartsScarf($this,"slytherin"));

		$this->register(new AmongGuy($this,"red"));
		$this->register(new AmongGuy($this,"blue"));
		$this->register(new AmongGuy($this,"green"));
		$this->register(new AmongGuy($this,"yellow"));
		$this->register(new FoxPet($this,"default"));
		$this->register(new FoxPet($this,"snow"));
		$this->register(new AtomPet($this));
		$this->register(new OreoPet($this));

    }

	public function register(BaseItem $item){
		self::$cosmetics[$item->getId()] = $item;
	}

	public function lSkin(PlayerChangeSkinEvent $e){
		$e->cancel();
		$e->getPlayer()->sendMessage("§cМмм не думаю...");
	}

	/**
	 * @priority NORMAL
	 */
    public function lJoin(Join $e){
		$imagine = new Imagine();
        $e->getPlayer()->container = new SkinContainer(
			$imagine->open(self::$profiles.$e->getPlayer()->getName()."/skin.png"),
			json_decode(
				file_get_contents(self::$profiles.$e->getPlayer()->getName()."/geometry.json"),
				true
			),
			(json_decode(
				file_get_contents(self::$profiles.$e->getPlayer()->getName()."/data.json"),
				true
			))["customize"]
		);
		$e->getPlayer()->refreshSkin();
		if($this->getServer()->isOp($e->getPlayer()->getName())){
			$e->getPlayer()->container->contents = array_values(self::$cosmetics);
		}
	}
}