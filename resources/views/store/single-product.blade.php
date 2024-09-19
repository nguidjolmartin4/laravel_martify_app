<x-store.layout>
    <x-store.single-product :product="$product" />
    <x-store.product-review />
    <x-store.product-section title="Similar products" :products="$similarProducts" />
</x-store.layout>
