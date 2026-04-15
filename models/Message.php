<?php

class Message
{

    private $id;
    private $content;
    private $sender_id;
    private $receiver_id;
    private $created_at;
    private $is_read;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getSenderId(): ?int
    {
        return $this->sender_id;
    }

    public function setSenderId(?int $sender_id): self
    {
        $this->sender_id = $sender_id;

        return $this;
    }

    public function getReceiverId(): ?int
    {
        return $this->receiver_id;
    }

    public function setReceiverId(?int $receiver_id): self
    {
        $this->receiver_id = $receiver_id;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }


    public function getIsRead(): ?int
    {
        return $this->is_read;
    }

    public function setIsRead(?int $is_read): self
    {
        $this->is_read = $is_read;

        return $this;
    }
}
