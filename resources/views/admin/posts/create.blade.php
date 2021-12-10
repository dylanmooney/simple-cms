<x-app-layout>
    <h1 class="text-3xl font-bold">New Post</h1>

    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex mt-8">
            <div class="flex-1 mr-12">
                <div class="form-control mb-2">
                    <label class="label" for="title">
                        <span class="label-text text-2xl mb-2">Title</span>
                    </label>
                    <input type="text" name="title" id="title" placeholder="Add Title" value="{{old('title')}}"
                        class="input input-bordered {{ $errors->has('title') ? 'input-error' : '' }}">
                    @error('title')
                    <label class="label">
                        <span class="label-text-alt text-base">{{$message}}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text text-2xl mb-2">Body</span>
                    </label>
                    <div class="prose max-w-none">
                        <div class="h-44">
                            <input name="body" type="hidden">
                            <div id="editor" class="h-80">
                                {!!substr(old('body'), 1, -1)!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex-shrink-0 self-start w-72 border border-base-300 rounded-sm overflow-hidden mb-8">
                    <div class="p-3 bg-neutral text-white mb-2">
                        <h2 class="text-xl font-bold">Publish</h2>
                    </div>
                    <div class="flex flex-col p-3">
                        <div class="form-control mb-4">
                            <label for="category" class="mb-1">
                                <span class="font-bold">
                                    Category
                                </span>
                            </label>
                            <select name="category" id="category"
                                class="select select-bordered w-full max-w-xs {{ $errors->has('title') ? 'input-error' : '' }}">
                                <option disabled="disabled" selected="selected">Select a category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <label class="label">
                                <span class="label-text-alt text-base">{{$message}}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="cursor-pointer label flex items-center">
                                <span class="label-text text-md font-bold">Visibility</span>
                                <input type="checkbox" name="visible" class="toggle toggle-primary">
                            </label>
                        </div>

                        <div class="flex justify-between items-center mt-20">
                            <button class="btn btn-neutral ml-auto">Publish</button>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 self-start w-72 border border-base-300  rounded-sm overflow-hidden">
                    <div class="p-3 bg-b text-white mb-2 bg-neutral">
                        <h2 class="text-xl font-bold">Thumbnail</h2>
                    </div>
                    <div class="flex flex-col p-3 items-center">
                        <div class="flex justify-between items-center">
                            <label for="file-upload" class="btn btn-outline">Upload Image</label>
                            <input class="hidden" type="file" id="file-upload" name="image">
                        </div>
                        <img src="#" alt="uploaded image" id="image" class="hidden">
                    </div>
                </div>
                @error('image')
                <label class="label">
                    <span class="label-text-alt text-base text-error">{{$message}}</span>
                </label>
                @enderror
            </div>
        </div>
    </form>


    <!-- Include the Quill library -->

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
            clipboard: {
                matchVisual: false
                },
            }
        });

        var form = document.querySelector('form');

        form.onsubmit = function(e) {
        var body = document.querySelector('input[name=body]');
        body.value = JSON.stringify(quill.root.innerHTML);
        return true;
        };

        document.getElementById('file-upload').addEventListener('change', (e) => {
            const image = document.getElementById('image');
            image.src = URL.createObjectURL(e.target.files[0]);
            image.onload = () => URL.revokeObjectURL(image.src);
            image.className = "block mt-4";

        })

    </script>
</x-app-layout>
