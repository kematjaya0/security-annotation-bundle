<?php

namespace Kematjaya\SecurityAnnotationBundle\Tests\Fixtures;

use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedDelete;
use Symfony\Component\HttpFoundation\Response;

/**
 * Attribute di level class berlaku untuk semua action.
 */
#[IsGrantedDelete]
class AdminController
{
    public function index(): Response
    {
        return new Response('admin');
    }
}
