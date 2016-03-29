<?php

namespace StatsPopup;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
	
	private $economyapi;
	
	public function onEnable(){
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
			 $this->economyapi = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
	}
	
	public function onMove(\pocketmine\event\player\PlayerMoveEvent $event){
		$player = $event->getPlayer();
		$pn = count($this->getServer()->getOnlinePlayers());
		$px = $this->getServer()->getMaxPlayers();
		$name = $player->getName();
		$x = $player->getFloorX();
		$y = $player->getFloorY();
		$z = $player->getFloorZ();
		$player->sendTip("\n\n•\n                                                 §3§l  \n                                                 §e§lPlayers§a: §c".$pn."§2/§c".$px."§r\n                                                 §e§lCoins§a: §c".$this->economyapi->mymoney($name)."§r\n                                                 §e§lHealth§a: §c".$player->getHealth()."§2/§c".$player->getMaxHealth());
	}
}
