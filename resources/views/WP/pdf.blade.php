<! DOCTYPE html>
<html>

<head>
    <title>Laravel 7 Generate PDF From View Example Tutorial - NiceSnippets</title>
</head>

<body>
    <h1>Welcome to Nicesnippets.com - {{ $title }}</h1>
    <p>NiceSnippets Blog provides you latest Code Tutorials on PHP</p>

    <hr>
        <table>
            @foreach ( $apa as $row )
            <tr>
                <td> {{ $row->kode_bank }} </td>
                <td> {{ $row->nama_bank   }} </td>
            </tr>
            @endforeach
        </table>

</body>

</html>
