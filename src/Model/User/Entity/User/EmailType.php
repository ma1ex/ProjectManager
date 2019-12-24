<?php

/**
 * Project: pm.local;
 * File: EmailType.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 24.12.2019, 14:34
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

/**
 * Кастомная карта преобразования объекта Email в объект БД
 *
 * Class EmailType
 * @package App\Model\User\Entity\User
 */
class EmailType extends StringType {
    
    public const NAME = 'user_user_email';
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform) {
        /* Проверка на принадлежность объекта Email и если это так,
           то получаем из него $value вызвав метод getValue() */
        return $value instanceof Email ? $value->getValue() : $value;
    }
    
    public function convertToPHPValue($value, AbstractPlatform $platform) {
        /* И обратный порядок: из БД в объект;
           если полученный из БД $value не пустой, оборачиваем в объект Email,
           или присваиваем null, если пустой */
        return !empty($value) ? new Email($value) : null;
    }
    
    /**
     * @return string
     */
    public function getName(): string {
        return self::NAME;
    }
    
}