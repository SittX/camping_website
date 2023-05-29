<?php
class CampSiteImage
{
    private int $image_id;
    private string $url;
    public function __construct($image_id, $url)
    {
        $this->$image_id = $image_id;
        $this->$url = $url;
    }

    public function getImageId(): int
    {
        return $this->image_id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setImageId(int $image_id): void
    {
        $this->image_id = $image_id;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
