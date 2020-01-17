<?php

namespace App\Entities\Repositories;

use App\Entities\Models\Entity;
use App\Platform\Repositories\AbstractRepository;

class GetEntitiesByNameRepository extends AbstractRepository
{
    /**
     * @var EntitiesRepository
     */
    private $entitiesRepository;

    public function __construct(EntitiesRepository $entitiesRepository)
    {
        $this->entitiesRepository = $entitiesRepository;
    }

    /**
     * @param string $entity_name
     * @return Entity|null
     */
    public function handle(string $entity_name): ?Entity
    {
        return $this->entitiesRepository->handle()->first(function(Entity $entity) use ($entity_name) {
            if ($entity->getEntityName() == $entity_name) {
                return true;
            }

            return false;
        });
    }
}