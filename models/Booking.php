<?php
class Booking{
    private int $bookingId;
    private $checkIn;
    private $checkOut;
    private User $user;
    private CampSite $site;

    public function __construct($checkIn, $checkOut, User $user,CampSite $site)
    {
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->user = $user;
        $this->site = $site;
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

    public function getUser():User
    {
        return $this->user;
    }

    public function getSite():CampSite
    {
        return $this->site;
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

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function setSite(CampSite $site):void
    {
        $this->site = $site;
    }
}