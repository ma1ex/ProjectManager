<?php

/**
 * Project: pm.local;
 * File: Handler.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 23.12.2019, 14:20
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\UseCase\Role;


use App\Model\Flusher;
use App\Model\User\Entity\User\Id;
use App\Model\User\Entity\User\Role;
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

    /**
     * @param Command $command
     */
    public function handle(Command $command): void {
        $user = $this->users->get(new Id($command->id));

        $user->changeRole(new Role($command->role));

        $this->flusher->flush();
    }
}