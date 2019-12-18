<?php

/**
 * Project: pm.local;
 * File: PasswordHasher.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 1:05
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Service;


class PasswordHasher {

    /**
     * @param string $password
     * @return string
     */
    public function hash(string $password): string {
        $hash = password_hash($password, PASSWORD_ARGON2I);

        if (false === $hash) {
            throw new \RuntimeException('Unable to generate hash!');
        }

        return $hash;
    }
}