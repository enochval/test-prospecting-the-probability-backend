<?php

namespace App\Platform\Services;

use App\Platform\Repositories\RepositoryInterface;

abstract class AbstractService implements ServiceInterface
{
    /** @var  RepositoryInterface */
    protected $repository;

    /**
     * @return RepositoryInterface
     */
    public function getRepository(): RepositoryInterface
    {
        return $this->repository;
    }

    /**
     * @param RepositoryInterface $repository
     */
    public function setRepository(RepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }
}