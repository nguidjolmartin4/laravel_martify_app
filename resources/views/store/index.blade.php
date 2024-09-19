<x-store.layout>
    <x-store.hero />
    <x-store.product-section title="Electronics" :products="$electronics" tag="Brand New" />

    <x-store.category-section />
    <x-store.product-section title="Watches" :products="$watches" tag="Brand New" />
    <x-store.product-section title="Projectors" :products="$projectors" tag="Brand New" />

    <x-store.promotion />
    <x-store.product-section title="Printers" :products="$printers" tag="Brand New" />
    <x-store.product-section title="Others" :products="$others" tag="Brand New" />
</x-store.layout>
