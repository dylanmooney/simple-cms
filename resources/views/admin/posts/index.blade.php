<x-app-layout>
    <div x-data="modal">
        <h1 class="text-3xl font-bold mb-8">Posts</h1>

        @if (session()->has('success'))
        <div class="alert mb-8 mt-4 border-l-4 border-primary" x-data="{show: true}" x-show="show">
            <div class="flex-1">
                <label class="mx-3">{{session()->get('success')}}</label>
            </div>
            <div class="flex-none">
                <button class="btn btn-sm btn-ghost mr-2" @click="show = false"><svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        @endif

        <table class="table w-full table-zebra">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts) > 0)
                @foreach ($posts as $post)
                <tr class="">
                    <td>
                        <a href={{route('admin.posts.edit', $post)}} class="font-bold hover:underline">
                            {{$post->title}}
                        </a>
                    </td>
                    <td>
                        <div class="badge badge-lg">
                            {{$post->category->name}}
                        </div>
                    </td>
                    <td>{{$post->author->name}}</td>
                    <td>{{$post->created_at->toFormattedDateString()}}</td>
                    <td class="text-right">
                        <a href={{route('admin.posts.edit', $post)}} class="link mr-2">Edit</a>
                        <button class="link text-accent" @click="open('{{$post->title}}', '{{$post->id}}')">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td></td>
                    <td>No posts found</td>
                </tr>
                @endif
            </tbody>
        </table>

        <div class="w-full flex mt-12 justify-between">
            {{--
            <div style="width: 106px"></div>
            <div class="btn-group">
                <button class="btn">Previous</button>
                <button class="btn btn-active">1</button>
                <button class="btn">2</button>
                <button class="btn">3</button>
                <button class="btn">4</button>
                <button class="btn">Next</button>
            </div> --}}

            <a href={{route('admin.posts.create')}} class="btn ml-auto">New Post</a>
        </div>

        <div id="modal" class="modal" :class="show && 'modal-open'" :show="show">
            <div class="modal-box -mt-60">
                <div class="text-center">
                    <p>Are you sure you wish to delete post titled: <strong x-text="title"></strong> <br> This action
                        cannot be
                        undone.
                    </p>
                </div>
                <div class="modal-action">
                    <button class="btn btn-ghost" @click="close">Back</button>
                    <form :action="action" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-error">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('alpine:init', () => {
        Alpine.data('modal', () => ({
            show: false,
            title: '',
            action: '',

            open(title, id) {
                this.action = `posts/${id}`
                this.title = title;
                this.show = true;
            },

            close() {
                this.show = false;
            }
        }))
    })
    </script>


</x-app-layout>
