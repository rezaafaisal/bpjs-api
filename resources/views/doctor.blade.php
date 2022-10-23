@extends('app')
@section('body')
    <div class="px-7">
        <h2 class="mt-5 font-medium text-xl text-blue-700">
            Dokter Rumah Sakit
        </h2>
        <div class="mt-10">
            <div class="bg-white p-4 rounded-lg shadow">
               {{-- <div class="mb-5">
                  <form action="{{ route('doctor_poly') }}" class="flex gap-3" method="POST">
                     @csrf
                     <select name="id" class="px-3 py-2 w-3/12 block rounded focus:outline-none focus:ring-2 focus:ring-purple/20" name="" id="">
                        <option value="">Pilih Layanan</option>
                        @foreach ($polyclinic as $item)
                            <option value="{{ $item['id']}}">{{ $item['name'] }}</option>
                        @endforeach
                     </select>
                     <button class="px-3 py-2 bg-purple text-white font-medium rounded hover:bg-purple/80 duration-150">Tampilkan</button>
                  </form>
               </div> --}}
                <table class="table-auto w-full ">
                    <thead class="bg-slate-100">
                        <tr class="border-b-2">
                            <th class="p-3 rounded-tl text-start font-medium">No</th>
                            <th class="text-start font-medium">Nama Dokter</th>
                            <th class="text-start font-medium">Spesialis</th>
                            <th class="text-start font-medium">Jadwal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                     @php
                         $no = 0;
                     @endphp
                        @foreach ($data as $items)
                           @foreach ($items as $row)
                              @php
                                 $no++;
                              @endphp
                              <tr>
                                 <td class="p-3">{{ $no }}</td>
                                 <td class="text-sm">{{ $row['name'] }}</td>
                                 <td class="text-sm">{{ $row['specialist'] }}</td>
                                 <td class="text-sm">{{ $row['time']->day }} - ({{ $row['time']->start }} - {{ $row['time']->until }})</td>
                              </tr>
                           @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection