CREATE DATABASE IF NOT EXISTS otel;
USE otel;

CREATE TABLE IF NOT EXISTS rezervasyonlar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adsoyad VARCHAR(100),
    email VARCHAR(100),
    telefon VARCHAR(20),
    giris_tarih DATE,
    cikis_tarih DATE,
    oda_tipi VARCHAR(50)
);
