<?php
    class Movie{
        public string $title;
        public string $studio;
        public string $rating;
        public function __construct($title,$studio,$rating)
        {
            $this->rating=$rating;
            $this->studio=$studio;
            $this->title=$title;
        }
        /**
         * @param Movie[] $movies
         */
        public static function GetPG(array $movies) :array{
            $result=[];
            foreach($movies as $movie){
                if($movie->rating === 'PG'){
                    $result[]=$movie;
                }
            }
            return $result;
        }
    }

    $movies = [];
    $movies[]=new Movie("Casino Royale","Eon Productions", "PG13");
    $movies[]=new Movie("Glass","Buena Vista Internationa", "PG13");
    $movies[]=new Movie("Spider-Man: Into the Spider-Verse","Columbia Pictures", "PG");
    var_dump(Movie::GetPG($movies));