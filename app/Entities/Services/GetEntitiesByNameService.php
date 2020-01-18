<?php

namespace App\Entities\Services;

use App\Entities\Models\Entity;
use App\Entities\Repositories\GetEntitiesByNameRepository;
use App\Platform\Services\AbstractService;

class GetEntitiesByNameService extends AbstractService
{
    public function __construct(GetEntitiesByNameRepository $getEntitiesByNameRepository)
    {
        $this->setRepository($getEntitiesByNameRepository);
    }

    /**
     * @param string $entity_name
     * @return Entity|null
     */
    public function handle(string $entity_name): ?Entity
    {
        return $this->getRepository()->handle($entity_name);
    }
}