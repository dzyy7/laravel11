<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <center>
        <h3 class="text-2xl font-bold text-gray-700 ">
            Halaman Department
        </h3>
    </center>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-8">
        <div class="flex justify-between items-center mb-6">
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                <thead>
                    <tr class="bg-blue-100">
                        <th class="py-3 px-6 border-b text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                            No
                        </th>
                        <th class="py-3 px-6 border-b text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                            Nama
                        </th>
                        <th class="py-3 px-6 border-b text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                            Desc
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($department as $Department)
                        <tr>
                            <td class="py-2 px-4 border-b text-sm text-gray-900">{{ $Department->id }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-900">{{ $Department->name }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-500">{{ $Department->desc }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
