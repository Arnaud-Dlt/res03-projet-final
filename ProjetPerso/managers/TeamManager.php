<?php

class TeamManager extends AbstractManager{
    
    public function getAllTeams() : array
    {
        $query=$this->db->prepare("SELECT * FROM Teams");
        $query->execute();
        $getAllTeams=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabTeams=[];
        foreach($getAllTeams as $Team){
            $object=new Team($Team['id'], $Team['name'],$Team['championship']);
            array_push($tabTeams, $object);
        }
        return $tabTeams;
    }
    
    public function getTeamById(int $id) : Team
    {
        $query=$this->db->prepare("SELECT * FROM Teams WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getTeamById=$query->fetch(PDO::FETCH_ASSOC);
        $newTeam=new Team($getTeamById['id'], $getTeamById['name'],$getTeamById['championship']);
    
        return $newTeam;
    }
    
    public function getTeamByChampionship(string $championship) : Team
    {
        $query=$this->db->prepare("SELECT * FROM Teams WHERE championship= :championship");
        $parameters= ['championship' => $championship];
        $query->execute($parameters);
        $getTeamById=$query->fetch(PDO::FETCH_ASSOC);
        $newTeam=new Team($getTeamById['id'], $getTeamById['name'],$getTeamById['championship']);
    
        return $newTeam;
    }
    
    public function getTeamByName(string $name) : Team
    {
        $query=$this->db->prepare("SELECT * FROM Teams WHERE name= :name");
        $parameters= ['name' => $name];
        $query->execute($parameters);
        $getTeamById=$query->fetch(PDO::FETCH_ASSOC);
        $newTeam=new Team($getTeamById['id'], $getTeamById['name'],$getTeamById['championship']);
    
        return $newTeam;
    }
    
    public function insertTeam(Team $Team) : Team
    {
        $query=$this->db->prepare("INSERT INTO Teams VALUES (null, :name, :championship)");
        $parameters= [
            'name' =>$team->getName(),
            'championship' => $team->getChampionship()
            ];
        $query->execute($parameters);
    
        $getTeam=$query->fetch(PDO::FETCH_ASSOC);
    
        return $Team;
    }
    
    public function editTeam(Team $Team) : void
    {
        $query=$this->db->prepare("UPDATE Teams SET name = :name, championship=:championship WHERE Teams.id=:id");
        $parameters= [
            'id' => $Team->getId(),
            'name' =>$team->getName(),
            'championship' => $team->getChampionship()
            ];
        $query->execute($parameters);
        $allTeams=$query->fetch(PDO::FETCH_ASSOC);
    }
}


?>