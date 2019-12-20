<?php

/**
 * Project: pm.local;
 * File: Command.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 20.12.2019, 14:25
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\UseCase\Network\Auth;


class Command {

    /**
     * @var string
     */
    public $network;

    /**
     * @var string
     */
    public $identity;
}