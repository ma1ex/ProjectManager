<?php

/**
 * Project: pm.local;
 * File: Network.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 20.12.2019, 13:43
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;

use Ramsey\Uuid\Uuid;

class Network {

    /**
     * @var string
     */
    private $id;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $network;

    /**
     * @var string
     */
    private $identity;

    public function __construct(User $user, string $network, string $identity) {
        $this->id = Uuid::uuid4()->toString();
        $this->user = $user;
        $this->network = $network;
        $this->identity = $identity;
    }

    /**
     * @param string $network
     * @return bool
     */
    public function isForNetwork(string $network): bool {
        return $this->network === $network;
    }

    /**
     * @return string
     */
    public function getNetwork(): string {
        return $this->network;
    }

    /**
     * @return string
     */
    public function getIdentity(): string {
        return $this->identity;
    }

}