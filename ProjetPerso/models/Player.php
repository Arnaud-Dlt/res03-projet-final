<?php 
class Player {
    private ? int $id;
    private string $firstname;
    private string $lastname;
    private string $phone;
    private string $birthdate;
    private string $position;
    private string $foot;
    private string $bio;
    private string $profilImg;
    
    public function __construct(string $firstname, string $lastname, string $phone,string $birthdate,string $position,string $foot,string $bio,string $profilImg)
    {
        $this->id = null;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->birthdate = $birthdate;
        $this->position = $position;
        $this->foot = $foot;
        $this->bio = $bio;
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
    public function getBirthdate() : string
    {
        return $this->birthdate;
    }
    public function getPosition() : string
    {
        return $this->position;
    }
    public function getFoot() : string
    {
        return $this->foot;
    }
    public function getBio() : string
    {
        return $this->bio;
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
    
    public function setBirthdate(string $birthdate) : void
    {
        $this->birthdate = $birthdate;
    }
    public function setPosition(string $position) : void
    {
        $this->position = $position;
    }
    public function setFoot(string $foot) : void
    {
        $this->foot = $foot;
    }
    public function setBio(string $bio) : void
    {
        $this->bio = $bio;
    }
    public function setProfilImg(string $profilImg) : void
    {
        $this->profilImg = $profilImg;
    }
}

?>