@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-4 px-6 rounded-xl bottom-4 right-4 text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
