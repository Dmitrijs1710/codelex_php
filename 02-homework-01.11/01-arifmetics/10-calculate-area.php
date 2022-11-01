<?php
    class Geometry {
        public static function getCircleArea(float $radius = 0) :string
        {
            if ($radius <= 0){
                return('Radius is negative, blank or zero. Please change radius');
            } return (pi()*$radius*$radius) . ' cm^2';
        }
        public static function getRectangleArea(float $length = 0, float $width =0) :string
        {
            if ($length <= 0){
                return('length negative, blank or zero. Please change radius');
            } if ($width <=0) {
                return('width is negative, blank or zero. Please change radius');
            } else return ($length * $width) . ' cm^2';
        }
        public static function getTriangleArea(float $base = 0, float $height = 0) :string
        {
            if ($base <=0){
                return('base is negative, blank or zero. Please change radius');
            } if ($height<=0) {
                return('width is negative, blank or zero.. Please change radius');
            } else return ($base*$height*0.5) . ' cm^2';
        }
        public function userGui(){
            $userChoice=0;
            while ($userChoice !== 4){
                echo "Geometry Calculator\n";
                echo "\n";
                echo "1. Calculate the Area of a Circle\n";
                echo "2. Calculate the Area of a Rectangle\n";
                echo "3. Calculate the Area of a Triangle\n";
                echo "4. Quit\n";
                $userChoice = (int)readline("Enter your choice (1-4) : ");
                switch($userChoice){
                    case 1:
                        $radius = (float)readline('Enter a positive radius in cm: ');
                        var_dump($radius);
                        echo "Area of a Circle: " . $this::getCircleArea($radius).PHP_EOL;
                        break;
                    case 2:
                        $length = (float)readline('Enter a positive length in cm ');
                        $width = (float)readline('Enter a positive width in cm ');
                        echo "Area of a Rectangle: " . $this::getRectangleArea($length,$width).PHP_EOL;
                        break;
                    case 3:
                        $base = (float)readline('Enter a positive base in cm ');
                        $height = (float)readline('Enter a positive height in cm ');
                        echo "Area of a Rectangle: " . $this::getTriangleArea($base,$height).PHP_EOL;
                        break;
                    case 4:
                        echo "Exiting... Bye".PHP_EOL;
                        break;
                    default: echo 'Incorrect choice. Try again'.PHP_EOL;
                }
            }
        }
    }
    $geometry = new Geometry();
    $geometry->userGui();

