<?php

class UserManager extends AbstractManager
{
    //Get user by Id
    public function getUserById(int $id) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE users.id = ?");
        $query->execute([$id]);
        $fetch = $query->fetch(PDO::FETCH_ASSOC);
        $user = new User($fetch['first_name'], $fetch['last_name'], $fetch['email'], $fetch['password'], $fetch['adress']);
        $user->setId($fetch['id']);
        $user->setInscription_date($fetch['inscription_date']);
        return $user;
    }
    
    //Get user by email
    public function getUserByEmail(string $email) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE users.email = ?");
        $query->execute([$email]);
        $fetch = $query->fetch(PDO::FETCH_ASSOC);
        $user = new User($fetch['first_name'], $fetch['last_name'], $fetch['email'], $fetch['password'], $fetch['adress']);
        $user->setId($fetch['id']);
        $user->setInscription_date($fetch['inscription_date']);
        return $user;
    }
    
    //Add user
    public function addUser(User $user) : void
    {
        $query = $this->db->prepare("INSERT INTO users (first_name, last_name, email, password, adress, inscription_date) VALUES (:first_name, :last_name, :email, :password, :adress, :inscription_date)");
        $parameters =
        [
            'first_name' => $user->getFirst_name(),
            'last_name' => $user->getLast_Name(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'adress' => $user->getAdress(),
            'inscription_date' => $user->getInscription_date()
        ];
        $query->execute($parameters);
    }
    
    //Edit user
    public function editUser(User $user) : void
    {
        $query = $this->db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, password = :password, adress = :adress, inscription_date = :inscription_date WHERE users.id = :id");
        $parameters =
        [
            'first_name' => $user->getFirst_name,
            'last_name' => $user->getLast_Name(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'adress' => $user->getAdress(),
            'inscription_date' => $user->getInscription_date(),
            'id' => $user->getId()
        ];
        $query->execute($parameters);
    }
}

?>