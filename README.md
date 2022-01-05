# INSTALASI PROJEK

1. Clone project ke dalam folder
2. Masuk ke dalam folder, kemudian jalankan `composer install`
3. Jalankan `cp .env.example .env` kemudian setting database yang akan digunakan
4. Jalankan `php artisan key:generate`
5. Buat database baru kemudian import file `xyz-group.sql` yang ada di root project
6. Akses dengan `php artisan serve` atau menggunakan XAMPP/Laragon

Default admin login:
Email : `admin@mail.com`
Password: `password`

## Requirement
1. PHP >= 7.3
2. Composer
3. MySQL >= 5.7.33
