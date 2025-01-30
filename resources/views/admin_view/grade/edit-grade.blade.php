<x-layout-admin>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Grade</h2>
            <form action="/admin/grades/update/{{ $grade->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $grade->name) }}" required
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>  
                    <div>
                        <label for="department_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <select id="department_id" name="department_id" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Choose a department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $grade->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-6 py-3 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg shadow-lg focus:ring-4 focus:ring-blue-300 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300">
                    Update Grade
                </button>
            </form>
        </div>
    </section>
</x-layout-admin>
