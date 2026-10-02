<?php

namespace Kematjaya\SecurityAnnotationBundle\Configuration;

/**
 * Dasar attribute IsGranted* milik bundle ini.
 *
 * Symfony\Component\Security\Http\Attribute\IsGranted bersifat final dan listener bawaan Symfony
 * hanya membaca class itu persis, jadi attribute di sini diperiksa oleh IsGrantedListener bundle ini.
 */
abstract class AbstractIsGranted
{
    /**
     * @param string               $attribute     hak akses yang diperiksa voter
     * @param array|string|null    $subject       nama argumen controller (atau daftar nama) yang dijadikan subject
     * @param string|null          $message       pesan saat akses ditolak
     * @param int|null             $statusCode    bila diisi, HttpException dengan status ini dilempar (default: 403 lewat AccessDeniedException)
     * @param int|null             $exceptionCode kode exception saat akses ditolak
     */
    public function __construct(
        public readonly string $attribute,
        public readonly array|string|null $subject = null,
        public readonly ?string $message = null,
        public readonly ?int $statusCode = null,
        public readonly ?int $exceptionCode = null,
    ) {}
}
