<?php
namespace Mohi\KickAll;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;

class kickAllMain extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onCommand(CommandSender $sender, Command $command, $label, $Array $args) {
		if(strtolower($command) == $this->get("kor-command") {
			if(! isset($args[0])) {
				
			}
		}
		switch
	}
	public function kickAll(String $reason) {
		foreach ( $this->getServer ()->getOnlinePlayers () as $player ) {
			$player->save ();
			$player->kick($reason);
		}
		}
	}
}
   
?>