<?php

namespace App\Platform\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

abstract class JsonRepository extends AbstractRepository
{
    /**
     * @var string
     */
    private $jsonFile;

    /**
     * @return string
     */
    public function getJsonFile(): string
    {
        return $this->jsonFile;
    }

    /**
     * @param string $jsonFile
     * @return JsonRepository
     */
    public function setJsonFile(string $jsonFile): JsonRepository
    {
        $this->jsonFile = $jsonFile;
        return $this;
    }

    /**
     * @return Collection
     */
    public function handle(): Collection
    {
        return collect(json_decode(File::get($this->jsonFile)));
    }
}