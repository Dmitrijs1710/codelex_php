<?php
    class Geometry {
        public static function getCircleArea(float $radius = 0) :int
        {
             return (pi()*$radius*$radius);
        }
        public static function getRectangleArea(float $length = 0, float $width =0) :int
        {
            return ($length * $width);
        }
        public static function getTriangleArea(float $base = 0, float $height = 0) :int
        {
            return ($base*$height*0.5);
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
                        if ($radius < 0){
                           echo ('Radius is negative. Please change radius');
                        } else echo "Area of a Circle: " . $this::getCircleArea($radius) . "cm2".PHP_EOL;
                        break;
                    case 2:
                        $length = (float)readline('Enter a positive length in cm ');
                        $width = (float)readline('Enter a positive width in cm ');
                        if ($length <0){
                            return('length negative. Please change radius');
                        } if ($width <0) {
                            return('width is negative. Please change radius');
                        } else echo "Area of a Rectangle: " . $this::getRectangleArea($length,$width). "cm2".PHP_EOL;
                        break;
                    case 3:
                        $base = (float)readline('Enter a positive base in cm ');
                        $height = (float)readline('Enter a positive height in cm ');
                        if ($base <=0){
                            return('base is negative, blank or zero. Please change radius');
                        } if ($height<=0) {
                            return('width is negative, blank or zero.. Please change radius');
                        } else echo "Area of a Rectangle: " . $this::getTriangleArea($base,$height) . "cm2".PHP_EOL;
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

