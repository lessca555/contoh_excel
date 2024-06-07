<x-app-layout>
    @role('Sales')
    <x-slot name="header">
        <div class="flex gap-3 items-center text-black">
            <img class="w-[50px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
            <div class="flex flex-col">
                <h2 class="font-semibold text-xl leading-tight uppercase">
                    Snack Distributor
                </h2>
                <span class="text-sm text-gray-500 italic">Sales</span>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="btn btn-success text-white" onclick="my_modal_2.showModal()">EXCEL</button>
                    <dialog id="my_modal_2" class="modal">
                        <div class="modal-box bg-white">
                            <form action="{{ route('import_excel') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h1 class="font-bold">Import your Excel file</h1><br>
                                <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="file" />
                                <br><br>
                                <button class="btn btn-primary" type="submit">import</button>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>

                    <button class="btn btn-error text-white" onclick="my_modal_3.showModal()">PDF</button>
                    <dialog id="my_modal_3" class="modal">
                        <div class="modal-box bg-white">
                            <form action="{{ route('store_pdf') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h1 class="font-bold">Import your PDF file</h1><br>
                                <input type="text" name="desc" class="input input-bordered w-full max-w-xs bg-white mb-3" placeholder="Masukkan deskripsi">
                                <input type="file" class="file-input file-input-bordered w-full max-w-xs bg-white" name="pdf" />
                                <br><br>
                                <button class="btn btn-primary" type="submit">import</button>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>

                    <br><br>
                    @if (session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead class="bg-black text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Umur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->umur }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead class="bg-black text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>File</th>
                                    <th>Tanggal Pembuatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @foreach ($pdf as $key => $data)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $data->desc }}</td>
                                    <td><a href="{{ route('show_pdf', $data->id) }}" target="_blank">{{ $data->file }}</a></td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elserole('Project Manager')
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight uppercase">
            Snack Distributor
        </h2>
        <span class="text-sm text-gray-500 italic">Project Manager</span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>
                        Selamat sore pak {{ Auth::user()->name }}
                    </h1>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @elserole('Warehouse')
    <x-slot name="header">
        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
        <div class="flex flex-col">
            <h2 class="font-semibold text-xl leading-tight uppercase">
                Snack Distributor
            </h2>
            <span class="text-sm text-gray-500 italic">Warehouse</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>
                        Selamat sore pak {{ Auth::user()->name }}
                    </h1>
                    <br>
                </div>

            </div>
        </div>
    </div>
    @endrole
</x-app-layout>
