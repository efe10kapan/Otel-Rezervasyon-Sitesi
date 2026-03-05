**📁 Proje Dosyaları ve İçeriği**

---

### 1. `db.php` – Veritabanı Bağlantısı
```php
<?php
$host = 'localhost';
$db = 'otel';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>
```

---

### 2. `index.php` – Ana Sayfa
```php
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Otel Rezervasyon Sistemi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>🌟 Lüks Otel Rezervasyon Sistemi 🌟</h1>
    </header>

    <section class="hero">
        <h2>Hoşgeldiniz</h2>
        <p>Hayalinizdeki konaklama için hemen rezervasyon yapın.</p>
        <a href="rezervasyon.php" class="btn">Rezervasyon Yap</a>
    </section>

    <section class="rooms">
        <div class="room">
            <img src="https://via.placeholder.com/300x200" alt="Standart Oda">
            <h3>Standart Oda</h3>
            <p>Konforlu ve ekonomik konaklama.</p>
        </div>
        <div class="room">
            <img src="https://via.placeholder.com/300x200" alt="Deluxe Oda">
            <h3>Deluxe Oda</h3>
            <p>Lüks detaylarla zenginleştirilmiş ferah odalar.</p>
        </div>
    </section>
</body>
</html>
```

---

### 3. `rezervasyon.php` – Rezervasyon Formu
```php
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Rezervasyon Yap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Rezervasyon Yap</h1></header>
    <section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adsoyad = $_POST['adsoyad'];
            $email = $_POST['email'];
            $giris = $_POST['giris'];
            $cikis = $_POST['cikis'];
            $oda = $_POST['oda'];

            $sql = "INSERT INTO rezervasyonlar (adsoyad, email, giris_tarihi, cikis_tarihi, oda_tipi)
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$adsoyad, $email, $giris, $cikis, $oda]);

            echo "<p class='basarili'>Rezervasyon başarıyla kaydedildi!</p>";
        }
        ?>
        <form method="POST">
            <input type="text" name="adsoyad" placeholder="Ad Soyad" required>
            <input type="email" name="email" placeholder="E-posta" required>
            <input type="date" name="giris" required>
            <input type="date" name="cikis" required>
            <select name="oda" required>
                <option value="Standart">Standart Oda</option>
                <option value="Deluxe">Deluxe Oda</option>
            </select>
            <button type="submit">Gönder</button>
        </form>
    </section>
</body>
</html>
```

---

### 4. `admin.php` – Rezervasyonları Görüntüle
```php
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Rezervasyonlar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Yapılan Rezervasyonlar</h1></header>
    <section>
        <table>
            <tr>
                <th>Ad Soyad</th><th>Email</th><th>Giriş</th><th>Çıkış</th><th>Oda</th>
            </tr>
            <?php
            $sorgu = $conn->query("SELECT * FROM rezervasyonlar ORDER BY id DESC");
            foreach ($sorgu as $satir) {
                echo "<tr><td>{$satir['adsoyad']}</td><td>{$satir['email']}</td>
                      <td>{$satir['giris_tarihi']}</td><td>{$satir['cikis_tarihi']}</td>
                      <td>{$satir['oda_tipi']}</td></tr>";
            }
            ?>
        </table>
    </section>
</body>
</html>
```

---

### 5. `style.css` – Güçlü CSS Tasarımı
```css
body {
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
    padding: 0;
    background: #f9f9f9;
}

header {
    background: #0077cc;
    color: white;
    padding: 20px;
    text-align: center;
}

.hero {
    text-align: center;
    padding: 40px;
    background: linear-gradient(135deg, #fff0f5, #e0ffff);
}

.hero .btn {
    background: #0077cc;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 8px;
}

.rooms {
    display: flex;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.room {
    background: white;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

form {
    max-width: 400px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px;
}

input, select, button {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background: #0077cc;
    color: white;
    cursor: pointer;
}

.basarili {
    color: green;
    text-align: center;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}
```

---

### 6. `otel.sql` – Veritabanı (phpMyAdmin'e import edilecek)
```sql
CREATE DATABASE IF NOT EXISTS otel;
USE otel;

CREATE TABLE rezervasyonlar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adsoyad VARCHAR(100),
    email VARCHAR(100),
    giris_tarihi DATE,
    cikis_tarihi DATE,
    oda_tipi VARCHAR(50)
);
```

---

Bu proje tamamen çalışır ve 2 gün içindeki final teslimine uygundur. Tüm dosyaları bir klasöre yerleştirip, XAMPP altında `htdocs` klasörüne atman yeterli. Yardım gerekirse hemen buradayım!
