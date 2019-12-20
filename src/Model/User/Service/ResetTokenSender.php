<?php

/**
 * Project: pm.local;
 * File: ResetTokenSender.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 20.12.2019, 23:39
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Service;


use App\Model\User\Entity\User\Email;
use App\Model\User\Entity\User\ResetToken;

interface ResetTokenSender {

    public function send(Email $email, ResetToken $token): void;

}