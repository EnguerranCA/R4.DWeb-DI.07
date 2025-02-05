<?php

// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;

use App\Entity\Lego;
use \PDO;

class LegoService
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=tp-symfony-mysql;dbname=lego_store;charset=utf8';
        $username = 'root';
        $password = 'root';
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getLegos(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM lego");
        $legos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lego = new Lego($row['id'], $row['name'], $row['collection']);
            $lego->setboxImage($row['imagebox']);
            $lego->setPrice($row['price']);
            $lego->setDescription($row['description']);
            $lego->setPieces($row['pieces']);
            $lego->setLegoImage($row['imagebg']);
            $legos[] = $lego;
        }

        return $legos;
    }

    public function getLegosByCollection($collection): array
    {
        $stmt = $this->pdo->query("SELECT * FROM lego WHERE collection = '$collection'");
        $legos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lego = new Lego($row['id'], $row['name'], $row['collection']);
            $lego->setboxImage($row['imagebox']);
            $lego->setPrice($row['price']);
            $lego->setDescription($row['description']);
            $lego->setPieces($row['pieces']);
            $lego->setLegoImage($row['imagebg']);
            $legos[] = $lego;
        }

        return $legos;
    }
}