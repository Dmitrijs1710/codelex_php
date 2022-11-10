<?php

class Movie{
    private string $title;
    private string $studio;
    private string $rating;
    public function __construct($title,$studio,$rating)
    {
        $this->rating = $rating;
        $this->studio = $studio;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getStudio(): string
    {
        return $this->studio;
    }

    public static function getPG(MovieCollection $movies) :MovieCollection
    {
        $result=new MovieCollection();
        foreach($movies->getAll() as $movie){
            if($movie->getRating()=== 'PG'){
                $result->add($movie);
            }
        }
        return $result;
    }
}

