<h1 style="text-align: center;">{{ $title }}</h1>
<p style="text-align: center;">Montax - simple but significant service for your money and tax</p>

<table border = 1>
    <thead>
        <tr>
            <td>No</td>
            <td>Tanggal</td>
            <td>Jenis</td>
            <td>Jumlah</td>
            <td>Keterangan</td>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1;?>
        @foreach ( $rec as $row )
        <tr>
            <td> <?php echo $num; ?></td>
            <td> {{ $row->Tanggal }} </td>
            @if ($row->Jenis != "")
                @if ($row->Jenis == "Gaji")
                    <td> {{$row->Jenis}} </td>
                @else
                    <td> {{$row->Jenis}}  </td>
                @endif
            @endif
            <td> {{ $row->Jumlah }} </td>
            <td> {{ $row->Keterangan }} </td>
        </tr>
        <?php $num++;?>
        @endforeach
    </tbody>
</table>

