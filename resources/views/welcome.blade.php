<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
</head>

<body class="antialiased bg-ba-creative p-10 md:p-0">
    <section id="header" class="mt-10">
        <div class="text-center">
            <div id="logo" class="flex justify-center items-center">
                <img src="{{ asset('img/BA.svg') }}" alt="BA-logo">
            </div>
            <div id="header-content" class="justify-center mt-10 space-y-2">
                <p class="font-bold text-[#F16522] text-lg">BA X SHOPIFY</p>
                <p class="font-thin text-[40px]">Grow with Shopify Plus</p>
                <p class="md:px-[20%] break-all">Join us for a Shopify Masterclass, where you will learn all the latest
                    trends,
                    new features and hear from experts in the industry to find out why moving to Shopify Plus will help
                    grow your business.</p>
            </div>
        </div>
    </section>
    <div id="main-content" class="w-full text-center bg-main-content">
        <div id="header-content" class="justify-center mt-10 space-y-2 p-10 text-color-ba-creative">
            <p class="font-semibold text-[30px]">Register Now</p>
            <p>First 10 people to register will receive our VIP pack, which includes a free lanyard and VIP seats on the
                day.</p>
            <p>The next 20 people to register will receive early-bird access to all information packs.</p>
            <p id="available-message" class="font-bold text-[#F16522] text-base">{{ $available_slots }}</p>
            {{-- REGISTRATION FORM --}}
            <form id="registrationForm" class="space-y-5">
                @csrf
                <div class="inline-flex space-x-3">
                    <div class="grid">
                        <input type="text" name="name" id="name" placeholder="Name"
                            class="bg-main-content border border-gray-300 text-white-900 text-sm p-2.5">
                    </div>
                    <div class="grid">
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="bg-main-content border border-gray-300 text-white-900 text-sm p-2.5">
                    </div>
                    <div class="block">
                        <button type="submit"
                            class="text-white bg-[#44555F] font-medium text-sm w-full sm:w-auto px-5 py-3">
                            <div role="status" id="loading-icon" class="hidden">
                                <svg aria-hidden="true"
                                    class="w-3 h-3 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                            </div>
                            Register
                        </button>
                    </div>
                </div>
                {{-- Error Message --}}
                <div id="message" class="font-bold text-[#F16522] text-sm"></div>
            </form>
        </div>
    </div>
    <section id="footer" class="flex justify-center items-center mt-5">
        <div class="grid md:grid-cols-2">
            <div class="space-y-5 md:px-20">
                <P class="font-semibold text-[30px]">Event Details</P>
                <div class="space-y-2">
                    <P class="mb-3">The event will be held at BA Creative on July 27 2023.</P>
                    <P>BA Creative</P>
                    <P>444 Vulture Street, QLD 4169</P>
                    <P>07 3217 3028</P>
                    <P>info@bacreative.com.au</P>
                </div>
                <div class="font-bold text-[#F16522] text-lg">Contact Us</div>
            </div>
            <div>
                <img src="{{ asset('img/map.png') }}" alt="map-image">
            </div>
        </div>
    </section>
    <section id="copy-right" class="flex justify-center items-center">
        © 2023 BA Creative
    </section>
</body>
<script>
    $(document).ready(function() {
        let clickEvent = false;

        function showLoadingIcon() {
            $("#loading-icon").removeClass('hidden');
            $("#loading-icon").addClass('inline-flex');
        }

        function hideLoadingIcon() {
            $("#loading-icon").removeClass('inline-flex');
            $("#loading-icon").addClass('hidden');
        }

        $("#registrationForm").validate({
            rules: {
                "name": {
                    required: true
                },
                "email": {
                    required: true,
                    email: true
                }
            },
            messages: {
                "name": {
                    required: 'Please enter name'
                },
                "email": {
                    required: 'Please enter email',
                    email: "Must enter email format"
                }
            },
            submitHandler: function(form) {
                event.preventDefault();

                if (!clickEvent) {
                    clickEvent = true;
                    showLoadingIcon();

                    $.ajax({
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/api/register',
                        type: 'POST',
                        data: JSON.stringify({
                            name: form.name.value,
                            email: form.email.value,
                        }),
                        success: function(response) {
                            $('#message').text(response.message);
                            $('#available-message').text(response.available);
                            clickEvent = false;
                            hideLoadingIcon();
                        },
                        error: function(error) {
                            console.log(error.responseJSON.message);

                            $('#message').text(error.responseJSON.message);
                            clickEvent = false;
                            hideLoadingIcon();
                        }
                    });
                }
            }
        });

        // $('#registrationForm').submit(function(event) {
        //     event.preventDefault();
        //     // const name = $(this);
        //     console.log($(this))

        //     // if (!clickEvent) {
        //     //     clickEvent = true;
        //     //     showLoadingIcon();

        //     //     $.ajax({
        //     //         headers: {
        //     //             'Content-Type': 'application/json',
        //     //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     //         },
        //     //         url: '/api/register',
        //     //         type: 'POST',
        //     //         data: JSON.stringify({
        //     //             name: form.name.value,
        //     //             email: form.email.value,
        //     //         }),
        //     //         success: function(response) {
        //     //             $('#message').text(response.message);
        //     //             clickEvent = false;
        //     //             hideLoadingIcon();
        //     //         }
        //     //     });
        //     // }
        // });
    });
</script>

</html>
