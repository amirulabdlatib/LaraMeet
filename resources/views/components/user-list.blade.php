<div id="profile-container" class="flex justify-between flex-1 xl:flex-row 2xl:flex-row lg:flex-row md:flex-row flex-col">
    <div class="flex w-full xl:w-[260px] 2xl:w-[260px] md:w-[260px] bg-[#080D14] max-sm:order-1 justify-center">
        <div class="flex flex-col my-10 w-full items-center">
            <form action="{{ route('search.user') }}" method="GET" class="w-full flex justify-center">
                <div class="w-[80%] relative flex items-center">
                    <input id="searchField"
                        class="bg-[#202532] text-white rounded-full w-full h-[35px] px-4 py-2 pr-12 text-sm"
                        type="text" name="search" placeholder="Search User" value="{{ request('search') }}">
                    <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </div>
            </form>
            <div id="results"
                class="mx-auto xl:my-6 2xl:my-6 lg:my-6 md:my-6 my-0 w-[80%] xl:h-[550px] 2xl:h-[550px] lg:h-[550px] h-full overflow-y-auto space-y-0">
                @if (isset($users) && $users->count() > 0)
                    @foreach ($users as $user)
                        <a href="{{ route('profile', $user->username) }}">
                            <div
                                class="flex items-center hover:bg-[#202532] cursor-pointer transition duration-150 ease-out hover:ease-in rounded h-[50px]">
                                <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('images/user.png') }}"
                                    class="rounded-full w-[30px] h-[30px] ml-2">
                                <span class="px-2 text-white text-[14px]">{{ $user->name }}</span>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="text-gray-400 text-center py-4">No users found</div>
                @endif
            </div>
        </div>
    </div>
    @yield('content')
</div>
