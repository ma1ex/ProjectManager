<?php

/**
 * Project: pm.local;
 * File: ConfirmTokenizer.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 1:11
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Service;

use Ramsey\Uuid\Uuid;

class ConfirmTokenizer {

    /**
     * @return string
     * @throws \Exception
     */
    public function generate(): string {
        return Uuid::uuid4()->toString();
    }
}