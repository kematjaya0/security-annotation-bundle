<?php

namespace Kematjaya\SecurityAnnotationBundle\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
class SecurityAnnotationBundleTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    /**
     * @dataProvider access
     */
    public function testAccess(?string $user, string $path, int $status): void
    {
        $this->assertSame($status, $this->request($user, $path));
    }

    public static function access(): array
    {
        return [
            'tanpa attribute' => [null, '/post/open', 200],
            'anonim ditolak' => [null, '/post/staff/view', 401],
            'view: semua user' => ['staff', '/post/admin/view', 200],
            'edit: pemilik' => ['staff', '/post/staff/edit', 200],
            'edit: bukan pemilik' => ['staff', '/post/admin/edit', 403],
            'edit: admin' => ['admin', '/post/staff/edit', 200],
            'create: staff ditolak' => ['staff', '/post/create', 403],
            'create: admin' => ['admin', '/post/create', 200],
            'delete: status code kustom' => ['staff', '/post/staff/delete', 404],
            'delete: admin' => ['admin', '/post/staff/delete', 200],
            'attribute di class: staff ditolak' => ['staff', '/admin', 403],
            'attribute di class: admin' => ['admin', '/admin', 200],
        ];
    }

    public function testActionIsNotExecutedWhenDenied(): void
    {
        $this->request('staff', '/post/admin/edit');

        $this->assertSame(403, $this->client->getResponse()->getStatusCode());
        $this->assertNotSame('edit admin', $this->client->getResponse()->getContent());
    }

    public function testControllerTrait(): void
    {
        $this->assertSame(200, $this->request('staff', '/post/staff/trait'));
        $this->assertSame(
            ['create' => false, 'edit' => true, 'view' => true, 'delete' => false],
            json_decode($this->client->getResponse()->getContent(), true)
        );
    }

    public function testUnknownSubjectArgument(): void
    {
        $this->assertSame(500, $this->request('admin', '/post/wrong-subject'));
    }

    private function request(?string $user, string $path): int
    {
        $server = null === $user ? [] : ['PHP_AUTH_USER' => $user, 'PHP_AUTH_PW' => $user];
        $this->client->request('GET', $path, [], [], $server);

        return $this->client->getResponse()->getStatusCode();
    }
}
