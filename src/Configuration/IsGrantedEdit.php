<?php

namespace Kematjaya\SecurityAnnotationBundle\Configuration;

use Kematjaya\SecurityAnnotationBundle\Voter\BaseVoter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 * @Annotation
 */
class IsGrantedEdit extends IsGranted 
{
    public function __construct(array $values)
    {
        $values['value'] = BaseVoter::KMJ_ACCESS_UPDATE;
        parent::__construct($values);
    }
}
