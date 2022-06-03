<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();

    public function findById($id);

    public function findByName();

    public function update($id);

    public function delete($id);
}
