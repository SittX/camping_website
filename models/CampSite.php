<?php


class CampSite
{
    private $siteId;
    private $location;
    private $cost;
    private $description;

    public function __construct($location, $cost, $description)
    {
        $this->location = $location;
        $this->cost = $cost;
        $this->description = $description;
    }

    public function getSiteId()
    {
        return $this->siteId;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setSiteId($siteId): void
    {
        $this->siteId = $siteId;
    }

    public function setLocation($location): void
    {
        $this->location = $location;
    }

    public function setCost($cost): void
    {
        $this->cost = $cost;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }
}
