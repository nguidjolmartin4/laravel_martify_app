@props(['active'])

<a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-md text-gray-800 rounded-lg hover:bg-gray-100"
    {{ $attributes }}>
    {{ $slot }}
</a>
