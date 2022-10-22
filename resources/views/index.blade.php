@extends('app')
@section('body')
    <div class="wrapper">
        <h2 class="mt-5 font-medium text-xl text-blue-700">
            Verifikasi Antrian Pasien
        </h2>
        <div class="mt-10">
            <div class="bg-white p-4 rounded-lg shadow">
                <table class="table-auto w-full ">
                    <thead class="bg-slate-100">
                        <tr class="border-b-2">
                            <th class="p-3 rounded-tl text-start font-medium">No</th>
                            <th class="text-start font-medium">Nomor Antrian</th>
                            <th class="text-start font-medium">Nama Lengkap</th>
                            <th class="text-start font-medium">NIK</th>
                            <th class="text-start font-medium">Status</th>
                            <th class="text-start rounded-tr font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($data as $i => $item)
                            <tr>
                                <td class="p-3">{{ $i+1 }}</td>
                                <td class="text-sm">{{ $item->order_number }}</td>
                                <td class="text-sm">{{ $item->patient->user->name }}</td>
                                <td class="text-sm">{{ $item->patient->user->nik }}</td>
                                <td class="text-sm">
                                    <span class="block-inline px-2 py-1 rounded font-medium {{ ($item->status == 'done') ? 'bg-sky-200 text-sky-500' : 'bg-orange-200 text-orange-500' }}">{{ $item->status }}</span></td>
                                <td>
                                    <div class="flex gap-2 items-center">
                                        <button x-on:alert="alert('test')" class="px-3 py-1 bg-sky-500 text-white rounded text-sm hover:bg-sky-400 duration-150">Detail</button>
                                        @if ($item->status == 'done')
                                            <button disabled class="px-3 py-1 bg-teal-200 text-white rounded text-sm cursor-not-allowed">Verifikasi</button>
                                        @else
                                            <a href="{{ route('done', ['queue_id' => $item->id]) }}" class="px-3 py-1 bg-teal-500 text-white rounded text-sm hover:bg-teal-400 duration-150">Verifikasi</a>

                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection