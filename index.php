<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HemenRezerVasyon</title>
  <style>
  body {
  margin: 0; /* Sayfa kenar boşluklarını kaldırır */
  font-family: 'Inter', sans-serif; /* Yazı tipi ayarlanır */
  background: linear-gradient(to bottom, #5e60ce, #7400b8); /* Arka plan geçişli renk */
  color: #fff; /* Yazı rengi beyaz */
}

header {
  background-color: #3c096c; /* Üst menü arka plan rengi */
  padding: 20px; /* İç boşluk */
  display: flex; /* Esnek kutu düzeni */
  align-items: center; /* Dikey hizalama */
  justify-content: space-between; /* Öğeleri iki uca yerleştir */
  color: white; /* Yazı rengi */
}

header h1 {
  margin: 0; /* Başlık kenar boşluğunu sıfırla */
  font-size: 28px; /* Başlık font boyutu */
}

.logo {
  display: flex; /* Logo içeriği yatay hizala */
  align-items: center; /* Dikey hizalama */
  gap: 10px; /* Öğeler arası boşluk */
}

.nav-links {
  display: flex; /* Menü bağlantıları yatay hizalanır */
  align-items: center; /* Dikey ortala */
  gap: 20px; /* Bağlantılar arası boşluk */
}

.dropdown {
  position: relative; /* Alt menüyü konumlandırmak için göreceli konum */
}

.dropbtn {
  background-color: #5a189a; /* Düğme arka plan rengi */
  color: white; /* Yazı rengi */
  padding: 10px 15px; /* İç boşluklar */
  border: none; /* Kenarlık yok */
  border-radius: 5px; /* Köşeleri yuvarlat */
  cursor: pointer; /* İmleç el simgesi olur */
}

.dropdown-content {
  display: none; /* Başta görünmez */
  position: absolute; /* Mutlak konumlandırma */
  background-color: #fff; /* Arka plan beyaz */
  min-width: 200px; /* Minimum genişlik */
  box-shadow: 0 8px 16px rgba(10, 5, 6, 0.9); /* Gölge efekti */
  z-index: 1; /* Üstte göster */
  border-radius: 6px; /* Köşeleri yuvarlat */
}

.dropdown-content a {
  color: black; /* Bağlantı yazı rengi siyah */
  padding: 12px 16px; /* İç boşluk */
  text-decoration: none; /* Alt çizgi yok */
  display: block; /* Blok element */
}

.dropdown:hover .dropdown-content {
  display: block; /* Üzerine gelince göster */
}

.hero {
  background: linear-gradient(to top right, #fdd, #ffc0cb); /* Arka plan geçişi */
  background-image: url('background.jpg'); /* Arka plan görseli */
  background-size: cover; /* Görsel tam kapla */
  background-position: center; /* Ortala */
  color: #333; /* Yazı rengi koyu gri */
  text-align: center; /* Metin ortalanır */
  padding: 80px 20px; /* İç boşluk */
  position: relative; /* Konumlandırma için */
}

.hero h1 {
  font-family: 'Playfair Display', serif; /* Başlık yazı tipi */
  font-size: 36px; /* Yazı boyutu */
  margin-bottom: 30px; /* Alt boşluk */
}

.search-box {
  display: flex; /* Yatay hizalama */
  flex-wrap: wrap; /* Taşma olursa alt satıra geç */
  justify-content: center; /* Ortala */
  background: white; /* Arka plan beyaz */
  padding: 20px; /* İç boşluk */
  border-radius: 12px; /* Köşeleri yuvarlat */
  max-width: 900px; /* Maksimum genişlik */
  margin: 0 auto; /* Ortala */
  box-shadow: 0 5px 15px rgba(0,0,0,0.1); /* Gölge efekti */
}

.search-box input,
.search-box select {
  margin: 10px; /* Kenar boşluğu */
  padding: 15px; /* İç boşluk */
  font-size: 16px; /* Yazı boyutu */
  border: 1px solid #ccc; /* Gri kenarlık */
  border-radius: 8px; /* Köşeleri yuvarlat */
  flex: 1 1 200px; /* Esnek genişlik */
}

.search-box button {
  background-color: rgba(54, 233, 137, 0.8); /* Buton rengi */
  color: white; /* Yazı rengi */
  border: none; /* Kenarlık yok */
  border-radius: 8px; /* Köşeleri yuvarlat */
  padding: 15px 25px; /* İç boşluk */
  font-size: 16px; /* Yazı boyutu */
  margin: 10px; /* Kenar boşluğu */
  cursor: pointer; /* İmleç el simgesi */
  transition: background 0.3s; /* Geçiş efekti */
}

.search-box button:hover {
  background-color: #005bb5; /* Üzerine gelince rengi değiştir */
}

.container {
  padding: 40px; /* İç boşluk */
  background-color: rgba(255, 255, 255, 0.05); /* Yarı saydam arka plan */
  backdrop-filter: blur(6px); /* Blur efekti */
  border-radius: 20px; /* Köşeleri yuvarlat */
  margin: 20px auto; /* Dikey boşluk + ortala */
  width: 90%; /* Genişlik */
  max-width: 1200px; /* Maksimum genişlik */
}

h2 {
  color: #ffb703; /* Başlık rengi */
}

.room-list {
  display: flex; /* Yatay kutular */
  gap: 20px; /* Aralarındaki boşluk */
  flex-wrap: wrap; /* Taşma durumunda alt satıra geç */
}

.room {
  background-color: white; /* Kart arka planı */
  color: black; /* Yazı rengi */
  border-radius: 15px; /* Köşeleri yuvarlat */
  overflow: hidden; /* Taşanları gizle */
  width: calc(50% - 10px); /* Yarı genişlik, boşlukla birlikte */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Gölge efekti */
  position: relative; /* Etiketler için konumlandırma */
}

.room img {
  width: 100%; /* Genişliği tam kapla */
  height: 200px; /* Sabit yükseklik */
  object-fit: cover; /* Orantılı kırpma */
}

.room-info {
  padding: 20px; /* İç boşluk */
}

.room-info h3 {
  margin: 0; /* Kenar boşluğu yok */
  font-size: 20px; /* Başlık boyutu */
}

.room-info p {
  margin: 10px 0; /* Dikey boşluk */
}

.btn {
  background-color: #06d6a0; /* Düğme rengi */
  color: white; /* Yazı rengi */
  padding: 10px 20px; /* İç boşluk */
  border: none; /* Kenarlık yok */
  border-radius: 5px; /* Köşeleri yuvarlat */
  text-decoration: none; /* Alt çizgi yok */
  display: inline-block; /* Satır içi blok */
  transition: 0.3s ease; /* Geçiş efekti */
}

.btn:hover {
  background-color: #00b48c; /* Üzerine gelince rengi değiştir */
}

.badge {
  position: absolute; /* Mutlak konumlandırma */
  top: 10px; /* Yukarıdan boşluk */
  left: 10px; /* Soldan boşluk */
  background-color: #e60023; /* Etiket rengi */
  color: white; /* Yazı rengi */
  padding: 6px 12px; /* İç boşluk */
  font-size: 13px; /* Yazı boyutu */
  font-weight: bold; /* Kalın yazı */
  border-radius: 6px; /* Köşeleri yuvarlat */
}

.favorite-btn {
  position: absolute; /* Mutlak konum */
  top: 10px; /* Yukarıdan boşluk */
  right: 10px; /* Sağdan boşluk */
  background: white; /* Arka plan */
  color: #e60023; /* Kalp rengi */
  border: none; /* Kenarlık yok */
  font-size: 20px; /* Yazı boyutu */
  padding: 5px 10px; /* İç boşluk */
  border-radius: 50%; /* Yuvarlak */
  cursor: pointer; /* El simgesi */
  box-shadow: 0 2px 6px rgba(0,0,0,0.1); /* Gölge */
  transition: transform 0.2s; /* Büyüme efekti */
}

.favorite-btn:hover {
  transform: scale(1.2); /* Üzerine gelince büyüt */
  background-color: #ffe6ea; /* Açık pembe arka plan */
}

footer {
  background-color: #3c096c; /* Alt kısım arka plan rengi */
  text-align: center; /* Ortala */
  padding: 20px; /* İç boşluk */
  color: #fff; /* Yazı rengi */
  margin-top: 40px; /* Üst boşluk */
}
  </style>
</head>
<body>

<header class="navbar" style="background-color: #3c096c; padding: 20px; display: flex; align-items: center; justify-content: space-between;">
  <div class="logo" style="display: flex; align-items: center; gap: 10px;">
    <img src="logo.jpg" alt="Logo" width="60px" height="50px"/>
    <span style="font-size: 28px; color: white;">HemenRezerVasyon</span>   
  </div>

  <nav class="nav-links" style="display: flex; align-items: center; gap: 25px;">
      <div class="dropdown-content" style="display: none; position: absolute; background-color: #fff; min-width: 200px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); z-index: 1; border-radius: 6px;">
        <a href="#" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Gitmek İstediğin Yer</a>
        <a href="#" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Tarih Seç</a>
        <a href="#" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Konaklama Süresi</a>
      </div>
    </div>

    <!-- Anasayfa = Fırsat Odalar bölümüne kaydırır -->
    <a href="#firsatodalar" style="color: white; text-decoration: none; font-size: 16px;">Fırsat Odalar</a>


    <!-- Hakkımızda = Footer'a kaydırır -->
   <a href="#hakkimizda" style="color: white; text-decoration: none; font-size: 16px;">Hakkımızda</a>


    <!-- Giriş Yap = En sağda ve büyük -->
     <a href="giriş-yap.php" style="color: white; background-color: #06d6a0; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 18px; margin-left: 30px;">
      Giriş Yap
    </a>

  </nav>
</header>


<section class="hero">
  <section class="hero"> <!-- Üstteki görsel alan, genellikle arka plan görseli içerir -->
  <h1 style="text-align: center; color: white;">Gitmek İstediğin yer</h1> <!-- Başlık, merkeze hizalı ve beyaz -->

  <form class="search-box" action="rezervasyon.php" method="GET"> <!-- Arama formu, rezervasyon sayfasına yönlendirir -->
    <table style="margin: 0 auto; background: white; padding: 20px; border-radius: 10px;"> <!-- Ortalanmış ve stil verilmiş tablo -->
      <tr> <!-- Form elemanlarını içeren satır -->
        <td><input type="text" name="konum" placeholder="Nereye?" required></td> <!-- Konum girişi alanı -->
        <td><input type="date" name="giris_tarihi" required></td> <!-- Giriş tarihi seçici -->
        <td><input type="date" name="cikis_tarihi" required></td> <!-- Çıkış tarihi seçici -->
        <td>
          <select name="misafir_sayisi" required> <!-- Misafir sayısı seçici -->
            <option value="">Misafir sayısı</option> <!-- Varsayılan seçenek -->
            <option value="1">1 misafir</option> <!-- Seçenek: 1 kişi -->
            <option value="2">2 misafir</option> <!-- Seçenek: 2 kişi -->
            <option value="3">3 misafir</option> <!-- Seçenek: 3 kişi -->
            <option value="4">4+ misafir</option> <!-- Seçenek: 4 ve üzeri kişi -->
          </select>
        </td>
        <td><button type="submit" style="background-color: #4ef3a3; padding: 10px 20px; border: none; border-radius: 5px;">Ara</button></td> <!-- Arama butonu -->
      </tr>
    </table>
  </form>
</section>

<div class="container"> <!-- İçeriği saran kapsayıcı -->
  <h2 id="firsatodalar" class="text-yellow-400 font-bold text-2xl mb-4">Fırsat Odalar</h2> <!-- Başlık, fırsat odaları bölümü -->
  <div class="room-list"> <!-- Otel odası kartlarını içeren liste -->


    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="tekkişi.jpg" alt="Tek Kışilik Oda" />
      <div class="room-info">
        <h3> 🛏️ Tek Kışilik Oda</h3>
        <p>Ferah, sade ve uygun fiyatlı. Gecelik 599₺'den başlayan fiyatlarla.</p>
        <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
             Hemen Rezervasyon Yap</a>

      </div>
    </div>

    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="çiftkişi.jpg" alt="Çift Kışilik Oda" />
      <div class="room-info">
        <h3>🛏️ Çift Kişilik Oda</h3>
        <p>Çift kişilik yatak, TV ve klima ile birlikte. Gecelik 750₺.</p>
        <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>

    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="aile.jpg" alt="Aile Odası" />
      <div class="room-info">
        <h3>👨‍👩‍👧‍👦 Aile Odası</h3>
        <p>Geniş ve ferah oda. 1 çift kişilik + 2 tek kişilik yatak, mini mutfak, balkon. Gecelik 1200₺.</p>
        <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>

    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="bungalov.jpg" alt="Bungalov Özel Villa" />
      <div class="room-info">
        <h3>🌿Bungalov Özel Villa</h3>
        <p>Doğa içinde, jakuzili, ahşap özel villa. Sessiz, izole konaklama. Gecelik 2500₺.</p>
       <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>
    
    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="gemi.jpg" alt="Çift Kışilik Oda" />
      <div class="room-info">
        <h3>🛳️ Özel Gemi Turları</h3>
        <p>Lüks tasarım: jakuzili odalar, sauna, havuz, spor salonu!Yok.. Yok.. Titanic konforu şimdi %30 indirimle!
            Fiyatlar kişi başı 8.999’den başlıyor. <br> <br>
             <a href="#" class="btn">Rezervasyon Yap</a>
      </div>
    </div>

     <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="tekne.jpg" alt="Çift Kışilik Oda" />
      <div class="room-info">
        <h3>⛵ Yazlık Gemi Turları</h3>
        <p>Yemek servisi, tuvalet imkanı ve serin sulara yüzme molası dahil!
            Fiyatlar kişi başı 1899₺’den başlıyor.</p>
        <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>

     <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="yat.jpg" alt="Çift Kışilik Oda" />
      <div class="room-info">
        <h3>🛥️ Özel Aile Yatı Kiralama</h3>
        <p>Yatak, tuvalet, mutfak, giyinme odası ve özel servisli tekne turu!
            Yemekler dahil, istediğin yerde yüzme imkanı.
            Kiralama sistemiyle, günlük 3.499₺’den başlayan fiyatlarla!</p>
       <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>

    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="dağ.jpg" alt="Çift Kışilik Oda" />
      <div class="room-info">
        <h3>🏔️ Dağ Evi Tatili</h3>
        <p>Jakuzili, saunalı, şömineli konforlu odalar!
            Doğayla iç içe, tam aileyle kaçamak yapmalık.
            Gecelik 1.899₺’den başlayan indirimli fiyatlarla!</p>
        <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>

    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="dağ1.jpg" alt="Çift Kışilik Oda" />
      <div class="room-info">
        <h3>🎉 Özel Gün Tatili Dağ Evi</h3>
        <p>Evlilik yıl dönümüne özel sunumlar, kokteyller ve jakuzili havuzlu villalar!
            Arkadaşlarla parti yapabileceğin mükemmel ortam.
            Tek Gece 5.999₺’den başlayan özel fiyatlarla!</p>
        <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>

    <div class="room">
      <span class="badge">İndirimli!</span>
      <button class="favorite-btn" title="Favorilere Ekle">❤</button>
      <img src="otel.jpg" alt="Çift Kışilik Oda" />
      <div class="room-info">
        <h3>🏨 Aile Otel Tatili</h3>
        <p>Çocuklara özel kaydıraklı park, 3+ kişilik odalar!
            Kahvaltı, öğle ve akşam yemeği dahil harika menüler.
            1 hafta boyunca havuz, sauna ve ortak alan keyfi!Haftalık 7.999₺’den başlayan fiyatlarla!</p>
        <a href="rezervasyon.php" target="_blank" style="display: inline-block; background-color: #06d6a0; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Hemen Rezervasyon Yap
</a>

      </div>
    </div>
  </div>
</div>

<<footer style="background-color: #3c096c; color: white; padding: 40px 20px;">
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

</section>
</body>
</html>