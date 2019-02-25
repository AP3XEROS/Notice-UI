<?php

namespace LCH;
 
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listeners;
use pocketmine\utils\TextFormat;
use jojoe77777\FormAPI\FormAPI;
use jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase implements Listener
{

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "Enabled!");
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if($api === null){
            $this->getServer()->getLogger()->info("Please use a FormAPI plugin!");
        }
    }
	
    public function onJoin(PlayerJoinEvent $event)  {
        $player = $event->getPlayer();
        $name = $player->getName();
        $this->mainForm($player);
        $player->sendMessage("§7§l==============================§r\n§7>\n§a>                    §l§bAPEX REALMS§r\n§r§7>\n§a>§bEnjoy Your Conquest\n§7>\n§a> §bShop: shop.apexrealms.us\n§7>\n§a>§6 Vote for free rewards: §bvote.apexrealms.us\n§l§7==============================");
        $player->addTitle("§b§lWelcome to OP Factions");
    } 
   }
  }
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
	  	if($command == "updates"){
		  	if($sender instanceof Player){
				$this->updatesForm($sender);
		 	 	return true;
	 	  	}
			
	public function getFormAPI() : FormAPI {
        /** @var FormAPI $api */
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        return $api;
    }
	 	
    public function mainForm(Player $player) {
		         $form = $this->getFormAPI()->createSimpleForm(function (Player $player, int $data = null){
            $result = $data;
                if($result === null) {
					return;
                }
                switch ($result) {
                    case 0;
                        $player->sendMessage("§bshop.apexrealms.us");
						break;
                case 1:
                    $this->updatesForm($player);
                    break;
                }
            });
            $form->setTitle("§l§7Recommended Package §aVIP 5§c+");
            $form->setContent("§l§cUnlocks:§r§7\n - Color Name Tag\n - Color Name in chat \n - Kit Warlord+ \n - Kit Infinity\n - Kit Promethian\n - Kit Ether\n - Kit Echo\n - x5 Legendary Crate Keys (Daily)\n - x5 Gear Crate Keys (Daily)\n - x5 Common Crate Keys (Daily)\n");
            $form->addbutton("§aBuy §8VIP5+");
            $form->addbutton("§aContinue");
            $form->sendToPlayer($player);
    }
	
    public function updatesForm(Player $player){
		        $form = $this->getFormAPI()->createSimpleForm(function (Player $player, int $data = null){
                $result = $data;
                if($result === null) {
					return;
                }
                switch ($result) {
                    case 0;
                        $this->linkForm($player);
                }
            });
            $form->setTitle("§l§7UPDATES");
            $form->setContent("§l§cPATCHES:§r§7\n - Kits added \n - Perms added\n - Minibosses (Coming Soon...)\n - Class System (Coming Soon...)\n - Wings System (Coming Soon...) ");
            $form->addbutton("§aContinue");
            $form->sendToPlayer($player);
    }
	
    public function linkForm(Player $player){
     $form = $this->getFormAPI()->createSimpleForm(function (Player $player, int $data = null){
                $result = $data;
                if($result === null) {
				return;
                }
                switch ($result) {
                    case 0;
                        $player->sendMessage("§bdiscord.apexrealms.us");
						break;
                    case 1;
                        $player->sendMessage("§bshop.apexrealms.us");
						break;
                    case 2;
                        $player->sendMessage("§btweet.apexrealms.us");
						break;
                    case 3;
                        $player->sendMessage("§bvote.apexrealms.us");
						break;
                }
            });
            $form->setTitle("§l§7Server Links");
            $form->setContent(" §7Here are  all the  server  links.\n We look forward to Seeing you more! ");
            $form->addbutton("§aDiscord");
            $form->addbutton("§aShop");
            $form->addbutton("§aTwitter");
            $form->addbutton("§aVote");
            $form->sendToPlayer($player);
    }
}