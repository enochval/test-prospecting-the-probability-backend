<?php

namespace Tests\Unit\Entities\Transformations;

use App\Entities\Models\Entity;
use Tests\TestCase;
use EnricoStahn\JsonAssert\Assert as JsonAssert;

class EntityInfoTransformationTest extends TestCase
{
    use JsonAssert;

    /**
     * @var array
     */
    private $exampleEntity = [
        'id' => 'bef4a34c-7bf1-4e9b-8ff1-55b67e25b2e1',
        'entity_type' => 'Company',
        'address' => '74 Springfield Road ROMFORD RM87 2XO',
        'entity_name' => 'Wilkinson-Schinner Ltd',
        'credit_score' => 99,
        'probability_default' => 0.15,
        'probability_loan' => 0.85
    ];

    /**
     * @var string
     */
    private $jsonSchema = '
    {
        "type" : "object",
        "properties" : {
            "id" : {
                "type" : "string"
            },
            "entity_type" : {
                "type": "string"
            },
            "entity_name" : {
                "type": "string"
            },
            "credit_score" : {
                "type": "integer"
            },
            "probability_loan" : {
                "type": "number"
            },
            "probability_default" : {
                "type": "number"
            },
            "address" : {
                "type": "string"
            }
        },
        "required" : [ "id", "entity_type",  "entity_name", "credit_score", "probability_loan", "probability_default", "address"]
    }
    ';

    /**
     * @throws \App\Entities\Exceptions\InvalidCreditScoreException
     * @throws \App\Entities\Exceptions\InvalidProbabilityDefaultException
     * @throws \App\Entities\Exceptions\InvalidProbabilityLoanException
     * @throws \App\Entities\Exceptions\UnknownEntityTypeException
     */
    public function testValidateEntityInfoSchema()
    {
        // We create a new entity
        $entity = (new Entity)
                    ->setId($this->exampleEntity['id'])
                    ->setProbabilityLoan($this->exampleEntity['probability_loan'])
                    ->setProbabilityDefault($this->exampleEntity['probability_default'])
                    ->setEntityName($this->exampleEntity['entity_name'])
                    ->setEntityType($this->exampleEntity['entity_type'])
                    ->setCreditScore($this->exampleEntity['credit_score'])
                    ->setAddress($this->exampleEntity['address']);

        // I am sure there is a better way to do this, but it seemed buggy and didn't find other ways
        $array = json_decode(json_encode($entity->toArray()));

        // We test against the json schema
        $this->assertJsonMatchesSchemaString($this->jsonSchema, $array);
    }
}