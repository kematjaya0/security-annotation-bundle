<?php

namespace Kematjaya\SecurityAnnotationBundle\Configuration;

use Kematjaya\SecurityAnnotationBundle\Voter\BaseVoter;

#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_FUNCTION)]
final class IsGrantedEdit
{
    public function __construct(
        public string $attribute = BaseVoter::KMJ_ACCESS_UPDATE,
        public array|string|null $subject = null,
        public ?string $message = null,
        public ?int $statusCode = null,
        public ?int $exceptionCode = null,
    ) {
    }
}
