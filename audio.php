<?php

class OST
{
    public function __construct(private int $ID, private string $name, private string $gamename, private int $releaseyear, private array $songs)
    {
    }

    public function __toString(): string {
        $output = "ID: {$this->ID} Name: {$this->name} - {$this->gamename} Release Year: ({$this->releaseyear}):\n";
        foreach ($this->songs as $song) {
            $output .= "  {$song}\n";
        }
        return $output;
    }
}

class song
{
    public function __construct(private int $ID, private string $name, private string $artist, private int $tracknumber, private int $duration)
    {
    }

    public function __toString(): string {
        return "ID: {$this->ID} Tracknumber: {$this->tracknumber} Song: {$this->name} by {$this->artist} Duration: ({$this->duration} seconds)";
    }
}

class seeder
{
    public static function create ():array {
        $OSTs = [];
        $songs = [];

        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $song = new Song($j, "Song " . $j, "Songartist " . $j, $j, $j + random_int(60, 180));
                array_push($songs, $song);
            }

            $OST = new OST($i, "OST" . $i, "Game " . $i, 2010 + $i, $songs);
            array_push($OSTs, $OST);
            $songs = [];
        }

        return $OSTs;
    }

    public static function demo(): void {
        $OSTs = self::create();
        foreach ($OSTs as $OST) {
            echo $OST;
            echo "\n";

        }

}
}
echo seeder::demo();