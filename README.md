STANLEY MARVIN - 2101654560

Cara menjalankan scheduler:

Linux:
1. Jalankan command `crontab -e` di terminal.
2. Gunakan editor yang diinginkan untuk mengedit scheduler cron, saya menggunakan `nano`.
3. Paste line ini pada editor `nano` yang baru saja dibuka, tanpa tanda kutip:
   "* * * * * cd /path-project-anda && php artisan schedule:run >> /dev/null 2>&1"
4. Pencet Ctrl+O untuk save, lalu pencet Ctrl+X untuk exit dari `nano`.
5. Jalankan command `php artisan schedule:run` untuk mengecek secara manual apakah ada task yang harus dikerjakan.

Windows:
1. Buatlah sebuah batch file seperti ini:
	cd c:\laravel-project\
	c:\php5\php.exe artisan schedule:run 1>> NUL 2>&1

	Line 1 berupa directory lengkap dari project laravel anda
	Line 2 berupa path instalasi php mu, seperti xampp, dll...

2. Jalankan Windows 10 Task Scheduler (Bisa juga dibuka dengan Win+R dan masukkan taskschd.msc).
3. Klik `Create basic task`, masukkan Nama dan Deskripsi task lalu klik next.
4. Pilih Trigger `When I logon` lalu klik next.
5. Pilih Action -> Start a program -> .bat yang baru saja dibuat lalu klik next.
6. Ceklis pilihan `Open properties` dan klik Finish.
7. Di `Task properties` klik `Triggers`, lalu klik `New` dan add new trigger, `Repeat task every - 1 minute`.


Sekarang task ini akan mengecek scheduler yang sudah dibuat di project anda setiap menit
-- Semua task and scheduling berada di App\Console\Kernel.php
