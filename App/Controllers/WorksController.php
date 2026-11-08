<?php

namespace App\Controllers;

use App\Controllers\Base\CatalogController;
use App\Models\Work;
use Framework\Core\Model;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class WorksController extends CatalogController
{
    protected function getModelClass(): string
    {
        return Work::class;
    }

    protected function getViewKey(): string
    {
        return 'work';
    }

    public function index(Request $request): Response
    {
        return $this->html(['works' => Work::getAll(orderBy: 'category, name')]);
    }

    protected function fillFromRequest(Model $work, Request $request): void
    {
        $work->setName($this->getPostString($request, 'name'));
        $work->setCategory($this->getPostString($request, 'category'));
        $work->setNormHours($this->toDecimal($this->getPostString($request, 'norm_hours')));
        $work->setPrice($this->toDecimal($this->getPostString($request, 'price')));
    }

    protected function validate(Model $work): array
    {
        $errors = [];

        if (!$this->isValidText($work->getName(), 120)) {
            $errors[] = 'Názov práce musí obsahovať 1 až 120 znakov.';
        }

        if (!$this->isValidText($work->getCategory(), 60)) {
            $errors[] = 'Kategória musí obsahovať 1 až 60 znakov.';
        }

        if (!$this->isValidDecimal($work->getNormHours(), 3) || (float)$work->getNormHours() <= 0) {
            $errors[] = 'Zadajte normohodiny ako číslo väčšie ako 0 a najviac 999,99.';
        }

        if (!$this->isValidDecimal($work->getPrice(), 8)) {
            $errors[] = 'Zadajte cenu od 0 do 99 999 999,99 € s najviac dvomi desatinnými miestami.';
        }

        return $errors;
    }
}
