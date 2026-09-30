<?php

namespace Kematjaya\SecurityAnnotationBundle\Configuration;

use Kematjaya\SecurityAnnotationBundle\Voter\BaseVoter;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_FUNCTION)]
final class IsGrantedEdit extends AbstractIsGranted
{
    public function __construct(
        array|string|null $subject = null,
        ?string $message = null,
        ?int $statusCode = null,
        ?int $exceptionCode = null,
    ) {
        parent::__construct(BaseVoter::KMJ_ACCESS_UPDATE, $subject, $message, $statusCode, $exceptionCode);
    }
}
