<?php

/**
 * Project: pm.local;
 * File: Command.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 18.12.2019, 14:05
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\UseCase\SignUp\Request;


class Command {

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;
}