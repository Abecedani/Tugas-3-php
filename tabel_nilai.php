<?php
class Mahasiswa {
    public $nama, $nim, $uts, $uas, $na, $grade;

    public function __construct($nama, $nim, $uts, $uas) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->uts = $uts;
        $this->uas = $uas;
        $this->na = ($uts * 0.4) + ($uas * 0.6);
        $this->grade = $this->hitungGrade($this->na);
    }

    private function hitungGrade($nilai) {
        if ($nilai >= 85) return "A";
        elseif ($nilai >= 75) return "B";
        elseif ($nilai >= 65) return "C";
        elseif ($nilai >= 50) return "D";
        else return "E";
    }
}

$daftar_mhs = [
    new Mahasiswa("Ahmad Dani", "F1D02410140", 85, 90),
    new Mahasiswa("Ardi", "F1D02410141", 55, 60),
    new Mahasiswa("Ikky", "F1D02410142", 70, 75),
    new Mahasiswa("Budi", "F1D02410143", 45, 50),
    new Mahasiswa("Siti", "F1D02410144", 90, 85)
];

$total_na = 0;
foreach($daftar_mhs as $m) { $total_na += $m->na; }
$rata_rata = $total_na / count($daftar_mhs);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #3498db; color: white; }
        .kurang { background-color: #fff9c4; color: #d32f2f; font-weight: bold; } /* Kuning/Merah untuk < 60 */
        tr:nth-child(even) { background-color: #f2f2f2; }
        .summary { margin-top: 15px; font-weight: bold; font-size: 1.1em; }
    </style>
</head>
<body>
    <h2>Daftar Nilai Mahasiswa</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
        <?php foreach ($daftar_mhs as $mhs): ?>
            <tr class="<?php echo ($mhs->na < 60) ? 'kurang' : ''; ?>">
                <td><?php echo $mhs->nama; ?></td>
                <td><?php echo $mhs->nim; ?></td>
                <td><?php echo $mhs->uts; ?></td>
                <td><?php echo $mhs->uas; ?></td>
                <td><?php echo number_format($mhs->na, 2); ?></td>
                <td><?php echo $mhs->grade; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p class="summary">Rata-rata Kelas: <?php echo number_format($rata_rata, 2); ?></p>
</body>
</html>