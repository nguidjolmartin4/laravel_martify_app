<x-layout>
    <section class="relative pt-20 pb-24 bg-blue-600">
        <div class="w-full max-w-lg md:max-w-2xl lg:max-w-4xl px-5 lg:px-11 mx-auto max-md:px-4">
            <h1 class="text-white font-manrope font-semibold text-4xl min-[500px]:text-5xl leading-tight mb-8">
                {{ $post->title }} </h1>
            <div class="flex items-center justify-between">
                <div class="data">
                    <p class="font-normal text-lg leading-7 text-white">Poted by :
                        <a href="{{ route('posts.user', $post->user) }}">{{ $user->full_name }}</a> on
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-10 lg:py-16 ">
        <div class="w-full max-w-lg md:max-w-2xl lg:max-w-4xl px-5 lg:px-11 mx-auto max-md:px-3">
            <div class="img w-full mb-14">
                <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Blog tailwind page">
            </div>

            <p class="font-normal text-3xl leading-8 my-10">
                {{ $post->title }}
            </p>

            <p class="font-medium text-md">
                {{ $post->body }}
            </p>
        </div>
    </section>
</x-layout>
