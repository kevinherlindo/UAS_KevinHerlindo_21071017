<body onload="window.print()">

<h1>Data Siswa</h1>
<table border="1" width="75%">
    <tr>
    <td>No</td>
    <td>Nama Guru</td>
    <td>Nama Siswa</td>
    <td>Nama Kurikulum</td>
    </tr>

    @foreach($nilaii as $rows)
    <tr>
    <td>{{ $loop->iteration }} </td>
    <td>{{ $rows->guru->nama_guru }}</td>
    <td>{{ $rows->siswa->nama_siswa }}</td>
    <td>{{ $rows->kurikulum->nama_kurikulum }} </td>
    </tr>
    @endforeach
</table>
    
</body>