<?php
namespace Mohi\StopBlock;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
//use pocketmne\command\Command;
//use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\block\Block;

class StopBlock extends PluginBase implements Listener {
	private $key =
	array (
	'8:0',
	'9:0',
	'10:0',
	'11:0'
	);
//	private $messages;
//	private $config;
//	private SB = true;
	//private $block = ["water" => true, "lava" => true, "gravel" => false, 'sand''=> false];
	
	/*define("WATER_1", "8:0");
	define("WATER_1", "9:0");
	define("LAVA_1", "17:1");
	define("LAVA_2", "17:2");*/
	
	public function onEnable() {
		//@mkdir ( $this->getDataFolder () );
		//$this->messages = $this->loadMessage();
		$this->getLogger()->alert("Made By Mohi(물외한인)");
		$this->getLogger()->alert("https://github.com/Stabind");
		$this->getLogger()->alert("이 플러그인의 무단 배포는 허용하나, 무단 수정은 절대 금지합니다.");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		
		public function isBlockLiquid(Block $block) {
			return in_array($block->getId().":".$block->getDamage(), $this->key);
		}
		public function onBlockUpdate(BlockUpdateEvent $event) {
			if($this->isBlockLiquid($event->getBlock())){$event->setCancelled(true);}
		}		
}