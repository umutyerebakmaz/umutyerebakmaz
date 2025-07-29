<article class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden bg-gray-900 isolate rounded-2xl pt-80 sm:pt-48 lg:pt-80">
    @if ($blog->image)
        <img src="{{ asset('uploads/blogs/' . $blog->image) }}"
            alt="" class="absolute inset-0 object-cover -z-10 size-full" />
    @else
        <img src="{{ asset('images/default.png') }}"
            alt="" class="absolute inset-0 object-cover -z-10 size-full" />
    @endif

    <div class="absolute inset-0 -z-10 bg-linear-to-t from-gray-900 via-gray-900/40"></div>
    <div class="absolute inset-0 -z-10 rounded-2xl inset-ring inset-ring-gray-900/10"></div>

    <div class="flex flex-wrap items-center overflow-hidden text-gray-300 gap-y-1 text-sm/6">
        <time datetime="{{ $blog->created_at->format('Y-m-d\TH:i:s\Z') }}" class="mr-8">{{ $blog->created_at->isoFormat('DD MMM YY') }}</time>
        <div class="flex items-center -ml-4 gap-x-4">
            <svg viewBox="0 0 2 2" class="-ml-0.5 size-0.5 flex-none fill-white/50">
                <circle cx="1" cy="1" r="1" />
            </svg>
            <div class="flex gap-x-2.5">
                <img src="{{ asset('images/default.png') }}"
                    alt="" class="flex-none rounded-full size-6 bg-white/10" />
                Pestpoint
            </div>
        </div>
    </div>
    <h3 class="mt-3 font-semibold text-white text-lg/6">
        <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
            <span class="absolute inset-0"></span>
            {{ $blog->title }}
        </a>
    </h3>
</article>
