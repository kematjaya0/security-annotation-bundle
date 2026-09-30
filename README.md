# security-annotation-bundle

PHP >= 8.1, Symfony 6.4 dan 7.

Attribute `IsGrantedCreate`, `IsGrantedEdit`, `IsGrantedView`, dan `IsGrantedDelete` untuk controller.
Masing-masing memeriksa hak akses `create`, `update`, `view`, `delete` lewat voter aplikasi
(turunan `Kematjaya\SecurityAnnotationBundle\Voter\BaseVoter`).

## Pemakaian

```php
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedEdit;
use Kematjaya\SecurityAnnotationBundle\Configuration\IsGrantedDelete;

class PostController extends AbstractController
{
    // subject = nama argumen controller yang dikirim ke voter
    #[IsGrantedEdit(subject: 'post')]
    public function edit(Post $post): Response
    {
    }

    #[IsGrantedDelete(subject: 'post', message: 'tidak boleh menghapus', statusCode: 404)]
    public function delete(Post $post): Response
    {
    }
}
```

Attribute juga boleh dipasang di class (berlaku untuk semua action). Tanpa `statusCode`, akses yang
ditolak melempar `AccessDeniedException` (403, atau diarahkan ke login bila belum login).

Pengecekan dijalankan oleh `IsGrantedListener` milik bundle ini dan membutuhkan `symfony/security-bundle`.

### Pindah dari versi 1.x

Annotation docblock `@IsGrantedEdit(subject="post")` (lewat `sensio/framework-extra-bundle`) tidak lagi
dibaca. Ganti dengan attribute `#[IsGrantedEdit(subject: 'post')]`.

## Test
```
sh ../test.sh security-annotation-bundle all        # PHP 8.1 & 8.3 + Symfony 6.4
sh ../test.sh security-annotation-bundle 8.3 7.4    # PHP 8.3 + Symfony 7.4
```
