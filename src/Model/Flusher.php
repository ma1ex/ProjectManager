<?php

/**
 * Project: pm.local;
 * File: Flusher.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 1:33
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model;

use Doctrine\ORM\EntityManagerInterface;

class Flusher {

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Doctrine`s Entity container flush
     */
    public function flush(): void {
        $this->em->flush();
    }
}