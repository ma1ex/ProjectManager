<?php

/**
 * Project: pm.local;
 * File: IdType.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 24.12.2019, 14:54
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class IdType extends GuidType {
    
    public const NAME = 'user_user_id';
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform) {
        /* Проверка на принадлежность объекта Id и если это так,
           то получаем из него $value вызвав метод getValue() */
        return $value instanceof Id ? $value->getValue() : $value;
    }
    
    public function convertToPHPValue($value, AbstractPlatform $platform) {
        /* И обратный порядок: из БД в объект;
           если полученный из БД $value не пустой, оборачиваем в объект Id,
           или присваиваем null, если пустой */
        return !empty($value) ? new Id($value) : null;
    }
    
    /**
     * @return string
     */
    public function getName(): string {
        return self::NAME;
    }
    
}