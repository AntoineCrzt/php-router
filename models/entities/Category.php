<?php

namespace Models\Entities;

class Category extends Entity
{
    protected string $name;
    protected string $description;

    public function name()
    {
        return $this->name;
    }

    public function description()
    {
        return $this->description;
    }
}
