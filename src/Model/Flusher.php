<?php

/**
 * Project: pm.local;
 * File: Flusher.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 19.12.2019, 22:28
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model;


interface Flusher {

    public function flush(): void;

}