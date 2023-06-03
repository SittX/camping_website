<?php
class Booking{
    private int $bookingId;
    private $checkIn;
    private $checkOut;
    private int $userId;
    private int $siteId;

    public function __construct($checkIn, $checkOut, int $userId, int $siteId)
    {
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->userId = $userId;
        $this->siteId = $siteId;
    }

    // Getter
    public function getBookingId(): int
    {
        return $this->bookingId;
    }

    public function getCheckIn()
    {
        return $this->checkIn;
    }

    public function getCheckOut()
    {
        return $this->checkOut;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    // Setters
    public function setBookingId(int $bookingId): void
    {
        $this->bookingId = $bookingId;
    }

    public function setCheckIn($checkIn): void
    {
        $this->checkIn = $checkIn;
    }

    public function setCheckOut($checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function setSiteId(int $siteId): void
    {
        $this->siteId = $siteId;
    }
}