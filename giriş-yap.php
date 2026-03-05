<?php
session_start(); // Oturum başlatılır, kullanıcı bilgileri session ile saklanır

// Cookie'den daha önce hatırlanan kullanıcı adını al, yoksa boş string
$hatirlananKullanici = isset($_COOKIE['kullanici_adi']) ? $_COOKIE['kullanici_adi'] : '';

// Form gönderildiyse kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullaniciAdi = $_POST['kullanici_adi']; // Formdan gelen kullanıcı adı
    $sifre = $_POST['sifre'];                 // Formdan gelen şifre
    $hatirla = isset($_POST['hatirla']);      // "Beni hatırla" kutusu işaretli mi?

    // Doğru kullanıcı ve şifre sabitleri (örnek)
    $dogruKullanici = "efe";
    $dogruSifre = "1234";

    // Kullanıcı girişi doğrulama
    if ($kullaniciAdi === $dogruKullanici && $sifre === $dogruSifre) {
        $_SESSION['kullanici'] = $kullaniciAdi; // Başarılı giriş, session'a kullanıcıyı kaydet

        if ($hatirla) {
            // "Beni hatırla" işaretliyse 30 gün geçerli cookie oluştur
            setcookie('kullanici_adi', $kullaniciAdi, time() + (86400 * 30));
        } else {
            // İşaretli değilse varsa eski cookie'yi sil
            setcookie('kullanici_adi', '', time() - 3600);
        }

        header("Location: index.php"); // Girişten sonra anasayfaya yönlendir
        exit(); // Çık ve yönlendirmeyi gerçekleştir
    } else {
        $hata = "Kullanıcı adı veya şifre hatalı!"; // Hatalı giriş mesajı
    }
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giriş Yap - HemenRezerVasyon</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background: linear-gradient(to bottom right, #5e60ce, #7400b8);
  color: white;
  margin: 0;
  padding: 0;
}

.navbar {
  background-color: #3c096c;
  padding: 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 25px;
}

.nav-links a {
  color: white;
  text-decoration: none;
  font-size: 16px;
}

/* 🔹 Giriş Formu Genişletildi */
.login-box {
  background-color: rgba(0, 0, 0, 0.4);
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(0,0,0,0.5);
  width: 400px;
  margin: 80px auto;
  text-align: center;
}

.login-box h2 {
  margin-bottom: 25px;
  font-size: 24px;
}

.login-box input[type="text"],
.login-box input[type="password"] {
  width: 100%;
  padding: 14px;
  margin: 12px 0;
  border: none;
  border-radius: 6px;
  font-size: 16px;
}

.login-box label {
  display: flex;
  align-items: center;
  font-size: 14px;
  margin: 10px 0;
  color: #fff;
}

.login-box button {
  width: 100%;
  padding: 14px;
  background-color: #06d6a0;
  color: white;
  border: none;
  border-radius: 6px;
  font-size: 17px;
  cursor: pointer;
}

.login-box button:hover {
  background-color: #00b48c;
}

.error {
  background-color: #ff4d4d;
  padding: 10px;
  border-radius: 6px;
  margin-bottom: 10px;
  color: white;
}
  </style>
</head>
<body>

  <!-- HEADER -->
  <header class="navbar">
    <div class="logo">
      <img src="logo.jpg" alt="Logo" width="60px" height="50px"/>
      <span style="font-size: 28px; color: white;">HemenRezerVasyon</span>   
    </div>

    <nav class="nav-links">
      <a href="index.php#">Anasayfa</a>
      <select name="language" onchange="alert('Dil değiştirme henüz aktif değil.')">
        <option value="tr">Türkçe</option>
        <option value="en">English</option>
        <option value="de">Deutsch</option>
      </select>
    </nav>
  </header>

<!-- GİRİŞ FORMU KUTUSU -->
<div class="login-box"> <!-- Giriş kutusunu saran ana kapsayıcı -->
  <h2>Giriş Yap</h2> <!-- Başlık -->

  <?php if (!empty($hata)): ?> <!-- Hata mesajı varsa göster -->
    <div class="error"><?php echo $hata; ?></div> <!-- Hata mesaj kutusu -->
  <?php endif; ?>

  <form method="POST" action=""> <!-- Giriş formu, aynı sayfaya POST ile gönderir -->
    <input 
      type="text" 
      name="kullanici_adi" 
      placeholder="Kullanıcı Adı" 
      required 
      value="<?php echo htmlspecialchars($hatirlananKullanici); ?>"> <!-- Kullanıcı adı alanı, cookie'den gelen değer otomatik doldurulur -->

    <input 
      type="password" 
      name="sifre" 
      placeholder="Şifre" 
      required> <!-- Şifre alanı -->

    <label> <!-- "Beni Hatırla" checkbox etiketi -->
      <input 
        type="checkbox" 
        name="hatirla" 
        <?php echo $hatirlananKullanici ? 'checked' : ''; ?>> <!-- Eğer cookie varsa işaretli gelir -->
      Beni Hatırla! <!-- Checkbox metni -->
    </label>

    <button type="submit">Giriş Yap</button> <!-- Gönder butonu -->
  </form>
</div>

</body> <!-- Body bitiş etiketi -->
</html> <!-- HTML bitiş etiketi -->
