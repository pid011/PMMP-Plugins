<php?
namespace Mohi\Mail;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Mail extends PluginBase implements Listner {
	public function onEnable() {
		
	}
	public function onDisable() {
		
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		if(strtolower($args[0]) == "mail") {
			if(! isset($args[1])) {
				$this->alert($sender, "
				/mail <cheak|list|new>
				")
			}
			switch(strtolower($args[0])) {
				case "cheak" :
					
				case "list" :
					
				case "new" :
					if(! isset($args[2])) {
						$this->alert($sender, "받는 사람을 적어주세요")
						return true;
					}
					$to = new SendMail()
				
			}
		}
	}
	public function alert(CommandSender $sender, $message, $prefix = NULL)
	{
		if($prefix==NULL){
			$prefix = "MAIL";
		}
		$sender->sendMessage(TextFormat::RED.$prefix." $message");
	}
	public function message(CommandSender $sender, $message, $prefix = NULL)
	{
		if($prefix==NULL){
			$prefix = "MAIL"
		}
		$sender->sendMessage(TextFormat::DARK_AQUA.$prefix." $message");
	}
}
?>