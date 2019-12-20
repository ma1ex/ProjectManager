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

use Doctrine\Common\Collections\ArrayCollection;

class User {

    /**
     * User activation wait
     */
    private const STATUS_WAIT = 'wait';

    /**
     * User is activated
     */
    private const STATUS_ACTIVE = 'active';

    /**
     * Newly created User
     */
    private const STATUS_NEW = 'new';

    /**
     * @var Id
     */
    private $id;

    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @var Email|null
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
     * Wait or Active
     *
     * @var string
     */
    private $status;

    /**
     * @var Network[]|ArrayCollection
     */
    private $networks;

    public function __construct(Id $id, \DateTimeImmutable $date) {
        $this->id = $id;
        $this->date = $date;
        $this->email = $email;
        $this->status = self::STATUS_NEW;
        $this->networks = new ArrayCollection();
    }

    /**
     * @param Email $email
     * @param string $hash
     * @param string $token
     */
    public function signUpByEmail(Email $email, string $hash, string $token): void {
        if (!$this->isNew()) {
            throw new \DomainException('User is already signed up!');
        }

        $this->email = $email;
        $this->passwordHash = $hash;
        $this->confirmToken = $token;
        $this->status = self::STATUS_WAIT;
    }

    /**
     * If user was registered
     */
    public function confirmSignUp(): void {
        if (!$this->isWait()) {
            throw new \DomainException('User is already confirmed!');
        }

        $this->status = self::STATUS_ACTIVE;
        $this->confirmToken = null;
    }

    /**
     * @param string $network
     * @param string $identity
     */
    public function signUpByNetwork(string $network, string $identity): void {
        if (!$this->isNew()) {
            throw new \DomainException('User is already signed up!');
        }

        $this->attachNetwork($network, $identity);
        $this->status = self::STATUS_ACTIVE;
    }

    /**
     * @param string $network
     * @param string $identity
     */
    public function attachNetwork(string $network, string $identity): void {
        foreach($this->networks as $existing) {
            if ($existing->isForNetwork($network)) {
                throw new \DomainException('Network is already attached!');
            }
        }

        $this->networks->add(new Network($this, $network, $identity));
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
     * @return bool
     */
    public function isNew(): bool {
        return $this->status === self::STATUS_NEW;
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

    /**
     * @return Network[]
     */
    public function getNetworks(): array {
        return $this->networks->toArray();
    }
}