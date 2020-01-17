<?php

namespace App\Platform\Services;

use App\Platform\Repositories\RepositoryInterface;

interface ServiceInterface
{
    public function getRepository(): RepositoryInterface;
    public function setRepository(RepositoryInterface $repository): void;
}