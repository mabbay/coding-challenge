<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Service
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getMany(array $conditions = [], array $sortOptions = []): LengthAwarePaginator
    {
        return $this->repository->getMany($conditions, $sortOptions);
    }

    public function delete($id): int
    {
        if (!is_int($id)) {
            return 0;
        }

        return $this->repository->delete($id);
    }
}