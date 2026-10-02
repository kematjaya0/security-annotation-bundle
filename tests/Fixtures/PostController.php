<?php

namespace Kematjaya\SecurityAnnotationBundle\Tests\Fixtures;

use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedCreate;
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedDelete;
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedEdit;
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedView;
use Kematjaya\SecurityAnnotationBundle\SecurityControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PostController extends AbstractController
{
    use SecurityControllerTrait;

    #[IsGrantedView]
    public function view(string $owner): Response
    {
        return new Response('view ' . $owner);
    }

    #[IsGrantedEdit(subject: 'owner')]
    public function edit(string $owner): Response
    {
        return new Response('edit ' . $owner);
    }

    #[IsGrantedDelete('owner', message: 'tidak boleh menghapus', statusCode: 404)]
    public function delete(string $owner): Response
    {
        return new Response('delete ' . $owner);
    }

    #[IsGrantedCreate]
    public function create(): Response
    {
        return new Response('create');
    }

    public function open(): Response
    {
        return new Response('open');
    }

    public function viaTrait(string $owner): Response
    {
        return new Response(json_encode([
            'create' => $this->isGrantedCreate(),
            'edit' => $this->isGrantedEdit($owner),
            'view' => $this->isGrantedView($owner),
            'delete' => $this->isGrantedDelete($owner),
        ]));
    }

    #[IsGrantedEdit(subject: 'tidakAda')]
    public function wrongSubject(): Response
    {
        return new Response('wrong subject');
    }
}
