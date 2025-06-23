<?php

namespace Models;

class Topic
{
    public function getTopic(int $id): array
    {
        // Simulation récupération d'un topic par id
        return [
            'id' => $id,
            'name' => 'Sujet ' . $id,
            'author' => 'John Nhoj',
            'last_update' => '12/04/2024',
            'messages' => [
                [
                    'author' => 'Auteur1',
                    'content' => 'Contenu du message 1',
                    'last_update' => '20/05/2024 à 14:30',
                ],
                [
                    'author' => 'Auteur2',
                    'content' => 'Contenu du message 2',
                    'last_update' => '20/05/2024 à 15:30',
                ]
            ]
        ];
    }


    public function addNewMessage(int $topic_id, string $message)
    {
        // Simulation ajout en base de données

    }
}
