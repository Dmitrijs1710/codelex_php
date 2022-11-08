<?php

class Point {
    public int $x;
    public int $y;
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public static function swapPoints(Point $p1, Point $p2) :void
    {
        $x = $p1->x;
        $y = $p1->y;
        $p1->x = $p2->x;
        $p1->y = $p2->y;
        $p2->x = $x;
        $p2->y = $y;
    }
}


$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")\n";
echo "(" . $p2->x . ", " . $p2->y . ")\n";