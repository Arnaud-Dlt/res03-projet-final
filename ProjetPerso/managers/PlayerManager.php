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
    
    public function playersOrderByName() : array
    {
        $query=$this->db->prepare("SELECT * FROM players ORDER BY last_name");
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
    
    public function playersOrderByPosition() : array
    {
        $query=$this->db->prepare("SELECT * FROM players ORDER BY position");
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
    
    public function getPlayersByPosition(string $position) : array
    {
        $query=$this->db->prepare("SELECT * FROM players WHERE position= :position");
        $parameters= ['position' => $position];
        $query->execute($parameters);
        $getPlayersByPosition=$query->fetchAll(PDO::FETCH_ASSOC);
        
        $tabPlayersByPosition=[];
        foreach($getPlayersByPosition as $player){
            $object=new Player($player['first_name'],$player['last_name'],$player['phone'],$player['birthdate'],$player['position'],$player['foot'],$player['bio'],$player['profil_img'], $player['category_id']);
            array_push($tabPlayersByPosition, $object);
            $object->setId($player["id"]);
        }
        return $tabPlayersByPosition;
    }
    
    public function getPlayersByFoot(string $foot) : Player
    {
        $query=$this->db->prepare("SELECT * FROM players WHERE foot= :foot");
        $parameters= ['foot' => $foot];
        $query->execute($parameters);
        $getPlayerByFoot=$query->fetch(PDO::FETCH_ASSOC);
        $newPlayer=new Player($getPlayerByFoot['first_name'],$getPlayerByFoot['last_name'],$getPlayerByFoot['phone'],$getPlayerByFoot['birthdate'],$getPlayerByFoot['position'],$getPlayerByFoot['foot'],$getPlayerByFoot['bio'],$getPlayerByFoot['profil_img'],$getPlayerByFoot['category_id']);
    
        return $newPlayer;
    }
    
    public function getPlayerByCategory(): Player
    {
        $query=$this->db->prepare("SELECT * FROM players WHERE category= :category_id");
        $parameters= ['category' => $category];
        $query->execute($parameters);
        $getPlayerByCategory=$query->fetch(PDO::FETCH_ASSOC);
        $newPlayer=new Player($getPlayerByCategory['first_name'],$getPlayerByCategory['last_name'],$getPlayerByCategory['phone'],$getPlayerByCategory['birthdate'],$getPlayerByCategory['position'],$getPlayerByCategory['foot'],$getPlayerByCategory['bio'],$getPlayerByCategory['profil_img'],$getPlayerByCategory['category_id']);
    
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
        var_dump($player);
        $query=$this->db->prepare("UPDATE players SET first_name = :first_name, last_name=:last_name, phone=:phone, position=:position, foot=:foot, bio=:bio, profil_img= :profil_img WHERE id=:id");
        $parameters= [
            'id'=>$player->getId(),
            'first_name' =>$player->getFirstname(),
            'last_name' => $player->getLastname(),
            'phone' => $player->getPhone(),
            'position' => $player->getPosition(),
            'foot' => $player->getFoot(),
            'bio' => $player->getBio(),
            'profil_img' => $player->getProfilImg()
            ];
        $query->execute($parameters);
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