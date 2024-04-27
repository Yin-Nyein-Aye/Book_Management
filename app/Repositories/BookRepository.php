<?php

namespace App\Repositories;

use App\Contracts\BookInterface;
use App\Db\Core\Crud;
use App\Models\Book;

class BookRepository implements BookInterface
{
    public function all()
    {
        return Book::with("owner","publisher")->paginate(10);
    }

    public function findByID(string $modelName, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        return $model::find($id);
    }

    public function store(string $modelName, array $data)
    {
        return (new Crud(new Book(), $data, null, false, false))->execute();
    }

    public function update(string $modelName, array $data, int $id)
    {
        return (new Crud(new Book(), $data, $id, true, false))->execute();
    }

    public function delete(string $modelName, int $id)
    {
        return (new Crud(new Book(), null, $id, false, true))->execute();
    }
}
