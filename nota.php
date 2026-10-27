<?php
// Contoh Data Transaksi (Dapat digantikan dengan hasil query Database)
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
    "term" => "Tempo 14 Hari (Jatuh Tempo: 01 Jun 2025)"
];

$items = [
    [
        "name" => "Paseo Elegant Facial 250s",
        "qty" => "20 Dus",
        "price" => 285000,
        "subtotal" => 5700000,
        "ref" => "PS-FAC-250"
    ],
    [
        "name" => "Nice Facial Tissue 900g",
        "qty" => "10 Dus",
        "price" => 230000,
        "subtotal" => 2300000,
        "ref" => "NC-FAC-900"
    ],
    [
        "name" => "Jolly Kuliner 200s",
        "qty" => "5 Dus",
        "price" => 195000,
        "subtotal" => 975000,
        "ref" => "JL-KLN-200"
    ]
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
    
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet"/>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config={darkMode:"class",theme:{extend:{colors:{"on-surface":"#1b1c1a","surface-container":"#efeeeb","secondary-container":"#cee9da","on-secondary-container":"#52695e","tertiary":"#823421","inverse-primary":"#abcebe","secondary-fixed":"#cee9da","surface":"#fbf9f6","secondary-fixed-dim":"#b3ccbf","primary-fixed-dim":"#abcebe","on-secondary-fixed-variant":"#354c41","inverse-on-surface":"#f2f0ed","on-error":"#ffffff","surface-tint":"#446557","error-container":"#ffdad6","surface-container-highest":"#e4e2df","tertiary-container":"#a04b36","secondary":"#4c6358","tertiary-fixed":"#ffdad2","primary-fixed":"#c6ebd9","on-secondary-fixed":"#092017","on-secondary":"#ffffff","on-primary-container":"#c6ead8","surface-dim":"#dbdad7","outline-variant":"#c1c8c3","on-tertiary-fixed-variant":"#7b2e1c","tertiary-fixed-dim":"#ffb4a3","background":"#fbf9f6","surface-variant":"#e4e2df","on-tertiary-container":"#ffdad1","error":"#ba1a1a","primary-container":"#4a6b5d","on-primary-fixed":"#002116","outline":"#727974","on-surface-variant":"#414844","on-tertiary":"#ffffff","surface-container-lowest":"#ffffff","surface-bright":"#fbf9f6","on-primary":"#ffffff","primary":"#325346","on-primary-fixed-variant":"#2d4d40","surface-container-low":"#f5f3f0","on-error-container":"#93000a","on-tertiary-fixed":"#3d0700","on-background":"#1b1c1a","inverse-surface":"#30312f","surface-container-high":"#eae8e5"},borderRadius:{DEFAULT:"0.25rem",lg:"0.5rem",xl:"0.75rem",full:"9999px"},fontFamily:{"body-md":["Plus Jakarta Sans"]}}}};</script>
    
    <style>
        @layer base {
            html, body { width: 100vw; margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
            .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
        }
        ::-webkit-scrollbar { display: none; }

        /* Style Khusus Cetak PDF */
        @media print {
            /* Sembunyikan elemen UI seperti Header, Button, dan Ribbon saat dicetak ke PDF */
            header, .no-print, .sticky-controls {
                display: none !important;
            }

            body {
                background: white !important;
                color: black !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            main {
                padding-top: 0 !important;
                max-width: 100% !important;
            }

            #receiptCanvas {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
                border-radius: 0 !important;
                margin: 0 auto !important;
                width: 100% !important;
                max-width: 580px !important;
            }
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface antialiased flex flex-col min-h-screen">

    <!-- Header (Sembunyi saat cetak PDF) -->
    <header class="fixed top-0 w-full z-50 pt-safe bg-surface/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] no-print">
        <div class="h-16 px-4 sm:px-8 flex items-center justify-between gap-2 max-w-2xl mx-auto">
            <div class="flex items-center gap-2 min-w-0">
                <button aria-label="Kembali" class="w-11 h-11 -ml-2 flex items-center justify-center rounded-full text-on-surface hover:bg-surface-container active:bg-surface-container-high transition-colors" onclick="history.back()" type="button">
                    <span class="material-symbols-outlined text-[22px]">arrow_back</span>
                </button>
                <img alt="Logo" class="h-7 w-auto object-contain flex-shrink-0" src="<?php echo htmlspecialchars($store['logo']); ?>"/>
                <div class="flex flex-col min-w-0 pl-1">
                    <span class="text-[10px] uppercase text-secondary tracking-wider truncate font-bold"><?php echo htmlspecialchars($store['name']); ?></span>
                    <span class="text-[18px] font-semibold text-on-surface truncate">Receipt Preview (PDF Mode)</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col relative w-full max-w-xl mx-auto pt-16 pb-safe bg-surface">
        <div class="flex flex-col w-full px-4 sm:px-6 pb-24">
            
            <!-- Top Ribbon Format (Sembunyi saat cetak PDF) -->
            <div class="flex items-center justify-between gap-2 pt-4 pb-3 no-print">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container text-[12px] font-semibold">
                    <span class="material-symbols-outlined text-[16px] text-primary">picture_as_pdf</span>
                    Format Dokumen PDF
                </span>
                <div class="flex items-center gap-2">
                    <button class="w-9 h-9 flex items-center justify-center rounded-full bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors" onclick="window.print()" title="Cetak / Simpan PDF" type="button">
                        <span class="material-symbols-outlined text-[18px]">download</span>
                    </button>
                </div>
            </div>

            <!-- Receipt Canvas (Area Struk Utama) -->
            <div id="receiptCanvas" class="relative w-full rounded-2xl bg-surface-container-lowest shadow-xl overflow-hidden mb-6">
                <!-- Top Edge Pattern -->
                <div class="h-2.5 w-full bg-secondary-container/60 opacity-80" style="background-image: radial-gradient(circle at 10px -5px, transparent 12px, currentColor 13px); background-size: 20px 20px;"></div>
                
                <div class="p-4 sm:p-6 flex flex-col gap-4">
                    <!-- Header Struk -->
                    <div class="flex flex-col items-center text-center pb-3">
                        <div class="w-16 h-16 rounded-full bg-surface-container-low p-2 mb-2 shadow-inner flex items-center justify-center">
                            <img alt="Logo" class="w-full h-full object-contain" src="<?php echo htmlspecialchars($store['logo']); ?>"/>
                        </div>
                        <span class="text-[18px] text-on-surface font-bold tracking-tight"><?php echo htmlspecialchars($store['name']); ?></span>
                        <span class="text-[12px] text-secondary tracking-widest uppercase mb-1 font-semibold"><?php echo htmlspecialchars($store['subtitle']); ?></span>
                        <p class="text-[12px] text-on-surface-variant max-w-xs leading-relaxed">
                            <?php echo htmlspecialchars($store['address']); ?><br/>
                            <span class="font-medium text-on-surface">Telp/WA: <?php echo htmlspecialchars($store['phone']); ?></span>
                        </p>
                    </div>

                    <div class="w-full border-t border-dashed border-outline-variant"></div>

                    <!-- Meta Data Transaksi -->
                    <div class="grid grid-cols-2 gap-y-2 gap-x-3 text-[12px] bg-surface-container-low p-3 rounded-xl">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-secondary uppercase font-bold">No. Nota</span>
                            <span class="font-semibold text-on-surface font-mono tracking-tight text-[12px]"><?php echo htmlspecialchars($transaction['invoice_no']); ?></span>
                        </div>
                        <div class="flex flex-col text-right">
                            <span class="text-[10px] text-secondary uppercase font-bold">Waktu Nota</span>
                            <span class="font-medium text-on-surface"><?php echo htmlspecialchars($transaction['date']); ?></span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] text-secondary uppercase font-bold">Pelanggan</span>
                            <span class="font-semibold text-on-surface"><?php echo htmlspecialchars($transaction['customer_name']); ?></span>
                            <span class="text-[11px] text-secondary">ID: <?php echo htmlspecialchars($transaction['customer_id']); ?></span>
                        </div>
                        <div class="flex flex-col text-right">
                            <span class="text-[10px] text-secondary uppercase font-bold">Petugas Admin</span>
                            <span class="font-medium text-on-surface"><?php echo htmlspecialchars($transaction['cashier']); ?></span>
                        </div>
                        <div class="col-span-2 pt-1 mt-1 border-t border-dashed border-outline-variant flex items-center justify-between">
                            <span class="text-[10px] text-secondary uppercase font-bold">Metode & Termin</span>
                            <span class="font-semibold text-tertiary-container bg-tertiary-fixed px-2 py-0.5 rounded-full text-[10px]">
                                <?php echo htmlspecialchars($transaction['term']); ?>
                            </span>
                        </div>
                    </div>

                    <!-- Daftar Item -->
                    <div class="flex flex-col">
                        <div class="flex justify-between items-center py-1.5 px-2 bg-surface-container rounded-lg text-secondary text-[12px] font-semibold">
                            <span class="w-1/2">Nama Produk</span>
                            <span class="w-1/4 text-center">Qty x Harga</span>
                            <span class="w-1/4 text-right">Subtotal</span>
                        </div>
                        <div class="flex flex-col divide-y divide-surface-container-high py-1">
                            <?php foreach ($items as $item): ?>
                            <div class="flex flex-col py-2 px-1">
                                <div class="flex justify-between items-start">
                                    <span class="font-medium text-on-surface text-[13px] leading-tight"><?php echo htmlspecialchars($item['name']); ?></span>
                                    <span class="font-mono text-on-surface font-semibold text-[13px]">Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></span>
                                </div>
                                <div class="flex justify-between text-secondary text-[11px] mt-0.5">
                                    <span><?php echo htmlspecialchars($item['qty']); ?> @ Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></span>
                                    <span class="text-secondary/70">Ref: <?php echo htmlspecialchars($item['ref']); ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="w-full border-t border-dashed border-outline-variant"></div>

                    <!-- Ringkasan Pembayaran -->
                    <div class="flex flex-col gap-1.5 text-[12px]">
                        <div class="flex justify-between text-secondary">
                            <span>Subtotal (<?php echo count($items); ?> Jenis Produk)</span>
                            <span class="font-mono text-on-surface">Rp <?php echo number_format($subtotal_all, 0, ',', '.'); ?></span>
                        </div>
                        <div class="flex justify-between text-secondary">
                            <span>Diskon Grosir (5%)</span>
                            <span class="font-mono text-tertiary">-Rp <?php echo number_format($discount, 0, ',', '.'); ?></span>
                        </div>
                        <div class="flex justify-between items-center text-secondary">
                            <span>Ongkir (Armada Agen)</span>
                            <span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px] font-bold">
                                Gratis Ongkir
                            </span>
                        </div>
                        <div class="p-3 rounded-xl bg-surface-container mt-1 flex justify-between items-baseline">
                            <span class="text-[16px] font-bold text-on-surface">TOTAL TAGIHAN</span>
                            <span class="text-[18px] font-bold text-primary font-mono tracking-tight">Rp <?php echo number_format($grand_total, 0, ',', '.'); ?></span>
                        </div>
                    </div>

                    <div class="w-full border-t border-dashed border-outline-variant"></div>

                    <!-- Tanda Tangan & QR Code Validasi -->
                               
                            </div>
                            <div class="flex-1 grid grid-cols-2 gap-2 text-center text-[11px] text-secondary">
                                <div class="flex flex-col justify-between h-20">
                                    <span>Penerima Toko,</span>
                                    <div class="border-b border-outline-variant mx-1"></div>
                                    <span class="font-medium text-on-surface">( <?php echo htmlspecialchars($transaction['customer_name']); ?> )</span>
                                </div>
                                <div class="flex flex-col justify-between h-20">
                                    <span>Pengirim,</span>
                                    <div class="border-b border-outline-variant mx-1"></div>
                                    <span class="font-medium text-on-surface">( Amanda Tim )</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-2.5 rounded-lg bg-surface-container-low text-center">
                            <p class="text-[11px] text-secondary leading-snug">
                                Terima kasih atas kerja samanya.<br/>
                                Barang yang sudah diterima dalam kondisi baik & tersegel rapi.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Edge Pattern -->
                <div class="h-3 w-full bg-surface-container-low" style="background-image: radial-gradient(circle at 10px 14px, transparent 10px, currentColor 11px); background-size: 20px 20px;"></div>
            </div>

            <!-- Tombol Cetak PDF Utama (Sembunyi saat cetak PDF) -->
            <div class="sticky bottom-2 z-30 flex flex-col gap-2 pt-1 sticky-controls no-print">
                <button onclick="window.print()" class="w-full py-3.5 px-4 rounded-2xl bg-primary text-on-primary text-[16px] font-semibold flex items-center justify-center gap-2 shadow-xl hover:bg-surface-tint active:scale-[0.99] transition-all" type="button">
                    <span class="material-symbols-outlined text-[24px]">picture_as_pdf</span>
                    <span>Cetak / Simpan PDF Struk</span>
                </button>
            </div>

        </div>
    </main>

</body>