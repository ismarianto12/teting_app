<title>Report Hasil Pendapatan Daerah Tangerang selatan</title>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: #ddd;
        color: #000;
        width: auto;
        height: auto;
    }
</style>

<table>
    <thead>
        <tr>
            <th></th>
            <th>
                <center>
                    <h2> PEMERINTAH KOTA TANGERANG SELATAN </h2>
                    <h3>LAPORAN REALISASI ANGGARAN PENDAPATAN DAN BELANJA PEMDA </h3>
                    <h4> PER REKENING JENIS</h4>
                    TAHUN ANGGARAN {{ $tahun }}
                    <b>[{{ $opd['kode'] }}] - [{{ $opd['nama'] }}]</b>
                    <br />
                    PERIODE : {{ $dari }} S/D {{ $sampai }}
                    <br />
                </center>
                <br />
                <br />
            </th>
        </tr>

        <tr style="border-bottom: 0.1px solid #000">
            <th>No</th>
            <th>Uraian</th>
            <th>Pagu Anggaran</th>
            <th colspan="3">Jumlah Realisasi (Rp.)</th>
            <th colspan="2">Lebih Kurang<br /></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>S/D Periode Lalu</th>
            <th>Periode Ini</th>
            <th>Total</th>
            <th>(Rp.)</th>
            <th>%</th>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
        </tr>
    </thead>
    <tbody>
        @php
        $idx = 0; count($render);
        @endphp
        @foreach ($render as $list)
        <tr>
            <td @if($list['bold']['val']==TRUE) style="font-weight:bold" @endif>{{ $list['kd_rek']['val'] }}</td>
            <td @if($list['bold']['val']==TRUE) style="font-weight:bold" @endif>{{ $list['nm_rek']['val'] }}</td>
            <td>{{ $list['pagu']['val'] }}</td>
            <td>{{ $list['periode_lalu']['val'] }}</td>
            <td>{{ $list['periode_ini']['val'] }}</td>
            <td>{{ $list['total']['val'] }}</td>
            <td>{{ $list['divide']['val'] }}</td>
            <td>{{ $list['persen']['val'] }}</td>
        </tr>
        @php $idx++ @endphp
        @endforeach
    </tbody>
</table>