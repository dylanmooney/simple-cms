<x-guest-layout>
    <x-navbar />
    <h1>{{$post->title}}</h1>

    <article class="prose lg:prose-xl m-auto">
        {{$post->body}}

        <div>
            <a href="/" class="link link-neutral">Go Back</a>
        </div>
    </article>


</x-guest-layout>
