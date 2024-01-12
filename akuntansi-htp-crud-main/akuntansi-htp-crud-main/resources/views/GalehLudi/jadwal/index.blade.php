@extends('GalehLudi.template')

@section('content')
    <div
        class="scale-100 p-6 bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none flex">
        <div>
            <h2 class="text-xl font-semibold text-white">Data Jadwal</h2>
            <div class="mt-4 text-gray-400 text-sm leading-relaxed">
                <table class="border-collapse border border-slate-500">
                    <thead class="bg-slate-700 text-white">
                        <tr>
                            <th class="border border-slate-600 px-2 py-1">No</th>
                            <th class="border border-slate-600 px-2 py-1">Matkul</th>
                            <th class="border border-slate-600 px-2 py-1">Dosen</th>
                            <th class="border border-slate-600 px-2 py-1">Prodi</th>
                            <th class="border border-slate-600 px-2 py-1">Tahun</th>
                            <th class="border border-slate-600 px-2 py-1">Hari</th>
                            <th class="border border-slate-600 px-2 py-1">Jam Mulai</th>
                            <th class="border border-slate-600 px-2 py-1">Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($jadwal as $row)
                            <tr class="hover:bg-slate-800 hover:text-white">
                                <th class="border border-slate-600 px-2 py-1">{{ $no++ }}</th>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->matkul->nama_mk }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->dosen->nama_dosen }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->prodi->nama_prodi }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->tahun->nama_tahun }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->hari->nama_hari }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->jam_mulai }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->jam_selesai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
