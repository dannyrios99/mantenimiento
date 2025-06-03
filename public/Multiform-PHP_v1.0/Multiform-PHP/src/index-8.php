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
            <div class="max-w-3xl mx-auto rounded-xl border border-gray-200 overflow-hidden">
                <div class="bg-white p-6">
                    <img src="assets/images/logo-dark.png" class="h-6" alt="">
                </div>

                <div class="bg-white space-y-6">
                    <div class="grid md:grid-cols-5 grid-cols-1 gap-6 md:px-10 px-6 items-center">
                        <div class="md:col-span-2">
                            <h2 class="font-semibold text-gray-700">Account</h2>
                        </div>
                        <div class="md:col-span-3">
                            <div>
                                <label class="text-sm font-medium text-gray-600 block mb-2">Email</label>
                                <div class="w-full inline-flex border border-gray-200">
                                    <div class="w-12 pt-2 text-center bg-gray-100">
                                        <i class="ti ti-mail text-xl"></i>
                                    </div>
                                    <input type="email" class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2" placeholder="email@example.com" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="grid md:grid-cols-5 grid-cols-1 gap-6 md:px-10 px-6 items-center">
                        <div class="md:col-span-2">
                            <h2 class="font-semibold text-gray-700">Personal info</h2>
                        </div>
                        <div class="md:col-span-3">
                            <div>
                                <label class="text-sm font-medium text-gray-600 block mb-2">Full name</label>
                                <div class="w-full inline-flex border border-gray-200">
                                    <div class="w-12 pt-2 text-center bg-gray-100">
                                        <i class="ti ti-user text-xl"></i>
                                    </div>
                                    <input type="text" class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2" placeholder="Charly Olivas" />
                                </div>
                            </div>
                            <div class="mt-5">
                                <label class="text-sm font-medium text-gray-600 block mb-2">Phone number</label>
                                <div class="w-full inline-flex border border-gray-200">
                                    <div class="pt-2 w-12 text-center bg-gray-100">
                                        <i class="ti ti-device-mobile text-xl"></i>
                                    </div>
                                    <input type="text" class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2" placeholder="12341234" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="grid md:grid-cols-5 grid-cols-1 gap-6 md:px-10 px-6 items-center">
                        <div class="md:col-span-2">
                            <h2 class="font-semibold text-gray-700">Change password</h2>
                        </div>

                        <div class="md:col-span-3">
                            <div class="w-full inline-flex border border-gray-200">
                                <div class="pt-2 w-12 text-center bg-gray-100">
                                    <i class="ti ti-lock text-xl"></i>
                                </div>
                                <input type="password" class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2" placeholder="New" />
                            </div>

                            <div class="mt-6 flex items-center md:justify-end">
                                <button class="py-2 px-4 inline-block items-center justify-center gap-2 font-medium rounded-md text-center text-white bg-blue-500 hover:bg-blue-600 transition-all duration-500">
                                    <i class="ti ti-rotate-clockwise xl"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="p-6 pt-0 flex md:justify-end text-gray-500">
                        <button class="inline-flex items-center justify-center me-4 gap-2 py-1.5 px-4 rounded text-red-500 bg-red-500/10 hover:bg-red-500 hover:text-white transition-all duration-500">
                            <i class="ti ti-trash text-xl"></i>
                            Delete account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>

    <script src="assets/libs/preline/preline.js"></script>

</body>

</html>