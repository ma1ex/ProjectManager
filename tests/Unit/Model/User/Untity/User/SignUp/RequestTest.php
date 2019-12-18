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
use Ramsey\Uuid\Uuid;

class RequestTest extends TestCase {

    public function testSuccess(): void {
        $user = new User(
            $id = Uuid::uuid4()->toString(),
            $date = new \DateTimeImmutable(),
            $email = 'test@pm.local',
            $hash = 'hash'
        );

        self::assertEquals($id, $user->getId());
        self::assertEquals($date, $user->getDate());
        self::assertEquals($email, $user->getEmail());
        self::assertEquals($hash, $user->getPasswordHash());

    }
}