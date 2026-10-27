<?php
// Session-Start für Authentifizierung & Datenverwaltung
session_start();

// Logout-Logik
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['is_logged_in']);
    session_destroy();
    header('Location: index.php?page=login');
    exit;
}

// Aktive Seite ermitteln (Standard: login, oder dashboard falls bereits eingeloggt)
$page = $_GET['page'] ?? ($_SESSION['is_logged_in'] ?? false ? 'dashboard' : 'login');

// Zugriffsschutz: Wenn nicht eingeloggt, zur Login-Seite leiten
if (!isset($_SESSION['is_logged_in']) && $page !== 'login') {
    header('Location: index.php?page=login');
    exit;
}

// Konfiguration / Allgemeine Daten
$appName = "Amanda Tisu Jaya";
$appSubtitle = "Portal Agen & Operasional Grosir";
$csWhatsappNumber = "6281234567890";

// Standard-Produktdaten initialisieren (Session)
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        [
            'id' => 1,
            'name' => 'See-U Jumbo Roll',
            'brand' => 'See-U',
            'specs' => '1 Roll isi 256 m x 2 PLY , 1 Dus isi 16 Roll',
            'type' => 'Napkin / Kuliner',
            'bay' => 'A-12',
            'stock' => 60,
            'stock_max' => 150,
            'price' => 325000,
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

// ----------------------------------------------------------------------
// 1. HALAMAN LOGIN
// ----------------------------------------------------------------------
if ($page === 'login'):
    $loginError = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $agentId = filter_input(INPUT_POST, 'agentId', FILTER_SANITIZE_SPECIAL_CHARS);
        $agentPassword = $_POST['agentPassword'] ?? '';

        if (!empty($agentId) && !empty($agentPassword)) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['agent_id'] = $agentId;
            header('Location: index.php?page=dashboard');
            exit;
        } else {
            $loginError = "Silakan isi ID Agen dan Kata Sandi dengan benar.";
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, viewport-fit=cover"/>
    <meta name="theme-color" content="#325346"/>
    <title><?php echo htmlspecialchars($appName); ?> - Login Agent Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container-lowest": "#ffffff", "surface-container-high": "#eae8e5",
                        "tertiary-fixed": "#ffdad2", "inverse-primary": "#abcebe", "background": "#fbf9f6",
                        "secondary-container": "#cee9da", "secondary-fixed": "#cee9da", "outline-variant": "#c1c8c3",
                        "on-primary-container": "#c6ead8", "surface-container-low": "#f5f3f0", "on-surface-variant": "#414844",
                        "on-surface": "#1b1c1a", "on-secondary-fixed": "#092017", "outline": "#727974",
                        "inverse-on-surface": "#f2f0ed", "surface-variant": "#e4e2df", "surface-dim": "#dbdad7",
                        "on-secondary": "#ffffff", "surface-bright": "#fbf9f6", "surface-container-highest": "#e4e2df",
                        "on-tertiary": "#ffffff", "surface-container": "#efeeeb", "secondary-fixed-dim": "#b3ccbf",
                        "surface-tint": "#446557", "on-secondary-container": "#52695e", "on-tertiary-fixed": "#3d0700",
                        "tertiary-container": "#a04b36", "primary-fixed-dim": "#abcebe", "tertiary": "#823421",
                        "inverse-surface": "#30312f", "on-primary-fixed-variant": "#2d4d40", "tertiary-fixed-dim": "#ffb4a3",
                        "on-background": "#1b1c1a", "surface": "#fbf9f6", "on-tertiary-fixed-variant": "#7b2e1c",
                        "on-error": "#ffffff", "secondary": "#4c6358", "on-primary": "#ffffff", "on-error-container": "#93000a",
                        "primary": "#325346", "error-container": "#ffdad6", "error": "#ba1a1a", "on-primary-fixed": "#002116",
                        "on-tertiary-container": "#ffdad1", "primary-container": "#4a6b5d", "primary-fixed": "#c6ebd9",
                        "on-secondary-fixed-variant": "#354c41"
                    },
                    fontFamily: { sans: ["Plus Jakarta Sans", "sans-serif"] }
                }
            }
        }
    </script>
    <style>
        @layer base { html, body { width: 100%; min-height: 100vh; margin: 0; padding: 0; } body { overscroll-behavior: none; } .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); } .pt-safe { padding-top: env(safe-area-inset-top, 0px); } }
        ::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-surface text-on-surface font-sans min-h-screen flex flex-col justify-center items-center pt-safe pb-safe selection:bg-secondary-container selection:text-on-secondary-fixed">
    <main class="w-full flex-1 flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 relative">
        <div class="flex flex-col w-full max-w-md md:max-w-lg lg:max-w-xl relative overflow-hidden px-4 sm:px-6 py-6 sm:py-8 my-auto">
            <div class="absolute -top-16 -left-20 w-64 md:w-80 h-64 md:h-80 rounded-full bg-secondary-container/40 blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/2 -right-24 w-72 md:w-96 h-72 md:h-96 rounded-full bg-primary-fixed/30 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col items-center text-center mb-6 sm:mb-8">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface-variant mb-4 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    <span class="text-xs font-semibold tracking-wide uppercase">Agen Tisu</span>
                </div>
                <div class="relative mb-4">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full p-1 bg-surface-container-lowest shadow-md flex items-center justify-center">
                        <div class="w-full h-full rounded-full overflow-hidden flex items-center justify-center bg-surface-container-low">
                            <img alt="<?php echo htmlspecialchars($appName); ?> Logo" class="w-full h-full object-cover transform scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBwOIMeokhu-ugGF4U9002tLoMhghwvEksUXgXxRj8VbaVbQ-3aRMHVL3KcGRsQDwu62RuprQI_xV8zizBNmnvG5pQ9heqfgipMhfjkg06tjWukpyaW5tOCB5QcXzhE_AeergzqnnVttvJ7xHif4MmLavUg70rhrTqqcQZU6FIW5C-7Td9K-ZcJfuoVJ1-OS9WH1I5VyIwic9NivVQqPAfJ44PDUFeIJ71ixNWcKTNS6zyHxFbHRvXGZbjAjAEsSO6ODw"/>
                        </div>
                    </div>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-on-surface tracking-tight"><?php echo htmlspecialchars($appName); ?></h1>
                <p class="text-sm text-on-surface-variant mt-1"><?php echo htmlspecialchars($appSubtitle); ?></p>
                <div class="mt-4 px-2 max-w-xs sm:max-w-sm">
                    <h2 class="text-lg sm:text-xl text-primary font-semibold">Selamat Datang Kembali</h2>
                    <p class="text-xs sm:text-sm text-on-surface-variant mt-1 leading-relaxed">
                        Masuk untuk mengelola pesanan, stok gudang, dan transaksi agen Amanda Tisu Jaya.
                    </p>
                </div>
            </div>

            <div class="relative z-10 w-full rounded-2xl bg-surface-container-lowest shadow-xl p-5 sm:p-8 border border-surface-variant/30">
                <?php if (!empty($loginError)): ?>
                    <div class="mb-4 p-3 rounded-xl bg-error-container text-on-error-container text-xs sm:text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">error</span>
                        <span><?php echo htmlspecialchars($loginError); ?></span>
                    </div>
                <?php endif; ?>

                <form class="flex flex-col gap-4 sm:gap-5" method="POST" action="index.php?page=login">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs sm:text-sm font-semibold text-on-surface flex items-center justify-between" for="agentId">
                            <span>Identitas Agen</span>
                            <span class="text-on-surface-variant font-normal text-[11px]">Terdaftar</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 material-symbols-outlined text-outline text-[20px] pointer-events-none">badge</span>
                            <input class="w-full h-11 sm:h-12 pl-11 pr-4 rounded-xl bg-surface-container-low text-on-surface placeholder:text-outline text-xs sm:text-sm transition-all focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/25" id="agentId" name="agentId" placeholder="Masukkan Username" required type="text"/>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs sm:text-sm font-semibold text-on-surface" for="agentPassword">Kata Sandi Akun</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 material-symbols-outlined text-outline text-[20px] pointer-events-none">lock</span>
                            <input class="w-full h-11 sm:h-12 pl-11 pr-11 rounded-xl bg-surface-container-low text-on-surface placeholder:text-outline text-xs sm:text-sm transition-all focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/25" id="agentPassword" name="agentPassword" placeholder="Masukkan kata sandi" required type="password"/>
                            <button aria-label="Toggle password visibility" class="absolute right-2.5 w-8 h-8 flex items-center justify-center text-outline hover:text-on-surface transition-colors focus:outline-none" id="togglePasswordBtn" type="button">
                                <span class="material-symbols-outlined text-[20px]" id="pwdEyeIcon">visibility</span>
                            </button>
                        </div>
                    </div>

                    <button class="w-full h-11 sm:h-12 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-semibold text-xs sm:text-sm flex items-center justify-center gap-2 transition-all active:scale-[0.98] shadow-md mt-1" type="submit">
                        <span>Login</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </button>
                </form>
            </div>

            <div class="relative z-10 flex flex-col items-center text-center mt-6 sm:mt-8 gap-3">
                <a class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-surface-container text-on-surface hover:bg-secondary-container/60 transition-colors shadow-sm text-xs sm:text-sm" href="https://wa.me/<?php echo $csWhatsappNumber; ?>" target="_blank">
                    <span class="material-symbols-outlined text-primary text-[18px]">support_agent</span>
                    <span class="font-semibold text-on-secondary-container">Butuh bantuan? Hubungi Kami 085220025701</span>
                </a>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('togglePasswordBtn')?.addEventListener('click', function() {
            const pwdInput = document.getElementById('agentPassword');
            const eyeIcon = document.getElementById('pwdEyeIcon');
            const isPassword = pwdInput.getAttribute('type') === 'password';
            pwdInput.setAttribute('type', isPassword ? 'text' : 'password');
            eyeIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
        });
    </script>
</body>
</html>

<?php
// ----------------------------------------------------------------------
// 2. HALAMAN DASHBOARD
// ----------------------------------------------------------------------
elseif ($page === 'dashboard'):
    $current_branch = "Gudang Utama Jakarta Barat";
    $active_date = "Kamis, 24 Okt 2024";
    $sales_today = "Rp 18.450.000";
    $sales_growth = "+12.4%";
    $incoming_orders_count = 28;
    $new_orders_badge = "8 Baru";
    $ready_stock_percentage = "98.2%";
    $total_cartons = "1.420";

    $inventory_items = [
        ["name" => "Paseo Elegant 250s (2-Ply)", "detail" => "Isi 48 pack / karton • Bay A-04", "badge" => "420 Karton", "width" => "78%", "color" => "bg-primary", "icon" => "dry_cleaning"],
        ["name" => "Nice Facial Tissue 900g", "detail" => "Isi 24 pack / karton • Bay B-01", "badge" => "510 Karton", "width" => "88%", "color" => "bg-primary", "icon" => "layers"],
        ["name" => "Jolly Kuliner 200s (Horeca)", "detail" => "Isi 60 pack / karton • Bay C-09", "badge" => "45 Karton", "width" => "18%", "color" => "bg-tertiary-container", "icon" => "restaurant", "warning" => true],
        ["name" => "Tessa Kitchen Towel Emboss", "detail" => "Isi 12 roll / bal • Bay D-02", "badge" => "280 Bal", "width" => "55%", "color" => "bg-primary", "icon" => "roller_shades"]
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
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#1b1c1a", "surface-container": "#efeeeb", "secondary-container": "#cee9da",
                        "on-secondary-container": "#52695e", "tertiary": "#823421", "inverse-primary": "#abcebe",
                        "secondary-fixed": "#cee9da", "surface": "#fbf9f6", "primary-container": "#4a6b5d",
                        "primary": "#325346", "on-primary": "#ffffff", "surface-container-lowest": "#ffffff",
                        "on-surface-variant": "#414844", "tertiary-container": "#a04b36", "surface-container-low": "#f5f3f0"
                    }
                }
            }
        };
    </script>
    <style>
        @layer base { html, body { width: 100vw; margin: 0; padding: 0; } body { overscroll-behavior: none; } .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); } .pt-safe { padding-top: env(safe-area-inset-top, 0px); } }
        ::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-surface font-sans text-on-surface antialiased flex flex-col min-h-screen">
    <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-sm">
        <div class="max-w-7xl mx-auto h-16 px-4 md:px-8 flex items-center justify-between gap-2">
            <div class="flex items-center gap-3 min-w-0">
                <img alt="Amanda Tisu Jaya Logo" class="h-8 w-auto object-contain flex-shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNC-5oZzCNpQJZUTQVdmZRoEXKpa8xwwdOpOM5Ds546i-uPWsVF7GtqHUJs3jfkXimphMJ95qSWqbheATZQwC_saDEJSS3yFx0JEWY_eGXiCnmLaC__8QsXWBFHXVt-952waRdhGRO3KcEA8tnRnNVA1GOMqdGCQfgnxUbP1gupMIMwl27YopA0yNSm_sr7N55gfVjFMI34vgSQLYXQTD5SZqtlAISoU_Vsd8PeVQKyZi4t4JstZ1X"/>
                <div class="flex flex-col min-w-0">
                    <span class="text-[10px] uppercase text-secondary tracking-wider truncate font-bold">Amanda Tisu Jaya</span>
                    <span class="text-[18px] font-semibold text-on-surface truncate">Dashboard</span>
                </div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <a href="index.php?action=logout" class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-surface-container hover:bg-surface-container-high text-error flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">logout</span> Logout
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1 flex flex-col relative w-full pt-20 pb-24 bg-surface max-w-7xl mx-auto px-4 md:px-8 gap-6">
        <div class="relative overflow-hidden bg-surface-container rounded-2xl p-6 shadow-sm">
            <div class="relative z-10 flex flex-col gap-2">
                <div class="flex items-center justify-between gap-2">
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface text-secondary shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-[10px] uppercase tracking-wider font-bold">Agen Aktif</span>
                    </div>
                    <span class="text-xs text-on-surface-variant font-semibold"><?php echo $active_date; ?></span>
                </div>
                <div class="pt-1">
                    <p class="text-2xl md:text-3xl font-semibold text-on-surface">Selamat datang, Agen</p>
                    <p class="text-sm text-on-surface-variant">Awali hari dengan pelayanan maksimal.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="md:col-span-2 bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <div class="flex items-start justify-between">
                    <span class="text-xs font-semibold text-on-surface-variant">Penjualan Hari Ini</span>
                    <span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px] font-bold"><?php echo $sales_growth; ?></span>
                </div>
                <div class="mt-3 flex items-baseline justify-between">
                    <span class="text-2xl md:text-3xl font-bold text-on-surface"><?php echo $sales_today; ?></span>
                </div>
            </div>
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <span class="text-2xl font-bold text-on-surface block"><?php echo $incoming_orders_count; ?></span>
                <span class="text-xs text-on-surface-variant">Pesanan Masuk</span>
            </div>
            <div class="bg-surface-container-lowest p-5 rounded-2xl shadow-sm flex flex-col justify-between">
                <span class="text-2xl font-bold text-on-surface block"><?php echo $total_cartons; ?></span>
                <span class="text-xs text-on-surface-variant">Karton di Rak</span>
            </div>
        </div>

        <div class="flex flex-col gap-3 mt-4">
            <h3 class="text-lg font-semibold text-on-surface">Stok Fast-Moving</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <?php foreach ($inventory_items as $item): ?>
                <div class="bg-surface-container-lowest p-4 rounded-2xl shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-sm font-semibold text-on-surface block"><?php echo $item['name']; ?></span>
                        <span class="text-xs text-on-surface-variant"><?php echo $item['detail']; ?></span>
                    </div>
                    <span class="px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container text-xs font-semibold"><?php echo $item['badge']; ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-md">
        <div class="max-w-7xl mx-auto h-16 px-4 flex items-center justify-around">
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-primary font-semibold text-xs" href="index.php?page=dashboard">
                <span class="material-symbols-outlined text-[22px]">grid_view</span>
                <span>Dashboard</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=catalog">
                <span class="material-symbols-outlined text-[22px]">inventory_2</span>
                <span>Catalog</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=orders">
                <span class="material-symbols-outlined text-[22px]">local_shipping</span>
                <span>Orders</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=nota">
                <span class="material-symbols-outlined text-[22px]">receipt_long</span>
                <span>Nota PDF</span>
            </a>
        </div>
    </nav>
</body>
</html>

<?php
// ----------------------------------------------------------------------
// 3. HALAMAN KATALOG PRODUK
// ----------------------------------------------------------------------
elseif ($page === 'catalog'):
    $storeInfo = ['name' => 'Amanda Tisu Jaya', 'warehouse' => 'Gudang Pusat Cengkareng', 'rack_total' => 4400];
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
                foreach ($_SESSION['products'] as &$p) {
                    if ($p['id'] == $id) { $p = array_merge($p, $data); break; }
                }
                $toastMessage = 'Produk berhasil diperbarui!';
            } else {
                $newId = count($_SESSION['products']) > 0 ? max(array_column($_SESSION['products'], 'id')) + 1 : 1;
                $data['id'] = $newId;
                array_unshift($_SESSION['products'], $data);
                $toastMessage = 'Produk baru berhasil ditambahkan!';
            }
        } elseif ($action === 'delete') {
            $id = $_POST['id'] ?? '';
            $_SESSION['products'] = array_values(array_filter($_SESSION['products'], fn($p) => $p['id'] != $id));
            $toastMessage = 'Produk berhasil dihapus!';
            $toastType = 'delete';
        }
    }

    $searchQuery = strtolower(trim($_GET['search'] ?? ''));
    $activeCategory = $_GET['category'] ?? 'all';

    $filteredProducts = array_filter($_SESSION['products'], function($p) use ($searchQuery, $activeCategory) {
        $matchCategory = ($activeCategory === 'all') || ($p['type'] === $activeCategory);
        $matchSearch = empty($searchQuery) || (
            strpos(strtolower($p['name']), $searchQuery) !== false ||
            strpos(strtolower($p['brand']), $searchQuery) !== false ||
            strpos(strtolower($p['bay']), $searchQuery) !== false
        );
        return $matchCategory && $matchSearch;
    });
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <title>Katalog & Manajemen Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#1b1c1a", "surface-container": "#efeeeb", "secondary-container": "#cee9da",
                        "on-secondary-container": "#52695e", "surface": "#fbf9f6", "primary": "#325346",
                        "on-primary": "#ffffff", "surface-container-lowest": "#ffffff", "surface-container-low": "#f5f3f0",
                        "on-surface-variant": "#414844", "error": "#ba1a1a", "on-error": "#ffffff"
                    }
                }
            }
        };
    </script>
    <style>
        ::-webkit-scrollbar { display: none; }
        .modal-backdrop { transition: opacity 0.25s ease-in-out; }
        .modal-content { transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease-in-out; }
    </style>
</head>
<body class="bg-surface font-sans text-on-surface antialiased flex flex-col min-h-screen">
    <header class="fixed top-0 w-full z-40 pt-safe bg-surface/85 backdrop-blur-xl shadow-sm">
        <div class="h-16 px-4 sm:px-8 max-w-7xl mx-auto flex items-center justify-between gap-4">
            <span class="text-[18px] font-semibold text-on-surface">Katalog Produk</span>
            <a href="index.php?action=logout" class="text-xs text-error font-semibold">Logout</a>
        </div>
    </header>

    <main class="flex-1 flex flex-col relative w-full pt-20 pb-28 bg-surface max-w-7xl mx-auto px-4 sm:px-8 gap-4">
        <form method="GET" action="index.php" class="flex flex-col sm:flex-row items-center gap-2">
            <input type="hidden" name="page" value="catalog">
            <input type="hidden" name="category" value="<?php echo htmlspecialchars($activeCategory); ?>">
            <div class="relative flex-1 w-full">
                <input name="search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" class="w-full h-11 pl-4 pr-10 bg-surface-container-lowest rounded-xl text-sm border border-surface-container-low focus:outline-none" placeholder="Cari SKU atau nama..." type="search"/>
            </div>
            <button type="button" onclick="openAddModal()" class="w-full sm:w-auto h-11 px-4 rounded-xl bg-primary text-on-primary text-xs font-bold flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-[18px]">add</span> Tambah Produk
            </button>
        </form>

        <div class="flex items-center gap-2 overflow-x-auto pb-1">
            <?php foreach ($categories as $cat): ?>
                <a href="index.php?page=catalog&category=<?php echo urlencode($cat['id']); ?>" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap <?php echo ($activeCategory === $cat['id']) ? 'bg-primary text-on-primary' : 'bg-surface-container-lowest text-on-surface-variant'; ?>">
                    <?php echo htmlspecialchars($cat['name']); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="bg-surface-container-lowest rounded-2xl shadow-sm border border-surface-container-low overflow-hidden divide-y divide-surface-container-low">
            <?php foreach ($filteredProducts as $p): ?>
                <div class="p-4 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <img class="w-12 h-12 rounded-xl object-contain bg-surface-container-low p-1" src="<?php echo htmlspecialchars($p['image'] ?: 'https://via.placeholder.com/100'); ?>" alt=""/>
                        <div>
                            <h3 class="text-sm font-bold text-on-surface"><?php echo htmlspecialchars($p['name']); ?></h3>
                            <p class="text-xs text-on-surface-variant"><?php echo htmlspecialchars($p['brand']); ?> • Stok: <?php echo $p['stock']; ?> Dus</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-bold text-primary">Rp <?php echo number_format($p['price'], 0, ',', '.'); ?></span>
                        <button onclick='openEditModal(<?php echo json_encode($p); ?>)' class="p-1 text-primary"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                        <button onclick="promptDelete(<?php echo $p['id']; ?>, '<?php echo htmlspecialchars($p['name'], ENT_QUOTES); ?>')" class="p-1 text-error"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Modal Form -->
    <div id="productModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none modal-backdrop bg-on-surface/40 backdrop-blur-sm">
        <div class="bg-surface-container-lowest w-full max-w-lg rounded-2xl shadow-2xl p-6 modal-content transform scale-95">
            <h3 id="modalTitle" class="text-base font-bold text-on-surface mb-4">Form Produk</h3>
            <form method="POST" action="index.php?page=catalog" class="flex flex-col gap-3">
                <input type="hidden" name="action" value="save"/>
                <input type="hidden" id="productId" name="id" value=""/>
                <input type="text" id="inputName" name="name" required placeholder="Nama Produk" class="h-10 px-3 bg-surface-container-low rounded-xl text-xs border border-transparent"/>
                <input type="text" id="inputBrand" name="brand" required placeholder="Merek / Brand" class="h-10 px-3 bg-surface-container-low rounded-xl text-xs border border-transparent"/>
                <input type="number" id="inputPrice" name="price" required placeholder="Harga (Rp)" class="h-10 px-3 bg-surface-container-low rounded-xl text-xs border border-transparent"/>
                <input type="number" id="inputStock" name="stock" required placeholder="Stok" class="h-10 px-3 bg-surface-container-low rounded-xl text-xs border border-transparent"/>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 rounded-xl bg-surface-container text-xs font-semibold">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-on-primary text-xs font-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none modal-backdrop bg-on-surface/40 backdrop-blur-sm">
        <div class="bg-surface-container-lowest w-full max-w-sm rounded-2xl shadow-2xl p-6 text-center modal-content transform scale-95">
            <h3 class="text-base font-bold text-on-surface">Hapus Produk?</h3>
            <p id="deleteTargetName" class="text-xs text-on-surface-variant my-3"></p>
            <form method="POST" action="index.php?page=catalog" class="flex gap-2">
                <input type="hidden" name="action" value="delete"/>
                <input type="hidden" id="deleteTargetId" name="id" value=""/>
                <button type="button" onclick="closeDeleteModal()" class="flex-1 py-2 rounded-xl bg-surface-container text-xs font-semibold">Batal</button>
                <button type="submit" class="flex-1 py-2 rounded-xl bg-error text-on-error text-xs font-bold">Hapus</button>
            </form>
        </div>
    </div>

    <nav class="fixed bottom-0 w-full z-30 pb-safe bg-surface/90 backdrop-blur-xl shadow-md">
        <div class="max-w-7xl mx-auto h-16 px-4 flex items-center justify-around">
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=dashboard">
                <span class="material-symbols-outlined text-[22px]">grid_view</span>
                <span>Dashboard</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-primary font-semibold text-xs" href="index.php?page=catalog">
                <span class="material-symbols-outlined text-[22px]">inventory_2</span>
                <span>Catalog</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=orders">
                <span class="material-symbols-outlined text-[22px]">local_shipping</span>
                <span>Orders</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=nota">
                <span class="material-symbols-outlined text-[22px]">receipt_long</span>
                <span>Nota PDF</span>
            </a>
        </div>
    </nav>

    <script>
        const productModal = document.getElementById('productModal');
        const deleteModal = document.getElementById('deleteModal');

        function openAddModal() {
            document.getElementById('productId').value = '';
            document.getElementById('inputName').value = '';
            document.getElementById('inputBrand').value = '';
            document.getElementById('inputPrice').value = '';
            document.getElementById('inputStock').value = '';
            productModal.classList.remove('opacity-0', 'pointer-events-none');
            productModal.querySelector('.modal-content').classList.remove('scale-95');
        }

        function openEditModal(p) {
            document.getElementById('productId').value = p.id;
            document.getElementById('inputName').value = p.name;
            document.getElementById('inputBrand').value = p.brand;
            document.getElementById('inputPrice').value = p.price;
            document.getElementById('inputStock').value = p.stock;
            productModal.classList.remove('opacity-0', 'pointer-events-none');
            productModal.querySelector('.modal-content').classList.remove('scale-95');
        }

        function promptDelete(id, name) {
            document.getElementById('deleteTargetId').value = id;
            document.getElementById('deleteTargetName').textContent = name;
            deleteModal.classList.remove('opacity-0', 'pointer-events-none');
            deleteModal.querySelector('.modal-content').classList.remove('scale-95');
        }

        function closeModal() {
            productModal.classList.add('opacity-0', 'pointer-events-none');
        }

        function closeDeleteModal() {
            deleteModal.classList.add('opacity-0', 'pointer-events-none');
        }
    </script>
</body>
</html>

<?php
// ----------------------------------------------------------------------
// 4. HALAMAN ORDERS / KELOLA FAKTUR
// ----------------------------------------------------------------------
elseif ($page === 'orders'):
    // Versuch einer MySQL-Verbindung, Fallback auf Dummy-Daten bei Fehler
    $orders = [];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=order_tisu;charset=utf8mb4", 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customer'])) {
            $customer = trim($_POST['customer']);
            $fleet = $_POST['fleet'] ?? 'Armada Truk #2 (Engkel)';
            $payment = $_POST['payment_terms'] ?? 'TOP 14 Hari';
            $id = 'ATJ-' . date('Y') . '-' . rand(1000, 9999);
            $type = 'Kontrak Horeca';
            $status = 'pending';
            $status_label = 'Sedang Dikemas';
            $cargo = 'Muatan: ' . $fleet;
            $items = 'Paseo Elegant 250s (20 Dus) • Nice Facial 900g (15 Dus)';
            $total = 8450000.00;

            $stmt = $pdo->prepare("INSERT INTO orders (id, customer, type, status, status_label, cargo, payment, items, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$id, $customer, $type, $status, $status_label, $cargo, $payment, $items, $total]);
            header("Location: index.php?page=orders");
            exit;
        }

        $stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
        $orders = $stmt->fetchAll();
    } catch (Exception $e) {
        // Dummy-Fallback falls MySQL nicht verbunden ist
        $orders = [
            [
                'id' => 'PO-2024-1082',
                'customer' => 'Toko Berkah Mandiri',
                'type' => 'Grosir Utama',
                'status' => 'pending',
                'status_label' => 'Diproses',
                'cargo' => 'Armada: Pickup L300',
                'payment' => 'TOP 14 Hari',
                'items' => '65 Karton Tissue Mix',
                'total' => 5250000
            ],
            [
                'id' => 'PO-2024-1081',
                'customer' => 'Warung Kopi Senja',
                'type' => 'Horeca',
                'status' => 'shipping',
                'status_label' => 'Siap Kirim',
                'cargo' => 'Armada: Engkel',
                'payment' => 'Tunai Saat Kirim',
                'items' => '25 Karton Kuliner',
                'total' => 2150000
            ]
        ];
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <title>Kelola Faktur & Orders</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-surface": "#1b1c1a", "surface-container": "#efeeeb", "secondary-container": "#cee9da",
                        "on-secondary-container": "#52695e", "surface": "#fbf9f6", "primary": "#325346",
                        "on-primary": "#ffffff", "surface-container-lowest": "#ffffff", "surface-container-low": "#f5f3f0",
                        "on-surface-variant": "#414844"
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-surface font-sans text-on-surface antialiased flex flex-col min-h-screen">
    <header class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-xl border-b border-surface-container-high/60 shadow-sm">
        <div class="max-w-7xl mx-auto h-16 px-4 md:px-8 flex items-center justify-between">
            <span class="text-lg font-semibold text-on-surface">Kelola Faktur & Orders</span>
            <a href="index.php?action=logout" class="text-xs text-error font-semibold">Logout</a>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-4 md:px-8 pt-20 pb-24">
        <div class="bg-surface-container-lowest rounded-xl p-4 shadow-sm mb-6 border border-surface-container-low">
            <h3 class="text-sm font-semibold mb-3">Entri Pesanan Cepat</h3>
            <form method="POST" action="index.php?page=orders" class="flex flex-col gap-3">
                <input class="w-full h-10 px-3 bg-surface rounded-xl text-xs border border-surface-container focus:outline-none" name="customer" placeholder="Nama Pelanggan / Toko" required type="text"/>
                <button type="submit" class="h-10 px-4 rounded-xl bg-primary text-on-primary text-xs font-semibold">Simpan Pesanan</button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($orders as $o): ?>
                <div class="bg-surface-container-lowest p-4 rounded-xl shadow-sm border border-surface-container-low flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-bold text-sm text-on-surface"><?php echo htmlspecialchars($o['customer']); ?></h4>
                                <span class="text-xs text-on-surface-variant">#<?php echo htmlspecialchars($o['id']); ?></span>
                            </div>
                            <span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-xs font-semibold"><?php echo htmlspecialchars($o['status_label']); ?></span>
                        </div>
                        <p class="text-xs text-on-surface-variant mb-2"><?php echo htmlspecialchars($o['items']); ?></p>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-surface-container-low">
                        <span class="text-sm font-bold text-primary">Rp <?php echo number_format($o['total'], 0, ',', '.'); ?></span>
                        <a href="index.php?page=nota" class="px-3 py-1.5 rounded-lg bg-surface-container text-xs font-semibold text-on-surface">Lihat Nota</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <nav class="fixed bottom-0 w-full z-50 pb-safe bg-surface/90 backdrop-blur-xl shadow-md">
        <div class="max-w-7xl mx-auto h-16 px-4 flex items-center justify-around">
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=dashboard">
                <span class="material-symbols-outlined text-[22px]">grid_view</span>
                <span>Dashboard</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=catalog">
                <span class="material-symbols-outlined text-[22px]">inventory_2</span>
                <span>Catalog</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-primary font-semibold text-xs" href="index.php?page=orders">
                <span class="material-symbols-outlined text-[22px]">local_shipping</span>
                <span>Orders</span>
            </a>
            <a class="flex flex-col items-center justify-center gap-0.5 w-16 h-12 text-on-surface-variant hover:text-primary transition-colors text-xs" href="index.php?page=nota">
                <span class="material-symbols-outlined text-[22px]">receipt_long</span>
                <span>Nota PDF</span>
            </a>
        </div>
    </nav>
</body>
</html>

<?php
// ----------------------------------------------------------------------
// 5. HALAMAN STRUK / NOTA PDF
// ----------------------------------------------------------------------
elseif ($page === 'nota'):
    $store = [
        "name" => "AMANDA TISU JAYA",
        "subtitle" => "Grosir & Distribusi Tisu Resmi",
        "address" => "Jl. Daan Mogot KM 12 No. 88, Cengkareng, Jakarta Barat",
        "phone" => "0812-8899-7722",
        "logo" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDNC-5oZzCNpQJZUTQVdmZRoEXKpa8xwwdOpOM5Ds546i-uPWsVF7GtqHUJs3jfkXimphMJ95qSWqbheATZQwC_saDEJSS3yFx0JEWY_eGXiCnmLaC__8QsXWBFHXVt-952waRdhGRO3KcEA8tnRnNVA1GOMqdGCQfgnxUbP1gupMIMwl27YopA0yNSm_sr7N55gfVjFMI34vgSQLYXQTD5SZqtlAISoU_Vsd8PeVQKyZi4t4JstZ1X"
    ];

    $transaction = [
        "invoice_no" => "ATJ-INV-202505-0891",
        "date" => "18 Mei 2025, 10:45",
        "customer_name" => "Toko Berkah Mandiri",
        "customer_id" => "AG-042",
        "cashier" => "Amanda Rahayu",
        "term" => "Tempo 14 Hari"
    ];

    $items = [
        ["name" => "Paseo Elegant Facial 250s", "qty" => "20 Dus", "price" => 285000, "subtotal" => 5700000, "ref" => "PS-FAC-250"],
        ["name" => "Nice Facial Tissue 900g", "qty" => "10 Dus", "price" => 230000, "subtotal" => 2300000, "ref" => "NC-FAC-900"],
        ["name" => "Jolly Kuliner 200s", "qty" => "5 Dus", "price" => 195000, "subtotal" => 975000, "ref" => "JL-KLN-200"]
    ];

    $subtotal_all = array_sum(array_column($items, 'subtotal'));
    $discount = 448750;
    $grand_total = $subtotal_all - $discount;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"/>
    <title>Struk PDF - <?php echo htmlspecialchars($transaction['invoice_no']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            header, .no-print { display: none !important; }
            body { background: white !important; color: black !important; padding: 0 !important; margin: 0 !important; }
            #receiptCanvas { box-shadow: none !important; border: 1px solid #ddd !important; width: 100% !important; max-width: 580px !important; }
        }
    </style>
</head>
<body class="bg-surface font-sans text-on-surface antialiased flex flex-col min-h-screen">
    <header class="fixed top-0 w-full z-50 bg-surface/85 backdrop-blur-xl shadow-sm no-print">
        <div class="h-16 px-4 flex items-center justify-between max-w-2xl mx-auto">
            <button onclick="history.back()" class="text-on-surface flex items-center gap-1 text-xs"><span class="material-symbols-outlined text-[18px]">arrow_back</span> Kembali</button>
            <span class="text-sm font-semibold">Struk PDF Preview</span>
            <button onclick="window.print()" class="text-xs font-bold text-primary flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">print</span> Cetak</button>
        </div>
    </header>

    <main class="flex-1 flex flex-col relative w-full max-w-xl mx-auto pt-20 pb-12 px-4">
        <div id="receiptCanvas" class="relative w-full rounded-2xl bg-white shadow-xl overflow-hidden p-6 border border-gray-100">
            <div class="flex flex-col items-center text-center pb-4 border-b border-dashed border-gray-200">
                <span class="text-lg font-bold text-gray-800"><?php echo htmlspecialchars($store['name']); ?></span>
                <span class="text-xs text-gray-500"><?php echo htmlspecialchars($store['subtitle']); ?></span>
                <p class="text-xs text-gray-500 mt-1"><?php echo htmlspecialchars($store['address']); ?></p>
            </div>

            <div class="my-4 text-xs space-y-1 bg-gray-50 p-3 rounded-xl">
                <div class="flex justify-between"><span class="text-gray-500">No. Nota:</span><span class="font-mono font-bold"><?php echo htmlspecialchars($transaction['invoice_no']); ?></span></div>
                <div class="flex justify-between"><span class="text-gray-500">Pelanggan:</span><span class="font-semibold"><?php echo htmlspecialchars($transaction['customer_name']); ?></span></div>
                <div class="flex justify-between"><span class="text-gray-500">Waktu:</span><span><?php echo htmlspecialchars($transaction['date']); ?></span></div>
            </div>

            <div class="divide-y divide-gray-100 my-4">
                <?php foreach ($items as $item): ?>
                <div class="py-2 flex justify-between text-xs">
                    <div>
                        <span class="font-semibold text-gray-800 block"><?php echo htmlspecialchars($item['name']); ?></span>
                        <span class="text-gray-400"><?php echo htmlspecialchars($item['qty']); ?> @ Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></span>
                    </div>
                    <span class="font-mono font-bold text-gray-800">Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></span>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="pt-4 border-t border-dashed border-gray-200 space-y-1.5 text-xs">
                <div class="flex justify-between text-gray-500"><span>Subtotal</span><span class="font-mono">Rp <?php echo number_format($subtotal_all, 0, ',', '.'); ?></span></div>
                <div class="flex justify-between text-gray-500"><span>Diskon</span><span class="font-mono text-red-600">-Rp <?php echo number_format($discount, 0, ',', '.'); ?></span></div>
                <div class="flex justify-between items-center text-sm font-bold pt-2 border-t">
                    <span>TOTAL</span>
                    <span class="text-base text-emerald-800 font-mono">Rp <?php echo number_format($grand_total, 0, ',', '.'); ?></span>
                </div>
            </div>
        </div>

        <div class="mt-4 no-print">
            <button onclick="window.print()" class="w-full py-3 rounded-xl bg-emerald-800 text-white font-semibold text-sm flex items-center justify-center gap-2 shadow-lg">
                <span class="material-symbols-outlined text-[20px]">picture_as_pdf</span> Cetak / Simpan PDF
            </button>
        </div>
    </main>
</body>
</html>
<?php endif; ?>