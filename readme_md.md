# 🧻 Amanda Tisu Jaya - Web Application

Aplikasi Web Manajemen Toko & Agen Grosir Tisu berbasis **Single File HTML** yang terintegrasi dengan Tailwind CSS, Material Symbols, dan Vanilla JavaScript (SPA - Single Page Application). 

Projek ini dirancang tanpa ketergantungan *backend server* (serverless) dan menggunakan `localStorage` untuk penyimpanan data lokal, sehingga dapat dijalankan secara langsung hanya dengan membuka berkas di peramban (browser).

---

## 🚀 Fitur Utama

- 🔐 **Autentikasi Agen (Login/Logout):** Simulasi sesi login pengguna sederhana berbasis `localStorage`.
- 📊 **Dashboard Ringkasan:** Menampilkan metrik utama seperti penjualan harian, pesanan masuk, dan total stok karton.
- 📦 **Katalog Produk (CRUD):** 
  - Pencarian produk secara *real-time*.
  - Penambahan produk baru melalui modal input.
  - Hapus produk dari daftar katalog.
- 🚚 **Manajemen Pesanan (Orders):** 
  - Form entri cepat untuk pesanan pelanggan.
  - Kartu daftar status pesanan (*Status Tracker*).
- 📄 **Cetak Nota & Struk PDF:** 
  - Tampilan struk belanja/nota pengiriman yang siap dicetak atau disimpan ke format PDF (*Print-optimized CSS*).
- 📱 **Desain Responsive & Mobile-First:** Tampilan yang disesuaikan untuk perangkat seluler maupun komputer (Desktop & Mobile).

---

## 🛠️ Teknologi yang Digunakan

* **HTML5:** Struktur dasar antarmuka pengguna.
* **Tailwind CSS (CDN):** Styling komponen dan desain responsif.
* **Vanilla JavaScript (ES6+):** Logika *routing* halaman (SPA), manajemen *state*, dan penanganan *event*.
* **Material Symbols / Google Fonts:** Ikonografi dan tipografi antarmuka.

---

## 💻 Cara Penggunaan

1. **Cloning Repositori:**
   ```bash
   git clone https://github.com/username/amanda-tisu-jaya.git
   ```

2. **Jalankan Aplikasi:**
   - Tidak memerlukan *web server* (seperti Apache/Nginx/Node.js).
   - Cukup buka file `index.html` menggunakan peramban web pilihan Anda (Chrome, Firefox, Edge, Safari).

3. **Uji Coba Fitur:**
   - **Login:** Masukkan Identitas Agen dan Kata Sandi sembarang untuk masuk ke aplikasi.
   - **Navigasi:** Gunakan bilah navigasi di bagian bawah (untuk seluler) atau menu header untuk berpindah halaman (Dashboard, Katalog, Orders, Nota PDF).

---

## 📂 Struktur Berkas

```text
├── index.html        # Berkas tunggal berisi HTML, Tailwind Config, CSS, dan JavaScript
└── README.md         # Dokumentasi proyek
```

---

## 📄 Lisensi

Proyek ini dibuat untuk tujuan demonstrasi dan dikembangkan di bawah lisensi MIT.