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
            <td>Sumber Dana</td>
            <td>Keterangan</td>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1;?>
        @foreach ( $rec as $row )
        <tr>
            <td>
                <?php echo $num; ?>
            </td>
            <td> {{ $row->Tanggal }}</td>
            <td> {{ $row->cn }}</td>
            <td> {{ $row->scn }}</td>
            <td> {{ $row->Jumlah }}</td>
            <td> {{ $row->sdj . " - " . $row->sdi }}</td>
            <td> {{ $row->Keterangan }}</td>
        </tr>
        <?php $num++;?>
        @endforeach
    </tbody>
</table>
