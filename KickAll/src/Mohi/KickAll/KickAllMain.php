<?php
namespace Mohi\KickAll;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;

class kickAllMain extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function kickAll(String $br) {
		 foreach ( $this->getServer ()->getOnlinePlayers () as $player ) {
			$player->save ();
		}
		foreach ( $this->getServer ()->getOnlinePlayers () as $player ) {
			$player->kick ( $br );
		}
	}
}
   
?>