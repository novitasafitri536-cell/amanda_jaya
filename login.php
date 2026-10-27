<?php
// Set header & charset
header('Content-Type: text/html; charset=utf-8');

// Konfigurasi Aplikasi / Data Statis
$appName = "Amanda Tisu Jaya";
$appSubtitle = "Portal Agen & Operasional Grosir";
$appVersion = "v2.4.1";
$csWhatsappNumber = "6281234567890"; // Ganti dengan nomor WA CS Anda

// Skenario Penanganan Form Login Sederhana (contoh integrasi PHP)
$loginError = '';
$loginSuccess = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agentId = filter_input(INPUT_POST, 'agentId', FILTER_SANITIZE_SPECIAL_CHARS);
    $agentPassword = $_POST['agentPassword'] ?? '';

    if (!empty($agentId) && !empty($agentPassword)) {
        // Lakukan logika autentikasi / query database di sini
        // Contoh penanganan sederhana:
        $loginSuccess = "Berhasil masuk! Mengalihkan ke dashboard...";
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
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container-lowest": "#ffffff",
                        "surface-container-high": "#eae8e5",
                        "tertiary-fixed": "#ffdad2",
                        "inverse-primary": "#abcebe",
                        "background": "#fbf9f6",
                        "secondary-container": "#cee9da",
                        "secondary-fixed": "#cee9da",
                        "outline-variant": "#c1c8c3",
                        "on-primary-container": "#c6ead8",
                        "surface-container-low": "#f5f3f0",
                        "on-surface-variant": "#414844",
                        "on-surface": "#1b1c1a",
                        "on-secondary-fixed": "#092017",
                        "outline": "#727974",
                        "inverse-on-surface": "#f2f0ed",
                        "surface-variant": "#e4e2df",
                        "surface-dim": "#dbdad7",
                        "on-secondary": "#ffffff",
                        "surface-bright": "#fbf9f6",
                        "surface-container-highest": "#e4e2df",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#efeeeb",
                        "secondary-fixed-dim": "#b3ccbf",
                        "surface-tint": "#446557",
                        "on-secondary-container": "#52695e",
                        "on-tertiary-fixed": "#3d0700",
                        "tertiary-container": "#a04b36",
                        "primary-fixed-dim": "#abcebe",
                        "tertiary": "#823421",
                        "inverse-surface": "#30312f",
                        "on-primary-fixed-variant": "#2d4d40",
                        "tertiary-fixed-dim": "#ffb4a3",
                        "on-background": "#1b1c1a",
                        "surface": "#fbf9f6",
                        "on-tertiary-fixed-variant": "#7b2e1c",
                        "on-error": "#ffffff",
                        "secondary": "#4c6358",
                        "on-primary": "#ffffff",
                        "on-error-container": "#93000a",
                        "primary": "#325346",
                        "error-container": "#ffdad6",
                        "error": "#ba1a1a",
                        "on-primary-fixed": "#002116",
                        "on-tertiary-container": "#ffdad1",
                        "primary-container": "#4a6b5d",
                        "primary-fixed": "#c6ebd9",
                        "on-secondary-fixed-variant": "#354c41"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "space-xl": "2.5rem",
                        "space-sm": "0.5rem",
                        "margin-mobile": "1rem",
                        "gutter-mobile": "0.75rem",
                        "gutter": "1.25rem",
                        "space-md": "1rem",
                        "space-lg": "1.5rem",
                        "space-xs": "0.25rem",
                        "margin": "2rem"
                    },
                    fontFamily: {
                        sans: ["Plus Jakarta Sans", "sans-serif"]
                    }
                }
            }
        }
    </script>
    <style>
        @layer base {
            html, body {
                width: 100%;
                min-height: 100vh;
                margin: 0;
                padding: 0;
            }
            body {
                overscroll-behavior: none;
            }
            .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
            .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
        }
        ::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-surface text-on-surface font-sans min-h-screen flex flex-col justify-center items-center pt-safe pb-safe selection:bg-secondary-container selection:text-on-secondary-fixed">
    
    <main class="w-full flex-1 flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 relative">
        <div class="flex flex-col w-full max-w-md md:max-w-lg lg:max-w-xl relative overflow-hidden px-4 sm:px-6 py-6 sm:py-8 my-auto">
            
            <!-- Ambient Background Glows (Responsif Position) -->
            <div class="absolute -top-16 -left-20 w-64 md:w-80 h-64 md:h-80 rounded-full bg-secondary-container/40 blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/2 -right-24 w-72 md:w-96 h-72 md:h-96 rounded-full bg-primary-fixed/30 blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-10 w-64 h-64 rounded-full bg-secondary-container/20 blur-2xl pointer-events-none"></div>

            <!-- Header & Brand Intro Section -->
            <div class="relative z-10 flex flex-col items-center text-center mb-6 sm:mb-8">
                <!-- Status Pill -->
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-on-surface-variant mb-4 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    <span class="text-xs font-semibold tracking-wide uppercase">Agen Tisu </span>
                </div>

                <!-- Logo Shield -->
                <div class="relative mb-4">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full p-1 bg-surface-container-lowest shadow-md flex items-center justify-center">
                        <div class="w-full h-full rounded-full overflow-hidden flex items-center justify-center bg-surface-container-low">
                            <img alt="<?php echo htmlspecialchars($appName); ?> Logo" class="w-full h-full object-cover transform scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBwOIMeokhu-ugGF4U9002tLoMhghwvEksUXgXxRj8VbaVbQ-3aRMHVL3KcGRsQDwu62RuprQI_xV8zizBNmnvG5pQ9heqfgipMhfjkg06tjWukpyaW5tOCB5QcXzhE_AeergzqnnVttvJ7xHif4MmLavUg70rhrTqqcQZU6FIW5C-7Td9K-ZcJfuoVJ1-OS9WH1I5VyIwic9NivVQqPAfJ44PDUFeIJ71ixNWcKTNS6zyHxFbHRvXGZbjAjAEsSO6ODw"/>
                        </div>
                    </div>
                    
                </div>

                <!-- Brand Typography -->
                <h1 class="text-2xl sm:text-3xl font-bold text-on-surface tracking-tight"><?php echo htmlspecialchars($appName); ?></h1>
                <p class="text-sm text-on-surface-variant mt-1"><?php echo htmlspecialchars($appSubtitle); ?></p>

                <!-- Welcome Text -->
                <div class="mt-4 px-2 max-w-xs sm:max-w-sm">
                    <h2 class="text-lg sm:text-xl text-primary font-semibold">Selamat Datang Kembali</h2>
                    <p class="text-xs sm:text-sm text-on-surface-variant mt-1 leading-relaxed">
                        Masuk untuk mengelola pesanan, stok gudang, dan transaksi agen Amanda Tisu Jaya.
                    </p>
                </div>
            </div>

            <!-- Main Floating Login Card -->
            <div class="relative z-10 w-full rounded-2xl bg-surface-container-lowest shadow-xl p-5 sm:p-8 border border-surface-variant/30">
                
                <?php if (!empty($loginError)): ?>
                    <div class="mb-4 p-3 rounded-xl bg-error-container text-on-error-container text-xs sm:text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">error</span>
                        <span><?php echo htmlspecialchars($loginError); ?></span>
                    </div>
                <?php endif; ?>

                <?php if (!empty($loginSuccess)): ?>
                    <div class="mb-4 p-3 rounded-xl bg-secondary-container text-on-secondary-container text-xs sm:text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">check_circle</span>
                        <span><?php echo htmlspecialchars($loginSuccess); ?></span>
                    </div>
                <?php endif; ?>

                <form class="flex flex-col gap-4 sm:gap-5" id="agentLoginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <!-- Input 1: Username -->
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

                    <!-- Input 2: Password with Eye Toggle -->
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

                    <!-- Remember Me & Forgot Password Row -->
                    <div class="flex items-center justify-between pt-0.5">
                        <label class="flex items-center gap-2 cursor-pointer select-none">
                            <input checked class="sr-only peer" id="rememberMe" name="rememberMe" type="checkbox"/>
                            <div class="w-4 h-4 rounded bg-surface-container-high peer-checked:bg-primary transition-all flex items-center justify-center">
                                <span class="material-symbols-outlined text-on-primary text-[13px] opacity-0 peer-checked:opacity-100 transition-opacity">check</span>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-on-surface-variant">Ingat Saya</span>
                        </label>
                       
                    </div>

                    <!-- Primary Action CTA Button -->
                    <button class="w-full h-11 sm:h-12 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-semibold text-xs sm:text-sm flex items-center justify-center gap-2 transition-all active:scale-[0.98] shadow-md mt-1" id="loginSubmitBtn" type="submit">
                        <span>Login</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </button>

                    <!-- Organic Divider -->
                    <div class="relative flex items-center py-1">
                        <div class="w-full h-px bg-surface-variant"></div>
                      
                    </div>

                   
                </form>
            </div>

            <!-- Operational Quick Links / Footer Help -->
            <div class="relative z-10 flex flex-col items-center text-center mt-6 sm:mt-8 gap-3">
                <!-- Partner Registration Link -->
                <div class="inline-flex items-center gap-1.5 text-xs sm:text-sm text-on-surface-variant">
                  
                </div>

                <!-- WhatsApp Support Pill -->
                <a class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-surface-container text-on-surface hover:bg-secondary-container/60 transition-colors shadow-sm text-xs sm:text-sm" href="https://wa.me/<?php echo $csWhatsappNumber; ?>" rel="noopener noreferrer" target="_blank">
                    <span class="material-symbols-outlined text-primary text-[18px]">support_agent</span>
                    <span class="font-semibold text-on-secondary-container">Butuh bantuan? Hubungi Kami 085220025701</span>
                </a>

                <!-- Security Assurance & Version Details -->
                <div class="flex items-center gap-1.5 text-outline mt-1">
                    <span class="material-symbols-outlined text-[14px]">lock</span>
                  
                </div>
            </div>

        </div>
    </main>

    <!-- Interactive Script -->
    <script>
        (function() {
            const toggleBtn = document.getElementById('togglePasswordBtn');
            const pwdInput = document.getElementById('agentPassword');
            const eyeIcon = document.getElementById('pwdEyeIcon');

            if (toggleBtn && pwdInput && eyeIcon) {
                toggleBtn.addEventListener('click', function() {
                    const isPassword = pwdInput.getAttribute('type') === 'password';
                    pwdInput.setAttribute('type', isPassword ? 'text' : 'password');
                    eyeIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
                });
            }

            const bioBtn = document.getElementById('biometricBtn');
            if (bioBtn) {
                bioBtn.addEventListener('click', function() {
                    const originalContent = bioBtn.innerHTML;
                    bioBtn.innerHTML = '<span class="material-symbols-outlined text-primary text-[20px] animate-spin">progress_activity</span><span>Memindai Biometrik...</span>';
                    setTimeout(function() {
                        bioBtn.innerHTML = '<span class="material-symbols-outlined text-primary text-[20px]">check_circle</span><span>Sidik Jari Dikenali</span>';
                        setTimeout(function() {
                            bioBtn.innerHTML = originalContent;
                        }, 1500);
                    }, 1000);
                });
            }
        })();
    </script>
</body>
</html>