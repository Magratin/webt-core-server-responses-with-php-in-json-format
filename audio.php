<?php

class OST implements JsonSerializable
{
    public function __construct(private int $ID, private string $name, private string $gamename, private int $releaseyear, private array $songs)
    {
    }

    public function __toString(): string
    {
        $output = "ID: {$this->ID} Name: {$this->name} - {$this->gamename} Release Year: ({$this->releaseyear}):\n";
        foreach ($this->songs as $song) {
            $output .= "  {$song}\n";
        }
        return $output;
    }

    public function getID(): int
    {
        return $this->ID;
    }

    public function jsonSerialize(): array
    {
        return [
            'ID' => $this->ID,
            'Name' => $this->name,
            'videoGameName' => $this->gamename,
            'releaseYear' => $this->releaseyear,
            'Songs' => $this->songs
        ];
    }
}

class song implements JsonSerializable
{
    public function __construct(private int $ID, private string $name, private string $artist, private int $tracknumber, private int $duration)
    {
    }

    public function __toString(): string
    {
        return "ID: {$this->ID} Tracknumber: {$this->tracknumber} Song: {$this->name} by {$this->artist} Duration: ({$this->duration} seconds)";
    }

    public function jsonSerialize(): array
    {
        return [
            'ID' => $this->ID,
            'name' => $this->name,
            'artist' => $this->artist,
            'trackNumber' => $this->tracknumber,
            'duration' => $this->duration
        ];
    }

}

class seeder
{
    public static function create(): array
    {
        $OSTs = [];

        for ($i = 1; $i <= 3; $i++) {
            $songs = [];
            for ($j = 1; $j <= 4; $j++) {
                $song = new Song($j, "Song " . $j, "Songartist " . $j, $j, $j + random_int(60, 180));
                array_push($songs, $song);
            }

            $OST = new OST($i, "OST" . $i, "Game " . $i, 2010 + $i, $songs);
            array_push($OSTs, $OST);

        }

        return $OSTs;
    }

    public static function demo(): void
    {
        $OSTs = self::create();
        foreach ($OSTs as $OST) {
            echo $OST;
            echo "\n";
        }
    }
}


