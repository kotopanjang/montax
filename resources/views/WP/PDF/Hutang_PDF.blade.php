<h1 style="text-align: center;">{{ $title }}</h1>
<p style="text-align: center;">Montax - simple but significant service for your money and tax</p>

<table border=1>
    <thead>
        <tr>
            <td>No</td>
            <td>Tanggal</td>
            <td>Tanggal Jatuh Tempo</td>
            <td>Jumlah</td>
            <td>Pemberi Pinjaman</td>
            <td>Keterangan</td>
            <td>Masuk Ke</td>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1;?>
        @foreach ( $rec as $row )
        <tr>
            <td>
                <?php echo $num; ?>
            </td>
            <td> {{$row->Tanggal}} </td>
            <td> {{$row->Tanggal_JatuhTempo}} </td>
            <td> {{$row->Jumlah}} </td>
            <td> {{$row->Pemberi_Pinjaman}} </td>
            <td> {{$row->Keterangan}} </td>
            <td> {{$row->Masuk_Ke}} </td>
        </tr>
        <?php $num++;?>
        @endforeach
    </tbody>
</table>






