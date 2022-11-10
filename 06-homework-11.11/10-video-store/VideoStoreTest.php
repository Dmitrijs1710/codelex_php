<?php
include_once 'Video.php';
include_once 'VideoStore.php';

class VideoStoreTest
{
    private VideoStore $videoStore;
    public function __construct(array $videos = [])
    {
        $this->videoStore = new VideoStore($videos);
    }
    public function Test(){
        $this->videoStore->addVideo('The Matrix');
        foreach ($this->videoStore->getVideos() as $video){
            if($video->getTitle()==='The Matrix'){
                echo 'Test 1 passed' .PHP_EOL;
                break;
            }
        }
        $this->videoStore->addVideo('Godfather II');
        foreach ($this->videoStore->getVideos() as $video){
            if($video->getTitle()==='Godfather II'){
                echo 'Test 2 passed' .PHP_EOL;
                break;
            }
        }
        $this->videoStore->addVideo("Star Wars Episode IV: A New Hope");
        foreach ($this->videoStore->getVideos() as $video){
            if($video->getTitle()==='Star Wars Episode IV: A New Hope'){
                echo 'Test 3 passed!' .PHP_EOL;
                break;
            }
        }
        echo PHP_EOL;
        foreach($this->videoStore->getVideos() as $video){
            echo 'title: ' . $video->getTitle() . ', rating: ' . $video->getRating() . ', check out: ' . ($video->isCheckOut()? 'rented': 'not in rent'). PHP_EOL;
        }
        echo PHP_EOL;
        $this->videoStore->rate('The Matrix',9);
        $this->videoStore->checkOutVideo('The Matrix');
        $this->videoStore->checkInVideo('The Matrix');
        $this->videoStore->rate('Godfather II',6);
        $this->videoStore->rate('Star Wars Episode IV: A New Hope',5);

        $this->videoStore->checkOutVideo('Godfather II');

        foreach($this->videoStore->getVideos() as $video){
            echo 'title: ' . $video->getTitle() . ', rating: ' . $video->getRating() . ', check out: ' . ($video->isCheckOut()? 'rented': 'not in rent'). PHP_EOL;
        }
    }
}

$test = new VideoStoreTest();
$test->Test();