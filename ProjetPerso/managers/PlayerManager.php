<?php

class PlayerManager extends AbstractManager{
    
    public function getAllPlayers() : array
    {
        $query=$this->db->prepare("SELECT * FROM players");
        $query->execute();
        $getAllPlayers=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabPlayers=[];
        foreach($getAllPlayers as $player){
            $object=new Player($player['id'], $player['first_name'],$player['last_name'],$player['phone'],$player['birthdate'],$player['position'],$player['foot'],$player['bio'],$player['profil_img']);
            array_push($tabPlayers, $object);
        }
        var_dump($tabPlayers);
        return $tabPlayers;
    }
    
    public function getPlayerById(int $id) : Player
    {
        $query=$this->db->prepare("SELECT * FROM players WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getPlayerById=$query->fetch(PDO::FETCH_ASSOC);
        $newPlayer=new Player($getPlayerById['id'], $getPlayerById['firstname'],$getPlayerById['lastname'],$getPlayerById['phone'],$getPlayerById['birthdate'],$getPlayerById['position'],$getPlayerById['foot'],$getPlayerById['bio'],$getPlayerById['profilImg']);
    
        return $newPlayer;
    }
    
    public function getPlayerByPosition(string $position) : Player
    {
        $query=$this->db->prepare("SELECT * FROM players WHERE position= :position");
        $parameters= ['position' => $position];
        $query->execute($parameters);
        $getPlayerById=$query->fetch(PDO::FETCH_ASSOC);
        $newPlayer=new Player($getPlayerById['id'], $getPlayerById['firstname'],$getPlayerById['lastname'],$getPlayerById['phone'],$getPlayerById['birthdate'],$getPlayerById['position'],$getPlayerById['foot'],$getPlayerById['bio'],$getPlayerById['profilImg']);
    
        return $newPlayer;
    }
    
    public function getPlayerByFoot(string $foot) : Player
    {
        $query=$this->db->prepare("SELECT * FROM players WHERE foot= :foot");
        $parameters= ['foot' => $foot];
        $query->execute($parameters);
        $getPlayerById=$query->fetch(PDO::FETCH_ASSOC);
        $newPlayer=new Player($getPlayerById['id'], $getPlayerById['firstname'],$getPlayerById['lastname'],$getPlayerById['phone'],$getPlayerById['birthdate'],$getPlayerById['position'],$getPlayerById['foot'],$getPlayerById['bio'],$getPlayerById['profilImg']);
    
        return $newPlayer;
    }
    
    public function insertPlayer(Player $player) : Player
    {
        $query=$this->db->prepare("INSERT INTO players VALUES (null, :firstname, :lastname, :phone, :birthdate,:position,:foot,:bio,:profilImg)");
        $parameters= [
            'firstname' =>$player->getFirstname(),
            'lastname' => $player->getLastname(),
            'phone' => $player->getPhone(),
            'birthdate' => $player->getBirthdate(),
            'position' => $player->getPosition(),
            'foot' => $player->getFoot(),
            'bio' => $player->getBio(),
            'profilImg' => $player->getProfilImg()
            ];
        $query->execute($parameters);
    
        $getPlayer=$query->fetch(PDO::FETCH_ASSOC);
    
        return $player;
    }
    
    public function editPlayer(Player $player) : void
    {
        $query=$this->db->prepare("UPDATE players SET firstname = :firstname, lastname=:lastname, phone=:phone, birthdate=:birthdate, position=:position, foot=:foot, bio=:bio, profilImg=:profilImg WHERE players.id=:id");
        $parameters= [
            'id' => $Player->getId(),
            'firstname' =>$player->getFirstname(),
            'lastname' => $player->getLastname(),
            'phone' => $player->getPhone(),
            'birthdate' => $player->getBirthdate(),
            'position' => $player->getPosition(),
            'foot' => $player->getFoot(),
            'bio' => $player->getBio(),
            'profilImg' => $player->getProfilImg()
            ];
        $query->execute($parameters);
        $allPlayers=$query->fetch(PDO::FETCH_ASSOC);
    }
}


?>