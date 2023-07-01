<?php

class Contact
{
    private int $contactId;
    private DateTime $contactDate;
    private string $message;
    private string $status;
    private User $user;

    public function __construct(string $message, string $status, DateTime $contactDate, User $user)
    {
        $this->message = $message;
        $this->status = $status;
        $this->contactDate = $contactDate;
        $this->user = $user;
    }

    // Getters
    public function getContactId(): int
    {
        return $this->contactId;
    }

    public function getContactDate(): DateTime
    {
        return $this->contactDate;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUser(): User
    {
        return $this->user;
    }


    // Setters
    public function setContactId(int $contactId): void
    {
        $this->contactId = $contactId;
    }

    public function setContactDate(DateTime $contactDate): void
    {
        $this->contactDate = $contactDate;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

}
