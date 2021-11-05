<?php

namespace Heal;





use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat as R;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;





class Main extends PluginBase implements Listener{
	public $prefix = "§2§lHeal" ;

public function onEnable()
{
	$this->getLogger()->info(R::DARK_PURPLE . "Plugin $this->prefix Enable Shod . ");
}

public function onDisable()
{
	$this->getLogger()->info(R::RED . "Plugin $this->prefix Disable Shod . ");
}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
	{
		if($sender instanceof Player){
			if($cmd->getName() == "heal") {
				if(isset($args[0])){
					$player = $this->getServer()->getPlayer($args[0]);
					if($player){
						$player->setHealth(20);
						$player->sendMessage("§2§lShoma Ba Movafaqiat Heal Shodid . ");
						$sender->sendMessage("§2§lShoma $args[0]  Ra Heal Kardid");
					}
						else{
							$sender->sendMessage("In Player Voojood Nadarad");
						}
				}
				else {
					$sender->setHealth(20);
					$sender->sendMessage("Shoma Ba Movafaqiat Heal Shodid");
				}
			}
		}
		else{
			$sender->sendMessage(R::RED . "Dar Game Type Konid !");
		}
		return true;
	}


}