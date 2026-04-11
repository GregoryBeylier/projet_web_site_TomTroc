<?php

class Message
{

    private $id;
    private $content;
    private $sender_id;
    private $receiver_id;
    private $created_at;
    private $is_read;

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
    public function getContent()
    {
        return $this->content;
    }

    //Setter 
    public function setContent($content)
    {
        $this->content = $content;
    }

    //Getter 
    public function getSenderId()
    {
        return $this->sender_id;
    }

    //Setter 
    public function setSenderId($sender_id)
    {
        $this->sender_id = $sender_id;
    }

    //Getter 
    public function getReceiverId()
    {
        return $this->receiver_id;
    }

    //Setter 
    public function setReceiverId($receiver_id)
    {
        $this->receiver_id = $receiver_id;
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

    //Getter 
    public function getIsRead()
    {
        return $this->is_read;
    }

    //Setter 
    public function setIsRead($is_read)
    {
        $this->is_read = $is_read;
    }
}
