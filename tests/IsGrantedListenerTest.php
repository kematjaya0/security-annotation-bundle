<?php

namespace Kematjaya\SecurityAnnotationBundle\Tests;

use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedCreate;
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedDelete;
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedEdit;
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedView;
use Kematjaya\SecurityAnnotationBundle\EventListener\IsGrantedListener;
use Kematjaya\SecurityAnnotationBundle\Tests\Fixtures\PostController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class IsGrantedListenerTest extends TestCase
{
    public function testAttributes(): void
    {
        $this->assertSame('create', (new IsGrantedCreate())->attribute);
        $this->assertSame('update', (new IsGrantedEdit())->attribute);
        $this->assertSame('view', (new IsGrantedView())->attribute);
        $this->assertSame('delete', (new IsGrantedDelete())->attribute);

        $attribute = new IsGrantedEdit(['post', 'user'], 'pesan', 404, 12);
        $this->assertSame(['post', 'user'], $attribute->subject);
        $this->assertSame('pesan', $attribute->message);
        $this->assertSame(404, $attribute->statusCode);
        $this->assertSame(12, $attribute->exceptionCode);
    }

    public function testSubjectIsPassedToAuthorizationChecker(): void
    {
        $checker = $this->createMock(AuthorizationCheckerInterface::class);
        $checker->expects($this->once())->method('isGranted')->with('update', 'staff')->willReturn(true);

        (new IsGrantedListener($checker))->onKernelControllerArguments($this->event('edit', ['staff']));
    }

    public function testAccessDeniedExceptionCarriesAttributeAndSubject(): void
    {
        $checker = $this->createMock(AuthorizationCheckerInterface::class);
        $checker->method('isGranted')->willReturn(false);

        try {
            (new IsGrantedListener($checker))->onKernelControllerArguments($this->event('edit', ['staff']));
            $this->fail('AccessDeniedException diharapkan');
        } catch (AccessDeniedException $exception) {
            $this->assertSame(['update'], $exception->getAttributes());
            $this->assertSame('staff', $exception->getSubject());
            $this->assertSame('Access Denied by #[IsGrantedEdit] on controller', $exception->getMessage());
        }
    }

    public function testNothingIsCheckedWithoutAttribute(): void
    {
        $checker = $this->createMock(AuthorizationCheckerInterface::class);
        $checker->expects($this->never())->method('isGranted');

        (new IsGrantedListener($checker))->onKernelControllerArguments($this->event('open', []));
        (new IsGrantedListener())->onKernelControllerArguments($this->event('open', []));
    }

    public function testSecurityBundleIsRequiredOnlyWhenAttributeIsUsed(): void
    {
        $this->expectException(\LogicException::class);

        (new IsGrantedListener())->onKernelControllerArguments($this->event('create', []));
    }

    private function event(string $action, array $arguments): ControllerArgumentsEvent
    {
        return new ControllerArgumentsEvent(
            $this->createMock(HttpKernelInterface::class),
            [new PostController(), $action],
            $arguments,
            new Request(),
            HttpKernelInterface::MAIN_REQUEST
        );
    }
}
