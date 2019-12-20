<?php

/**
 * Project: pm.local;
 * File: Handler.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 20.12.2019, 14:28
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\UseCase\Network\Auth;


use App\Model\Flusher;
use App\Model\User\Entity\User\Id;
use App\Model\User\Entity\User\User;
use App\Model\User\Entity\User\UserRepository;

class Handler {

    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var Flusher
     */
    private $flusher;

    public function __construct(UserRepository $users, Flusher $flusher) {

        $this->users = $users;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void {
        if ($this->users->hasByNetworkIdentity($command->network, $command->identity)) {
            throw new \DomainException('User is already exists!');
        }

        $user = new User(
            Id::next(),
            new \DateTimeImmutable()
        );

        $user->signUpByNetwork(
            $command->network,
            $command->identity
        );

        $this->users->add($user);
        $this->flusher->flush();
    }
}