<?php
namespace Mohi\StopBlock

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listner;
use pocketmne\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\block\BlockUpdateEvent;
use pocketmine\block\Block;

public class StopBlock extends PluginBase implements Listner {
	private $m_version = 1;
	private $messages;
	private $config;
	private SB = true;
	//private $block = ["water" => true, "lava" => true, "gravel" => false, 'sand''=> false];
	
	
	define('STOP_ITEM'', 
	var_export(
	array (
	'water_1' => '8:0',
	'water_2' => '9:0',
	'lava_1' => '17:1',
	'lava_2' => '17:2',
	'gravel' => '17:5',
	'sand' => '17:3'
	),
	true 
	)
	);
	
	/*define("WATER_1", "8:0");
	define("WATER_1", "9:0");
	define("LAVA_1", "17:1");
	define("LAVA_2", "17:2");*/
	
	public function onEnable() {
		@mkdir ( $this->getDataFolder () );
		$this->messages = $this->loadMessage();
		$this->config = $this->loadPluginData("config.json");
		$this->getLogger()->alert("Made By Mohi(물외한인)");
		$this->getLogger()->alert("https://github.com/Stabind");
		$this->getLogger()->alert("이 플러그인의 무단 배포는 허용하나, 무단 수정은 절대 금지합니다.");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		public function isBlocktrue(Block $block) {
			
		}
		public function onBlockUpdate(BlockUpdateEveent $event) {
			
		}
		public function offSB() {
			$this->SB = false;
			return true;
		}
		public function onSB() {
			$this->SB = true;
			return true;
		}
		public function isSBOn() {
			return $this->SB;
		}
	#===============================================================================
	public function onCommand(CommandSender $sender, Command $command, $label, Array $args) {
		
		}
	}
	public function loadMessage()
	{
		$this->saveResource("messages.yml");
		$this->Updatemesage("messages.yml");
		return (new Config($this->getDataFolder()."messages.yml", Config::YAML))->getAll();
	}
	public function save($dbname, $var)
	{
		$save = new Config($this->getDataFolder()."config.yml", Config::JSON);
		$save->setAll($var);
		$save->save();
	}
	 public function loadplugindata($dbname, $save = false)
	{
		if($save == true){
			$this->saveResource($dbname);
			$this->UpdateDB($dbname);
		}
		return (new Config($this->getDataFolder().$dbname, Config::JSON))->getAll();
	}
	public function get($text)
	{
		return $this->messages[$this->messages["default-language"]."-".$text];
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
}

?>