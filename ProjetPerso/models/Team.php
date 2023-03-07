<?php 
class Team {
    private ? int $id;
    private string $name;
    private string $championship;
    
    public function __construct(string $name, string $championship)
    {
        $this->id = null;
        $this->name = $name;
        $this->championship = $championship;
    }
    
    /// GETTER
    
    public function getId() : ? int
    {
        return $this->id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function getChampionship() : string
    {
        return $this->championship;
    }
    
    
    /// SETTER
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    public function setChampionship(string $championship) : void
    {
        $this->championship = $championship;
    }
}

?>