<?php

namespace Models\Managers;

use DateTime;
use Models\Entities\Post;
use Models\Entities\Topic;

class TopicsManager
{
    public function getTopic(int $id): Topic
    {
        // Simulation récupération d'un topic par id
        return new Topic([
            'id' => $id,
            'name' => 'Sujet ' . $id,
            'author' => 'John Nhoj',
            'last_update' => DateTime::createFromFormat('d/m/Y', '12/04/2024'),
            'posts' => [
                new Post([
                    'author' => 'Auteur1',
                    'content' => 'Contenu du message 1',
                    'last_update' =>  DateTime::createFromFormat('d/m/Y H:i', '20/05/2024 14:30'),
                ]),
                new Post([
                    'author' => 'Auteur2',
                    'content' => 'Contenu du message 2',
                    'last_update' => DateTime::createFromFormat('d/m/Y H:i', '20/05/2024 15:30'),
                ])
            ]
        ]);
    }


    public function addNewMessage(int $topic_id, string $message)
    {
        // Simulation ajout en base de données

    }
}
