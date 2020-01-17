<?php

namespace App\Entities\Controllers;

use App\Entities\Requests\EntityInfoRequest;
use App\Entities\Services\GetEntitiesByNameService;
use App\Entities\Transformations\EntityInfoTransformation;
use App\Http\Controllers\Controller;

class EntityInfoController extends Controller
{
    /**
     * @var GetEntitiesByNameService
     */
    private $getEntitiesByNameService;

    /**
     * @var EntityInfoTransformation
     */
    private $entityInfoTransformation;

    public function __construct(
        GetEntitiesByNameService $getEntitiesByNameService,
        EntityInfoTransformation $entityInfoTransformation
    )
    {
        $this->getEntitiesByNameService = $getEntitiesByNameService;
        $this->entityInfoTransformation = $entityInfoTransformation;
    }

    /**
     * @param EntityInfoRequest $entityInfoRequest
     * @return mixed
     */
    public function __invoke(EntityInfoRequest $entityInfoRequest)
    {
        $entityInfo = $this->getEntitiesByNameService->handle($entityInfoRequest->get('entity_name'));

        return $this->entityInfoTransformation->handle($entityInfo);
    }

}