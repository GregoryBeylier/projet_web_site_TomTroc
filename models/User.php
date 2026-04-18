<?php

class User
{

    private $id;
    private $email;
    private $password;
    private $pseudo;
    private $profile_photo;
    private $created_at;
    private $last_message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getProfilePhoto(): ?string
    {
        return $this->profile_photo;
    }

    public function setProfilePhoto(?string $profile_photo): self
    {
        $this->profile_photo = $profile_photo;

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

    public function getLastMessage(): ?string
    {
        return $this->last_message;
    }

    public function setLastMessage(?string $last_message): self
    {
        $this->last_message = $last_message;
        return $this;
    }
}
