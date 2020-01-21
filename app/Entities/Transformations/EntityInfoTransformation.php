<?php

namespace App\Entities\Transformations;

use App\Entities\Models\Entity;

class EntityInfoTransformation
{
    /**
     * @param Entity $entity
     * @return array
     */
    public static function handle(Entity $entity): array
    {
        $array = $entity->toArray();
        unset($array['entity_name']);

        return $array;
    }
}