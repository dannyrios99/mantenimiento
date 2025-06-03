<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> MultiForm | Tailwind CSS form Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive section which can be used to form" name="description" />
    <meta content="Techzaa" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.svg">

    <!-- Style css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gray-50">

    <section class="py-20 px-4 lg:h-screen flex items-center justify-center">
        <div class="container">
            <div class="max-w-md md:mx-auto text-center mb-10">
                <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">
                <h2 class="text-2xl font-bold text-gray-900 mt-7">Book An Appointment</h2>
                <p class="text-base font-medium text-gray-500 mt-4">
                    Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.
                </p>
            </div>

            <div class="max-w-3xl md:mx-auto">
                <form action="" class="space-y-4">
                    <div>
                        <label class="sr-only" for="name">Name</label>
                        <input class="w-full border-gray-200 p-3 text-sm focus:ring-transparent focus:border-gray-300" placeholder="Name" type="text" id="name" />
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="sr-only" for="email">Email</label>
                            <input class="w-full border-gray-200 p-3 text-sm focus:ring-transparent focus:border-gray-300" placeholder="Email address" type="email" id="email" />
                        </div>

                        <div>
                            <label class="sr-only" for="phone">Phone</label>
                            <input class="w-full border-gray-200 p-3 text-sm focus:ring-transparent focus:border-gray-300" placeholder="Phone Number" type="tel" id="phone" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                        <div>
                            <input class="peer sr-only" id="option1" type="radio" tabindex="-1" name="option" />

                            <label for="option1" class="block w-full p-3 border border-gray-200 text-gray-600 bg-white hover:border-gray-200 peer-checked:border-black peer-checked:bg-black peer-checked:text-white" tabindex="0">
                                <span class="text-sm">Male</span>
                            </label>
                        </div>

                        <div>
                            <input class="peer sr-only" id="option2" type="radio" tabindex="-1" name="option" />

                            <label for="option2" class="block w-full p-3 border border-gray-200 text-gray-600 bg-white hover:border-gray-200 peer-checked:border-black peer-checked:bg-black peer-checked:text-white" tabindex="0">
                                <span class="text-sm">Female</span>
                            </label>
                        </div>

                        <div>
                            <input class="peer sr-only" id="option3" type="radio" tabindex="-1" name="option" />

                            <label for="option3" class="block w-full p-3 border border-gray-200 text-gray-600 bg-white hover:border-gray-200 peer-checked:border-black peer-checked:bg-black peer-checked:text-white" tabindex="0">
                                <span class="text-sm">other</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="sr-only" for="message">Message</label>

                        <textarea class="w-full border-gray-200 p-3 text-sm focus:border-gray-300 focus:ring-transparent" placeholder="Message" rows="8" id="message"></textarea>
                    </div>

                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="inline-block sm:w-auto w-full px-5 py-3 font-medium text-white bg-gray-700 hover:bg-gray-900 transition-all duration-500">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="assets/libs/preline/preline.js"></script>

</body>

</html>