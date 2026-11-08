<?php

namespace App\Controllers;

use App\Controllers\Base\CatalogController;
use App\Models\Part;
use Framework\Core\Model;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class PartsController extends CatalogController
{
    protected function getModelClass(): string
    {
        return Part::class;
    }

    protected function getViewKey(): string
    {
        return 'part';
    }

    public function index(Request $request): Response
    {
        return $this->html(['parts' => Part::getAll(orderBy: 'category, name')]);
    }

    protected function fillFromRequest(Model $part, Request $request): void
    {
        $part->setName($this->getPostString($request, 'name'));
        $part->setCategory($this->getPostString($request, 'category'));
        $part->setCatalogueNumber($this->getPostString($request, 'catalogue_number'));
        $part->setManufacturer($this->getPostString($request, 'manufacturer'));
        $part->setPrice($this->toDecimal($this->getPostString($request, 'price')));
    }

    protected function validate(Model $part): array
    {
        $errors = [];

        if (!$this->isValidText($part->getName(), 120)) {
            $errors[] = 'Názov dielu musí obsahovať 1 až 120 znakov.';
        }

        if (!$this->isValidText($part->getCategory(), 60)) {
            $errors[] = 'Kategória musí obsahovať 1 až 60 znakov.';
        }

        if (!$this->isValidText($part->getCatalogueNumber(), 40)) {
            $errors[] = 'Katalógové číslo musí obsahovať 1 až 40 znakov.';
        }

        if (!$this->isValidText($part->getManufacturer(), 60)) {
            $errors[] = 'Výrobca musí obsahovať 1 až 60 znakov.';
        }

        if (!$this->isValidDecimal($part->getPrice(), 8)) {
            $errors[] = 'Zadajte cenu od 0 do 99 999 999,99 € s najviac dvomi desatinnými miestami.';
        }

        return $errors;
    }
}
