<?php

/**
 * Project: pm.local;
 * File: ConfirmTokenSender.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 1:13
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Service;

use App\Model\User\Entity\User\Email;

interface ConfirmTokenSender {

    /**
     * @param Email $email
     * @param string $token
     */
    public function send(Email $email, string $token): void;
}