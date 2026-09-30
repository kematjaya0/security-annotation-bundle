<?php

namespace Kematjaya\SecurityAnnotationBundle\EventListener;

use Kematjaya\SecurityAnnotationBundle\Configuration\AbstractIsGranted;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Memeriksa attribute IsGrantedCreate/Edit/View/Delete pada controller sebelum action dijalankan.
 */
class IsGrantedListener implements EventSubscriberInterface
{
    public function __construct(private readonly ?AuthorizationCheckerInterface $authorizationChecker = null)
    {
    }

    public static function getSubscribedEvents(): array
    {
        // prioritas sama dengan IsGrantedAttributeListener bawaan Symfony
        return [KernelEvents::CONTROLLER_ARGUMENTS => ['onKernelControllerArguments', 20]];
    }

    public function onKernelControllerArguments(ControllerArgumentsEvent $event): void
    {
        $attributes = [];
        foreach ($event->getAttributes() as $instances) {
            foreach ($instances as $instance) {
                if ($instance instanceof AbstractIsGranted) {
                    $attributes[] = $instance;
                }
            }
        }

        if ([] === $attributes) {
            return;
        }

        if (null === $this->authorizationChecker) {
            throw new \LogicException('Attribute IsGranted* membutuhkan SecurityBundle. Jalankan "composer require symfony/security-bundle".');
        }

        $arguments = $event->getNamedArguments();
        foreach ($attributes as $attribute) {
            $subject = $this->resolveSubject($attribute->subject, $arguments);
            if ($this->authorizationChecker->isGranted($attribute->attribute, $subject)) {
                continue;
            }

            $message = $attribute->message ?? sprintf('Access Denied by #[%s] on controller', (new \ReflectionClass($attribute))->getShortName());
            if (null !== $attribute->statusCode) {
                throw new HttpException($attribute->statusCode, $message, null, [], $attribute->exceptionCode ?? 0);
            }

            $exception = new AccessDeniedException($message, null, $attribute->exceptionCode ?? 403);
            $exception->setAttributes($attribute->attribute);
            $exception->setSubject($subject);

            throw $exception;
        }
    }

    private function resolveSubject(array|string|null $subjectRef, array $arguments): mixed
    {
        if (null === $subjectRef) {
            return null;
        }

        if (is_string($subjectRef)) {
            return $this->argument($subjectRef, $arguments);
        }

        $subject = [];
        foreach ($subjectRef as $key => $name) {
            $subject[is_string($key) ? $key : $name] = $this->argument($name, $arguments);
        }

        return $subject;
    }

    private function argument(string $name, array $arguments): mixed
    {
        if (!array_key_exists($name, $arguments)) {
            throw new \RuntimeException(sprintf('Could not find the subject "%s" for the IsGranted* attribute. Try adding a "$%s" argument to your controller method.', $name, $name));
        }

        return $arguments[$name];
    }
}
