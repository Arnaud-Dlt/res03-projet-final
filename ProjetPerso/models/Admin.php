<?php 
class Admin {
    private ? int $id;
    private string $email;
    private string $password;
    
    public function __construct(string $email, string $password)
    {
        $this->id = null;
        $this->email = $email;
        $this->password = $password;
    }
    
    /// GETTER
    
    public function getId() : ? int
    {
        return $this->id;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
    
    /// SETTER
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
}

?>