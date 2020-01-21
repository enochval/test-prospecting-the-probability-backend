<?php

namespace App\Entities\Controllers;

use App\Entities\Requests\EntityInfoRequest;
use App\Entities\Services\GetEntitiesByNameService;
use App\Entities\Transformations\EntityInfoTransformation;
use App\Platform\Http\Controllers\Controller;

class EntityInfoController extends Controller
{
    /**
     * @var GetEntitiesByNameService
     */
    private $getEntitiesByNameService;

    public function __construct(
        GetEntitiesByNameService $getEntitiesByNameService
    )
    {
        $this->getEntitiesByNameService = $getEntitiesByNameService;
    }

    /**
     * @param EntityInfoRequest $entityInfoRequest
     * @return mixed
     */
    public function __invoke(EntityInfoRequest $entityInfoRequest)
    {
        $entityInfo = $this->getEntitiesByNameService->handle($entityInfoRequest->get('entity_name'));

        return $entityInfo ? EntityInfoTransformation::handle($entityInfo) : [];
    }

}