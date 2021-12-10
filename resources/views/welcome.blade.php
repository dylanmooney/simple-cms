<x-guest-layout>

    <x-navbar />

    <div class="hero" style="background-image: url(&quot;https://picsum.photos/id/1005/1600/1400&quot;);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="text-center hero-content text-neutral-content py-40">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">
                    Hello there
                </h1>
                <p class="mb-5">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi.
                    In deleniti eaque aut repudiandae et a id nisi.
                </p>
            </div>
        </div>
    </div>

    <section class="container w-full px-5 py-12 mx-auto max-w-7xl">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold">Latest Posts</h2>
        </div>
        <div>
            <div class="grid grid-cols-3 gap-12 mb-12">
                @foreach ($posts as $post)
                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                    <div class="flex-shrink-0">
                        <img class="object-cover w-full h-60" src={{URL::asset("images/" . $post->thumbnail->path)}}
                        alt="">
                    </div>
                    <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                        <div class="flex-1">
                            <a href="posts/{{$post->slug}}" class="block mt-2 mb-4">
                                <h3 class="text-xl font-semibold text-neutral">{{$post->title}}</h3>
                                <p class="mt-3 text-base text-neutral">{{$post->excerpt}}</p>
                            </a>
                            <div class="badge badge-secondary font-semibold">{{$post->category->name}}</div>
                        </div>
                        <div class="flex items-center mt-6">
                            <div class="flex-shrink-0">
                                <a href="/users/{{$post->author->username}}">
                                    <span class="sr-only">{{$post->author->username}}</span>
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://i.pravatar.cc/500?img={{$post->author->id}}" alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-neutral-600">
                                    <a href="/users/{{$post->author->username}}"
                                        class="hover:underline">{{$post->author->username}}</a>
                                </p>
                                <div class="flex space-x-1 text-sm text-neutral">
                                    <time datetime="2020-03-16"> </time>
                                    <span aria-hidden="true"> · </span>
                                    <span>{{$loop->iteration}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <div class="text-center mt-12">
            <a href="" class="btn btn-outline btn-neutral">View all</a>
        </div>
    </section>
</x-guest-layout>
