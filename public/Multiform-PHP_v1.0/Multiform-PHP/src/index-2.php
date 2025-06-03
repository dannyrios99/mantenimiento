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

<body>

    <section class="py-20 px-4 lg:h-screen flex items-center justify-center">
        <div class="container">
            <img src="assets/images/logo-dark.png" class="h-6" alt="">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-14 mt-8">
                <div>
                    <h2 class="text-xl font-bold text-gray-700 capitalize">Send us a message</h2>
                    <p class="text-xs font-medium text-gray-600 mt-2">Donec lacinia efficitur finibus.</p>

                    <form class="space-y-6 mt-8">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700" for="username">Name</label>
                                <input id="username" type="text" class="form-input text-gray-700/80 block w-full py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                            </div>

                            <div>
                                <label class="text-gray-700" for="emailAddress">Email</label>
                                <input id="emailAddress" type="email" class="form-input text-gray-700/80 block w-full py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-700" for="passwordConfirmation">Text Area</label>
                            <textarea id="textarea" type="textarea" class="form-input text-gray-700/80 block w-full py-5 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25"></textarea>
                        </div>

                        <div>
                            <label class="text-gray-700" for="passwordConfirmation">Select</label>
                            <select class="form-input text-gray-700/80 block w-full py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                                <option>Surabaya</option>
                                <option>Jakarta</option>
                                <option>Tangerang</option>
                                <option>Bandung</option>
                            </select>
                        </div>

                        <div>
                            <button class="px-5 py-2.5 leading-5 text-white transition-colors duration-200 transform bg-gray-700 hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Send a Message</button>
                        </div>
                    </form>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-950">Contact information</h2>
                    <p class="text-base font-medium text-gray-400 mt-2">Aenean a ullamcorper nunc corvallis feuigial puns id puilvinar, sed dapibus massa vitae nibh malesuada matts. Phoasellus interdum mi nec lorem dignissim, in volutpat, dui accumsan.</p>

                    <div class="grid md:grid-cols-2 grid-cols-1 gap-6 mt-10">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">Adress</h2>
                            <p class="text-base font-medium text-gray-500 mt-1">Street number and town name23</p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">Phone</h2>
                            <p class="text-base font-medium text-gray-500 mt-1">Number 246 875 014</p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">E-mail</h2>
                            <p class="text-base font-medium text-gray-500 mt-1">LindseyRDavis@armyspy.com</p>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">Working hours</h2>
                            <p class="text-base font-medium text-gray-500 mt-1">Mon -fine 11AM -1gpmse</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mt-10">
                        <a href="#" class="h-10 w-10 flex items-center justify-center text-white bg-gray-700 hover:bg-gray-900 transition-all duration-500"><i class="ti ti-brand-facebook text-2xl"></i></a>
                        <a href="#" class="h-10 w-10 flex items-center justify-center text-white bg-gray-700 hover:bg-gray-900 transition-all duration-500"><i class="ti ti-brand-x text-2xl"></i></a>
                        <a href="#" class="h-10 w-10 flex items-center justify-center text-white bg-gray-700 hover:bg-gray-900 transition-all duration-500"><i class="ti ti-brand-instagram text-2xl"></i></a>
                        <a href="#" class="h-10 w-10 flex items-center justify-center text-white bg-gray-700 hover:bg-gray-900 transition-all duration-500"><i class="ti ti-brand-linkedin text-2xl"></i></a>
                        <a href="#" class="h-10 w-10 flex items-center justify-center text-white bg-gray-700 hover:bg-gray-900 transition-all duration-500"><i class="ti ti-brand-youtube text-2xl"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>

</body>

</html>