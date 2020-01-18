<?php

namespace App\Entities\Repositories;

use App\Entities\Models\Entity;
use App\Platform\Repositories\JsonRepository;
use Illuminate\Support\Collection;

class EntitiesRepository extends JsonRepository
{
    public function __construct()
    {
        $this->setJsonFile(base_path('entities.json'));
    }

    /**
     * @return Collection
     */
    public function handle(): Collection
    {
        $entities = parent::handle();

        $entities->transform(function ($entity) {
            return (new Entity())
                        ->setEntityName($entity->entity_name)
                        ->setId($entity->id)
                        ->setEntityType($entity->entity_type)
                        ->setAddress($entity->address)
                        ->setCreditScore($entity->credit_score)
                        ->setProbabilityDefault($entity->probability_default)
                        ->setProbabilityLoan($entity->probability_loan);
        });

        return $entities;
    }
}