<?php

/**
 * Project: pm.local;
 * File: RequestTest.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 18.12.2019, 15:07
 * Comment:
 */

declare(strict_types = 1);

namespace App\Tests\Unit\Model\User\Untity\User\SignUp;

use App\Model\User\Entity\User\User;
use PHPUnit\Framework\TestCase;
use App\Model\User\Entity\User\Id;
use App\Model\User\Entity\User\Email;

class RequestTest extends TestCase {

    public function testSuccess(): void {
        $user = new User(
            $id = Id::next(),
            $date = new \DateTimeImmutable(),
            $email = new Email('test@pm.local'),
            $hash = 'hash',
            $token = 'token'
        );

        self::assertTrue($user->isWait());
        self::assertFalse($user->isActive());

        self::assertEquals($id, $user->getId());
        self::assertEquals($date, $user->getDate());
        self::assertEquals($email, $user->getEmail());
        self::assertEquals($hash, $user->getPasswordHash());
        self::assertEquals($token, $user->getConfirmToken());

    }
}