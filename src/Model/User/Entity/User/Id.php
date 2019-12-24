<?php

/**
 * Project: pm.local;
 * File: Id.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 0:37
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;

use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

class Id {

    /**
     * @var string
     */
    private $value;

    public function __construct(string $value) {
        Assert::notEmpty($value);
        $this->value = $value;
    }

    /**
     * @return Id
     * @throws \Exception
     */
    public static function next(): self {
        return new self(Uuid::uuid4()->toString());
    }

    /**
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
    
    /**
     * Приведение данного объекта к строке для корректного сохранения в БД
     *
     * @return string
     */
    public function __toString(): string {
        return $this->getValue();
    }
}