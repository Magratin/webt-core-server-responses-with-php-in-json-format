<?php

class OST
{
    public function __construct(private int $ID, private string $name, private string $gamename, private int $releaseyear, private array $songs)
    {
    }
}

class song
{
    public function __construct(private int $ID, private string $name, private string $artist, private int $tracknumber, private int $duration)
    {
    }
}
