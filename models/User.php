<?php
class User {
    
    private ? int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $adress;
    private ?string $inscription_date;
    
     public function __construct(string $first_name, string $last_name, string $email, string $password, string $adress){
        $this->id = null;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->adress = $adress;
        $this->inscription_date = null;
    }
    
    public function getId() :? int
    {
        return $this->id;
    }
    public function setId(string $id) : void
    {
        $this->id = $id;
    }
    
    public function getFirst_name() : string
    {
        return $this->first_name;
    }
    public function setFirst_name(string $first_name) : void
    {
        $this->first_name = $first_name;
    }
    
    public function getLast_name() : string
    {
        return $this->last_name;
    }
    public function setLast_name(string $last_name) : void
    {
        $this->last_name = $last_name;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail($email) : void
    {
        $this->email = $email;
    }
    
    public function getPassword() : string
    {
        return $this->password;
    }
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
    
    public function getAdress() : string
    {
        return $this->adress;
    }
    public function setAdress(string $adress) : void
    {
        $this->adress = $adress;
    }
    
    public function getInscription_date() : string
    {
        return $this->inscription_date;
    }
    public function setInscription_date(string $inscription_date) : void
    {
        $this->inscription_date = $inscription_date;
    }
}
?>