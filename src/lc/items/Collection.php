<?php

namespace lc\items;

class Collection{

	//--------- IDS ---------
	public const DEFAULT = 0;

	//seasonal
	public const WINTER = 10;
	public const SUMMER = 11;
	public const SPRING = 12;
	public const AUTUMN = 13;

	//holidays
	public const EASTER = 100;
	public const HALLOWEEN = 101;

	//--------- NAMES ---------

	public const DEFAULT_PREFIX = "";
	public const DEFAULT_NAME = "";

	//seasonal
	public const WINTER_PREFIX = "[W]";
	public const WINTER_NAME = "Зимняя Коллекция";
	public const SUMMER_PREFIX = "[S]";
	public const SUMMER_NAME = "Летняя Коллекция";
	public const SPRING_PREFIX = "[G]";
	public const SPRING_NAME = "Весенняя Коллекция";
	public const AUTUMN_PREFIX = "[A]";
	public const AUTUMN_NAME = "Осенняя Коллекция";

	//holidays
	public const EASTER_PREFIX = "[E]";
	public const EASTER_NAME = "Пасхальная Коллекция";
	public const HALLOWEEN_PREFIX = "[H]";
	public const HALLOWEEN_NAME = "Хеллоуинская Коллекция";


	//--------- COLORS ---------
	public const DEFAULT_COLOR = "§7";

	//seasonal
	public const WINTER_COLOR = "§b";
	public const SUMMER_COLOR = "§e";
	public const SPRING_COLOR = "§a";
	public const AUTUMN_COLOR = "§d";

	//holidays
	public const EASTER_COLOR = "§f";
	public const HALLOWEEN_COLOR = "§6";


}