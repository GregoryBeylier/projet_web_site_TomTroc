<?php

class Book
{

    private $id;
    private $title;
    private $picture;
    private $author;
    private $description;
    private $status;
    private $user_id;
    private $created_at;
    private $pseudo; 

  

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
    public function getTitle()
    {
        return $this->title;
    }

    //Setter
    public function setTitle($title)
    {
        $this->title = $title;
    }

    //Getter 
    public function getPicture()
    {
        return $this->picture;
    }

    //Setter
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    //Getter 
    public function getAuthor()
    {
        return $this->author;
    }

    //Setter
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    //Getter 
    public function getDescription()
    {
        return $this->description;
    }

    //Setter 
    public function setDescription($description)
    {
        $this->description = $description;
    }

    //Getter 
    public function getStatus()
    {
        return $this->status;
    }

    //Setter 
    public function setStatus($status)
    {
        $this->status = $status;
    }

    //Getter 
    public function getUserId()
    {
        return $this->user_id;
    }

    //Setter 
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    //Getter 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    //Setter 
    public function setCreatedAt($created_at)
    {
        $this->$created_at = $created_at;
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
}
