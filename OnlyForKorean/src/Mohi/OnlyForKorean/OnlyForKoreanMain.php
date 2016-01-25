<?php

namespace Mohi\OnlyForKorean;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\utils\Utils;

use UUIDBan\UUIDBan;

class OnlyForKoreanMain extends PluginBase implements Listener {
	private $terrorist;
	
	public function OnEnable() {
		$this->getLogger()->alert("Made By Mohi(물외한인)");
		$this->getLogger()->alert("https://github.com/Stabind");
		$this->getLogger()->alert("이 플러그인의 무단 배포는 허용하나, 무단 수정은 절대 금지합니다.");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	 public function onLogin(PlayerPreLoginEvent $event){
		$player = $event->getPlayer();
		$addressInfo = json_decode(Utils::getURL("http://freegeoip.net/json/".$player->getAddress()), true);
		if(! $addressInfo[country_code] == "KR") {
			$event->setKickMessage("You are not Korean");
			$event->setCanCelled();
		}
	}
}
?>
