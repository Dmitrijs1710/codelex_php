<?php
    class MovieCollection{
        private array $movies;
        public function __construct(array $movies=[])
        {
            foreach ($movies as $movie){
                $this->add($movie);
            }
        }
        public function add(Movie $movie) :void{
            $this->movies[]=$movie;
        }
        public function getAll() :array{
            return $this->movies;
        }
    }