<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>Masuk</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="/user/register" method="POST">
                <h1>Buat Akun</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>atau gunakan email Anda untuk registrasi</span>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Kata Sandi">
                <button type="submit">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="/user/login" method="POST"> 
                <h1>Masuk</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>atau gunakan email dan kata sandi Anda</span>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Kata Sandi">
                <a href="#">Lupa Kata Sandi?</a>
                <button>Masuk</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat Datang Kembali!</h1>
                    <p>Masukkan detail pribadi Anda untuk menggunakan semua fitur situs</p>
                    <button class="hidden" id="login">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Halo, Teman!</h1>
                    <p>Daftar dengan detail pribadi Anda untuk menggunakan semua fitur situs</p>
                    <button type="submit" class="hidden" id="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/login.js"></script>
</body>

</html>
