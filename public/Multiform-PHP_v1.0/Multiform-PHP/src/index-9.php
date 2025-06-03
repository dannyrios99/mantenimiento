<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> MultiForm | Tailwind CSS form Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive section which can be used to form" name="description" />
    <meta content="Techzaa" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.svg">

    <!-- tabler css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Style css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gray-50">

    <section class="py-20 px-4 lg:h-screen flex items-center justify-center">
        <div class="container">
            <div class="shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] mt-10">
                <div class="grid lg:grid-cols-3 grid-cols-1">
                    <div class="p-6 bg-gray-900">
                        <div class="flex flex-col text-white">
                            <div>
                                <img src="assets/images/logo-light.png" class="h-6" alt="">
                            </div>
                            <h2 class="text-2xl font-semibold mb-4 mt-6">Visit Our Location</h2>
                            <p class="text-base font-medium text-gray-100">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt arcu diam,eu feugiat felis fermentum id. Curabitur vitae nibh viverra, auctor turpis sed, scelerisque ex.</p>

                            <div class="flex sm:flex-nowrap flex-wrap items-center gap-5 mt-8">
                                <div>
                                    <div class="h-14 w-14 flex items-center justify-center rounded-full bg-white/10">
                                        <i class="ti ti-map-pin text-3xl"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="text-2xl">Main Office</h2>
                                    <p class="text-base font-medium text-gray-100 mt-2">5555 Tailwind RD, Pleasant Grove, UT 73533</p>
                                </div>
                            </div>

                            <div class="flex sm:flex-nowrap flex-wrap items-center gap-5 mt-5">
                                <div>
                                    <div class="h-14 w-14 flex items-center justify-center rounded-full bg-white/10">
                                        <i class="ti ti-phone text-3xl"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="text-2xl">Call Us</h2>
                                    <p class="text-base font-medium text-gray-100 mt-2">Tel: xxx-xxx-xxx</p>
                                    <p class="text-base font-medium text-gray-100">Fax: xxx-xxx-xxx</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 p-6">
                        <div class="flex">
                            <h1 class="font-bold text-4xl">Get in Touch</h1>
                        </div>
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
                            <input class="w-full mt-2 p-3 rounded-lg border-gray-200 text-gray-950 bg-gray-50 focus:outline-none focus:border-gray-300 focus:ring-transparent" type="text" placeholder="First Name" />
                            <input class="w-full mt-2 p-3 rounded-lg border-gray-200 text-gray-950 bg-gray-50 focus:outline-none focus:border-gray-300 focus:ring-transparent" type="text" placeholder="Last Name" />
                            <input class="w-full mt-2 p-3 rounded-lg border-gray-200 text-gray-950 bg-gray-50 focus:outline-none focus:border-gray-300 focus:ring-transparent" type="email" placeholder="Email" />
                            <input class="w-full mt-2 p-3 rounded-lg border-gray-200 text-gray-950 bg-gray-50 focus:outline-none focus:border-gray-300 focus:ring-transparent" type="number" placeholder="Phone" />
                        </div>
                        <div class="my-4">
                            <textarea placeholder="Message*" class="w-full h-32 mt-2 p-3 rounded-lg border-gray-200 text-gray-950 bg-gray-50 focus:outline-none focus:border-gray-300 focus:ring-transparent"></textarea>
                        </div>
                        <div class="my-2">
                            <button class="p-3 w-full text-base font-bold rounded-lg text-white bg-gray-800 hover:bg-gray-950 transition-all duration-500">
                                Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>

    <script src="assets/libs/preline/preline.js"></script>

</body>

</html>