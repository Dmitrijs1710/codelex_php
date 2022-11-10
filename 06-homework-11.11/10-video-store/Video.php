<?php

class Video
{
    private string $title;
    private bool $checkOut;
    private int $rating;

    public function __construct(string $title, int $rating = 0, bool $checkOut = false)
    {
        $this->rating = $rating;
        $this->title = $title;
        $this->checkOut = $checkOut;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @param bool $checkOut
     */
    public function setCheckOut(bool $checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @return bool
     */
    public function isCheckOut(): bool
    {
        return $this->checkOut;
    }
}