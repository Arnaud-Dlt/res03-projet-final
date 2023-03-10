<?php 
class Category {
    private ? int $id;
    private string $name;
    
    public function __construct(string $name)
    {
        $this->id = null;
        $this->name = $name;
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
    
    /// SETTER
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    
}

?>