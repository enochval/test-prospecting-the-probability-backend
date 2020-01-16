<?php

namespace App\Entities\Models;

use App\Entities\Exceptions\InvalidCreditScoreException;
use App\Entities\Exceptions\InvalidProbabilityDefaultException;
use App\Entities\Exceptions\InvalidProbabilityLoanException;
use App\Entities\Exceptions\UnknownEntityTypeException;
use App\Platform\Models\Model;

class Entity extends Model
{
    protected const ENTITY_TYPES = ['Company', 'Person'];

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $entity_type;

    /**
     * @var int
     */
    protected $credit_score;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var float
     */
    protected $probability_default;

    /**
     * @var float
     */
    protected $probability_loan;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Entity
     */
    public function setId(string $id): Entity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->entity_type;
    }

    /**
     * @param string $entity_type
     * @return Entity
     * @throws UnknownEntityTypeException
     */
    public function setEntityType(string $entity_type): Entity
    {
        if (!in_array($entity_type, self::ENTITY_TYPES)) {
            throw new UnknownEntityTypeException;
        }

        $this->entity_type = $entity_type;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditScore(): int
    {
        return $this->credit_score;
    }

    /**
     * @param int $credit_score
     * @return Entity
     * @throws InvalidCreditScoreException
     */
    public function setCreditScore(int $credit_score): Entity
    {
        if (
            $credit_score > 100 ||
            $credit_score < 0
        ) {
            throw new InvalidCreditScoreException;
        }

        $this->credit_score = $credit_score;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Entity
     */
    public function setAddress(string $address): Entity
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return float
     */
    public function getProbabilityDefault(): float
    {
        return $this->probability_default;
    }

    /**
     * @param float $probability_default
     * @return Entity
     * @throws InvalidProbabilityDefaultException
     */
    public function setProbabilityDefault(float $probability_default): Entity
    {
        if (
            $probability_default > 1 ||
            $probability_default < 0
        ) {
            throw new InvalidProbabilityDefaultException();
        }

        $this->probability_default = $probability_default;
        return $this;
    }

    /**
     * @return float
     */
    public function getProbabilityLoan(): float
    {
        return $this->probability_loan;
    }

    /**
     * @param float $probability_loan
     * @return Entity
     * @throws InvalidProbabilityLoanException
     */
    public function setProbabilityLoan(float $probability_loan): Entity
    {
        if (
            $probability_loan > 1 ||
            $probability_loan < 0
        ) {
            throw new InvalidProbabilityLoanException;
        }

        $this->probability_loan = $probability_loan;
        return $this;
    }

}