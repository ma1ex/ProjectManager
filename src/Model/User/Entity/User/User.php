<?php

/**
 * Project: pm.local;
 * File: User.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 18.12.2019, 14:14
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;

class User {

    private const STATUS_WAIT = 'wait';
    private const STATUS_ACTIVE = 'active';

    /**
     * @var Id
     */
    private $id;

    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @var Email
     */
    private $email;

    /**
     * @var string
     */
    private $passwordHash;

    /**
     * @var string
     */
    private $confirmToken;

    /**
     * @var string
     */
    private $status;

    public function __construct(
        Id $id,
        \DateTimeImmutable $date,
        Email $email,
        string $hash,
        string $token
    ) {
        $this->id = $id;
        $this->date = $date;
        $this->email = $email;
        $this->passwordHash = $hash;
        $this->confirmToken = $token;
        $this->status = self::STATUS_WAIT;
    }

    /**
     * @return bool
     */
    public function isWait(): bool {
        return $this->status === self::STATUS_WAIT;
    }

    /**
     * @return bool
     */
    public function isActive(): bool {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * @return Id
     */
    public function getId(): Id {
        return $this->id;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate(): \DateTimeImmutable {
        return $this->date;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string {
        return $this->passwordHash;
    }

    /**
     * @return string
     */
    public function getConfirmToken(): string {
        return $this->confirmToken;
    }
}