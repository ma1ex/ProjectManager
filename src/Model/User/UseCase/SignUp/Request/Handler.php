<?php

/**
 * Project: pm.local;
 * File: Handler.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 18.12.2019, 14:07
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\UseCase\SignUp\Request;

use App\Model\User\Entity\User\User;
use App\Model\User\Entity\User\Id;
use App\Model\User\Entity\User\Email;
use App\Model\User\Entity\User\UserRepository;
use App\Model\User\Service\ConfirmTokenizer;
use App\Model\User\Service\ConfirmTokenSender;
use App\Model\User\Service\PasswordHasher;
use App\Model\Flusher;

class Handler {

    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var PasswordHasher
     */
    private $hasher;

    /**
     * @var Flusher
     */
    private $flusher;

    /**
     * @var ConfirmTokenizer
     */
    private $tokenizer;

    /**
     * @var ConfirmTokenSender
     */
    private $sender;

    public function __construct(
        UserRepository $users,
        PasswordHasher $hasher,
        ConfirmTokenizer $tokenizer,
        ConfirmTokenSender $sender,
        Flusher $flusher
    ) {
        $this->users = $users;
        $this->hasher = $hasher;
        $this->flusher = $flusher;
        $this->tokenizer = $tokenizer;
        $this->sender = $sender;
    }

    /**
     * @param Command $command
     * @throws \Exception
     */
    public function handle(Command $command): void {
        //
        $email = new Email($command->email);

        //
        if ($this->users->hasByEmail($email)) {
            throw new \DomainException('User already exists!');
        }

        // Создание нового пользователя
        $user = User::signUpByEmail(
            Id::next(),
            new \DateTimeImmutable(),
            $email,
            $this->hasher->hash($command->password),
            $token = $this->tokenizer->generate()
        );

        // Set creatred User in container (repository)
        $this->users->add($user);
        // Send email with activation token
        $this->sender->send($email, $token);
        // Save in DB
        $this->flusher->flush();
    }
}