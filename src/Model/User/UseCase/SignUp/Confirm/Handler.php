<?php

/**
 * Project: pm.local;
 * File: Handler.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 19:56
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\UseCase\SignUp\Confirm;

use App\Model\User\Entity\User\UserRepository;
use App\Model\Flusher;

class Handler {

    private $users;
    private $flusher;

    public function __construct(UserRepository $users, Flusher $flusher) {
        $this->users = $users;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void {
        if (!$user = $this->users->findByConfirmToken($command->token)) {
            throw new \DomainException('Incorrect or confirmed token!');
        }

        $user->confirmSignUp();

        $this->flusher->flush();
    }
}