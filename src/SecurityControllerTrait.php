<?php

namespace Kematjaya\SecurityAnnotationBundle;

use Kematjaya\SecurityAnnotationBundle\Voter\BaseVoter;

/**
 * Untuk controller turunan AbstractController (memakai isGranted()).
 *
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
trait SecurityControllerTrait
{
    protected function isGrantedCreate(mixed $context = null): bool
    {
        return $this->isGranted(BaseVoter::KMJ_ACCESS_CREATE, $context);
    }

    protected function isGrantedEdit(mixed $context): bool
    {
        return $this->isGranted(BaseVoter::KMJ_ACCESS_UPDATE, $context);
    }

    protected function isGrantedView(mixed $context): bool
    {
        return $this->isGranted(BaseVoter::KMJ_ACCESS_VIEW, $context);
    }

    protected function isGrantedDelete(mixed $context): bool
    {
        return $this->isGranted(BaseVoter::KMJ_ACCESS_DELETE, $context);
    }
}
