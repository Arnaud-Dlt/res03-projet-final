<?php

class TeamManager extends AbstractManager{
    
    public function getAllTeams() : array
    {
        $query=$this->db->prepare("SELECT * FROM team");
        $query->execute();
        $getAllTeams=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabTeams=[];
        foreach($getAllTeams as $team){
            $object=new Team($team['name'], $team['picture'], $team['category_id']);
            $object->setId($team["id"]);
            array_push($tabTeams, $object);
            
        }
        
        return $tabTeams;
    }
    
    public function getTeamById($id) : Team
    {
        $query=$this->db->prepare("SELECT * FROM team WHERE id= :id");
        $parameters= ['id' => $id];
        
        $query->execute($parameters);
        
        $getTeamById=$query->fetch(PDO::FETCH_ASSOC);
        
        $newTeam=new Team($getTeamById['name'], $getTeamById['picture'], $getTeamById['category_id']);
        
        $newTeam->setId($getTeamById["id"]);
        
        return $newTeam;
    }
    
    public function getTeamByName(string $name) : Team
    {
        $query=$this->db->prepare("SELECT * FROM team WHERE name= :name");
        
        $parameters= ['name' => $name];
        
        $query->execute($parameters);
        
        $getTeamByName=$query->fetch(PDO::FETCH_ASSOC);
        
        $newTeam=new Team($getTeamByName['name'], $getTeamByName['picture'], $getTeamByName['category_id']);
    
        return $newTeam;
    }
    
    public function getTeamsByCategory(): array
    {
        $query=$this->db->prepare("SELECT * FROM team WHERE category= :category_id");
        $parameters= ['category' => $category];
        $query->execute($parameters);
        $getTeamsByCategory=$query->fetchAll(PDO::FETCH_ASSOC);
        $newTeams=new Teams($getTeamsByCategory['name'], $getTeamsByCategory['picture'], $getTeamsByCategory['category_id']);
    
        return $newTeams;
    }
    
    public function insertTeam(Team $team) : Team
    {
        $query=$this->db->prepare("INSERT INTO team VALUES (null, :name, :picture, :category_id)");
        $parameters= [
            'name' => $team->getName(),
            'picture' => $team->getPicture(),
            'category_id' => $team->getCategoryId()
            ];
        $query->execute($parameters);
    
        $getTeam=$query->fetch(PDO::FETCH_ASSOC);
    
        return $team;
    }
    
    public function updateTeam(Team $team) : void
    {
        $query=$this->db->prepare("UPDATE team SET name = :name, picture = :picture WHERE team.id=:id");
        $parameters= [
            'id' => $team->getId(),
            'name' =>$team->getName(),
            'picture' => $team->getPicture()
            ];
        $query->execute($parameters);
    }
    
    public function deleteTeam(int $id) : void
    {
        $query=$this->db->prepare("DELETE FROM team WHERE id= :id");
        $parameters= [
            'id' => $id
            ];
        $query->execute($parameters);
    }
}


?>