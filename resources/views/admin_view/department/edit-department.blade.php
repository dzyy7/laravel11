<x-layout-admin>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-8">
        <h2 class="text-2xl font-bold mb-6">Edit Department</h2>
        <form action="{{ url('/admin/departments/update/' . $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Department Name</label>
                <input type="text" name="name" id="name" value="{{ $department->name }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" name="desc" id="desc" value="{{ $department->desc }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
            </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md">
                Update Department
            </button>
        </form>
    </div>
</x-layout-admin>
