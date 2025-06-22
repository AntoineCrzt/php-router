<?php

function getCategories(): array
{
    return [
        ['name' => 'Catégorie 1', 'description' => 'Description de la catégorie 1'],
        ['name' => 'Catégorie 2', 'description' => 'Description de la catégorie 2'],
        ['name' => 'Catégorie 3', 'description' => 'Description de la catégorie 3'],
    ];
}

function getTopicsByCategory(string $category_name): array
{
    // Simulation récupération de topics par catégorie
    return [
        ['id' => 1, 'name' => 'Sujet 1', 'last_post_content' => 'Contenu du dernier message...', 'last_update' => '12/04/2024'],
        ['id' => 2, 'name' => 'Sujet 2', 'last_post_content' => 'Contenu du dernier message...', 'last_update' => '12/04/2024'],
        ['id' => 3, 'name' => 'Sujet 3', 'last_post_content' => 'Contenu du dernier message...', 'last_update' => '12/04/2024'],
        ['id' => 4, 'name' => 'Sujet 4', 'last_post_content' => 'Contenu du dernier message...', 'last_update' => '12/04/2024'],
    ];
}
