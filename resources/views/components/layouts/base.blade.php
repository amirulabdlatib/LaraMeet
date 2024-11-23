<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="[CSRF-TOKEN]">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body>
    <!--call popup-->
    <div class="min-h-screen w-full bg-[#00FFB3] flex items-center justify-center">
        <div
            class="lg:w-[1200px] lg:h-[800px] 2xl:w-[1200px] 2xl:h-[800px] xl:w-[1200px] xl:h-[800px] bg-[#0F121C] flex justify-between shadow-lg rounded overflow-hidden flex-col">
            <div class="bg-[#404749] h-[40px] flex justify-between items-center">
                <span class="text-white text-[14px] mx-4">LaraMeet</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><span class="text-white text-[14px] mx-2 hover:text-red-400 cursor-pointer"
                            title="Logout"><i class="fa-solid fa-circle"></i></span></button>
                </form>
            </div>
            <!-- Video container here -->

            <!-- User list here -->
            @include('components.user-list')

            <!-- User footer  here -->
            @include('components.user-footer')

        </div>
    </div>

    <!-- Scripts here -->
</body>

</html>
