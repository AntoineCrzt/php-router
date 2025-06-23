<?php

namespace Models\Entities;

use DateTime;

class Topic extends Entity
{
    protected int $id;
    protected string $name;
    protected DateTime $last_update;
    protected array $posts;

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function last_update(): string
    {
        return $this->last_update->format('d/m/Y');
    }

    public function last_post(): Post
    {
        return $this->posts[array_key_last($this->posts)];
    }

    public function posts(): array
    {
        return $this->posts;
    }
}
