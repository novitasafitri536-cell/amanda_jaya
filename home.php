<?php
// Data dummy untuk simulasi backend/database (bisa diganti koneksi database Anda)
$current_branch = "Gudang Utama Jakarta Barat";
$active_date = "Kamis, 24 Okt 2024";
$sales_today = "Rp 18.450.000";
$sales_growth = "+12.4%";
$incoming_orders_count = 28;
$new_orders_badge = "8 Baru";
$ready_stock_percentage = "98.2%";
$total_cartons = "1.420";

// Data SKU Restok Cepat
$restock_alerts = [
    ["name" => "Paseo Soft & Tessa Hand Towel", "desc" => "Di bawah batas aman."]
];

// Data Stok Fast-Moving
$inventory_items = [
    ["name" => "Paseo Elegant 250s (2-Ply)", "detail" => "Isi 48 pack / karton • Bay A-04", "badge" => "420 Karton", "width" => "78%", "color" => "bg-primary", "icon" => "dry_cleaning"],
    ["name" => "Nice Facial Tissue 900g", "detail" => "Isi 24 pack / karton • Bay B-01", "badge" => "510 Karton", "width" => "88%", "color" => "bg-primary", "icon" => "layers"],
    ["name" => "Jolly Kuliner 200s (Horeca)", "detail" => "Isi 60 pack / karton • Bay C-09", "badge" => "45 Karton", "width" => "18%", "color" => "bg-tertiary-container", "icon" => "restaurant", "warning" => true],
    ["name" => "Tessa Kitchen Towel Emboss", "detail" => "Isi 12 roll / bal • Bay D-02", "badge" => "280 Bal", "width" => "55%", "color" => "bg-primary", "icon" => "roller_shades"]
];

// Data Pesanan Terbaru
$recent_orders = [
    [
        "id" => "PO-2024-1082",
        "customer" => "Toko Berkah Mandiri",
        "status" => "Diproses",
        "status_bg" => "bg-secondary-container text-on-secondary-container",
        "dot_color" => "bg-primary",
        "items" => "65 Karton Tissue",
        "total" => "Rp 5.250.000",
        "fleet" => "Armada: Pickup L300 (Jkt Barat)",
        "action" => "Cetak Faktur"
    ],
    [
        "id" => "PO-2024-1081",
        "customer" => "Warung Kopi Senja Grup",
        "status" => "Siap Kirim",
        "status_bg" => "bg-primary-fixed text-on-primary-fixed",
        "dot_color" => "bg-primary",
        "items" => "25 Karton Kuliner",
        "total" => "Rp 2.150.000",
        "fleet" => "Jadwal: Sesi Siang (13.00 WIB)",
        "action" => "Surat Jalan"
    ],
    [
        "id" => "PO-2024-1079",
        "customer" => "Resto Sederhana Bintaro",
        "status" => "Selesai",
        "status_bg" => "bg-surface-container text-on-surface-variant",
        "dot_color" => "text-primary",
        "items" => "110 Karton Mix",
        "total" => "Rp 11.050.000",
        "fleet" => "Diterima: Bpk. Herman (Spv Gudang)",
        "action" => "Lihat Bukti"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <title>Amanda Tisu Jaya - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <style>
        @layer base {
            html, body { width: 100vw; margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
            .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
        }
        ::-webkit-scrollbar { display: none; }
        body { min-height: max(884px, 100dvh); }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#1b1c1a", "surface-container": "#efeeeb", "secondary-container": "#cee9da",
                        "on-secondary-container": "#52695e", "tertiary": "#823421", "inverse-primary": "#abcebe",
                        "secondary-fixed": "#cee9da", "surface": "#fbf9f6", "secondary-fixed-dim": "#b3ccbf",
                        "primary-fixed-dim": "#abcebe", "on-secondary-fixed-variant": "#354c41", "inverse-on-surface": "#f2f0ed",
                        "on-error": "#ffffff", "surface-tint": "#446557", "error-container": "#ffdad6",
                        "surface-container-highest": "#e4e2df", "tertiary-container": "#a04b36", "secondary": "#4c6358",
                        "tertiary-fixed": "#ffdad2", "primary-fixed": "#c6ebd9", "on-secondary-fixed": "#092017",
                        "on-secondary": "#ffffff", "on-primary-container": "#c6ead8", "surface-dim": "#dbdad7",
                        "outline-variant": "#c1c8c3", "on-tertiary-fixed-variant": "#7b2e1c", "tertiary-fixed-dim": "#ffb4a3",
                        "background": "#fbf9f6", "surface-variant": "#e4e2df", "on-tertiary-container": "#ffdad1",
                        "error": "#ba1a1a", "primary-container": "#4a6b5d", "on-primary-fixed": "#002116",
                        "outline": "#727974", "on-surface-variant": "#414844", "on-tertiary": "#ffffff",
                        "surface-container-lowest": "#ffffff", "surface-bright": "#fbf9f6", "on-primary": "#ffffff",
                        "primary": "#325346", "on-primary-fixed-variant": "#2d4d40", "surface-container-low": "#f5f3f0",
                        "on-error-container": "#93000a", "on-tertiary-fixed": "#3d0700", "on-background": "#1b1c1a",
                        "inverse-surface": "#30312f", "surface-container-high": "#eae8e5"
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-surface font-sans text-on-surface antialiased flex flex-col min-h-screen">

    <!-- Header -->
    <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
        <div class="max-w-7xl mx-auto h-16 px-4 md:px-8 flex items-center justify-between gap-2">
            <div class="flex items-center gap-3 min-w-0">
                <img alt="Amanda Tisu Jaya Logo" class="h-8 w-auto object-contain flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNC-5oZzCNpQJZUTQVdmZRoEXKpa8xwwdOpOM5Ds546i-uPWsVF7GtqHUJs3jfkXimphMJ95qSWqbheATZQwC_saDEJSS3yFx0JEWY_eGXiCnmLaC__8QsXWBFHXVt-952waRdhGRO3KcEA8tnRnNVA1GOMqdGCQfgnxUbP1gupMIMwl27YopA0yNSm_sr7N55gfVjFMI34vgSQLYXQTD5SZqtlAISoU_Vsd8PeVQKyZi4t4JstZ1X"/>
                <div class="flex flex-col min-w-0">
                    <span class="text-[10px] uppercase text-secondary tracking-wider truncate font-bold">Amanda Tisu Jaya</span>
                    <span class="text-[18px] font-semibold text-on-surface truncate">Dashboard</span>
                </div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <button aria-label="Search" class="w-11 h-11 flex items-center justify-center rounded-full text-on-surface-variant hover:bg-surface-container transition-colors" type="button">
                    <span class="material-symbols-outlined text-[22px]">search</span>
                </button>
                <button aria-label="Notifications" class="relative w-11 h-11 flex items-center justify-center rounded-full text-on-surface-variant hover:bg-surface-container transition-colors" type="button">
                    <span class="material-symbols-outlined text-[22px]">notifications</span>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 rounded-full bg-tertiary-container ring-2 ring-surface"></span>
                </button>
                <div class="pl-1">
                    <img alt="Profile" class="w-8 h-8 rounded-full object-cover ring-2 ring-secondary-container" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQ1M3VUcozFOmXiLVFKDRoFOb1A_mJUdF73qB_Xr4gxbbt_EF_YICm0J4pXfQgQWfCz5YEAOl-Dqh0oehMAsv1DHI4gzRT_gOsmJVqzCRxv1ANuetdjJSfFXIOSb6dUKSFAtciv7YQdaZirPodO6VtYxHfFA6-cgRBYTRjKfM5uNahKkbKLY8FKTp83rOtRsxb5cB6MZ-jQ_DNyDvoMLyi0ak5NlZclL4E9Bzm9oOoF8Mp9as3vCXP"/>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content (Responsive Grid Layout for Tablet/Desktop, Stack for Mobile) -->
    <main class="flex-1 flex flex-col relative w-full pt-20 pb-24 bg-surface max-w-7xl mx-auto px-4 md:px-8 gap-6">
        
        <!-- Top Section: Greeting & Branch Switcher -->
        <div class="relative overflow-hidden bg-surface-container rounded-2xl p-6 shadow-sm">
            <div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-secondary-container/40 pointer-events-none blur-xl"></div>
            <div class="relative z-10 flex flex-col gap-2">
                <div class="flex items-center justify-between gap-2">
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface text-secondary shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-[10px] uppercase tracking-wider font-bold">Agen Aktif</span>
                    </div>
                    <span class="text-xs text-on-surface-variant font-semibold"><?php echo $active_date; ?></span>
                </div>
                <div class="pt-1">
                    <p class="text-2xl md:text-3xl font-semibold text-on-surface">Selamat datang, Amanda</p>
                    <p class="text-sm text-on-surface-variant">Awali hari dengan pelayanan maksimal.</p>
                </div>
                <div class="pt-2">
                    <button class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-surface text-on-surface text-left shadow-sm active:scale-95 transition-transform" type="button">
                        <span class="material-symbols-outlined text-[18px] text-primary">warehouse</span>
                        <div class="flex flex-col">
                            <span class="text-[10px] text-on-surface-variant uppercase font-bold">Pusat Agen</span>
                            <span class="text-sm font-semibold text-primary"><?php echo $current_branch; ?></span>
                        </div>
                        <span class="material-symbols-outlined text-[18px] text-secondary ml-1">expand_more</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid (Responsive columns: 1 col on mobile, 2-4 cols on desktop) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Total Penjualan -->
            <div class="md:col-span-2 bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[18px]">payments</span>
                        </div>
                        <span class="text-xs font-semibold text-on-surface-variant">Penjualan Hari Ini</span>
                    </div>
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px] font-bold">
                        <span class="material-symbols-outlined text-[12px]">trending_up</span> <?php echo $sales_growth; ?>
                    </span>
                </div>
                <div class="mt-3 flex items-baseline justify-between">
                    <span class="text-2xl md:text-3xl font-bold text-on-surface"><?php echo $sales_today; ?></span>
                    <span class="text-xs text-on-surface-variant">vs kemarin</span>
                </div>
                <div class="mt-2 w-full h-8 pt-1">
                    <svg class="w-full h-full overflow-visible" preserveAspectRatio="none" viewBox="0 0 300 32">
                        <path class="text-primary" d="M0,24 Q 40,28 75,18 T 150,14 T 225,8 T 300,4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2.5"></path>
                        <path class="text-primary/10" d="M0,24 Q 40,28 75,18 T 150,14 T 225,8 T 300,4 L 300,32 L 0,32 Z" fill="currentColor"></path>
                    </svg>
                </div>
            </div>

            <!-- Pesanan Masuk -->
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-[18px]">inbox</span>
                    </div>
                    <span class="px-2 py-0.5 rounded-full bg-tertiary-container/15 text-tertiary text-[10px] font-bold"><?php echo $new_orders_badge; ?></span>
                </div>
                <div class="mt-3">
                    <span class="text-2xl font-bold text-on-surface block"><?php echo $incoming_orders_count; ?></span>
                    <span class="text-xs text-on-surface-variant">Pesanan Masuk</span>
                </div>
            </div>

            <!-- Stok Siap Kirim -->
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <div class="w-8 h-8 rounded-full bg-secondary-container/60 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[18px]">package_2</span>
                    </div>
                    <span class="text-xs text-on-secondary-container font-semibold"><?php echo $ready_stock_percentage; ?> Siap</span>
                </div>
                <div class="mt-3">
                    <span class="text-2xl font-bold text-on-surface block"><?php echo $total_cartons; ?></span>
                    <span class="text-xs text-on-surface-variant">Karton di Rak</span>
                </div>
            </div>

            <!-- Restock Alert Banner -->
            <div class="md:col-span-2 lg:col-span-4 bg-tertiary-container/10 p-4 rounded-xl flex items-center justify-between">
                <div class="flex items-center gap-3">
               

        <!-- Quick Wholesale Action Hub -->

             
        <!-- Content Split for Desktop (Inventory & Recent Orders) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- Real-time Inventory Snapshot -->
            <div class="flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-lg font-semibold text-on-surface block">Stok Fast-Moving</span>
                        <span class="text-xs text-on-surface-variant">Monitoring kapasitas ketersediaan palet</span>
                    </div>
                    <a class="text-xs font-semibold text-primary flex items-center gap-0.5 hover:underline" href="#">
                        Semua SKU <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    </a>
                </div>
                <div class="flex flex-col gap-3">
                    <?php foreach ($inventory_items as $item): ?>
                    <div class="bg-surface-container-lowest p-4 rounded-2xl shadow-sm flex flex-col gap-2">
                        <div class="flex items-start justify-between gap-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl <?php echo isset($item['warning']) ? 'bg-tertiary-container/15 text-tertiary' : 'bg-surface-container text-primary'; ?> flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-[22px]"><?php echo $item['icon']; ?></span>
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <span class="text-sm font-semibold text-on-surface truncate"><?php echo $item['name']; ?></span>
                                    <span class="text-xs text-on-surface-variant"><?php echo $item['detail']; ?></span>
                                </div>
                            </div>
                            <span class="px-2 py-0.5 rounded-full <?php echo isset($item['warning']) ? 'bg-tertiary-container/20 text-tertiary' : 'bg-secondary-container text-on-secondary-container'; ?> text-xs font-semibold whitespace-nowrap">
                                <?php echo $item['badge']; ?>
                            </span>
                        </div>
                        <div class="w-full bg-surface-container rounded-full h-1.5 overflow-hidden mt-1">
                            <div class="<?php echo $item['color']; ?> h-full rounded-full" style="width: <?php echo $item['width']; ?>;"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>



    </main>

    <!-- Bottom Navigation Bar -->
    <nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-2px_12px_rgba(61,74,65,0.06)]">
        <div class="max-w-7xl mx-auto h-16 px-4 flex items-center justify-around">
            <a aria-current="page" class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 transition-colors text-primary font-semibold text-xs" href="#">
                <span class="material-symbols-outlined text-[22px]">grid_view</span>
                <span>Dashboard</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="#">
                <span class="material-symbols-outlined text-[22px]">inventory_2</span>
                <span>Catalog</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="#">
                <span class="material-symbols-outlined text-[22px]">local_shipping</span>
                <span>Orders</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="#">
                <span class="material-symbols-outlined text-[22px]">receipt_long</span>
                <span>Receipts</span>
            </a>
        </div>
    </nav>

</body>
</html>