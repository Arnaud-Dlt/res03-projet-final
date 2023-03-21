<?php

class TeamManager extends AbstractManager{
    
    public function getAllTeams() : array
    {
        $query=$this->db->prepare("SELECT * FROM team");
        $query->execute();
        $getAllTeams=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabTeams=[];
        foreach($getAllTeams as $team){
            $object=new Team($team['name'],$team['category_id']);
            $object->setId($team["id"]);
            array_push($tabTeams, $object);
            
        }
        
        return $tabTeams;
    }
    
    public function getTeamById(int $id) : Team
    {
        $query=$this->db->prepare("SELECT * FROM team WHERE id= :id");
        $parameters= ['id' => $id];
        
        $query->execute($parameters);
        
        $getTeamById=$query->fetch(PDO::FETCH_ASSOC);
        
        $newTeam=new Team($getTeamById['id'], $getTeamById['name'],$team['category_id']);
        
        $newTeam->setId($getTeamById["id"]);
        
        return $newTeam;
    }
    
    public function getTeamByName(string $name) : Team
    {
        $query=$this->db->prepare("SELECT * FROM team WHERE name= :name");
        
        $parameters= ['name' => $name];
        
        $query->execute($parameters);
        
        $getTeamByName=$query->fetch(PDO::FETCH_ASSOC);
        
        $newTeam=new Team($getTeamByName['id'], $getTeamByName['name'],$team['category_id']);
    
        return $newTeam;
    }
    
    public function getTeamsByCategory(): array
    {
        $query=$this->db->prepare("SELECT * FROM Teamss WHERE category= :category_id");
        $parameters= ['category' => $category];
        $query->execute($parameters);
        $getTeamsByCategory=$query->fetchAll(PDO::FETCH_ASSOC);
        $newTeams=new Teams($getTeamsByCategory['name'],$getTeamsByCategory['category_id']);
    
        return $newTeams;
    }
    
    public function insertTeam(Team $team) : Team
    {
        $query=$this->db->prepare("INSERT INTO team VALUES (null, :name, :category_id)");
        $parameters= [
            'name' => $team->getName(),
            'category_id' => $team->getCategoryId()
            ];
        $query->execute($parameters);
    
        $getTeam=$query->fetch(PDO::FETCH_ASSOC);
    
        return $team;
    }
    
    public function editTeam(Team $team) : void
    {
        $query=$this->db->prepare("UPDATE team SET name = :name WHERE Teams.id=:id");
        $parameters= [
            'id' => $team->getId(),
            'name' =>$team->getName(),
            'category_id' => $team->getCategoryId()
            ];
        $query->execute($parameters);
        $allTeams=$query->fetch(PDO::FETCH_ASSOC);
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