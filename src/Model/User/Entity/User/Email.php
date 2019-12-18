<?php

/**
 * Project: pm.local;
 * File: Email.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 0:48
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;

use Webmozart\Assert\Assert;


class Email {

    /**
     * @var false|mixed|string|string[]|null
     */
    private $value;

    public function __construct(string $value) {

        Assert::notEmpty($value);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Incorrect email!');
        }

        $this->value = mb_strtolower($value);
    }

    /**
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }
}