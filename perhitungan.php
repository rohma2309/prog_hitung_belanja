<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon Belanja Rohmanisah 2309</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FFF2E1, #A79277);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
            margin: 20px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #706233;
        }

        h2 {
            color: #706233;
            font-size: 2em;
            margin-bottom: 20px;
        }

        hr {
            border: none;
            border-top: 3px solid #603F26;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.2em;
            color: #505050;
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }

        .radio-group {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="radio"] {
            margin: 0 15px;
            cursor: pointer;
        }

        input[type="number"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1.1em;
            color: #555;
        }

        input[type="submit"] {
            background-color: #AF8F6F;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #6f4E37;
        }

        .output {
            background-color: #FFF8E8;
            border-left: 6px solid #6C4E31;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            text-align: left;
        }

        .output h3 {
            color: #603F26;
        }

        .output p {
            color: #333;
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <div class="card">
        <!--ini judulnya-->
        <h1>Menghitung Pembayaran Belanja</h1>
        <h2>Toko Rohmanisah 23.2300.0009</h2>
        <hr>

        <!--di bawah ini adlh form input-->
        <form method="post" action="">
            <label>Apakah Anda member?</label>
            <div class="radio-group">
                <input type="radio" id="member_ya" name="status_member" value="ya" required>
                <label for="member_ya">Ya</label>
                <input type="radio" id="member_tidak" name="status_member" value="tidak" required>
                <label for="member_tidak">Tidak</label>
            </div>

            <label for="total_belanja">Masukkan total belanja:</label>
            <input type="number" id="total_belanja" name="total_belanja" min="0" step="1" required>

            <input type="submit" value="Hitung Diskon">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari form pengisian input di atas nya 
            $status_member_rohma = strtolower($_POST['status_member']);
            $total_belanja_rohma = intval($_POST['total_belanja']); // Ambil sbgai integer

            // untuk kondisi diskon yg di dpat pembeli
            if ($status_member_rohma === 'ya') {
                if ($total_belanja_rohma > 1000000) { //dlm sini dpat diskon untuk pembelian 1jt lebih jika satu juta pas tidak dapat %
                    $diskon_rohma = 0.15;
                    $ket_diskon_rohma = "Anda mendapatkan diskon 15% sebagai member!";
                } else if ($total_belanja_rohma >= 500000) {
                    $diskon_rohma = 0.1;
                    $ket_diskon_rohma = "Anda mendapatkan diskon 10% sebagai member!";
                } else {
                    $diskon_rohma = 0.1;
                    $ket_diskon_rohma = "Anda mendapatkan diskon 10% sebagai member!";
                }
            }
            if ($status_member_rohma === 'tidak') {
                if ($total_belanja_rohma >= 1000000) {
                    $diskon_rohma = 0.1;
                    $ket_diskon_rohma = "Anda mendapatkan diskon 10%!";
                } else if ($total_belanja_rohma >= 500000) {
                    $diskon_rohma = 0.05;
                    $ket_diskon_rohma = "Anda mendapatkan diskon 5%!";
                } else {
                    $diskon_rohma = 0;
                    $ket_diskon_rohma = "Maaf, Anda tidak mendapatkan diskon.";
                }
            }

            // Hitung total byar
            $total_bayar = $total_belanja_rohma - ($total_belanja_rohma * $diskon_rohma);

            // sebelah ini tmpiln output hasil yg di hitungkan di dlmnya
            echo "<div class='output'>";
            echo "<h3>Total belanja: Rp " . number_format($total_belanja_rohma, 0, ',', '.') . "</h3>";
            echo "<p>" . $ket_diskon_rohma . "</p>" . "<br>";
            echo "<h3>Total pembayaran: Rp " . number_format($total_bayar, 0, ',', '.') . "</h3>";
            echo "<p>Terimakasih Selamat Berbelanja dan Datang Kembali!</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>