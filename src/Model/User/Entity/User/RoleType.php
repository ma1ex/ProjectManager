<?php

/**
 * Project: pm.local;
 * File: RoleType.php;
 * Developer: Matvienko Alexey (matvienko.alexey@gmail.com);
 * Date & Time: 24.12.2019, 15:00
 * Comment:
 */

declare(strict_types = 1);

namespace App\Model\User\Entity\User;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class RoleType extends StringType {
    
    public const NAME = 'user_user_role';
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform) {
        
        return $value instanceof Role ? $value->getName() : $value;
    }
    
    public function convertToPHPValue($value, AbstractPlatform $platform) {
        
        return !empty($value) ? new Role($value) : null;
    }
    
    /**
     * @return string
     */
    public function getName(): string {
        return self::NAME;
    }
    
}