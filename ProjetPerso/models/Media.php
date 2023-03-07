<?php 
class Media {
    private ? int $id;
    private string $url;
    private string $description;
    private string $format;
    private string $type;
    
    public function __construct(string $url, string $description, string $format,string $type)
    {
        $this->id = null;
        $this->url = $url;
        $this->description = $description;
        $this->format = $format;
        $this->type = $type;
    }
    
    /// GETTER
    
    public function getId() : ? int
    {
        return $this->id;
    }
    
    public function getUrl() : string
    {
        return $this->url;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }
    
    public function getFormat() : string
    {
        return $this->format;
    }
    
    public function getType() : string
    {
        return $this->type;
    }
    
    
    /// SETTER
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }
    
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
    public function setFormat(string $format) : void
    {
        $this->format = $format;
    }
    
    public function setType(string $type) : void
    {
        $this->type = $type;
    }
    
}

?>