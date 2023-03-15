<?php 
class Staff {
    private ? int $id;
    private string $firstname;
    private string $lastname;
    private string $phone;
    private string $role;
    private string $profilImg;
    
    public function __construct(string $firstname, string $lastname, string $phone,string $role, string $profilImg)
    {
        $this->id = null;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->role = $role;
        $this->profilImg = $profilImg;
    }
    
    /// GETTER
    
    public function getId() : ? int
    {
        return $this->id;
    }
    
    public function getFirstname() : string
    {
        return $this->firstname;
    }
    
    public function getLastname() : string
    {
        return $this->lastname;
    }
    
    public function getPhone() : string
    {
        return $this->phone;
    }
    public function getRole() : string
    {
        return $this->role;
    }
    
    public function getProfilImg() : string
    {
        return $this->profilImg;
    }
    
    /// SETTER
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setFirstname(string $firstname) : void
    {
        $this->firstname = $firstname;
    }
    
    public function setLastname(string $lastname) : void
    {
        $this->lastname = $lastname;
    }
    
    public function setPhone(string $phone) : void
    {
        $this->phone = $phone;
    }
    
    public function setRole(string $role) : void
    {
        $this->role = $role;
    }
    
    public function setProfilImg(string $profilImg) : void
    {
        $this->profilImg = $profilImg;
    }
}

?>