<?php

namespace Mohi\BanTerrorist;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerEvent;
use pocketmine\Player;
use pocketmine\utils\Utils;

use UUIDBan\UUIDBan;

class BanTerroristMain extends PluginBase implements Listener {
	private $terrorist;
	
	public function OnEnable() {
		$this->getLogger()->alert("Made By Mohi(물외한인)");
		$this->getLogger()->alert("https://github.com/Stabind");
		$this->getLogger()->alert("이 플러그인의 무단 배포는 허용하나, 무단 수정은 절대 금지합니다.");
		$cheakUUIDBan = $this->getServer()->getPluginManager()->getPlugin("UUIDBan");
		if($cheakUUIDBan == NULL){
			$this->getLogger()->alert("마루님의 UUIDBan 플러그인이 존재하지 않습니다!");
			$this->getLogger()->alert("플러그인을 비활성화 합니다");
			$this->getServer()->getPluginManager()->disablePlugin($this);
			return false;
		}
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->terrorist = json_decode(Utils::getURL("0in.kr/List.html"), true);
	}
	
	 public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$reason = "당신은 테러범입니다.";
		$admin = "Admin";
		for($i=0;$i<count($this->terrorist);$i++) {
			 if($this->terrorist[i] == $player->getAddress()) {
				$this->getServer()->broadcastMessage( TextFormat::RED ."[서버]테러범이 접속하였습니다.");
				$this->getServer()->broadcastMessage( TextFormat::RED ."[서버]곧 기기밴 됩니다.");
				UUIDBan::getInstance()->AddBan($player, $reason);
				$this->getServer()->broadcastMessage( TextFormat::RED ."[서버]기기밴 완료");
				return true;
			 }
		}
		/*foreach($this->terrorist as $list) {
			if($list == $player->getAddress()) {
				$this->getServer()->broadcastMessage( TextFormat::RED ."[서버]테러범이 접속하였습니다.");
				$this->getServer()->broadcastMessage( TextFormat::RED ."[서버]곧 기기밴 됩니다.");
				UUIDBan::getInstance()->AddBan($player, $reason);
				$this->getServer()->broadcastMessage( TextFormat::RED ."[서버]기기밴 완료");
				return true;
			}
		}*/
	}
}
?>