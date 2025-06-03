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

<body>

    <section class="grid-cols-1 py-20 px-4 lg:h-screen flex items-center justify-center">
        <div class="container">
            <div class="md:p-10 p-6 bg-blue-50">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                    <div class="flex flex-col justify-between">
                        <div class="text-center">
                            <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">
                            <h2 class="text-4xl font-bold text-gray-900 mt-8">Let's talk!</h2>
                            <div class="text-base font-medium text-gray-500 mt-2">Vivamus in nisl metus? Phasellus.</div>
                        </div>
                        <img src="assets/images/img-2.png" alt="" class="p-6 md:h-96 md:w-96 mx-auto">
                    </div>

                    <div>
                        <form class="space-y-6">
                            <div>
                                <label for="name" class="text-base font-semibold mb-2 block">Full name</label>
                                <input id="name" type="text" placeholder="" class="w-full p-2 border-0 focus:border-gray-50 focus:ring-transparent">
                            </div>
                            <div>
                                <label for="email" class="text-base font-semibold mb-2 block">Email</label>
                                <input id="email" type="email" class="w-full p-2 border-0 focus:border-gray-50 focus:ring-transparent">
                            </div>
                            <div>
                                <label for="text" class="text-base font-semibold mb-2 block">Phone</label>
                                <input id="text" type="text" class="w-full p-2 border-0 focus:border-gray-50 focus:ring-transparent">
                            </div>
                            <div>
                                <label for="message" class="text-base font-semibold mb-2 block">Message</label>
                                <textarea id="message" rows="3" class="w-full p-2 border-0 focus:border-gray-50 focus:ring-transparent" spellcheck="false"></textarea>
                            </div>
                        </form>
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="inline-flex py-2 px-5 text-base font-semibold text-white bg-blue-500 hover:bg-blue-600 transition-all duration-500">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/libs/preline/preline.js"></script>

</body>

</html>