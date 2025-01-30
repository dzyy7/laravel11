<x-layout-admin>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Student</h2>
            <form action="/admin/students/update/{{ $student->id }}" method="post">
                @csrf
                @method('PUT') <!-- Method spoofing untuk PUT request -->
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $student->Name) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type student name" required>
                    </div>

                    <div>
                        <label for="grade_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade/Class</label>
                        <select id="grade_id" name="grade_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Choose a grade</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}"
                                    {{ $student->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email', $student->Email) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type your email" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="address" name="address" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your address here">{{ old('address', $student->Address) }}</textarea>
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-6 py-3 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg shadow-lg focus:ring-4 focus:ring-blue-300 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300">
                    Update Student
                </button>

            </form>
        </div>
    </section>
</x-layout-admin>
