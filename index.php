<?php
// Menambahkan data produk
$products = [
    [
        "nama" => "Monitor 31 Inch",
        "kategori" => "Elektronik",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Asus",
        "kategori" => "Komputer",
        "harga" => 8500000,
        "stok" => 2
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga" => 150000,
        "stok" => 10
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "Aksesoris",
        "harga" => 750000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 5
    ],
    [
        "nama" => "USB Flashdrive 84GB",
        "kategori" => "Penyimpanan",
        "harga" => 85000,
        "stok" => 0
    ]
];

// Menghitung jumlah produk
$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Cia Store</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <p style="font-size: 0.8rem; letter-spacing: 2px;">CIA STORE</p>
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#katalog" class="btn-hero">Lihat Produk</a>
    </section>

    <!-- Main Content -->
    <main class="container" id="katalog">
        <div class="catalog-header">
            <div>
                <p style="font-size: 0.8rem; color: #777;">OUR PRODUCTS</p>
                <h2>Katalog Produk</h2>
            </div>
            <!-- Menampilkan Total Produk -->
            <div>Total Produk: <strong><?= $total_produk; ?></strong></div>
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            <?php foreach ($products as $item): ?>
                <?php
                // Logika Challenge: Diskon 10% jika harga >= Rp1.000.000
                $has_discount = $item['harga'] >= 1000000;
                $harga_akhir = $item['harga'];
                
                if ($has_discount) {
                    $harga_akhir = $item['harga'] - ($item['harga'] * 0.10);
                }
                ?>

                <div class="product-card">
                    <div>
                        <!--(Challenge) -->
                        <?php if ($has_discount): ?>
                            <div class="badge-discount">DISKON 10%</div>
                        <?php endif; ?>

                        <span class="category"><?= htmlspecialchars($item['kategori']); ?></span>
                        <h3 class="product-title"><?= htmlspecialchars($item['nama']); ?></h3>

                        <!-- Harga & Diskon -->
                        <div class="price-section">
                            <?php if ($has_discount): ?>
                                <div class="old-price">Rp<?= number_format($item['harga'], 0, ',', '.'); ?></div>
                            <?php endif; ?>
                            <div class="final-price">Rp<?= number_format($harga_akhir, 0, ',', '.'); ?></div>
                        </div>
                    </div>

                    <div>
                        <!-- Status Stok -->
                        <div class="stock-info">
                            <span>Stok: <?= $item['stok']; ?></span>
                            <?php if ($item['stok'] > 0): ?>
                                <span class="status-available">Tersedia</span>
                            <?php else: ?>
                                <span class="status-out">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <!-- Tombol Beli / Disabled -->
                        <?php if ($item['stok'] > 0): ?>
                            <button class="btn-buy">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-buy" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?= date("Y"); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>