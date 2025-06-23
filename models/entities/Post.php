<?php

namespace Models\Entities;

use DateTime;

class Post extends Entity
{
    protected string $author;
    protected string $content;
    protected DateTime $last_update;

    public function author(): string
    {
        return $this->author;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function last_update(): string
    {
        return $this->last_update->format('d/m/Y à H:i');
    }
}
