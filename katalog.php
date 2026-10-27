<?php
// Initialisierung von Produktdaten (Simulierte Session/Array-Datenbasis)
session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        [
            'id' => 1,
            'name' => 'See-U Jumbo Roll',
            'brand' => 'See-U',
            'specs' => '1 Roll isi 256 m x 2 PLY , 1 Dus isi 16 Roll',
            'type' => 'Napkin/Kuliner',
            'bay' => 'A-12',
            'stock' => 60,
            'stock_max' => 150,
            'price' => 325.000,
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCggdT4qfFg_or39DhxghbDWM_s6DZRgHrpQreu5tIdQbaJGypCKuSJ09SvXlCSiWcUSD01g6UuPxd-iyyQt1oqYkk4_6tqssVNVKbhUtWa1gqXaliJdW7GQ864Mb-8BoDXUDkvD1vVBWoXRthAQXeAlIA61izUNSfMedc2wIw1a3-6YY7cNDh7jqmvJI2uGx2YgeZb32TfDukHEGeuq2nRVCXuyzRSn7yU5FBeA4Y_N7F4koK_Y-kX'
        ],
        [
            'id' => 2,
            'name' => 'Nice Facial Tissue 900g',
            'brand' => 'Nice',
            'specs' => 'Dus / 12 Bag (Jumbo 900g)',
            'type' => 'Facial Tissue',
            'bay' => 'B-04',
            'stock' => 15,
            'stock_max' => 150,
            'price' => 230000,
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBDepoG_QPW7MCzLQVCM_Q_PlPPPeB_jsSu1RRNxhPuAzeW_VS5JWJKKWmh8hMdjjs5ji4goaKxX0C8chwLYMtLbMBgofPXd_ab-2ikK3PACLIoN3Pe2W3wvHEriHz82sO0RmlzHhTTShkz84a2QmGRjMR4zkKiLnp0FlfgfY8hdUMNQso3lGFlIBKUTFlxtklimltvR9ALWlklKHpJqPQ4BL48yadmdfkLz6GHJFasEanyb_BLQkdw'
        ],
        [
            'id' => 3,
            'name' => 'Jolly Kuliner 200s',
            'brand' => 'Jolly',
            'specs' => 'Dus / 60 Pax (Horeca Favorit)',
            'type' => 'Napkin / Kuliner',
            'bay' => 'A-08',
            'stock' => 510,
            'stock_max' => 600,
            'price' => 195000,
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRx3IgA3E9xxqExTI4qnvc0FUOnvqwObxDYlViK1sSqJl_GsLO5L_q8Dy8edg8ic0HKEvQ0V_7hCOS3nxbIBL3RiQURxbYpMEcdY98wqYv1in13291hiKCmGXboWRVbwoxKsM2jggZBx0hkUomrty074CCJA0uDs0RFevKyc_nNV959Z4aGii8f-VYH5_nu60_HFKkclIr0JsWMXQGx4AESG4yAtL2RUnQanyFjvN78ByzqMcNmjuZ'
        ],
        [
            'id' => 4,
            'name' => 'Tessa Nature Kitchen Towel',
            'brand' => 'Tessa',
            'specs' => 'Dus / 24 Roll (Eco Kraft)',
            'type' => 'Kitchen Towel',
            'bay' => 'C-02',
            'stock' => 180,
            'stock_max' => 250,
            'price' => 310000,
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDveSGGCXlAwqANSu-wMrbjQBM2W-G15HPE1lw8RRwOnZFTw8Ya4WdRTh8Gys5AELiOSnJfoGEVDYX_SBcm7HdzOIipRezOqlnuZesDOzu_G67VKWPx-7PSUsOwCSNnfkuMVqXJgh32RwO-bz48bE9cQTuipiX12K-sLLpgCdSDimILqnstWKYohKullN7xMKqemOsDN3ux6OfeoUnWQgOZGruhCA9jJd_lB8ZkTnvaxGzeBKN0-mbL'
        ],
        [
            'id' => 5,
            'name' => 'See-U Hand Towel Eco',
            'brand' => 'See-U',
            'specs' => 'Dus / 20 Pack (Pre-Order)',
            'type' => 'Hand Towel',
            'bay' => 'D-01',
            'stock' => 0,
            'stock_max' => 100,
            'price' => 175000,
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCTWvEIOe5FKPkGr7Onw1oiXnwCL7ohKh_S6fyyofDEUW_jqs2LnLdcrHkRaMFUhUJZ31KonT6cz-PL-qLqeJxDPz9ZoG8sYiZFqAn8KcL-7ksxCQVpUrffBPjyaoLtLcCeTqL8PlWUEM-LrTy3u3Nlb78l7wIg_RZcQQYGfBIMkkC7tbtxhfoi3K4dFYoFaOm9MOGgTkhG5DfPD8sjfcsm4WvafXxkoCRvtmINsTlDLbN1lY1r4kxK'
        ],
        [
            'id' => 6,
            'name' => 'Multi Facial 1000g',
            'brand' => 'Multi',
            'specs' => 'Dus / 8 Bag (Keluarga 1kg)',
            'type' => 'Facial Tissue',
            'bay' => 'B-11',
            'stock' => 95,
            'stock_max' => 150,
            'price' => 260000,
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA0Q4RMpDYpUBtQ7Is0LFkCYxmfAIZxiFFq02Su16P2GPuDPZAeASmqkNAu1e9VAGKx_RuJTL74aQ6oiA9XCNKDSSRLZK0Ro-NItbuDb-8fUJqvVFJ667eMATINK9Q1dT2eEfwuBUi4LhhSoFHS26pFaS-o7ZEwkw5I3SOx1okf7HYRNfUjK6525eCqb_RCuPYuzPW3DfaUlbrSN1j4jd1opgvFeDDyBouliamL9y1ek8U8jnM0nqBU'
        ]
    ];
}

$storeInfo = [
    'name' => 'Amanda Tisu Jaya',
    'warehouse' => 'Gudang Pusat Cengkareng',
    'rack_total' => 4400
];

$categories = [
    ['id' => 'all', 'name' => 'Semua Produk'],
    ['id' => 'Facial Tissue', 'name' => 'Facial Tissue'],
    ['id' => 'Toilet Roll', 'name' => 'Toilet Roll'],
    ['id' => 'Kitchen Towel', 'name' => 'Kitchen Towel'],
    ['id' => 'Napkin / Kuliner', 'name' => 'Napkin / Kuliner'],
    ['id' => 'Hand Towel', 'name' => 'Hand Towel']
];

$toastMessage = '';
$toastType = 'success';

// Backend Form-Verarbeitung (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save') {
        $id = $_POST['id'] ?? '';
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'brand' => trim($_POST['brand'] ?? ''),
            'type' => $_POST['type'] ?? 'Facial Tissue',
            'specs' => trim($_POST['specs'] ?? ''),
            'bay' => trim($_POST['bay'] ?? ''),
            'stock' => (int)($_POST['stock'] ?? 0),
            'stock_max' => (int)($_POST['stock_max'] ?? 100),
            'price' => (int)($_POST['price'] ?? 0),
            'image' => trim($_POST['image'] ?? '')
        ];

        if (!empty($id)) {
            // Update Produkt
            foreach ($_SESSION['products'] as &$p) {
                if ($p['id'] == $id) {
                    $p = array_merge($p, $data);
                    break;
                }
            }
            $toastMessage = 'Produk berhasil diperbarui!';
        } else {
            // Neues Produkt hinzufügen
            $newId = count($_SESSION['products']) > 0 ? max(array_column($_SESSION['products'], 'id')) + 1 : 1;
            $data['id'] = $newId;
            array_unshift($_SESSION['products'], $data);
            $toastMessage = 'Produk baru berhasil ditambahkan!';
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'] ?? '';
        $_SESSION['products'] = array_values(array_filter($_SESSION['products'], function($p) use ($id) {
            return $p['id'] != $id;
        }));
        $toastMessage = 'Produk berhasil dihapus!';
        $toastType = 'delete';
    }
}

// Such- und Filtervariablen für die Ansicht
$searchQuery = strtolower(trim($_GET['search'] ?? ''));
$activeCategory = $_GET['category'] ?? 'all';

$filteredProducts = array_filter($_SESSION['products'], function($p) use ($searchQuery, $activeCategory) {
    $matchCategory = ($activeCategory === 'all') || ($p['type'] === $activeCategory);
    $matchSearch = empty($searchQuery) || (
        strpos(strtolower($p['name']), $searchQuery) !== false ||
        strpos(strtolower($p['brand']), $searchQuery) !== false ||
        strpos(strtolower($p['bay']), $searchQuery) !== false ||
        strpos(strtolower($p['type']), $searchQuery) !== false
    );
    return $matchCategory && $matchSearch;
});

$totalStockAll = array_sum(array_column($_SESSION['products'], 'stock'));
$capacityPercent = min(round(($totalStockAll / $storeInfo['rack_total']) * 100), 100);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <title>Katalog & Manajemen Produk - <?php echo htmlspecialchars($storeInfo['name']); ?></title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>

    <!-- Tailwind CSS CDN -->
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
                    },
                    fontFamily: { "body-md": ["Plus Jakarta Sans", "sans-serif"] }
                }
            }
        };
    </script>
    <style>
        @layer base {
            html, body { width: 100vw; margin: 0; padding: 0; }
            body { overscroll-behavior: none; min-height: 100vh; }
            .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
            .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
        }
        ::-webkit-scrollbar { display: none; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .modal-backdrop { transition: opacity 0.25s ease-in-out; }
        .modal-content { transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease-in-out; }
        .toast-enter { animation: slideInUp 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        @keyframes slideInUp {
            from { transform: translateY(100%) scale(0.9); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface antialiased flex flex-col min-h-screen">

    <!-- Header Navigation -->
    <header class="fixed top-0 w-full z-40 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
        <div class="h-16 px-4 sm:px-8 max-w-7xl mx-auto flex items-center justify-between gap-4">
            <div class="flex items-center gap-3 min-w-0">
                <img alt="Logo Store" class="h-8 w-auto object-contain flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNC-5oZzCNpQJZUTQVdmZRoEXKpa8xwwdOpOM5Ds546i-uPWsVF7GtqHUJs3jfkXimphMJ95qSWqbheATZQwC_saDEJSS3yFx0JEWY_eGXiCnmLaC__8QsXWBFHXVt-952waRdhGRO3KcEA8tnRnNVA1GOMqdGCQfgnxUbP1gupMIMwl27YopA0yNSm_sr7N55gfVjFMI34vgSQLYXQTD5SZqtlAISoU_Vsd8PeVQKyZi4t4JstZ1X"/>
                <div class="flex flex-col min-w-0">
                    <span class="text-[10px] uppercase text-secondary tracking-wider font-bold truncate"><?php echo htmlspecialchars($storeInfo['name']); ?></span>
                    <span class="text-[18px] font-semibold text-on-surface truncate">Katalog & Manajemen Produk</span>
                </div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <button aria-label="Notifikasi" class="relative w-10 h-10 flex items-center justify-center rounded-full text-on-surface-variant hover:bg-surface-container transition-colors" type="button">
                    <span class="material-symbols-outlined text-[22px]">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-tertiary-container ring-2 ring-surface"></span>
                </button>
                <div class="pl-1">
                    <img alt="Profil Admin" class="w-8 h-8 rounded-full object-cover ring-2 ring-secondary-container" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQ1M3VUcozFOmXiLVFKDRoFOb1A_mJUdF73qB_Xr4gxbbt_EF_YICm0J4pXfQgQWfCz5YEAOl-Dqh0oehMAsv1DHI4gzRT_gOsmJVqzCRxv1ANuetdjJSfFXIOSb6dUKSFAtciv7YQdaZirPodO6VtYxHfFA6-cgRBYTRjKfM5uNahKkbKLY8FKTp83rOtRsxb5cB6MZ-jQ_DNyDvoMLyi0ak5NlZclL4E9Bzm9oOoF8Mp9as3vCXP"/>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Container Layout -->
    <main class="flex-1 flex flex-col relative w-full pt-16 pb-28 bg-surface">
        <div class="flex flex-col w-full max-w-7xl mx-auto px-4 sm:px-8 pt-4 pb-24 gap-4">
            
            <!-- Gudang & Status Live Sync Banner -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between bg-surface-container-low px-4 py-3 rounded-2xl shadow-sm gap-2">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-9 h-9 rounded-full bg-secondary-container flex items-center justify-center text-primary flex-shrink-0">
                        <span class="material-symbols-outlined text-[20px]">warehouse</span>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="text-[10px] text-secondary uppercase font-bold tracking-wider">Lokasi Inventaris</span>
                        <button class="flex items-center gap-1 text-left text-[14px] font-semibold text-on-surface hover:text-primary transition-colors" type="button">
                            <span class="truncate"><?php echo htmlspecialchars($storeInfo['warehouse']); ?></span>
                            <span class="material-symbols-outlined text-[18px] text-outline">expand_more</span>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between sm:justify-end gap-2">
                    <div class="flex items-center gap-1.5 px-3 py-1 bg-surface-container-lowest rounded-full shadow-sm flex-shrink-0">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        <span class="text-[11px] text-on-surface-variant font-medium">PHP Server Active</span>
                    </div>
                </div>
            </div>

            <!-- Pencarian & Tombol Tambah Produk -->
            <form method="GET" action="" class="flex flex-col sm:flex-row items-center gap-2">
                <input type="hidden" name="category" value="<?php echo htmlspecialchars($activeCategory); ?>">
                <div class="relative flex-1 w-full">
                    <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px] text-outline">search</span>
                    <input name="search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" class="w-full h-11 pl-10 pr-10 bg-surface-container-lowest rounded-xl text-[14px] text-on-surface placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary/20 shadow-sm transition-all" placeholder="Cari SKU, merek, rak, atau tipe tisu..." type="search"/>
                    <?php if (!empty($searchQuery)): ?>
                        <a href="?category=<?php echo urlencode($activeCategory); ?>" class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface">
                            <span class="material-symbols-outlined text-[18px]">close</span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    
                    <button type="button" onclick="openAddModal()" class="flex-1 sm:flex-none h-11 px-4 rounded-xl bg-primary text-on-primary text-[13px] font-bold flex items-center justify-center gap-2 shadow-sm hover:opacity-95 active:scale-95 transition-all">
                        <span class="material-symbols-outlined text-[18px]">add</span>
                        <span>Tambah Produk</span>
                    </button>
                </div>
            </form>

            <!-- Filter Kategori Interactive Chips -->
            <div class="flex items-center gap-2 overflow-x-auto pb-1 -mx-4 px-4 sm:mx-0 sm:px-0 no-scrollbar">
                <?php foreach ($categories as $cat): ?>
                    <?php $isActive = ($activeCategory === $cat['id']); ?>
                    <a href="?category=<?php echo urlencode($cat['id']); ?>&search=<?php echo urlencode($searchQuery); ?>" class="px-4 py-2 rounded-full text-[12px] font-semibold flex-shrink-0 shadow-sm transition-all active:scale-95 <?php echo $isActive ? 'bg-primary text-on-primary' : 'bg-surface-container-lowest text-on-surface-variant hover:text-on-surface'; ?>">
                        <?php echo htmlspecialchars($cat['name']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Tabel Daftar Produk -->
            <div class="bg-surface-container-lowest rounded-2xl shadow-sm border border-surface-container-low overflow-hidden flex flex-col mt-2">
                <div class="hidden md:grid grid-cols-12 gap-4 p-4 border-b border-surface-container-low bg-surface-container-low text-[12px] font-bold text-on-surface-variant uppercase tracking-wider">
                    <div class="col-span-5">Produk & Rak</div>
                    <div class="col-span-2">Tipe</div>
                    <div class="col-span-2 text-right">Harga (Dus)</div>
                    <div class="col-span-2 text-center">Stok & Kapasitas</div>
                    <div class="col-span-1 text-center">Aksi</div>
                </div>

                <div class="flex flex-col divide-y divide-surface-container-low">
                    <?php if (empty($filteredProducts)): ?>
                        <div class="flex flex-col items-center justify-center p-12 text-center">
                            <span class="material-symbols-outlined text-[48px] text-outline mb-2">inventory_2</span>
                            <h4 class="text-[15px] font-bold text-on-surface">Tidak ada produk ditemukan</h4>
                            <p class="text-[12px] text-on-surface-variant max-w-xs mt-1">Coba ganti kata kunci pencarian atau pilih filter kategori lainnya.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($filteredProducts as $p): ?>
                            <?php 
                                $stockPct = min(($p['stock'] / $p['stock_max']) * 100, 100);
                                $isCritical = $p['stock'] <= 20;
                                $stockColorClass = $isCritical ? 'text-error font-bold' : 'text-on-surface font-semibold';
                                $barColorClass = $isCritical ? 'bg-error' : 'bg-primary';
                                $defaultImg = 'https://placehold.co/100x100/cee9da/325346?text=Tisu';
                            ?>
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 items-center hover:bg-surface-container-low/50 transition-colors group">
                                <div class="col-span-1 md:col-span-5 flex items-center gap-3">
                                    <div class="relative w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center p-1.5 flex-shrink-0 border border-surface-container overflow-hidden">
                                        <img class="w-full h-full object-contain" alt="<?php echo htmlspecialchars($p['name']); ?>" src="<?php echo htmlspecialchars(!empty($p['image']) ? $p['image'] : $defaultImg); ?>" onerror="this.src='<?php echo $defaultImg; ?>'"/>
                                    </div>
                                    <div class="flex flex-col min-w-0">
                                        <div class="flex items-center gap-2">
                                            <h3 class="text-[14px] font-bold text-on-surface truncate"><?php echo htmlspecialchars($p['name']); ?></h3>
                                            <span class="px-1.5 py-0.5 rounded bg-surface-container text-on-surface-variant text-[10px] font-bold flex-shrink-0">
                                                <?php echo htmlspecialchars($p['bay']); ?>
                                            </span>
                                        </div>
                                        <p class="text-[12px] text-on-surface-variant truncate"><?php echo htmlspecialchars($p['brand']); ?> • <?php echo htmlspecialchars($p['specs']); ?></p>
                                    </div>
                                </div>

                                <div class="col-span-1 md:col-span-2 flex md:block items-center justify-between">
                                    <span class="md:hidden text-on-surface-variant text-[12px]">Tipe:</span>
                                    <span class="px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container text-[11px] font-semibold inline-block">
                                        <?php echo htmlspecialchars($p['type']); ?>
                                    </span>
                                </div>

                                <div class="col-span-1 md:col-span-2 flex md:block items-center justify-between text-right">
                                    <span class="md:hidden text-on-surface-variant text-[12px]">Harga:</span>
                                    <span class="text-[14px] font-bold text-primary">
                                        Rp <?php echo number_format($p['price'], 0, ',', '.'); ?>
                                    </span>
                                </div>

                                <div class="col-span-1 md:col-span-2 flex md:block items-center justify-between">
                                    <span class="md:hidden text-on-surface-variant text-[12px]">Stok:</span>
                                    <div class="flex flex-col md:items-center gap-1">
                                        <div class="flex items-center gap-1.5">
                                            <span class="text-[13px] <?php echo $stockColorClass; ?>"><?php echo $p['stock']; ?> Dus</span>
                                        </div>
                                        <div class="w-full md:w-20 h-1.5 bg-surface-container rounded-full overflow-hidden">
                                            <div class="h-full <?php echo $barColorClass; ?> rounded-full transition-all duration-500" style="width: <?php echo $stockPct; ?>%;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-1 md:col-span-1 flex justify-end md:justify-center gap-1 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button aria-label="Edit" class="w-8 h-8 rounded-lg hover:bg-primary-container/10 text-primary flex items-center justify-center transition-colors" onclick='openEditModal(<?php echo json_encode($p); ?>)' type="button">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </button>
                                    <button aria-label="Delete" class="w-8 h-8 rounded-lg hover:bg-error/10 text-error flex items-center justify-center transition-colors" onclick="promptDelete(<?php echo $p['id']; ?>, '<?php echo htmlspecialchars($p['name'], ENT_QUOTES); ?>')" type="button">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="p-4 border-t border-surface-container-low flex justify-between items-center bg-surface-container-low/50">
                    <span class="text-[12px] text-on-surface-variant">Menampilkan <?php echo count($filteredProducts); ?> dari <?php echo count($_SESSION['products']); ?> produk</span>
                </div>
            </div>

            <!-- Warehouse Capacity Widget -->
            <div class="bg-surface-container-low rounded-2xl p-4 flex flex-col gap-2 mt-2">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    
                    <span class="text-[11px] text-secondary font-medium">
                        <?php echo $capacityPercent; ?>% Terisi (<?php echo number_format($totalStockAll, 0, ',', '.'); ?> / <?php echo number_format($storeInfo['rack_total'], 0, ',', '.'); ?> Dus)
                    </span>
                </div>
                <div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden">
                    <div class="h-full bg-primary rounded-full transition-all duration-500" style="width: <?php echo $capacityPercent; ?>%;"></div>
                </div>
            </div>

        </div>
    </main>

    <!-- Bottom Navigation Bar -->
    <nav class="fixed bottom-0 w-full z-30 pb-safe bg-surface/90 backdrop-blur-xl shadow-[0_-2px_12px_rgba(61,74,65,0.06)]">
        <div class="h-16 max-w-lg mx-auto px-4 flex items-center justify-around">
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors" href="#">
                <span class="material-symbols-outlined text-[22px]">grid_view</span>
                <span class="text-[10px]">Dashboard</span>
            </a>
            <a aria-current="page" class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-primary font-bold transition-colors" href="#">
                <span class="material-symbols-outlined text-[22px]">inventory_2</span>
                <span class="text-[10px]">Catalog</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors" href="#">
                <span class="material-symbols-outlined text-[22px]">local_shipping</span>
                <span class="text-[10px]">Orders</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors" href="#">
                <span class="material-symbols-outlined text-[22px]">receipt_long</span>
                <span class="text-[10px]">Receipts</span>
            </a>
        </div>
    </nav>

    <!-- MODAL: Form Tambah / Edit Produk -->
    <div id="productModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none modal-backdrop bg-on-surface/40 backdrop-blur-sm">
        <div class="bg-surface-container-lowest w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col modal-content transform scale-95 border border-surface-container-low max-h-[90vh]">
            <div class="px-6 py-4 bg-surface-container-low border-b border-surface-container flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span id="modalIcon" class="material-symbols-outlined text-primary">add_circle</span>
                    <h3 id="modalTitle" class="text-[16px] font-bold text-on-surface">Tambah Produk Baru</h3>
                </div>
                <button type="button" onclick="closeModal()" class="w-8 h-8 rounded-full flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container active:scale-95 transition-all">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <form method="POST" action="" class="p-6 overflow-y-auto flex flex-col gap-4">
                <input type="hidden" name="action" value="save"/>
                <input type="hidden" id="productId" name="id" value=""/>

                <div>
                    <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Nama Produk *</label>
                    <input type="text" id="inputName" name="name" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="mis. Paseo Smart Facial 250s"/>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Merek / Brand *</label>
                        <input type="text" id="inputBrand" name="brand" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="mis. Paseo"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Kategori *</label>
                        <select id="inputType" name="type" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all">
                            <option value="Facial Tissue">Facial Tissue</option>
                            <option value="Toilet Roll">Toilet Roll</option>
                            <option value="Kitchen Towel">Kitchen Towel</option>
                            <option value="Napkin / Kuliner">Napkin / Kuliner</option>
                            <option value="Hand Towel">Hand Towel</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Spesifikasi Kemasan *</label>
                    <input type="text" id="inputSpecs" name="specs" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="mis. Dus / 48 Pax (2-Ply Soft)"/>
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Kode Rak *</label>
                        <input type="text" id="inputBay" name="bay" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="A-12"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Stok (Dus) *</label>
                        <input type="number" id="inputStock" name="stock" min="0" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="340"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Kapasitas *</label>
                        <input type="number" id="inputStockMax" name="stock_max" min="1" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="400"/>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">Harga Dus (Rp) *</label>
                        <input type="number" id="inputPrice" name="price" min="0" required class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="285000"/>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase text-secondary tracking-wider mb-1">URL Gambar (Opsional)</label>
                        <input type="url" id="inputImage" name="image" class="w-full h-10 px-3 bg-surface-container-low rounded-xl text-[13px] text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/30 border border-transparent transition-all" placeholder="https://..."/>
                    </div>
                </div>

                <div class="pt-4 border-t border-surface-container-low flex items-center justify-end gap-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2.5 rounded-xl bg-surface-container text-on-surface-variant text-[13px] font-semibold hover:bg-surface-container-high transition-all">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-primary text-on-primary text-[13px] font-bold hover:opacity-95 active:scale-95 transition-all shadow-sm">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL: Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none modal-backdrop bg-on-surface/40 backdrop-blur-sm">
        <div class="bg-surface-container-lowest w-full max-w-sm rounded-2xl shadow-2xl overflow-hidden flex flex-col modal-content transform scale-95 border border-surface-container-low p-6 text-center">
            <div class="w-12 h-12 rounded-full bg-error-container text-error flex items-center justify-center mx-auto mb-3">
                <span class="material-symbols-outlined text-[24px]">delete</span>
            </div>
            <h3 class="text-[16px] font-bold text-on-surface">Hapus Produk Ini?</h3>
            <p id="deleteTargetName" class="text-[13px] text-on-surface-variant mt-1 mb-6 font-medium">Apakah Anda yakin ingin menghapus produk dari katalog inventaris?</p>
            
            <form method="POST" action="" class="flex items-center gap-2">
                <input type="hidden" name="action" value="delete"/>
                <input type="hidden" id="deleteTargetId" name="id" value=""/>
                <button type="button" onclick="closeDeleteModal()" class="flex-1 py-2.5 rounded-xl bg-surface-container text-on-surface-variant text-[13px] font-semibold hover:bg-surface-container-high transition-all">Batal</button>
                <button type="submit" class="flex-1 py-2.5 rounded-xl bg-error text-on-error text-[13px] font-bold hover:opacity-90 active:scale-90 transition-all shadow-sm">Ya, Hapus</button>
            </form>
        </div>
    </div>

    <!-- Toast Notification Container -->
    <div id="toastContainer" class="fixed bottom-20 left-1/2 -translate-x-1/2 z-50 flex flex-col gap-2 pointer-events-none w-full max-w-xs px-4"></div>

    <script>
        // PHP Benachrichtigung an Toast übergeben
        <?php if (!empty($toastMessage)): ?>
        document.addEventListener('DOMContentLoaded', () => {
            showToast(<?php echo json_encode($toastMessage); ?>, <?php echo json_encode($toastType); ?>);
        });
        <?php endif; ?>

        const productModal = document.getElementById('productModal');
        const deleteModal = document.getElementById('deleteModal');

        function openAddModal() {
            document.getElementById('productId').value = '';
            document.getElementById('inputName').value = '';
            document.getElementById('inputBrand').value = '';
            document.getElementById('inputType').value = 'Facial Tissue';
            document.getElementById('inputSpecs').value = '';
            document.getElementById('inputBay').value = '';
            document.getElementById('inputStock').value = '';
            document.getElementById('inputStockMax').value = '';
            document.getElementById('inputPrice').value = '';
            document.getElementById('inputImage').value = '';

            document.getElementById('modalTitle').textContent = 'Tambah Produk Baru';
            document.getElementById('modalIcon').textContent = 'add_circle';
            showModal(productModal);
        }

        function openEditModal(p) {
            document.getElementById('productId').value = p.id;
            document.getElementById('inputName').value = p.name;
            document.getElementById('inputBrand').value = p.brand;
            document.getElementById('inputType').value = p.type;
            document.getElementById('inputSpecs').value = p.specs;
            document.getElementById('inputBay').value = p.bay;
            document.getElementById('inputStock').value = p.stock;
            document.getElementById('inputStockMax').value = p.stock_max;
            document.getElementById('inputPrice').value = p.price;
            document.getElementById('inputImage').value = p.image || '';

            document.getElementById('modalTitle').textContent = 'Edit Data Produk';
            document.getElementById('modalIcon').textContent = 'edit_note';
            showModal(productModal);
        }

        function promptDelete(id, name) {
            document.getElementById('deleteTargetId').value = id;
            document.getElementById('deleteTargetName').textContent = `Apakah Anda yakin ingin menghapus "${name}" dari katalog?`;
            showModal(deleteModal);
        }

        function showModal(modalEl) {
            modalEl.classList.remove('opacity-0', 'pointer-events-none');
            modalEl.querySelector('.modal-content').classList.remove('scale-95');
            modalEl.querySelector('.modal-content').classList.add('scale-100');
        }

        function closeModal() {
            productModal.classList.add('opacity-0', 'pointer-events-none');
            productModal.querySelector('.modal-content').classList.remove('scale-100');
            productModal.querySelector('.modal-content').classList.add('scale-95');
        }

        function closeDeleteModal() {
            deleteModal.classList.add('opacity-0', 'pointer-events-none');
            deleteModal.querySelector('.modal-content').classList.remove('scale-100');
            deleteModal.querySelector('.modal-content').classList.add('scale-95');
        }

        function showToast(message, type = 'success') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            
            let bgClass = 'bg-primary text-on-primary';
            let icon = 'check_circle';

            if (type === 'delete') {
                bgClass = 'bg-error text-on-error';
                icon = 'delete';
            }

            toast.className = `toast-enter pointer-events-auto flex items-center gap-2 px-4 py-3 rounded-xl shadow-lg text-[13px] font-bold ${bgClass}`;
            toast.innerHTML = `
                <span class="material-symbols-outlined text-[18px]">${icon}</span>
                <span>${message}</span>
            `;

            container.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, 2500);
        }
    </script>
</body>
</html>