<?php

class TeamManager extends AbstractManager{
    
    public function getAllTeams() : array
    {
        $query=$this->db->prepare("SELECT * FROM teams");
        $query->execute();
        $getAllTeams=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabTeams=[];
        foreach($getAllTeams as $team){
            $object=new Team($team['id'], $team['name']);
            array_push($tabTeams, $object);
        }
        return $tabTeams;
    }
    
    public function getTeamById(int $id) : Team
    {
        $query=$this->db->prepare("SELECT * FROM teams WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getTeamById=$query->fetch(PDO::FETCH_ASSOC);
        $newTeam=new Team($getTeamById['id'], $getTeamById['name']);
    
        return $newTeam;
    }
    
    public function getTeamByName(string $name) : Team
    {
        $query=$this->db->prepare("SELECT * FROM Teams WHERE name= :name");
        $parameters= ['name' => $name];
        $query->execute($parameters);
        $getTeamById=$query->fetch(PDO::FETCH_ASSOC);
        $newTeam=new Team($getTeamById['id'], $getTeamById['name']);
    
        return $newTeam;
    }
    
    public function insertTeam(Team $Team) : Team
    {
        $query=$this->db->prepare("INSERT INTO Teams VALUES (null, :name)");
        $parameters= [
            'name' =>$team->getName(),
            ];
        $query->execute($parameters);
    
        $getTeam=$query->fetch(PDO::FETCH_ASSOC);
    
        return $Team;
    }
    
    public function editTeam(Team $Team) : void
    {
        $query=$this->db->prepare("UPDATE Teams SET name = :name WHERE Teams.id=:id");
        $parameters= [
            'id' => $Team->getId(),
            'name' =>$team->getName(),
            ];
        $query->execute($parameters);
        $allTeams=$query->fetch(PDO::FETCH_ASSOC);
    }
}


?>