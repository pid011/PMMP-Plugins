<?php
namespace Mohi\StopBlock

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listner;
use pocketmne\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\block\BlockUpdateEvent;

public class StopBlock extends PluginBase implements Listner {
	private $m_version = 1;
	private $messages;
	
	public function onEnable() {
		@mkdir ( $this->getDataFolder () );
		$this->messages = $this->loadMessage();
		$this->getLogger()->alert("Made By Mohi(물외한인)");
		$this->getLogger()->alert("https://github.com/Stabind");
		$this->getLogger()->alert("이 플러그인의 무단 배포는 허용하나, 무단 수정은 절대 금지합니다.");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function loadMessage()
	{
		$this->saveResource("messages.yml");
		$this->Updatemesage("messages.yml");
		return (new Config($this->getDataFolder()."messages.yml", Config::YAML))->getAll();
	}
	public function updateMesage($ymlfile)
	{
		$yml = (new Config($this->getDataFolder()."messages.yml", Config::YAML))->getAll();
		if(!isset($yml["m_version"])){
			$this->saveResource($ymlfile, true);
		}
		else if($yml["m_version"] < $this->m_version){
			$this->saveResource($ymlfile, true);
		}
	}
	public function save($dbname, $var)
	{
		$save = new Config($this->getDataFolder().$dbname, Config::JSON);
		$save->setAll($var);
		$save->save();
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
	public function onBlockUpdate(BlockUpdateEvent $event) {
		
	}
}

?>