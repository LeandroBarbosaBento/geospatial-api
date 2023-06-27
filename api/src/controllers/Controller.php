<?php

namespace API\controllers;

use API\database\Connection;

class Controller
{
    public function handle($lat, $long)
    {
        $connection = new Connection();
        $pdo = $connection->connect();

        $query = 'SELECT 
            tipo as tipo,
            nm_distrit as distrito,
            nm_municip as municipio,
            nm_uf as UF,
            nm_meso as mesoregiao,
            nm_micro as microrregiao,
            nm_categor as categoria,
            alt as altitude
        FROM ibge.br_localidades 
        WHERE lat=:lat
        AND long=:long';

        $stmt = $pdo->prepare($query);
        
        $latitude = htmlspecialchars(strip_tags($lat));
        $longitude = htmlspecialchars(strip_tags($long));

        $stmt->bindValue(":lat",  $latitude);
        $stmt->bindValue(":long",  $longitude);

        $stmt->execute();

        $data = [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'data' => [],
        ];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($data['data'], $row);
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
   