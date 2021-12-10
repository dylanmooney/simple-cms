<nav class="navbar shadow-lg bg-neutral text-neutral-content">
    <div class="container m-auto max-w-7xl">
        <div class="flex-1 hidden lg:flex">
            <a href="/">
                <span class="text-lg font-bold">
                    SimpleCMS
                </span>
            </a>
        </div>

        @auth
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <div class="flex items-center justify-between space-x-2 text-white font-bold hover:bg-neutral-focus cursor-pointer px-2 rounded-md transition"
                    tabIndex="0">
                    <div class="avatar">
                        <div class="rounded-full w-10 h-10 m-1">
                            <img src="https://i.pravatar.cc/500?img={{Auth::user()->id}}" alt="avatar" />
                        </div>
                    </div>
                    <p>{{Auth::user()->username}}</p>
                </div>
                <ul tabIndex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                    @can("admin")
                    <li class="text-neutral">
                        <a href={{route("admin.posts.index")}}
                            class="py-3 px-3 hover:bg-base-300 rounded-lg text-left transition w-full"
                            style="padding-left: 12px">
                            Dashboard
                        </a>
                    </li>
                    @endcan
                    <li class="text-neutral">
                        <form action={{route("logout")}} class="mb-0 w-full" method="POST">
                            @csrf
                            <button class="py-3 px-3 hover:bg-base-300 rounded-lg text-left transition w-full">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endauth


        @guest
        <div class="flex-none flex">
            <a class="btn btn-outline btn-primary mr-4" href="{{route('login')}}">Login</a>
            <a class="btn btn-secondary btn-outline" href="{{route('register')}}">Sign up</a>
        </div>
        @endguest
    </div>
</nav>
