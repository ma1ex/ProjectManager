<?php

/**
 * Project: pm.local;
 * File: Command.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 21.12.2019, 0:13
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\UseCase\Reset\Reset;


class Command {

    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $password;

    public function __construct(string $token) {

        $this->token = $token;
    }
}