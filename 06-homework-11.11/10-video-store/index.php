<?php

include 'VideoStore.php';
include 'Video.php';


class Application
{
    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    public function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();
            echo PHP_EOL;
            switch ($command) {
                case 0:
                    echo "Bye! \n";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
            echo PHP_EOL;
        }
    }

    private function add_movies()
    {
        $title = readline('Input video title: ');
        $this->videoStore->addVideo($title);
        echo 'Video successfully added';
    }

    private function rent_video()
    {
        $title = readline('Input title of the video, you wish to rent ');
        $found = -1;
        foreach ($this->videoStore->getVideos() as $key=>$video)
        {
            if($video->getTitle() === $title)
            {
                $found = $key;
                break;
            }
        }
        if($found !== -1){
            echo $this->videoStore->getVideos()[$found]->isCheckOut()? "$title is already taken" : "Your rented $title successfully";
            $this->videoStore->checkInVideo($title);
            echo PHP_EOL;
        } else {
            echo 'Video was not found' . PHP_EOL;
        }
    }

    private function return_video()
    {
        $title = readline('Input title of the video, you wish to return ');
        $found = -1;
        foreach ($this->videoStore->getVideos() as $key=>$video)
        {
            if($video->getTitle() === $title)
            {
                $found = $key;
                break;
            }
        }
        if($found !== -1){
            echo $this->videoStore->getVideos()[$found]->isCheckOut()? "$title returned successfully" : "$title is not rented";
            $this->videoStore->checkOutVideo($title);
            echo PHP_EOL;
        } else {
            echo 'Video was not found' . PHP_EOL;
        }
    }

    private function list_inventory()
    {

        foreach ($this->videoStore->getVideos() as $key=>$video){
            echo $key . "title: " . $video->getTitle() . ", rating: " . $video->getRating() . ", check out: " . ($video->isCheckOut()? 'true' : 'false') . PHP_EOL;
        }

    }
}
$app = new Application();
$app->run();
