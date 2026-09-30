<?php

namespace Kematjaya\SecurityAnnotationBundle\Tests\Fixtures;

use Kematjaya\SecurityAnnotationBundle\Voter\BaseVoter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * Admin boleh semuanya; user lain hanya boleh melihat, dan mengubah post miliknya sendiri.
 */
class PostVoter extends BaseVoter
{
    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        if (null === $token->getUser()) {
            return false;
        }

        if (in_array('ROLE_ADMIN', $token->getRoleNames(), true)) {
            return true;
        }

        return match ($attribute) {
            self::KMJ_ACCESS_VIEW => true,
            self::KMJ_ACCESS_UPDATE => $subject === $token->getUserIdentifier(),
            default => false,
        };
    }
}
