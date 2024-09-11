<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Nilai Siswa</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Rata-rata</th>
                    <th>Status</th>
                    <th>Mata Pelajaran yang Harus Diperbaiki</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Data siswa
                $siswa = [
                    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
                    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
                    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
                    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
                    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
                ];

                $totalLulus = 0;
                $totalTidakLulus = 0;

                // Fungsi untuk menentukan nilai minimum
                function nilai_terendah($matematika, $bahasa_inggris, $ipa) {
                    return min($matematika, $bahasa_inggris, $ipa);
                }

                foreach ($siswa as $data) {
                    $rata_rata = ($data['matematika'] + $data['bahasa_inggris'] + $data['ipa']) / 3;
                    $mata_pelajaran = "";

                    // Menentukan status kelulusan
                    if ($rata_rata >= 75) {
                        $status = "Lulus";
                        $totalLulus++;
                    } else {
                        $status = "Tidak Lulus";
                        $totalTidakLulus++;
                        $nilai_terendah = nilai_terendah($data['matematika'], $data['bahasa_inggris'], $data['ipa']);

                        // Tentukan mata pelajaran yang harus diperbaiki
                        if ($nilai_terendah == $data['matematika']) {
                            $mata_pelajaran = "Matematika";
                        } elseif ($nilai_terendah == $data['bahasa_inggris']) {
                            $mata_pelajaran = "Bahasa Inggris";
                        } else {
                            $mata_pelajaran = "IPA";
                        }
                    }

                    echo "<tr>";
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . round($rata_rata, 2) . "</td>";
                    echo "<td>" . $status . "</td>";
                    echo "<td>" . ($status == "Tidak Lulus" ? $mata_pelajaran : "-") . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="summary">
            <p>Total siswa lulus: <?php echo $totalLulus; ?></p>
            <p>Total siswa tidak lulus: <?php echo $totalTidakLulus; ?></p>
        </div>
    </div>
</body>
</html>
