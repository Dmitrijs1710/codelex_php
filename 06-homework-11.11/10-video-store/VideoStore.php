<?php

class VideoStore
{
    private array $videos;

    public function __construct(array $videos = [])
    {
        $this->videos = $videos;
    }


    public function getVideos(): array
    {
        return $this->videos;
    }


    public function addVideo(string $title): void
    {
        $check=true;
        foreach ($this->videos as $video){
            if ($video->getTitle() === $title){
                $check = false;
                break;
            }
        }
        if($check) $this->videos[]=new Video($title);
    }

    public function checkOutVideo(string $title): void
    {
        foreach ($this->videos as $video) {
            if ($video->getTitle() === $title && !$video->isCheckOut()) {
                $video->setCheckOut(true);
            }
        }
    }

    public function checkInVideo(string $title): void
    {
        foreach ($this->videos as $video) {
            if ($video->getTitle() === $title && $video->isCheckOut()) {
                $video->setCheckOut(false);
            }
        }
    }

    public function rate(string $title, int $rating): void
    {
        foreach ($this->videos as $video) {
            if ($video->getTitle() === $title) {
                $video->setRating($rating);
            }
        }
    }
}