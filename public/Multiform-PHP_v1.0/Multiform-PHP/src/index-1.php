<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <title> MultiForm - Tailwind CSS Form Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive section which can be used to form" name="description" />
    <meta content="Techzaa" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.svg">
    <!-- Style css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <section class="py-20 px-4 lg:h-screen flex items-center justify-center">
        <div class="container">
            <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">

            <div class="max-w-5xl mx-auto mt-10">
                <div class="max-w-xl mx-auto">
                    <button type="button" class="relative w-full flex justify-center items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-900  focus:outline-none   transition duration-300 transform active:scale-95 ease-in-out">
                        <i class="ti ti-plus text-xl"></i>
                        <span class="pl-2 mx-1">Create new shipping label</span>
                    </button>

                    <div class="mt-5 rounded-lg border border-gray-200 bg-white shadow">
                        <div class="p-5">
                            <h1 class="inline text-2xl font-semibold leading-none">Sender</h1>
                        </div>

                        <div class="px-5">
                            <input placeholder="Name" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                            <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-2">
                                <input placeholder="PLZ" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                                <input placeholder="City" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                            </div>
                            <div class="flex items-center pt-3">
                                <input type="checkbox" name="billing_same" id="billing_same" class="w-4 h-4 border border-gray-200 text-black bg-gray-50 rounded focus:ring-transparent">
                                <label for="billing_same" class="block ml-2 text-sm text-gray-900">Save as default address</label>
                            </div>
                        </div>

                        <div class="p-5">
                            <h1 class="inline text-2xl font-semibold leading-none">Receiver</h1>
                        </div>

                        <div class="px-5 pb-5">
                            <input placeholder="Name" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                            <input placeholder="Address" class=" form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                            <div class="flex md:flex-nowrap flex-wrap items-center justify-between gap-2">
                                <input placeholder="PLZ" class=" form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                                <input placeholder="City" class=" form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                            </div>
                        </div>
                        <hr class="mt-4">

                        <div class="flex flex-wrap flex-row-reverse gap-4 p-3">
                            <div class="flex-initial pl-3">
                                <button type="button" class="flex items-center gap-2 px-5 py-1.5 font-medium text-white bg-black rounded-md hover:bg-gray-800 transition-all duration-500">
                                    <i class="ti ti-file-invoice text-xl"></i>
                                    <span>Save</span>
                                </button>
                            </div>
                            <div class="flex-initial">
                                <button type="button" class="flex items-center gap-2 px-5 py-1.5 font-medium rounded-md bg-red-100 fill-current text-red-500 hover:bg-red-500 hover:text-white transition-all duration-500">
                                    <i class="ti ti-trash text-xl"></i>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 p-5 rounded-lg border border-gray-200 bg-white shadow">
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                            <ul>
                                <li class="text-lg font-semibold text-gray-700 mb-2">Receiver</li>
                                <li class="text-base font-medium text-gray-500">Max Mustermann</li>
                                <li class="text-base font-medium text-gray-500">Musterstrasse 1</li>
                                <li class="text-base font-medium text-gray-500">4020 Linz</li>
                            </ul>

                            <ul>
                                <li class="text-lg font-semibold text-gray-700 mb-2">Sender</li>
                                <li class="text-base font-medium text-gray-500">Rick Astley</li>
                                <li class="text-base font-medium text-gray-500">Rickrolled 11</li>
                                <li class="text-base font-medium text-gray-500">1000 Vienna</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>

</body>

</html>