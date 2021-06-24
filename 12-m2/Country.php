<?php


class Country
{
    public string $name;
    public int $totalGoldMedals;

    public function __construct($name, $totalGoldMedals)
    {
        $this->name = $name;
        $this->totalGoldMedals = $totalGoldMedals;
    }
}

$player1 = new Country('Vietnam', 5);
$player2 = new Country('China', 6);
$player3 = new Country('Campuchia', 4);
$player4 = new Country('Thailand', 7);
$player5 = new Country('Philippines', 8);

$arr = [
        $player1->name => $player1->totalGoldMedals,
        $player2->name => $player2->totalGoldMedals,
        $player3->name => $player3->totalGoldMedals,
        $player4->name => $player4->totalGoldMedals,
        $player5->name => $player5->totalGoldMedals
        ];
echo '<pre>';
arsort($arr);
print_r($arr);
