<x-layout>
    <x-slot:title>{{$title}}</x-slot>
    <center><h3>Halaman Student</h3></center>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">

        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-900">No</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-900">Name</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-900">Class</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-900">Department</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-900">Email</th>
                        <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-900">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $Student)
                        <tr>
                            <td class="py-2 px-4 border-b text-sm text-gray-900">{{ $Student->id }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-900">{{ $Student->Name }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-500">{{ $Student->grade->name}}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-500">{{ $Student->department->name}}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-500">{{ $Student->Email }}</td>
                            <td class="py-2 px-4 border-b text-sm text-gray-500">{{ $Student->Address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
