<?php

namespace App\Models;

use Framework\Core\Model;

class Work extends Model
{
    protected ?int $id = null;
    protected string $name = '';
    protected string $category = '';
    protected string $norm_hours = '1.00';
    protected string $price = '0.00';

    public function getId(): ?int
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

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getNormHours(): string
    {
        return $this->norm_hours;
    }

    public function setNormHours(string $normHours): void
    {
        $this->norm_hours = $normHours;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }
}
