<?php

/**
 * Project: pm.local;
 * File: UserRepository.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 0:59
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;


interface UserRepository {

    public function findByConfirmToken(string $token): ?User;

    public function findByResetToken(string $token): ?User;

    public function get(Id $id): User;

    public function getByEmail(Email $email): User;

    public function hasByEmail(Email $email): bool;

    public function hasByNetworkIdentity(string $network, string $identity): bool;

    public function add(User $user): void;

}