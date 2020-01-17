<?php

namespace App\Entities\Repositories;

use App\Entities\Models\Entity;
use App\Platform\Repositories\JsonRepository;
use Illuminate\Support\Collection;

class EntitiesRepository extends JsonRepository
{
    public function __construct()
    {
        $this->setJsonFile(base_path('composer.json'));
    }

    /**
     * @return Collection
     */
    public function handle(): Collection
    {
        $entities = parent::handle();

        $entities->each(function (&$entity) {
            $entity = (new Entity())
                        ->setEntityName($entity->name)
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