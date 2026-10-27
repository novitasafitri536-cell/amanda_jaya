<?php
// Konfigurasi Koneksi Database MySQL
$host = 'localhost';
$dbname = 'order_tisu';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("<div style='padding: 20px; font-family: sans-serif; color: #ba1a1a;'>Koneksi database gagal: " . htmlspecialchars($e->getMessage()) . "<br><small>Pastikan XAMPP/MySQL aktif dan database <b>order_tisu</b> sudah diimport dari orders.sql.</small></div>");
}

// Handle Form Submission (Simpan Pesanan Baru ke Database)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customer'])) {
    $customer = trim($_POST['customer']);
    $fleet = $_POST['fleet'] ?? 'Armada Truk #2 (Engkel)';
    $payment = $_POST['payment_terms'] ?? 'TOP 14 Hari';
    
    // Generate ID unik otomatis
    $id = 'ATJ-' . date('Y') . '-' . rand(1000, 9999);
    $type = 'Kontrak Horeca';
    $status = 'pending';
    $status_label = 'Sedang Dikemas';
    $cargo = 'Muatan: ' . $fleet;
    $items = 'Paseo Elegant 250s (20 Dus) • Nice Facial 900g (15 Dus)';
    $total = 8450000.00;

    $stmt = $pdo->prepare("INSERT INTO orders (id, customer, type, status, status_label, cargo, payment, items, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id, $customer, $type, $status, $status_label, $cargo, $payment, $items, $total]);
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Ambil Data Orders dari Database (Urutkan dari yang terbaru)
try {
    $stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
    $orders = $stmt->fetchAll();
} catch (PDOException $e) {
    $orders = [];
}

// Hitung Jumlah per Kategori
$count_all = count($orders);
$count_pending = count(array_filter($orders, fn($o) => $o['status'] === 'pending'));
$count_shipping = count(array_filter($orders, fn($o) => $o['status'] === 'shipping'));
$count_completed = count(array_filter($orders, fn($o) => $o['status'] === 'completed'));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <title>Kelola Faktur & Orders - Amanda Tisu Jaya</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#1b1c1a",
                        "surface-container": "#efeeeb",
                        "secondary-container": "#cee9da",
                        "on-secondary-container": "#52695e",
                        "tertiary": "#823421",
                        "surface": "#fbf9f6",
                        "primary-fixed-dim": "#abcebe",
                        "on-secondary-fixed-variant": "#354c41",
                        "tertiary-container": "#a04b36",
                        "secondary": "#4c6358",
                        "tertiary-fixed": "#ffdad2",
                        "primary-fixed": "#c6ebd9",
                        "on-primary-container": "#c6ead8",
                        "surface-dim": "#dbdad7",
                        "outline-variant": "#c1c8c3",
                        "surface-variant": "#e4e2df",
                        "error": "#ba1a1a",
                        "primary-container": "#4a6b5d",
                        "outline": "#727974",
                        "on-surface-variant": "#414844",
                        "surface-container-lowest": "#ffffff",
                        "on-primary": "#ffffff",
                        "primary": "#325346",
                        "on-primary-fixed-variant": "#2d4d40",
                        "surface-container-low": "#f5f3f0",
                        "inverse-surface": "#30312f",
                        "inverse-on-surface": "#f2f0ed",
                        "secondary-fixed": "#cee9da",
                        "on-secondary-fixed": "#092017"
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        };
    </script>
    <style>
        ::-webkit-scrollbar { display: none; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .modal-backdrop { transition: opacity 0.25s ease-in-out; }
        .modal-content { transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease-in-out; }
    </style>
</head>
<body class="bg-surface font-sans text-on-surface antialiased flex flex-col min-h-screen">

    <!-- Header Navigation Bar -->
    <header class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-xl border-b border-surface-container-high/60 shadow-sm">
        <div class="max-w-7xl mx-auto h-16 px-4 md:px-8 flex items-center justify-between gap-4">
            <div class="flex items-center gap-3 min-w-0">
                <img alt="Amanda Tisu Jaya Logo" class="h-8 w-auto object-contain flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNC-5oZzCNpQJZUTQVdmZRoEXKpa8xwwdOpOM5Ds546i-uPWsVF7GtqHUJs3jfkXimphMJ95qSWqbheATZQwC_saDEJSS3yFx0JEWY_eGXiCnmLaC__8QsXWBFHXVt-952waRdhGRO3KcEA8tnRnNVA1GOMqdGCQfgnxUbP1gupMIMwl27YopA0yNSm_sr7N55gfVjFMI34vgSQLYXQTD5SZqtlAISoU_Vsd8PeVQKyZi4t4JstZ1X"/>
                <div class="flex flex-col min-w-0">
                    <span class="text-xs uppercase text-secondary font-bold tracking-wider truncate">Amanda Tisu Jaya</span>
                    <span class="text-lg font-semibold text-on-surface truncate">Kelola Faktur & Orders</span>
                </div>
            </div>

            <!-- Header Actions -->
            <div class="flex items-center gap-2 flex-shrink-0">
                <button aria-label="Cari" class="w-10 h-10 flex items-center justify-center rounded-full text-on-surface-variant hover:bg-surface-container active:bg-surface-container-high transition-colors" type="button">
                    <span class="material-symbols-outlined text-[22px]">search</span>
                </button>
                <button aria-label="Notifikasi" class="relative w-10 h-10 flex items-center justify-center rounded-full text-on-surface-variant hover:bg-surface-container active:bg-surface-container-high transition-colors" type="button">
                    <span class="material-symbols-outlined text-[22px]">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-tertiary-container ring-2 ring-surface"></span>
                </button>
                <div class="pl-2 hidden sm:block">
                    <img alt="Profile" class="w-9 h-9 rounded-full object-cover ring-2 ring-secondary-container" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQ1M3VUcozFOmXiLVFKDRoFOb1A_mJUdF73qB_Xr4gxbbt_EF_YICm0J4pXfQgQWfCz5YEAOl-Dqh0oehMAsv1DHI4gzRT_gOsmJVqzCRxv1ANuetdjJSfFXIOSb6dUKSFAtciv7YQdaZirPodO6VtYxHfFA6-cgRBYTRjKfM5uNahKkbKLY8FKTp83rOtRsxb5cB6MZ-jQ_DNyDvoMLyi0ak5NlZclL4E9Bzm9oOoF8Mp9as3vCXP"/>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 md:px-8 pt-20 pb-24 md:pb-12">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

            <!-- Desktop Sidebar Navigation -->
            <aside class="hidden md:block md:col-span-3 space-y-2">
                <div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm space-y-1 border border-surface-container-low">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container transition-colors font-medium">
                        <span class="material-symbols-outlined">grid_view</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container transition-colors font-medium">
                        <span class="material-symbols-outlined">inventory_2</span>
                        <span>Katalog Produk</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary text-on-primary font-semibold shadow-sm">
                        <span class="material-symbols-outlined">local_shipping</span>
                        <span>Kelola Faktur</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container transition-colors font-medium">
                        <span class="material-symbols-outlined">receipt_long</span>
                        <span>Riwayat Struk</span>
                    </a>
                </div>
            </aside>

            <!-- Main Content Area -->
            <section class="col-span-1 md:col-span-9 space-y-5">
                
                <!-- Metric Banner -->
                <div class="w-full bg-secondary-container/60 rounded-xl p-4 md:p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-sm border border-secondary-container">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary flex-shrink-0">
                            <span class="material-symbols-outlined text-[20px]">local_shipping</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="text-xs text-on-secondary-fixed-variant uppercase font-bold tracking-wider">Distribusi Hari Ini (Database Connected)</span>
                            <span class="text-base md:text-lg font-semibold text-on-surface truncate"><?= $count_all ?> Total Pesanan Terdaftar</span>
                        </div>
                    </div>
                </div>

                <!-- Collapsible Fast Order Form -->
                <div class="w-full bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-low overflow-hidden transition-all">
                    <button class="w-full p-4 flex items-center justify-between text-left bg-surface-container-low hover:bg-surface-container transition-colors" id="toggleOrderEntryBtn" type="button">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-primary-fixed flex items-center justify-center text-primary flex-shrink-0">
                                <span class="material-symbols-outlined text-[20px]">add_task</span>
                            </div>
                            <div>
                                <span class="text-base font-semibold text-on-surface block">Entri Pesanan Cepat</span>
                                <span class="text-xs text-on-surface-variant">Simpan faktur distribusi baru langsung ke database</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 text-primary">
                            <span class="text-xs font-semibold bg-primary-fixed text-primary px-2.5 py-1 rounded-full" id="orderEntryBadge">Buka Form</span>
                            <span class="material-symbols-outlined transition-transform duration-300" id="orderEntryIcon">expand_more</span>
                        </div>
                    </button>

                    <!-- Form Content Area (Action to PHP) -->
                    <form method="POST" action="" class="hidden p-4 md:p-6 space-y-4 bg-surface-container-lowest border-t border-surface-container-low" id="orderEntryPanel">
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-on-surface-variant flex justify-between" for="customerInput">
                                <span>Pelanggan / Nama Toko</span>
                                <span class="text-primary font-bold">Database Horeca & Grosir</span>
                            </label>
                            <div class="relative">
                                <input class="w-full h-11 px-3.5 bg-surface rounded-xl text-on-surface text-sm border border-outline-variant/30 focus:outline-none focus:border-primary shadow-sm" id="customerInput" name="customer" placeholder="Ketik nama mitra (cth: CV Berkah, Hotel Grand...)" type="text" required/>
                                <span class="material-symbols-outlined absolute right-3 top-2.5 text-on-surface-variant pointer-events-none">storefront</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold text-on-surface-variant">Armada / Pengiriman</label>
                                <div class="relative">
                                    <select name="fleet" class="w-full h-11 px-3 bg-surface rounded-xl text-on-surface text-sm border border-outline-variant/30 focus:outline-none focus:border-primary appearance-none shadow-sm pr-8">
                                        <option selected>Armada Truk #2 (Engkel)</option>
                                        <option>Armada Pickup #1 (L300)</option>
                                        <option>Ambil Sendiri di Gudang</option>
                                        <option>Ekspedisi Kargo Luar Kota</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-2.5 top-3 text-[18px] text-on-surface-variant pointer-events-none">expand_more</span>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-semibold text-on-surface-variant">Metode & Termin</label>
                                <div class="relative">
                                    <select name="payment_terms" class="w-full h-11 px-3 bg-surface rounded-xl text-on-surface text-sm border border-outline-variant/30 focus:outline-none focus:border-primary appearance-none shadow-sm pr-8">
                                        <option selected>TOP 14 Hari (Jatuh Tempo)</option>
                                        <option>Tunai Saat Kirim (COD)</option>
                                        <option>Transfer Bank Lunas (BCA)</option>
                                        <option>TOP 30 Hari (Khusus Hotel)</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-2.5 top-3 text-[18px] text-on-surface-variant pointer-events-none">expand_more</span>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex items-center justify-between pt-3 border-t border-surface-container-low">
                            <span class="text-xs font-semibold text-secondary flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">verified</span> Terhubung ke `order_tisu`
                            </span>
                            <div class="flex items-center gap-2">
                                <button type="button" class="px-4 py-2 rounded-xl bg-surface text-secondary hover:bg-surface-container text-xs font-semibold transition-colors" id="cancelEntryBtn">Batal</button>
                                <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-on-primary hover:bg-on-primary-fixed-variant text-xs font-semibold flex items-center gap-1.5 shadow-sm transition-all">
                                    <span class="material-symbols-outlined text-[18px]">receipt</span>
                                    <span>Simpan ke Database</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Tabs & Search Area -->
                <div class="space-y-3">
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 no-scrollbar" role="tablist">
                        <button class="filter-tab active whitespace-nowrap px-4 py-2 rounded-full bg-primary text-on-primary text-xs font-semibold transition-all flex items-center gap-2 flex-shrink-0 shadow-sm" data-category="all">
                            <span>Semua Pesanan</span>
                            <span class="bg-surface/25 text-on-primary px-2 py-0.5 rounded-full text-[10px]"><?= $count_all ?></span>
                        </button>
                        <button class="filter-tab whitespace-nowrap px-4 py-2 rounded-full bg-surface-container text-on-surface-variant hover:bg-surface-container-high text-xs font-semibold transition-all flex items-center gap-2 flex-shrink-0" data-category="pending">
                            <span>Menunggu Konfirmasi</span>
                            <span class="bg-tertiary-fixed text-tertiary px-2 py-0.5 rounded-full text-[10px] font-bold"><?= $count_pending ?></span>
                        </button>
                        <button class="filter-tab whitespace-nowrap px-4 py-2 rounded-full bg-surface-container text-on-surface-variant hover:bg-surface-container-high text-xs font-semibold transition-all flex items-center gap-2 flex-shrink-0" data-category="shipping">
                            <span>Sedang Dikirim</span>
                            <span class="bg-secondary-fixed text-on-secondary-fixed px-2 py-0.5 rounded-full text-[10px]"><?= $count_shipping ?></span>
                        </button>
                        <button class="filter-tab whitespace-nowrap px-4 py-2 rounded-full bg-surface-container text-on-surface-variant hover:bg-surface-container-high text-xs font-semibold transition-all flex items-center gap-2 flex-shrink-0" data-category="completed">
                            <span>Selesai</span>
                            <span class="bg-surface-variant text-on-surface-variant px-2 py-0.5 rounded-full text-[10px]"><?= $count_completed ?></span>
                        </button>
                    </div>

                    <div class="relative w-full">
                        <span class="material-symbols-outlined absolute left-3.5 top-2.5 text-on-surface-variant text-[20px] pointer-events-none">search</span>
                        <input class="w-full h-11 pl-10 pr-10 bg-surface-container-lowest border border-outline-variant/30 rounded-xl text-on-surface text-sm placeholder-outline focus:outline-none focus:border-primary shadow-sm" id="searchInput" placeholder="Cari Pelanggan, No. Faktur (ATJ-...), atau Agen..." type="text"/>
                        <button aria-label="Hapus Pencarian" class="hidden absolute right-3 top-2.5 text-on-surface-variant hover:text-on-surface" id="clearSearchBtn" type="button">
                            <span class="material-symbols-outlined text-[20px]">close</span>
                        </button>
                    </div>
                </div>

                <!-- PHP Dynamic Orders Grid Container -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4" id="orderListContainer">
                    <?php if (empty($orders)): ?>
                        <div class="col-span-full flex flex-col items-center justify-center p-8 bg-surface-container-lowest rounded-xl text-center space-y-2 border border-surface-container-low">
                            <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-outline">
                                <span class="material-symbols-outlined text-[28px]">database</span>
                            </div>
                            <p class="font-semibold text-base text-on-surface">Belum Ada Data Pesanan</p>
                            <p class="text-xs text-on-surface-variant max-w-xs">Pastikan tabel `orders` sudah terisi dengan mengimport file `orders.sql`.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($orders as $order): ?>
                            <article class="order-card w-full bg-surface-container-lowest rounded-xl p-4 shadow-sm border border-surface-container-low space-y-3 transition-transform hover:-translate-y-0.5 duration-200 flex flex-col justify-between" 
                                     data-customer="<?= htmlspecialchars($order['customer']) ?>" 
                                     data-invoice="<?= htmlspecialchars($order['id']) ?>" 
                                     data-status="<?= htmlspecialchars($order['status']) ?>">
                                
                                <div>
                                    <div class="flex items-start justify-between gap-2 mb-3">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <div class="w-9 h-9 rounded-lg bg-secondary-fixed flex items-center justify-center text-primary flex-shrink-0">
                                                <span class="material-symbols-outlined text-[20px]">store</span>
                                            </div>
                                            <div class="min-w-0">
                                                <span class="font-semibold text-sm md:text-base text-on-surface block truncate"><?= htmlspecialchars($order['customer']) ?></span>
                                                <span class="text-xs text-on-surface-variant tracking-wider">#<?= htmlspecialchars($order['id']) ?> • <?= htmlspecialchars($order['type']) ?></span>
                                            </div>
                                        </div>
                                        <span class="px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-fixed text-xs font-semibold whitespace-nowrap flex items-center gap-1.5 flex-shrink-0">
                                            <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                            <span><?= htmlspecialchars($order['status_label']) ?></span>
                                        </span>
                                    </div>

                                    <div class="bg-surface-container-low rounded-lg p-3 space-y-1 text-xs">
                                        <div class="flex items-center justify-between text-on-surface font-semibold mb-1">
                                            <span class="text-secondary"><?= htmlspecialchars($order['cargo']) ?></span>
                                            <span class="bg-surface-container px-2 py-0.5 rounded text-on-surface-variant"><?= htmlspecialchars($order['payment']) ?></span>
                                        </div>
                                        <p class="text-on-surface-variant line-clamp-2">
                                            <?= htmlspecialchars($order['items']) ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-2 border-t border-surface-container-low">
                                    <div>
                                        <span class="text-[10px] text-outline uppercase block font-semibold">Total Faktur</span>
                                        <span class="text-base font-bold text-primary">Rp <?= number_format($order['total'], 0, ',', '.') ?></span>
                                    </div>
                                    <button class="px-3.5 py-2 rounded-xl bg-primary text-on-primary hover:bg-on-primary-fixed-variant text-xs font-semibold flex items-center gap-1.5 shadow-sm transition-transform active:scale-95" onclick="showReceiptModal('<?= htmlspecialchars($order['id']) ?>')" type="button">
                                        <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                                        <span>Lihat & Cetak</span>
                                    </button>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Empty State -->
                <div class="hidden flex-col items-center justify-center p-8 bg-surface-container-lowest rounded-xl text-center space-y-2 border border-surface-container-low" id="noResultsState">
                    <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-outline">
                        <span class="material-symbols-outlined text-[28px]">search_off</span>
                    </div>
                    <p class="font-semibold text-base text-on-surface">Pesanan Tidak Ditemukan</p>
                    <p class="text-xs text-on-surface-variant max-w-xs">Pastikan nomor faktur atau nama pelanggan sudah benar.</p>
                </div>

            </section>
        </div>
    </main>

    <!-- MODAL INTERAKTIF: Lihat & Cetak Faktur -->
    <div id="receiptModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none modal-backdrop bg-on-surface/40 backdrop-blur-sm">
        <div class="bg-surface-container-lowest w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col modal-content transform scale-95 border border-surface-container-low max-h-[90vh]">
            <div class="px-6 py-4 bg-surface-container-low border-b border-surface-container flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                    <h3 class="text-[16px] font-bold text-on-surface" id="modalInvoiceTitle">Faktur Pesanan</h3>
                </div>
                <button type="button" onclick="closeReceiptModal()" class="w-8 h-8 rounded-full flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container active:scale-95 transition-all">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <div class="p-6 overflow-y-auto flex flex-col gap-4 text-sm space-y-1">
                <div class="text-center pb-3 border-b border-dashed border-outline-variant/40">
                    <h4 class="font-bold text-base text-on-surface">AMANDA TISU JAYA</h4>
                    <p class="text-xs text-on-surface-variant">Pusat Distribusi Tisu Grosir & Horeca</p>
                    <p class="text-[11px] text-outline mt-1" id="modalInvoiceIdDate">No: ATJ-0000</p>
                </div>

                <div class="space-y-2 text-xs bg-surface-container-low/50 p-3.5 rounded-xl">
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Pelanggan:</span>
                        <span class="font-semibold text-on-surface" id="modalCustomerName">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Jenis Mitra:</span>
                        <span class="font-medium text-on-surface" id="modalCustomerType">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Status Pesanan:</span>
                        <span class="font-semibold text-primary" id="modalStatusLabel">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Muatan / Armada:</span>
                        <span class="font-medium text-on-surface" id="modalCargo">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Termin Pembayaran:</span>
                        <span class="font-medium text-on-surface" id="modalPayment">-</span>
                    </div>
                </div>

                <div class="py-1">
                    <span class="text-[11px] uppercase font-bold text-secondary tracking-wider block mb-1">Rincian Item Produk Tisu:</span>
                    <div class="text-xs text-on-surface font-medium bg-surface-container-low p-3 rounded-xl leading-relaxed" id="modalItems">
                        -
                    </div>
                </div>

                <div class="flex justify-between items-center pt-3 border-t border-surface-container-low">
                    <span class="font-bold text-on-surface text-sm">Total Tagihan:</span>
                    <span class="text-lg font-bold text-primary" id="modalTotal">Rp 0</span>
                </div>
            </div>

            <div class="px-6 py-4 bg-surface-container-low border-t border-surface-container flex items-center justify-end gap-2">
                <button type="button" onclick="closeReceiptModal()" class="px-4 py-2.5 rounded-xl bg-surface-container text-on-surface-variant text-xs font-semibold hover:bg-surface-container-high transition-all">Tutup</button>
                <button type="button" onclick="printReceipt()" class="px-5 py-2.5 rounded-xl bg-primary text-on-primary text-xs font-bold hover:opacity-95 active:scale-95 transition-all shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[18px]">print</span>
                    <span>Cetak Nota</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Floating Action Button for Mobile -->
    <div class="fixed bottom-20 right-4 md:bottom-8 md:right-8 z-40">
        <button class="flex items-center gap-2 px-4 py-3 bg-primary text-on-primary rounded-full shadow-lg hover:bg-on-primary-fixed-variant active:scale-95 transition-all" id="floatingCreateOrderBtn" type="button">
            <span class="material-symbols-outlined text-[22px]">add_circle</span>
            <span class="text-sm font-semibold tracking-wide">+ Buat Pesanan</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div class="fixed top-20 left-4 right-4 md:left-auto md:right-8 md:w-96 z-50 transform -translate-y-24 opacity-0 transition-all duration-300 pointer-events-none" id="toastNotification">
        <div class="bg-inverse-surface text-inverse-on-surface p-3.5 rounded-xl shadow-xl flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="material-symbols-outlined text-secondary-fixed text-[22px]">print</span>
                <span class="text-xs font-medium" id="toastMessage">Nota siap diproses dan dikirim ke printer thermal.</span>
            </div>
            <button class="text-inverse-on-surface/80 hover:text-inverse-on-surface" onclick="hideToast()" type="button">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </button>
        </div>
    </div>

    <!-- Mobile Bottom Navigation Bar -->
    <nav class="md:hidden fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl border-t border-surface-container-high">
        <div class="h-16 flex items-center justify-around">
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors" href="#">
                <span class="material-symbols-outlined text-[22px]">grid_view</span>
                <span class="text-[10px] font-medium">Dashboard</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors" href="#">
                <span class="material-symbols-outlined text-[22px]">inventory_2</span>
                <span class="text-[10px] font-medium">Katalog</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-primary font-semibold" href="#">
                <span class="material-symbols-outlined text-[22px]">local_shipping</span>
                <span class="text-[10px] font-semibold">Orders</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors" href="#">
                <span class="material-symbols-outlined text-[22px]">receipt_long</span>
                <span class="text-[10px] font-medium">Receipts</span>
            </a>
        </div>
    </nav>

    <!-- Dynamic Interactivity Script -->
    <script>
        // Data pesanan di-pass dari database MySQL melalui PHP ke JS untuk modal preview
        const ordersData = <?= json_encode($orders); ?>;
        const receiptModal = document.getElementById('receiptModal');

        function showReceiptModal(orderId) {
            const order = ordersData.find(o => o.id === orderId);
            if (!order) return;

            document.getElementById('modalInvoiceTitle').textContent = `Faktur #${order.id}`;
            document.getElementById('modalInvoiceIdDate').textContent = `No: ${order.id} • ${new Date().toLocaleDateString('id-ID', { dateStyle: 'full' })}`;
            document.getElementById('modalCustomerName').textContent = order.customer;
            document.getElementById('modalCustomerType').textContent = order.type;
            document.getElementById('modalStatusLabel').textContent = order.status_label;
            document.getElementById('modalCargo').textContent = order.cargo;
            document.getElementById('modalPayment').textContent = order.payment;
            document.getElementById('modalItems').textContent = order.items;
            document.getElementById('modalTotal').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(order.total);

            receiptModal.classList.remove('opacity-0', 'pointer-events-none');
            receiptModal.querySelector('.modal-content').classList.remove('scale-95');
            receiptModal.querySelector('.modal-content').classList.add('scale-100');
        }

        function closeReceiptModal() {
            receiptModal.classList.add('opacity-0', 'pointer-events-none');
            receiptModal.querySelector('.modal-content').classList.remove('scale-100');
            receiptModal.querySelector('.modal-content').classList.add('scale-95');
        }

        function printReceipt() {
            showToast('Menghubungkan ke printer thermal & mencetak faktur...');
            setTimeout(() => {
                closeReceiptModal();
                showToast('Faktur berhasil dicetak!');
            }, 1200);
        }

        const toggleBtn = document.getElementById('toggleOrderEntryBtn');
        const cancelBtn = document.getElementById('cancelEntryBtn');
        const panel = document.getElementById('orderEntryPanel');
        const badge = document.getElementById('orderEntryBadge');
        const icon = document.getElementById('orderEntryIcon');
        const floatingBtn = document.getElementById('floatingCreateOrderBtn');

        function toggleDrawer(forceOpen = null) {
            const isCurrentlyOpen = !panel.classList.contains('hidden');
            const shouldOpen = forceOpen !== null ? forceOpen : !isCurrentlyOpen;

            if (shouldOpen) {
                panel.classList.remove('hidden');
                badge.textContent = 'Tutup Form';
                badge.classList.remove('bg-primary-fixed', 'text-primary');
                badge.classList.add('bg-surface-container-high', 'text-on-surface-variant');
                icon.classList.add('rotate-180');
                document.getElementById('customerInput').focus();
            } else {
                panel.classList.add('hidden');
                badge.textContent = 'Buka Form';
                badge.classList.add('bg-primary-fixed', 'text-primary');
                badge.classList.remove('bg-surface-container-high', 'text-on-surface-variant');
                icon.classList.remove('rotate-180');
            }
        }

        toggleBtn?.addEventListener('click', () => toggleDrawer());
        cancelBtn?.addEventListener('click', () => toggleDrawer(false));
        floatingBtn?.addEventListener('click', () => {
            toggleDrawer(true);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Live Search Filter
        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('clearSearchBtn');
        const filterTabs = document.querySelectorAll('.filter-tab');
        const cards = document.querySelectorAll('.order-card');
        const noResults = document.getElementById('noResultsState');

        let activeTabFilter = 'all';

        function filterCards() {
            const query = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(card => {
                const invoice = card.getAttribute('data-invoice').toLowerCase();
                const customer = card.getAttribute('data-customer').toLowerCase();
                const status = card.getAttribute('data-status');

                const matchesSearch = invoice.includes(query) || customer.includes(query);
                const matchesTab = activeTabFilter === 'all' || status === activeTabFilter;

                if (matchesSearch && matchesTab) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (visibleCount === 0 && cards.length > 0) {
                noResults.classList.remove('hidden');
                noResults.classList.add('flex');
            } else {
                noResults.classList.add('hidden');
                noResults.classList.remove('flex');
            }

            if (query.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }
        }

        searchInput?.addEventListener('input', filterCards);

        clearBtn?.addEventListener('click', () => {
            searchInput.value = '';
            filterCards();
            searchInput.focus();
        });

        filterTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                filterTabs.forEach(t => {
                    t.classList.remove('active', 'bg-primary', 'text-on-primary', 'shadow-sm');
                    t.classList.add('bg-surface-container', 'text-on-surface-variant');
                });

                tab.classList.add('active', 'bg-primary', 'text-on-primary', 'shadow-sm');
                tab.classList.remove('bg-surface-container', 'text-on-surface-variant');

                activeTabFilter = tab.getAttribute('data-category');
                filterCards();
            });
        });

        // Toast Functions
        let toastTimer;
        function showToast(msg) {
            const toast = document.getElementById('toastNotification');
            const toastMsg = document.getElementById('toastMessage');
            toastMsg.textContent = msg;
            toast.classList.remove('-translate-y-24', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100');

            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => {
                hideToast();
            }, 3200);
        }

        function hideToast() {
            const toast = document.getElementById('toastNotification');
            toast.classList.add('-translate-y-24', 'opacity-0', 'pointer-events-none');
            toast.classList.remove('translate-y-0', 'opacity-100');
        }
    </script>
</body>
</html>