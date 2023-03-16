<?php

class PlayerManager extends AbstractManager{
    
    public function getAllPlayers() : array
    {
        $query=$this->db->prepare("SELECT * FROM players");
        $query->execute();
        $getAllPlayers=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabPlayers=[];
        foreach($getAllPlayers as $player){
            $object=new Player($player['first_name'],$player['last_name'],$player['phone'],$player['birthdate'],$player['position'],$player['foot'],$player['bio'],$player['profil_img'], $player['category_id']);
            array_push($tabPlayers, $object);
            $object->setId($player["id"]);
        }
        
        return $tabPlayers;
    }
    
    public function getPlayerById(int $id) : Player
    {
        $query=$this->db->prepare("SELECT * FROM players WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getPlayerById=$query->fetch(PDO::FETCH_ASSOC);
        $newPlayer=new Player($getPlayerById['first_name'],$getPlayerById['last_name'],$getPlayerById['phone'],$getPlayerById['birthdate'],$getPlayerById['position'],$getPlayerById['foot'],$getPlayerById['bio'],$getPlayerById['profil_img'], $getPlayerById['category_id']);
        
        $newPlayer->setId($getPlayerById["id"]);
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
        $query=$this->db->prepare("INSERT INTO players VALUES (null, :first_name, :last_name, :phone, :birthdate,   :position, :foot, :bio, :profil_img, :category_id)");
        $parameters= [
            'first_name' =>$player->getFirstname(),
            'last_name' => $player->getLastname(),
            'phone' => $player->getPhone(),
            'birthdate' => $player->getBirthdate(),
            'position' => $player->getPosition(),
            'foot' => $player->getFoot(),
            'bio' => $player->getBio(),
            'profil_img' => $player->getProfilImg(),
            'category_id' => $player->getCategoryId()
            ];
            
        $query->execute($parameters);
    
        $getPlayer=$query->fetch(PDO::FETCH_ASSOC);
    
        return $player;
    }
    
    public function editPlayer(Player $player) : void
    {
        $query=$this->db->prepare("UPDATE players SET first_name = :first_name, last_name=:last_name, phone=:phone, birthdate=:birthdate, position=:position, foot=:foot, bio=:bio, profil_img=:profil_img WHERE players.id=:id");
        $parameters= [
            'first_name' =>$player->getFirstname(),
            'last_name' => $player->getLastname(),
            'phone' => $player->getPhone(),
            'birthdate' => $player->getBirthdate(),
            'position' => $player->getPosition(),
            'foot' => $player->getFoot(),
            'bio' => $player->getBio(),
            'profil_img' => $player->getProfilImg()
            ];
        $query->execute($parameters);
        $allPlayers=$query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deletePlayer(int $id) : void
    {
        $query=$this->db->prepare("DELETE FROM players WHERE id= :id");
        $parameters= [
            'id' => $id
            ];
        $query->execute($parameters);
    }
}


?>