@extends('GalehLudi.template')

@section('content')
    <div
        class="scale-100 p-6 bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none flex">
        <div>
            <h2 class="text-xl font-semibold text-white">Data Matakuliah</h2>
            <div class="mt-4 text-gray-400 text-sm leading-relaxed">
                <table class="border-collapse border border-slate-500">
                    <thead class="bg-slate-700 text-white">
                        <tr>
                            <th class="border border-slate-600 px-2 py-1">No</th>
                            <th class="border border-slate-600 px-2 py-1">Matakuliah</th>
                            <th class="border border-slate-600 px-2 py-1">SKS</th>
                            <th class="border border-slate-600 px-2 py-1">Semester</th>
                            <th class="border border-slate-600 px-2 py-1">Kurikulum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($matakuliah as $row)
                            <tr class="hover:bg-slate-800 hover:text-white">
                                <th class="border border-slate-600 px-2 py-1">{{ $no++ }}</th>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->nama_mk }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->sks }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->semester }}</td>
                                <td class="border border-slate-600 px-2 py-1">{{ $row->kurikulum->nama_kurikulum }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
