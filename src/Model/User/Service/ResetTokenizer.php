<?php

/**
 * Project: pm.local;
 * File: ResetTokenizer.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 20.12.2019, 23:55
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Service;

use App\Model\User\Entity\User\ResetToken;
use Ramsey\Uuid\Uuid;

class ResetTokenizer {

    /**
     * @var \DateInterval
     */
    private $interval;

    public function __construct(\DateInterval $interval) {
        $this->interval = $interval;
    }

    /**
     * @return ResetToken
     * @throws \Exception
     */
    public function generate(): ResetToken {
        return new ResetToken(
            Uuid::uuid4()->toString(),
            (new \DateTimeImmutable())->add($this->interval)
        );
    }
}