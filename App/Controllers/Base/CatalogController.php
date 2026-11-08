<?php

namespace App\Controllers\Base;

use Framework\Core\BaseController;
use Framework\Core\Model;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

abstract class CatalogController extends BaseController
{
    abstract protected function getModelClass(): string;

    abstract protected function getViewKey(): string;

    abstract protected function fillFromRequest(Model $item, Request $request): void;

    abstract protected function validate(Model $item): array;

    public function add(Request $request): Response
    {
        $modelClass = $this->getModelClass();

        return $this->html([
            $this->getViewKey() => new $modelClass(),
            'errors' => [],
            'token' => $this->getToken(),
        ], 'form');
    }

    public function edit(Request $request): Response
    {
        return $this->html([
            $this->getViewKey() => $this->getItem($request->get('id')),
            'errors' => [],
            'token' => $this->getToken(),
        ], 'form');
    }

    public function save(Request $request): Response
    {
        $this->checkPost($request);

        $id = filter_var($request->post('id'), FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 0],
        ]);
        if ($id === false) {
            throw new HttpException(400);
        }

        $modelClass = $this->getModelClass();
        $item = $id === 0 ? new $modelClass() : $this->getItem($id);
        $this->fillFromRequest($item, $request);

        $errors = $this->validate($item);
        if (count($errors) > 0) {
            return $this->html([
                $this->getViewKey() => $item,
                'errors' => $errors,
                'token' => $this->getToken(),
            ], 'form')->setStatusCode(422);
        }

        $item->save();

        return $this->redirect($this->url('index'))->setStatusCode(303);
    }

    public function delete(Request $request): Response
    {
        if ($request->isPost()) {
            $this->checkPost($request);
            $this->getItem($request->post('id'))->delete();

            return $this->redirect($this->url('index'))->setStatusCode(303);
        }

        if (!$request->isGet()) {
            throw new HttpException(405);
        }

        return $this->html([
            $this->getViewKey() => $this->getItem($request->get('id')),
            'token' => $this->getToken(),
        ]);
    }

    protected function getItem(mixed $id): Model
    {
        $id = filter_var($id, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        if ($id === false) {
            throw new HttpException(404);
        }

        $item = ($this->getModelClass())::getOne($id);
        if ($item === null) {
            throw new HttpException(404);
        }

        return $item;
    }

    protected function getPostString(Request $request, string $field): string
    {
        $value = $request->post($field);
        if (!is_string($value)) {
            throw new HttpException(400);
        }

        return trim($value);
    }

    protected function toDecimal(string $value): string
    {
        return str_replace(',', '.', $value);
    }

    protected function isValidText(string $value, int $maxLength): bool
    {
        return $value !== '' && mb_strlen($value) <= $maxLength;
    }

    protected function isValidDecimal(string $value, int $digits): bool
    {
        return preg_match('/^[0-9]{1,' . $digits . '}(\.[0-9]{1,2})?$/D', $value) === 1;
    }

    protected function getToken(): string
    {
        $session = $this->app->getSession();
        if (!$session->hasKey('catalog_token')) {
            $session->set('catalog_token', bin2hex(random_bytes(32)));
        }

        return $session->get('catalog_token');
    }

    protected function checkPost(Request $request): void
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $token = $request->post('token');
        if (!is_string($token) || !hash_equals($this->getToken(), $token)) {
            throw new HttpException(403);
        }
    }
}
