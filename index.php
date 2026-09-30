<?php
$products = [
    ['nama' => 'Laptop UltraBook Pro 14', 'kategori' => 'Komputer & Laptop', 'harga' => 12500000, 'stok' => 5],
    ['nama' => 'Smartphone X Pro 128GB', 'kategori' => 'Handphone', 'harga' => 4500000, 'stok' => 12],
    ['nama' => 'Wireless Headphone Noise Cancelling', 'kategori' => 'Audio', 'harga' => 1850000, 'stok' => 0],
    ['nama' => 'Mechanical Gaming Keyboard RGB', 'kategori' => 'Aksesoris PC', 'harga' => 750000, 'stok' => 8],
    ['nama' => 'Mouse Wireless Ergonomis', 'kategori' => 'Aksesoris PC', 'harga' => 250000, 'stok' => 15],
    ['nama' => 'Smartwatch Fitness Tracker', 'kategori' => 'Wearable', 'harga' => 950000, 'stok' => 0],
    ['nama' => 'Monitor Gaming 27 Inch 144Hz', 'kategori' => 'Komputer & Laptop', 'harga' => 3200000, 'stok' => 3]
];

function formatRupiah($n) { return 'Rp ' . number_format($n, 0, ',', '.'); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Simple</title>
    <style>
        :root {
            --pink: #ec4899;
            --pink-hover: #db2777;
            --pink-light: #fdf2f8;
            --tosca: #14b8a6;
            --tosca-dark: #0f766e;
            --tosca-light: #f0fdf4;
            --bg: #f8fafc;
            --text: #334155;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background: var(--bg); color: var(--text); min-height: 100vh; display: flex; flex-direction: column; }

        /* Header Navigation */
        header { 
            background: linear-gradient(135deg, var(--pink), var(--tosca)); 
            color: white; 
            padding: 1rem 2rem; 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .logo { font-size: 1.5rem; font-weight: 700; letter-spacing: 0.5px; }
        nav a { color: white; text-decoration: none; margin-left: 1.2rem; font-weight: 500; transition: opacity 0.2s; }
        nav a:hover { opacity: 0.8; }

        /* Main Container */
        main { max-width: 1000px; margin: 2rem auto; padding: 0 1rem; flex: 1; width: 100%; }

        /* Top Bar */
        .info-bar { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e2e8f0;
        }
        .info-bar h2 { color: var(--tosca-dark); font-size: 1.4rem; }
        .badge-count { 
            background: var(--pink); 
            color: white; 
            padding: 0.3rem 0.8rem; 
            border-radius: 20px; 
            font-size: 0.85rem; 
            font-weight: 600; 
        }

        /* Product Grid & Cards  */
        .product-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); 
            gap: 1.25rem; 
        }
        .card { 
            background: white; 
            border-radius: 12px; 
            padding: 1.25rem; 
            border-left: 5px solid var(--tosca);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex; 
            flex-direction: column; 
            justify-content: space-between;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover { transform: translateY(-3px); box-shadow: 0 8px 15px -3px rgba(0, 0, 0, 0.08); }
        
        .category { 
            font-size: 0.75rem; 
            color: var(--tosca-dark); 
            font-weight: 700; 
            text-transform: uppercase; 
            letter-spacing: 0.5px;
        }
        .title { font-size: 1.05rem; color: #0f172a; margin: 0.3rem 0 0.8rem; line-height: 1.3; }

        .price-section { margin-bottom: 0.8rem; }
        .original-price { font-size: 0.8rem; color: #94a3b8; text-decoration: line-through; }
        .discount-badge { 
            background: var(--pink); 
            color: white; 
            font-size: 0.65rem; 
            font-weight: bold; 
            padding: 0.1rem 0.4rem; 
            border-radius: 4px; 
            margin-left: 0.3rem;
        }
        .final-price { font-size: 1.15rem; font-weight: 700; color: var(--pink); margin-top: 0.1rem; }

        .stock-info { 
            font-size: 0.8rem; 
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 1rem;
            color: #64748b;
        }
        .status-available { color: var(--tosca-dark); font-weight: 600; }
        .status-empty { color: #e11d48; font-weight: 600; }

        /* Buttons */
        .btn { 
            width: 100%; 
            padding: 0.6rem; 
            border: none; 
            border-radius: 8px; 
            font-weight: 600; 
            cursor: pointer; 
            transition: background 0.2s;
        }
        .btn-primary { background: var(--tosca); color: white; }
        .btn-primary:hover { background: var(--tosca-dark); }
        .btn-disabled { background: #e2e8f0; color: #94a3b8; cursor: not-allowed; }

        /* Footer */
        footer { 
            background: white; 
            border-top: 1px solid #e2e8f0;
            color: #64748b; 
            text-align: center; 
            padding: 1.2rem; 
            margin-top: auto; 
            font-size: 0.85rem; 
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Cia Store</div>
        <nav>
            <a href="#">Beranda</a>
            <a href="#">Katalog</a>
            <a href="#">Kontak</a>
        </nav>
    </header>

    <main>
        <div class="info-bar">
            <h2>Katalog Produk</h2>
            <span class="badge-count"><?= count($products); ?> Produk</span>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $item): 
                $diskon = $item['harga'] >= 1000000;
                $hargaAkhir = $diskon ? $item['harga'] * 0.9 : $item['harga'];
                $tersedia = $item['stok'] > 0;
            ?>
                <div class="card">
                    <div>
                        <span class="category"><?= $item['kategori']; ?></span>
                        <h3 class="title"><?= $item['nama']; ?></h3>
                    </div>

                    <div>
                        <div class="price-section">
                            <?php if ($diskon): ?>
                                <div>
                                    <span class="original-price"><?= formatRupiah($item['harga']); ?></span>
                                    <span class="discount-badge">OFF 10%</span>
                                </div>
                            <?php endif; ?>
                            <div class="final-price"><?= formatRupiah($hargaAkhir); ?></div>
                        </div>

                        <div class="stock-info">
                            <span>Stok: <?= $item['stok']; ?></span>
                            <span class="<?= $tersedia ? 'status-available' : 'status-empty'; ?>">
                                <?= $tersedia ? 'Tersedia' : 'Habis'; ?>
                            </span>
                        </div>

                        <button class="btn <?= $tersedia ? 'btn-primary' : 'btn-disabled'; ?>" <?= !$tersedia ? 'disabled' : ''; ?>>
                            <?= $tersedia ? 'Beli Sekarang' : 'Stok Habis'; ?>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> Cia Store — Simple & Minimalist Catalog</p>
    </footer>

</body>
</html>
