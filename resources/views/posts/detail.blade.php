<x-guest-layout>
    <x-navbar />

    <div class="bg-base-100">
        <div class="container w-full py-5 mx-auto">
            <a href="/" class="link-neutral link flex items-center font-bold no-underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
                Back to Posts
            </a>
        </div>
    </div>


    <div class="container w-full px-5 pb-12 mx-auto lg:px-32">
        <div class="flex flex-col lg:flex-row lg:space-x-12 max-w-7xl mx-auto">
            <div class="order-last w-full max-w-screen-sm m-auto mt-12  lg:w-1/4 lg:order-first">
                <div class="card shadow-lg compact side bg-base-100">
                    <div>
                        <div class="flex card-body">
                            <div class="flex flex-row items-center space-x-4 mb-4">
                                <div>
                                    <div class="avatar">
                                        <div class="rounded-full w-14 h-14 shadow"><img
                                                src="https://i.pravatar.cc/500?img={{$post->author->id}}">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="card-title">{{$post->author->name}}</h2>
                                    <p class="capitalize text-secondary font-bold">
                                        {{$post->author->role->name}}</p>
                                </div>
                            </div>
                            <div class="">
                                <a href="#" class="btn btn-neutral btn-block">Follow</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="w-full lg:px-0 lg:w-3/4 max-w-none mt-12">
                <div class="mb-20">
                    <div class="border-b border-gray-200 mb-8">
                        <div class="flex flex-wrap items-baseline my-4">
                            <p>{{ \Carbon\Carbon::parse($post->published_at)->format('j F, Y')}}</p>
                            <div class="mx-2">|</div>
                            <p class="mt-1">2 Minute Read</p>
                        </div>
                    </div>
                    <div class="prose lg:prose-xl max-w-none">
                        {!! $post->body !!}
                    </div>
                </div>

                <div class="mb-12">
                    <form action={{route("comments.store", $post)}} method="POST">
                        @csrf
                        <div class="form-control mb-4 text-xl">
                            <label class="label" for="comment">
                                <span class="font-bold text-x">Leave a comment</span>
                            </label>
                            <textarea class="textarea h-36 textarea-bordered" placeholder="Your comment here"
                                name="text" id="comment"></textarea>
                            @error('text')
                            <label class="label">
                                <span class="label-text-alt text-base text-error">{{$message}}</span>
                            </label>
                            @enderror
                        </div>
                        <div class="flex items-center">

                            @auth
                            <div class="flex-none flex items-center">
                                <div class="avatar mr-2">
                                    <div class="rounded-full w-10 h-10 m-1">
                                        <img src="https://i.pravatar.cc/500?img={{Auth::user()->id}}">
                                    </div>
                                </div>
                                <p>{{Auth::user()->username}}</p>
                            </div>
                            @endauth

                            @guest
                            <p>You must be logged in to leave a comment</p>
                            @endguest

                            <button class="btn btn-neutral ml-auto" type="submit" {{!Auth::user() ? "disabled" : ""
                                }}>Submit
                            </button>
                        </div>
                    </form>
                    <div class="divider opacity-10"></div>
                    <section>
                        <h2 class="mb-6 text-2xl font-bold">Comments</h2>
                        @foreach ($post->comments as $comment)
                        <div class="p-6 pb-6  rounded-md {{$loop->even ? " bg-base-200" : "bg-base-300" }}">
                            <div class="flex-none flex items-center mb-2">
                                <div class="avatar mr-2">
                                    <div class="rounded-full w-10 h-10 m-1">
                                        <img src="https://i.pravatar.cc/500?img={{$comment->author->id}}">
                                    </div>
                                </div>
                                <div>
                                    <p class="font-bold">{{$comment->author->username}}</p>
                                    <p class="text-xs">{{$comment->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <p class="text-base">{{$comment->text}}</p>
                        </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
