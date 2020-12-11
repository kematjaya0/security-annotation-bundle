<?php

namespace Kematjaya\SecurityAnnotationBundle\Voter;

use Symfony\Component\Security\Core\Authorization\Voter\Voter;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
abstract class BaseVoter extends Voter 
{
    const KMJ_ACCESS_CREATE = 'create';
    const KMJ_ACCESS_UPDATE = 'update';
    const KMJ_ACCESS_VIEW = 'view';
    const KMJ_ACCESS_DELETE = 'delete';
    
    protected function arrayAccess():array
    {
        return [
            self::KMJ_ACCESS_CREATE, self::KMJ_ACCESS_UPDATE,
            self::KMJ_ACCESS_VIEW, self::KMJ_ACCESS_DELETE
        ];
    }
    
    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, $this->arrayAccess());
    }
}
