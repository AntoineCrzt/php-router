<?php

namespace Models\Managers;

use DateTime;

use Models\Entities\Category;
use Models\Entities\Post;
use Models\Entities\Topic;

class CategoriesManager
{
    public function getCategories(): array
    {
        return [
            new Category(['name' => 'Catégorie 1', 'description' => 'Description de la catégorie 1']),
            new Category(['name' => 'Catégorie 2', 'description' => 'Description de la catégorie 2']),
            new Category(['name' => 'Catégorie 3', 'description' => 'Description de la catégorie 3']),
        ];
    }

    public function getTopicsByCategory(string $category_name): array
    {
        // Simulation récupération de topics par catégorie
        return [
            new Topic(['id' => 1, 'name' => 'Sujet 1', 'posts' => [new Post([
                'author' => 'Auteur1',
                'content' => 'Contenu du message 1',
                'last_update' => DateTime::createFromFormat('d/m/Y H:i', '20/05/2024 15:30'),
            ])], 'last_update' =>  DateTime::createFromFormat('d/m/Y', '12/04/2024')]),
            new Topic(['id' => 2, 'name' => 'Sujet 2', 'posts' => [new Post([
                'author' => 'Auteur2',
                'content' => 'Contenu du message 2',
                'last_update' => DateTime::createFromFormat('d/m/Y H:i', '20/05/2024 15:30'),
            ])], 'last_update' => DateTime::createFromFormat('d/m/Y', '12/04/2024')]),
            new Topic(['id' => 3, 'name' => 'Sujet 3', 'posts' => [new Post([
                'author' => 'Auteur3',
                'content' => 'Contenu du message 3',
                'last_update' => DateTime::createFromFormat('d/m/Y H:i', '20/05/2024 15:30'),
            ])], 'last_update' => DateTime::createFromFormat('d/m/Y', '12/04/2024')]),
            new Topic(['id' => 4, 'name' => 'Sujet 4', 'posts' => [new Post([
                'author' => 'Auteur4',
                'content' => 'Contenu du message 4',
                'last_update' => DateTime::createFromFormat('d/m/Y H:i', '20/05/2024 15:30'),
            ])], 'last_update' => DateTime::createFromFormat('d/m/Y', '12/04/2024')]),
        ];
    }
}
