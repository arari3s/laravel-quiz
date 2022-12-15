<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel9 Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
</head>

<body style="background-color: #141432">
    <section class="h-full w-full border-box transition-all duration-500 linear" style="background-color: #141432">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .header-4-3 .btn-outline {
                border: 1px solid #707092;
                color: #707092;
                transition: 0.3s;
            }

            .header-4-3 .btn-outline:hover {
                border: 1px solid #ffffff;
                color: #ffffff;
                transition: 0.3s;
            }

            .header-4-3 .btn-outline:hover div path {
                fill: #ffffff;
                transition: 0.3s;
            }

            .header-4-3 .btn-try {
                background-color: #524eee;
                transition: 0.3s;
            }

            .header-4-3 .btn-try:hover {
                --tw-shadow: inset 0 0px 25px 0 rgba(20, 20, 50, 0.7);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                transition: 0.3s;
            }

            .header-4-3 .navigation a:hover,
            .header-4-3 .active {
                font-weight: 600;
                transition: 0.3s;
            }

            .header-4-3 .navigation a:hover,
            .header-4-3 .active,
            .header-4-3 .text-white-1 {
                color: #e7e7e8;
                transition: 0.3s;
            }

            .header-4-3 .navigation {
                color: #707092;
                transition: 0.3s;
            }

            .header-4-3 .bg-screen {
                background-color: #707092;
            }

            .header-4-3 .bg-popup {
                background-color: #141432;
            }

            .header-4-3 .title-font {
                color: #cbcbd2;
                line-height: 1.2;
            }
        </style>

        <!-- Navbar -->
        <div class="header-4-3" style="font-family: 'Poppins', sans-serif">
            <header x-data="{ open: false }">
                <div
                    class="mx-auto flex py-12 lg:px-24 md:px-16 sm:px-8 px-8 items-center justify-between lg:justify-start">
                    <a href="#">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png"
                            alt="" />
                    </a>
                </div>
            </header>

            <!-- Hero -->
            <div>
                <div class="mx-auto flex pt-12 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 lg:flex-row flex-col">

                    <!-- Left Column -->
                    <div
                        class="lg:flex-grow lg:w-1/2 flex flex-col lg:items-start lg:text-left mb-3 md:mb-12 lg:mb-0 items-center text-center">

                        <h1
                            class="title-font sm:text-5xl lg:text-6xl text-4xl lg:mt-8 mb-8 font-semibold sm:leading-tight">
                            The best way<br class="lg:block hidden" />
                            to organize your online learning
                        </h1>

                        <div
                            class="inline-block items-center mx-auto lg:mx-0 lg:flex justify-center lg:space-x-8 md:space-x-2 sm:space-x-3 space-x-0">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route('dashboard.index') }}"
                                        class="btn-try inline-flex font-semibold text-white text-base py-4 px-10 rounded-xl mb-4 lg:mb-0 md:mb-0 focus:outline-none">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="btn-try inline-flex font-semibold text-white text-base py-4 px-10 rounded-xl mb-4 lg:mb-0 md:mb-0 focus:outline-none">
                                        Log in
                                    </a>
                                @endauth
                            @endif
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="w-full lg:w-1/2 text-center lg:justify-end justify-center flex pr-0">
                        <img id="hero"
                            src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header4/Header-4-3.png"
                            alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
