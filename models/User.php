<?php

class User
{

    private $id;
    private $email;
    private $password;
    private $pseudo;
    private $profile_photo;
    private $created_at;

    //Getter 
    public function getId()
    {
        return $this->id;
    }

    //Setter 
    public function setId($id)
    {
        $this->id = $id;
    }

    //Getter 
    public function getEmail()
    {
        return $this->email;
    }

    //Setter 
    public function setEmail($email)
    {
        $this->email = $email;
    }

    //Getter 
    public function getPassword()
    {
        return $this->password;
    }

    //Setter 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    //Getter 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    //Setter 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    //Getter 
    public function getProfilePhoto()
    {
        return $this->profile_photo;
    }

    //Setter 
    public function setProfilePhoto($profile_photo)
    {
        $this->profile_photo = $profile_photo;
    }

    //Getter 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    //Setter 
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
