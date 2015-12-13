<?php
/*
SafeStop ver 0.2
Copyright 2015 Mohi Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
*/

namespace Mohi\SafeStop;

use pocketmine\event\server\ServerCommandEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\tile\Tile;
use pocketmine\entity\Creature;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class SafeStopMain extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function PlayerCommandPreprocess(PlayerCommandPreprocessEvent $event) {
		$cmd = strtolower(trim($event->getMessage()));
		if($cmd=='/stop'&&$event->getPlayer()->isOp()) { $this->stopSafe(); $event->setCancelled(); }
	}
	public function ServerCommand(ServerCommandEvent $event) {
		$br = strtolower(trim($event->getCommand()));
		if($br=='stop') {
			$event->setCancelled();
			$this->stopSafe();
		}
	}
	public function stopSafe() {
		$this->kickAllPlayer ();
		$this->entityClean ();
		$this->monsterClean ();
		$this->shutdown();
	}
	public function kickAllPlayer() {
		foreach ( $this->getServer ()->getOnlinePlayers () as $player ) {
			$player->save ();
		}
		foreach ( $this->getServer ()->getOnlinePlayers () as $player ) {
			$player->kick ( "서버가 닫혔습니다" );
		}
	}
	public function entityClean() {
		 foreach ( $this->getServer ()->getLevels () as $level )
			foreach ( $level->getEntities () as $entity ) {
				if ($entity instanceof Tile) continue;
				if ($entity instanceof Creature) continue;
				$entity->close ();
			}
	}
		
	public function monsterClean() {
		 foreach ( $this->getServer ()->getLevels () as $level )
			foreach ( $level->getEntities () as $entity )
				if ($entity instanceof Creature) {
					$check = 0;
					foreach ( $this->getServer ()->getOnlinePlayers () as $player ) {
						$mx = abs ( $player->x - $entity->x );
						$my = abs ( $player->y - $entity->y );
						$mz = abs ( $player->z - $entity->z );
						if ($mx <= 25 and $my <= 25 and $mz <= 25) $check ++;
					}
					if ($check == 0) $entity->close ();
				}
	}
	public function shutdown () {
		foreach ( $this->getServer ()->getLevels () as $level ) {
			$level->save ( \true );
		}
		$this->getServer ()->shutdown ();
	}
}
	
?>