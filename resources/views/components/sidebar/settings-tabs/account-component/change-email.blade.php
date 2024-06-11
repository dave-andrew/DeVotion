<div x-cloak x-show="changeemail" x-on:click="changeemail=false"
     class="z-51 fixed inset-0 min-w-screen min-h-screen flex justify-center items-center bg-black bg-opacity-50">
    <div @click.stop
        class="bg-white w-[30rem] rounded-md p-4">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Change Email</h3>
            <button class="text-gray-500" x-on:click="changeemail=false">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <hr class="my-4">
        <form action="{{ route('changeEmail') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">New Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Change Email</button>
            </div>
        </form>
    </div>
</div>
