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
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class Handler {

    /**
     * EntityManager от Doctrine
     *
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function handle(Command $command): void {
        // Перевод email в нижний регистр
        $email = mb_strtolower($command->email);

        // Проверка существования пользователя по email;
        // если такой существует, выбрасывается исключение
        if ($this->em->getRepository(User::class)->findOneBy(['email' => $email])) {
            throw new \DomainException('User already exists!');
        }

        // Создание нового пользователя
        $user = new User(
            // Случайно сгенерированная строка
            $id = Uuid::uuid4()->toString(),
            $date = new \DateTimeImmutable(),
            $email,
            password_hash($command->password, PASSWORD_ARGON2I)
        );

        // Вставка созданного пользователя в EntityManager и затем коммит (сохранение)
        $this->em->persist($user);
        $this->em->flush();

    }
}