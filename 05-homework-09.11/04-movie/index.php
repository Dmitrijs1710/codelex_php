<?php
include_once 'Movie.php';
include_once 'MovieCollection.php';
$movies = new MovieCollection();
$movies->add(new Movie("Casino Royale","Eon Productions", "PG13"));
$movies->add(new Movie("Glass","Buena Vista International", "PG13"));
$movies->add(new Movie("Spider-Man: Into the Spider-Verse","Columbia Pictures", "PG"));

foreach (Movie::getPG($movies)->getAll() as $movie){
    echo "title: ".$movie->getTitle().", studio: ".$movie->getStudio().", rating: ". $movie->getRating()."\n";
}