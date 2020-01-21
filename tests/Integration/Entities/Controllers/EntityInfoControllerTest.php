<?php

namespace Tests\Integration\Entities\Controllers;

use Tests\TestCase;

class EntityInfoControllerTest extends TestCase
{
    private const URI = '/entity_info';

    /**
     * @throws \Exception
     */
    public function testZeroResults()
    {
        $response = $this->json('GET', self::URI, ['entity_name' => 'Non-Existent Company Limited']);
        $this->assertEmpty($response->decodeResponseJson());
    }

    /**
     * @throws \Exception
     */
    public function testResultsAreMatching()
    {
        $response = $this->json('GET', self::URI, ['entity_name' => 'Ambassador Packaging Ltd']);
        $entityInfo = $response->decodeResponseJson();

        $this->assertEquals('c5c6aced-4359-4a9e-a896-f971196002f6', $entityInfo['id']);
        $this->assertEquals('Company', $entityInfo['entity_type']);
        $this->assertEquals(95, $entityInfo['credit_score']);
        $this->assertEquals(0.1, $entityInfo['probability_default']);
        $this->assertEquals(0.9, $entityInfo['probability_loan']);
        $this->assertEquals('Tundry Way, Chainbridge Rd Industrial Estate, Blaydon-On-Tyne, NE21 5ST', $entityInfo['address']);
    }
}