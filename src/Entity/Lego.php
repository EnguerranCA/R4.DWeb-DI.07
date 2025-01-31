<?php

namespace App\Entity;

class Lego
{
    private int $id;
    private string $name;
    private string $collection;
    private string $boxImage;
    private string $legoImage;
    private int $pieces;
    private string $description;
    private float $price;


    public function __construct(int $id, string $name, string $collection)
    {
        $this->id = $id;
        $this->name = $name;
        $this->collection = $collection;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCollection(): string
    {
        return $this->collection;
    }

    public function setCollection(string $collection): void
    {
        $this->collection = $collection;
    }


    public function getboxImage(): string
    {
        return $this->boxImage;
    }

    public function setboxImage(string $boxImage): void
    {
        $this->boxImage = $boxImage;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getLegoImage(): string
    {
        return $this->legoImage;
    }

    public function setLegoImage(string $legoImage): void
    {
        $this->legoImage = $legoImage;
    }

    public function getPieces(): int
    {
        return $this->pieces;
    }

    public function setPieces(int $pieces): void
    {
        $this->pieces = $pieces;
    }
    
}