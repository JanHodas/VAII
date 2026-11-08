<?php

namespace App\Models;

use Framework\Core\Model;

class Part extends Model
{
    protected ?int $id = null;
    protected string $name = '';
    protected string $category = '';
    protected string $catalogue_number = '';
    protected string $manufacturer = '';
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

    public function getCatalogueNumber(): string
    {
        return $this->catalogue_number;
    }

    public function setCatalogueNumber(string $catalogueNumber): void
    {
        $this->catalogue_number = $catalogueNumber;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
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
