<?php

namespace Kematjaya\SecurityAnnotationBundle;

use Kematjaya\SecurityAnnotationBundle\Voter\BaseVoter;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
trait SecurityControllerTrait 
{
    protected function isGrantedEdit($context): bool 
    {
        return $this->isGranted(BaseVoter::KMJ_ACCESS_UPDATE, $context);
    }
    
    protected function isGrantedView($context): bool 
    {
        return $this->isGranted(BaseVoter::KMJ_ACCESS_VIEW, $context);
    }
    
    protected function isGrantedDelete($context): bool 
    {
        return $this->isGranted(BaseVoter::KMJ_ACCESS_DELETE, $context);
    }
}
