<?php
// Beklenen kullanıcı bilgileri
$expected_username = "g231210014@ogr.sakarya.edu.tr";
$expected_password = "g231210014";

// Formdan gelen veriler
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Boş alan kontrolü
if (empty($username) || empty($password)) {
    header("Location: login.html?error=empty");
    exit();
}

// E-posta format kontrolü
if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    header("Location: login.html?error=email");
    exit();
}

// Doğrulama: kullanıcı adı ve şifre eşleşmeli
if ($username === $expected_username && $password === $expected_password) {
    // Kullanıcı adı '@' öncesi kısmı
    $user_id = strstr($username, '@', true);
    echo "<!DOCTYPE html>
    <html lang='tr'>
    <head>
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <title>Hoşgeldiniz</title>
        <link rel='stylesheet' href='css/style.css' />
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' />
    </head>
    <body>
      <!-- Navbar -->
      <nav class='navbar navbar-expand-lg navbar-dark'>
        <div class='container'>
          <a class='navbar-brand' href='index.html'>Zeynep'in Sitesi 🌸</a>
          <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ms-auto'>
              <li class='nav-item'><a class='nav-link' href='index.html'>Hakkımda</a></li>
              <li class='nav-item'><a class='nav-link' href='cv.html'>CV</a></li>
              <li class='nav-item'><a class='nav-link' href='sehir.html'>Şehrim</a></li>
              <li class='nav-item'><a class='nav-link' href='miras.html'>Mirasımız</a></li>
              <li class='nav-item'><a class='nav-link' href='ilgi-alanlarim.html'>İlgi Alanlarım</a></li>
              <li class='nav-item'><a class='nav-link' href='iletisim.html'>İletişim</a></li>
              <li class='nav-item'><a class='nav-link active' href='login.html'>Giriş Yap</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Giriş Sonucu -->
      <main class='container my-5 text-center'>
        <h2 class='text-success'>Hoşgeldiniz <strong>$user_id</strong></h2>
        <p class='lead'>Başarıyla giriş yaptınız.</p>
        <a href='index.html' class='btn btn-success mt-3'>Ana Sayfaya Dön</a>
      </main>

      <!-- Footer -->
      <footer class='text-white text-center py-3 mt-auto'>
        <p>© 2025 Zeynep Yılmaz - Tüm hakları saklıdır.</p>
        <p><a href='login.html' class='text-white'>Giriş Yap</a></p>
      </footer>

      <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>
    </body>
    </html>";
} else {
    header("Location: login.html?error=invalid");
    exit();
}
?>
