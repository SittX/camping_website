<?php

class Contact
{
    private int $contactId;
    private $contactDate;
    private string $message;
    private int $userId;

    public function __construct(string $message, int $userId)
    {
        $this->message = $message;
        $this->userId = $userId;
    }

    public function getContactId(): int
    {
        return $this->contactId;
    }

    public function getContactDate()
    {
        return $this->contactDate;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    // Setters
    public function setContactId(int $contactId): void
    {
        $this->contactId = $contactId;
    }

    public function setContactDate($contactDate): void
    {
        $this->contactDate = $contactDate;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
