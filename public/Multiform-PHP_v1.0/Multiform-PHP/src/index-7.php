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
            <div class="max-w-3xl mx-auto border border-gray-200 bg-white rounded shadow-lg p-6 overflow-hidden">
                <div class="text-center mb-14">
                    <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">
                    <p class="text-2xl font-bold text-gray-700 mt-6">Confidential Information</p>
                    <p class="text-base font-medium text-gray-500 mt-1">Please fill out all the fields.</p>
                </div>

                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                    <div class="md:col-span-5">
                        <label for="full_name" class="text-base font-medium text-gray-700">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="h-10 mt-1 rounded px-4 w-full border border-gray-200 bg-gray-50" value="" />
                    </div>

                    <div class="md:col-span-5">
                        <label for="email" class="text-base font-medium text-gray-700">Email Address</label>
                        <input type="text" name="email" id="email" class="h-10 mt-1 rounded px-4 w-full border border-gray-200 bg-gray-50" value="" placeholder="email@domain.com" />
                    </div>

                    <div class="md:col-span-3">
                        <label for="address" class="text-base font-medium text-gray-700">Address / Street</label>
                        <input type="text" name="address" id="address" class="h-10 mt-1 rounded px-4 w-full border border-gray-200 bg-gray-50" value="" placeholder="" />
                    </div>

                    <div class="md:col-span-2">
                        <label for="city" class="text-base font-medium text-gray-700">City</label>
                        <input type="text" name="city" id="city" class="h-10 mt-1 rounded px-4 w-full border border-gray-200 bg-gray-50" value="" placeholder="" />
                    </div>

                    <div class="md:col-span-2">
                        <label for="country" class="text-base font-medium text-gray-700">Country / region</label>
                        <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                            <input name="country" id="country" placeholder="Country" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                            <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                <i class="ti ti-x text-base me-2"></i>
                            </button>
                            <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                <i class="ti ti-chevron-up text-base me-2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label for="state" class="text-base font-medium text-gray-700">State / province</label>
                        <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                            <input name="state" id="state" placeholder="State" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                            <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                                <i class="ti ti-x text-base me-2"></i>
                            </button>
                            <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                                <i class="ti ti-chevron-up text-base me-2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <label for="zipcode" class="text-base font-medium text-gray-700">Zipcode</label>
                        <input type="text" name="zipcode" id="zipcode" class="transition-all flex items-center h-10 mt-1 rounded px-4 w-full border border-gray-200 bg-gray-50" placeholder="" value="" />
                    </div>

                    <div class="md:col-span-5 mt-3">
                        <div class="inline-flex items-center gap-2">
                            <input type="checkbox" name="billing_same" id="billing_same" class="form-checkbox border border-gray-200 bg-gray-50" />
                            <label for="billing_same" class="text-base font-medium text-gray-700">My billing address is different than above.</label>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label for="soda" class="text-base font-medium text-gray-700">How many soda pops?</label>
                        <!-- Input Number -->
                        <div class="w-full">
                            <div class="mt-4 py-2 px-3 inline-block bg-gray-50 border border-gray-200 rounded-lg" data-hs-input-number>
                                <div class="flex items-center gap-x-1.5">
                                    <button type="button" class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm disabled:opacity-50 disabled:pointer-events-none" data-hs-input-number-decrement>
                                        <i class="ti ti-minus text-lg"></i>
                                    </button>
                                    <input class="p-0 w-6 border-0 text-gray-800 text-center bg-white focus:ring-0" type="text" value="0" data-hs-input-number-input>
                                    <button type="button" class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm disabled:opacity-50 disabled:pointer-events-none" data-hs-input-number-increment>
                                        <i class="ti ti-plus text-lg"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Input Number -->
                    </div>

                    <div class="md:col-span-5 text-right mt-3">
                        <div class="flex md:justify-end">
                            <button class="py-2 px-4 inline-block rounded font-bold text-white bg-blue-500 hover:bg-blue-700 transition-all duration-500">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/libs/preline/preline.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>

</body>

</html>