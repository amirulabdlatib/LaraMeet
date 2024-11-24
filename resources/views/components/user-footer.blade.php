<div id="profile-footer" class="bg-[#404749] flex h-[65px] justify-between items-center">
    <div class="px-6">
        <div>
            <div class="flex items-center justify-center">
                <img src="{{ auth()->user()->profile_image ? asset(auth()->user()->profile_image) : asset('images/user.png') }}"
                    class="rounded-full w-[30px] h-[30px]" alt="{{ auth()->user()->name }}'s profile">
                <a href="{{ route('home') }}"><span
                        class="px-2 text-white text-[14px] hover:underline cursor-pointer">{{ auth()->user()->name }}</span></a>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ route('account.edit', Auth::id()) }}">
            <span class="text-white mx-4 hover:text-gray-200 cursor-pointer">
                <i class="fa-solid fa-user-gear" title="Account Settings"></i>
            </span>
        </a>
    </div>
</div>
