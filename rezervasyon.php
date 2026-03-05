<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HemenRezerVasyon</title>
</head>
<body>

<!-- Header -->
<header class="navbar" style="background-color: #3c096c; padding: 20px; display: flex; align-items: center; justify-content: space-between;">
  <!-- Navbar: Arka plan rengi mor, padding, içerikleri ortalayıp iki yana yayma -->
  <div class="logo" style="display: flex; align-items: center; gap: 10px;">
    <img src="logo.jpg" alt="Logo" width="60px" height="50px"/> <!-- Logo resmi -->
    <span style="font-size: 28px; color: white;">HemenRezerVasyon</span> <!-- Site adı -->
  </div>

  <nav class="nav-links" style="display: flex; align-items: center; gap: 25px;">
    <!-- Dropdown menü (şu an gizli) -->
    <div class="dropdown-content" style="display: none; position: absolute; background-color: #fff; min-width: 200px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); z-index: 1; border-radius: 6px;">
      <a href="#">Gitmek İstediğin Yer</a> <!-- Menü seçeneği -->
      <a href="#">Tarih Seç</a> <!-- Menü seçeneği -->
      <a href="#">Konaklama Süresi</a> <!-- Menü seçeneği -->
    </div>

    <a href="index.php" style="color: white; text-decoration: none; font-size: 16px;">Anasayfa</a> <!-- Anasayfa linki -->

    <!-- Dil seçme kutusu -->
    <select name="language" onchange="alert('Dil değiştirme henüz aktif değil.')">
      <option value="tr">Türkçe</option>
      <option value="en">English</option>
      <option value="de">Deutsch</option>
    </select>
  </nav>

  <!-- Giriş yap butonu -->
  <a href="giriş-yap.php" style="color: white; background-color: #06d6a0; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 18px; margin-left: 30px;">
    Hesabım
  </a>
</header>

<!-- Giriş ekranı / arama bölümü -->
<section class="hero">
  <h1 style="text-align: center; color: white;">Gitmek İstediğin yer</h1> <!-- Başlık -->

  <form class="search-box" action="sonuclar.php" method="GET"> <!-- Arama formu -->
    <table style="margin: 0 auto; background: white; padding: 20px; border-radius: 10px;">
      <tr>
        <td><input type="text" name="konum" placeholder="Nereye?" required></td> <!-- Konum girişi -->
        <td><input type="date" name="giris_tarihi" required></td> <!-- Giriş tarihi -->
        <td><input type="date" name="cikis_tarihi" required></td> <!-- Çıkış tarihi -->
        <td>
          <select name="misafir_sayisi" required> <!-- Misafir sayısı seçimi -->
            <option value="">Misafir sayısı</option>
            <option value="1">1 misafir</option>
            <option value="2">2 misafir</option>
            <option value="3">3 misafir</option>
            <option value="4">4+ misafir</option>
          </select>
        </td>
        <td><button type="submit" style="background-color: #4ef3a3; padding: 10px 20px; border: none; border-radius: 5px;">Ara</button></td> <!-- Ara butonu -->
      </tr>
    </table>
  </form>
</section>

<!-- Otel Rezervasyon Bildirimi -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) { // Eğer otel adıyla post gelirse
    $otelAdi = htmlspecialchars($_POST["otel_adi"]); // Güvenli hale getir
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>"; // Başarılı mesaj göster
}
?>

<!-- Serenity Palas Otel Kartı -->
<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="tekkişi.jpg" alt="Tek Kışilik Oda" width="300px" height="auto"/> <!-- Otel resmi -->

  <div style="flex-grow: 1; padding-left: 30px;">
    <h2>Serenity Palas</h2> <!-- Otel ismi -->
    <p><strong>Konum:</strong> Antalya, Kemer</p> <!-- Konum -->
    <p><strong>İmkanlar:</strong> Kahvaltı, Havuz, Sauna</p> <!-- İmkanlar -->
    <p><strong>Otel Puanı:</strong> 7.8 (İyi)</p> <!-- Puan -->
    <p><strong>Toplam Fiyat:</strong> 2.000 TL</p> <!-- Toplam fiyat -->
    <p style="font-size: 14px; color: gray;">2 Gece / 1 Oda — Gecelik 1.000 TL (vergiler dahil)</p> <!-- Gecelik fiyat -->

    <form method="POST" style="margin-top: 10px;"> <!-- Rezervasyon formu -->
      <input type="hidden" name="otel_adi" value="Serenity Palas"> <!-- Otel adı gizli -->
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;"> <!-- Kişi sayısı -->

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p> <!-- Kampanya mesajı -->

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button> <!-- Satın al butonu -->
    </form>
  </div>
</div>

<!-- Aynı rezervasyon bildirimi kodu (tekrarlı) -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<!-- LunaVista Hotel Kartı -->
<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="çiftkişi.jpg" alt="Çift Kışilik Oda" width="300px" height="auto"/>

  <div style="flex-grow: 1; padding-left: 30px;">
   <h2>LunaVista Hotel</h2>
    <p><strong>İmkanlar:</strong> Sabah,Akşam Yemeği Havuz, Spa,Sauna</p>
    <p><strong>Otel Puanı:</strong> 8,2 ( Oldukça İyi)</p>
    <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">6.000 TL</span></p>
    <p><small>3 Gece / 1 Oda — Gecelik <strong>2.000 TL (Tek Kişi)</strong> (vergiler dahil)</small></p>
    <p style="font-size: 14px; color: gray;">2 Gece / 1 Oda — Gecelik 1.000 TL (vergiler dahil)</p>

    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>

<!-- Tekrar rezervasyon bildirimi (3. kez) -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<!-- Lunaria Hotel & Spa Otel Kartı -->
<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="aile.jpg" alt="Aile Odası" width="300px" height="auto"/>

  <div style="flex-grow: 1; padding-left: 30px;">
   <h2>Lunaria Hotel & Spa</h2>
      <p><strong>Konum:</strong> Muğla,Bodrum Merkezi</p>
      <p><strong>İmkanlar:</strong>3 Öğün Yemek, Havuz,Spa,Sauna, Akıllı TV ve Wi-Fi bağlantısı, Geniş çift kişilik yatak, Mini mutfak </p>
      <p><strong>Otel Puanı:</strong> 9.0 (Harika)</p>
      <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">10.000 TL</span></p>
      <p><small>5 Gece / 1 Oda — Gecelik <p style="color: #2e7d32;"><strong>Toplam Fiyat: 2.000 TL</strong></small></p> <!-- Bu satırda HTML hatası var: <p> etiketi iç içe yanlış -->

    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>







   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="bungalov.jpg" alt="Bungalov Özel Villa" width="300px" height="auto"/>

  <div style="flex-grow: 1; padding-left: 30px;">
    <h2>Lavanta Koyu Bungalovları</h2>
      <p><strong>Konum:</strong> İstanbul,Sapanca Şehir Merkezine 9.6 Km Uzaklık</p>
      <p><strong>İmkanlar:</strong> Geniş çift kişilik yatak, Akıllı TV ve Wi-Fi bağlantısı, Kış aylarında şömine veya klima ile ısıtma,Özel Isıtmalı Havuz,BBQ</p>
      <p><strong>Otel Puanı:</strong> 8.5(Mükemmel)</p>
      <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">2.900 TL</span></p>
      <p><small>1 Gece / 1 Oda — Gecelik <strong>2.900 TL (Tek Gece)</strong> (vergiler dahil)</small></p>
    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>





   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="gemi.jpg" alt="Gemi Odası" width="300px" height="auto"/>
  <div style="flex-grow: 1; padding-left: 30px;">
    <h2>MaviRota</h2>
      <p><strong>Konum:</strong> Geniş Kapsamlı Akdeniz Turu </p>
      <p><strong>İmkanlar:</strong>  büyük boy yatak, Geniş gardırop ve çalışma masası,Akıllı TV ve Wi-Fi bağlantısı,  İsteğe bağlı günlük temizlik hizmeti,Özel alan,su kaydırağı,havuz,cafe</p>
      <p><strong>Otel Puanı:</strong> 10.0(OlağanÜstü)</p>
      <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">21.000 TL</span></p>
      <p><small>6 Gece 7 Gün / 1 Oda — Gecelik <strong>Tek Gece(3.000)</strong> (vergiler dahil)</small></p>

    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>






   <?php
// Eğer form POST yöntemiyle gönderildiyse ve "otel_adi" alanı ayarlanmışsa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    
    $otelAdi = htmlspecialchars($_POST["otel_adi"]); // Otel adını güvenli hale getir (XSS'den korunmak için)

    // Rezervasyonun başarıyla yapıldığını gösteren yeşil renkli onay mesajı
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>


<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="tekne.jpg" alt="Tekne Gezintisi" width="300px" height="auto"/>

  <div style="flex-grow: 1; padding-left: 30px;">
    <p><strong>Konum:</strong>  Ege Kıyıları Turu</p>
      <p><strong>İmkanlar:</strong> Açık büfe kahvaltı, öğle ve akşam yemekleri,Rehberli ada/koy turları,Profesyonel kaptan ve mürettebat,Güneşlenme güvertesi,Yüzme molaları</p>
      <p><strong>Otel Puanı:</strong> 8.7(Mükemmel)</p>
      <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">3.899 TL</span></p>
      <p><small>Gün İçi 7 Saat <strong>3.899</strong> (vergiler dahil)</small></p>

    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>






   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="yat.jpg" alt="Yat seyehat" width="300px" height="auto"/>
  <div style="flex-grow: 1; padding-left: 30px;">
    <h2>Oceanvia</h2>
      <p><strong>Konum:</strong> İsteğe Bağlı</p>
      <p><strong>İmkanlar:</strong>Kişiye özel menüler (isteğe bağlı),Gün batımı ve gün doğumu seyirleri,Jet ski (isteğe bağlı),Geniş güneşlenme alanı,arbekü partileri ve özel içecek servisi,Lüks süit kabinler (klima, özel banyo, TV)</p>
      <p><strong>Otel Puanı:</strong> 9.0 (Harika)</p>
     <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">7.000 TL</span></p>
      <p><small>Günlük <strong>7.000 TL (Günük Fiyat)</strong> (vergiler dahil)</small></p>

    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>





<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
 <img src="dağ.jpg" alt="dağ odası" width="300px" height="auto"/>

  <div style="flex-grow: 1; padding-left: 30px;">
    <h2>MasalDiyarı</h2>
      <p><strong>Konum:</strong>İstanbul,Ağva Şehir Merkezine Uzaklık 10.6 Km</p>
      <p><strong>İmkanlar:</strong> Ahşap tasarımlı sıcak ve huzurlu ortam,Merkezi ısıtma sistemi,Dağ manzaralı yatak odaları,Özel banyo / jakuzi bulunan odalar,Kamp ateşi alanı,Mangal/barbekü alan</p>
      <p><strong>Otel Puanı:</strong>7.9(İyi)</p>
      <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">19.200 TL</span></p>
      <p><small>4 Gece / 1+1 Oda — Salon <strong>4.800TL(Gecelik)</strong> (vergiler dahil)</small></p>

    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>





   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
 <img src="dağ1.jpg" alt="orman ev" width="300px" height="auto"/>


  <div style="flex-grow: 1; padding-left: 30px;">
     <h2>Special Day&Celebration Day</h2>
      <p><strong>Konum:</strong> İzmir,Alaçatı Şehir Merkezine Uzaklık 4.2 Km</p>
      <p><strong>İmkanlar:</strong>Şömine veya odun sobası ile sıcak atmosfer,Özel jakuzi veya açık hava küveti,Çift masajı için özel hizmet desteği,Romantik akşam yemeği masası hazırlığ,Göl, dağ ya da orman manzarası seçenekleri,Bluetooth müzik,film sistemi</p>
      <p><strong>Otel Puanı:</strong> 8.8 (Harika)</p>
      <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">19.998 TL</span></p>
      <p><small>2 Gece /  Oda — Salon <strong>9.999(Tek Gece)</strong> (vergiler dahil)</small></p>


    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>



  
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["otel_adi"])) {
    $otelAdi = htmlspecialchars($_POST["otel_adi"]);
    echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; margin: 20px 0; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>$otelAdi</strong> oteli için rezervasyonunuz yapıldı!
          </div>";
}
?>

<div style="display: flex; border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-bottom: 20px; background-color: #fff;">
  <img src="otel.jpg" alt="Otel Aile Odası" width="300px" height="auto"/>

  <div style="flex-grow: 1; padding-left: 30px;">
   <h2>Rüya Hotel</h2>
      <p><strong>Konum:</strong>Nevşehir,Kapadokya Şehir Merkezine Uzaklık 1.5 Km</p>
      <p><strong>İmkanlar:</strong>Aileye özel geniş odalar veya bağlantılı odalar,Çocuk havuzu ve kaydıraklı aqua park,Doğum günü kutlama ve özel etkinlik organizasyonu,Açık büfe kahvaltı, öğle ve akşam yemekleri,Su sporları (pedallı bot, kano vb.),Animasyon Film </p>
      <p><strong>Otel Puanı:</strong> 8.0(Harika)</p>
      <p><strong>Toplam Fiyat:</strong> <span style="color: #000000; font-weight: 900;">27.986 TL</span></p>
      <p><small>6 Gece 7 Gün / 1 Oda — Gecelik <strong>3.998 (Tek Gece)</strong> (vergiler dahil)</small></p>

    <form method="POST" style="margin-top: 10px;">
      <input type="hidden" name="otel_adi" value="Serenity Palas">
      <label for="kisi" style="display: inline-block; margin-right: 10px;">Kişi Sayısı:</label>
      <input type="number" name="kisi" id="kisi" value="1" min="1" style="width: 50px; padding: 5px;">

      <p style="color: green; font-weight: bold; margin-top: 10px;">Hemen alırsanız %10 indirim!</p>

      <button type="submit" style="background-color: purple; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-top: 10px;">
        Hemen Satın Al
      </button>
    </form>
  </div>
</div>



</section>
<footer style="background-color: #3c096c; color: white; padding: 40px 20px;">
  <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; gap: 20px;">

    <!-- Hakkımızda -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px; padding-left: 10px;">
      <h3 style="margin-bottom: 10px;">Hakkımızda</h3>
      <p style="line-height: 1.6;">
        HemenRezerVasyon, uygun fiyatlı ve konforlu otel seçeneklerini kolayca bulmanızı sağlar. Misyonumuz, her gezgin için sorunsuz ve keyifli bir konaklama deneyimi sunmaktır.
      </p>
    </div>

    <!-- İletişim -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px; padding-left: 10px;">
      <h3 style="margin-bottom: 10px;">İletişim</h3>
      <p>Email: <a href="mailto:info@hemenrezervasyon.com" style="color: #ffd6ff;">info@hemenrezervasyon.com</a></p>
      <p>Telefon: +90 212 123 12 12</p>
      <p>Adres: İstanbul, Türkiye</p>
    </div>

    <!-- Sosyal Medya -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px; padding-left: 10px;">
      <h3 style="margin-bottom: 10px;">Bizi Takip Edin</h3>
      <a href="#" style="margin-right: 10px; color: #ffd6ff; text-decoration: none;">Facebook</a>
      <a href="#" style="margin-right: 10px; color: #ffd6ff; text-decoration: none;">Instagram</a>
      <a href="#" style="color: #ffd6ff; text-decoration: none;">Twitter</a>
    </div>

    <!-- Dil Seçimi -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px; padding-left: 10px;">
      <h3 style="margin-bottom: 10px;">Dili Değiştir</h3>
      <select onchange="changeLanguage(this.value)" style="padding: 8px; border-radius: 5px; border: none; background-color: #5a189a; color: white;">
        <option value="tr">Türkçe</option>
        <option value="en">English</option>
        <option value="de">Deutsch</option>
      </select>
    </div>

  </div>

  <div style="text-align: center; border-top: 1px solid #5a189a; padding-top: 20px; margin-top: 20px; font-size: 14px;">
    &copy; 2025 HemenRezerVasyon. Tüm hakları saklıdır.
  </div>
</footer>


</body>
</html>
