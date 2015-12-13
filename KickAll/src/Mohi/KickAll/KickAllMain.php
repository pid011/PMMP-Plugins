<?php
namespace Mohi\KickAll;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\PluginCommand;

class kickAllMain extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onCommand(CommandSender $sender, Command $command, $label, $Array $args) {
		if(strtolower($command) == $this->get("kor-kick-all-command") {
			if(! isset($args[0])) {
				$this->alert($sender, $this->get("kor-kick-all-command-help"), $this->get("kor-prefix");
			}
		}
		switch 
	}
	public function alert(CommandSender $sender, $message, $prefix = NULL)
	{
		if($prefix==NULL){
			$prefix = $this->get("default-prefix");
		}
		$sender->sendMessage(TextFormat::RED.$prefix." $message");
	}
	 public function message(CommandSender $sender, $message, $prefix = NULL)
	{
		if($prefix==NULL){
			$prefix = $this->get("default-prefix");
		}
		$sender->sendMessage(TextFormat::DARK_AQUA.$prefix." $message");
	}
	public function get($text)
	{
		return $this->messages[$this->messages["default-language"]."-".$text];
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