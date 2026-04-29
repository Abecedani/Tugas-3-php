<?php
function celsiusToFahrenheit($c) { return ($c * 9/5) + 32; }
function fahrenheitToCelsius($f) { return ($f - 32) * 5/9; }
function celsiusToKelvin($c) { return $c + 273.15; }

$hasil = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu = $_POST['suhu'];
    $jenis = $_POST['jenis'];

    if (is_numeric($suhu)) {
        if ($jenis == "c_to_f") {
            $hasil = $suhu . " °C = " . celsiusToFahrenheit($suhu) . " °F";
        } elseif ($jenis == "f_to_c") {
            $hasil = $suhu . " °F = " . fahrenheitToCelsius($suhu) . " °C";
        } elseif ($jenis == "c_to_k") {
            $hasil = $suhu . " °C = " . celsiusToKelvin($suhu) . " K";
        }
    } else {
        $error = "Masukkan angka yang valid!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; max-width: 400px; margin: auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background: #2ecc71; color: white; border: none; cursor: pointer; }
        .result { background: #e8f5e9; padding: 10px; border-left: 5px solid #2ecc71; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Konversi Suhu</h2>
        <form method="post">
            <input type="text" name="suhu" placeholder="Masukkan angka suhu" required>
            <select name="jenis">
                <option value="c_to_f">Celsius &rarr; Fahrenheit</option>
                <option value="f_to_c">Fahrenheit &rarr; Celsius</option>
                <option value="c_to_k">Celsius &rarr; Kelvin</option>
            </select>
            <button type="submit">Konversi</button>
        </form>

        <?php if ($hasil): ?>
            <div class="result"><strong>Hasil:</strong> <?php echo $hasil; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>