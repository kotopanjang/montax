<h1 style="text-align: center;">{{ $title }}</h1>
<p style="text-align: center;">Montax - simple but significant service for your money and tax</p>

<table border=1>
    <thead>
        <tr>
            <td>No</td>
            <td>Tanggal</td>
            <td>Kategori</td>
            <td>Sub Kategori</td>
            <td>Jumlah</td>
            <td>Tahun</td>
            <td>Keterangan</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            $jumdata = count($rec['Tanggal']);
            for ($i=0; $i <$jumdata ; $i++) {
                echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>" . $rec['Tanggal'][$i] . "</td>";
                    echo "<td>" . $rec['jenis'][$i] . "</td>";
                    echo "<td>" . $rec['nama_katbesar'][$i] . "</td>";
                    echo "<td>" . $rec['Nilai'][$i] . "</td>";
                    echo "<td>" . $rec['Deskripsi'][$i] . "</td>";
                    echo "<td>" . $rec['Keterangan'][$i] . "</td>";
                echo "</tr>";
                $no++;
            }
        ?>
    </tbody>
</table>
