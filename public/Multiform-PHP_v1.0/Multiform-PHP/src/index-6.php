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

    <!-- Snippet -->
    <section class="py-10 px-4 flex items-center justify-center">
        <div class="container">
            <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">

            <div class="relative max-w-md mx-auto mt-8">
                <img class="rounded-t shadow-lg h-56 w-full" src="assets/images/img-1.jpg" alt="Pay background" />
            </div>

            <div class="relative max-w-md mx-auto">
                <div class="bg-white px-6 md:px-8 pb-6 rounded-b shadow-lg">
                    <!-- Card header -->
                    <div class="text-center mb-6">
                        <div class="mb-2">
                            <img class="-mt-8 inline-flex rounded-full h-16" src="assets/images/avatars/img-1.png" alt="User" />
                        </div>
                        <h1 class="text-xl leading-snug text-gray-800 font-semibold mb-2">Front-End Learning</h1>
                        <div class="text-sm">
                            Learn how to create real web apps using HTML & CSS. Code templates included.
                        </div>
                    </div>

                    <div>
                        <div class="bg-gray-100 rounded-md transition p-1 mb-6">
                            <nav class="flex flex-wrap sm:flex-nowrap space-x-2" aria-label="Tabs" role="tablist">
                                <button type="button" class="hs-tab-active:bg-white hs-tab-active:text-gray-700 w-full p-1 inline-flex items-center justify-center gap-x-2 bg-transparent text-sm text-gray-500 hover:text-gray-700 font-medium rounded-sm disabled:opacity-50 disabled:pointer-events-none active" id="segment-item-1" data-hs-tab="#segment-1" aria-controls="segment-1" role="tab">
                                    Pay With Card
                                </button>
                                <button type="button" class="hs-tab-active:bg-white hs-tab-active:text-gray-700 w-full p-1 inline-flex items-center justify-center gap-x-2 bg-transparent text-sm text-gray-500 hover:text-gray-700 font-medium rounded-sm disabled:opacity-50 disabled:pointer-events-none" id="segment-item-2" data-hs-tab="#segment-2" aria-controls="segment-2" role="tab">
                                    Pay With Paypal
                                </button>
                            </nav>
                        </div>

                        <div class="mt-3">
                            <div id="segment-1" role="tabpanel" aria-labelledby="segment-item-1">
                                <div class="space-y-4">
                                    <!-- Card Number -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-nr">Card Number</label>
                                        <input id="card-nr" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="1234 1234 1234 1234" />
                                    </div>
                                    <!-- Expiry and CVC -->
                                    <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-5">
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="card-expiry">Expiry Date</label>
                                            <input id="card-expiry" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="MM/YY" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="card-cvc">CVC</label>
                                            <input id="card-cvc" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="CVC" />
                                        </div>
                                    </div>
                                    <!-- Name on Card -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-name">Name on Card</label>
                                        <input id="card-name" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="John Doe" />
                                    </div>
                                    <!-- Email -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-email">Email</label>
                                        <input id="card-email" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="email" placeholder="john@company.com" />
                                    </div>
                                </div>
                                <!-- Form footer -->
                                <div class="mt-6">
                                    <div class="mb-4">
                                        <button class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border rounded shadow-sm transition-all duration-500 w-full bg-sky-500 hover:bg-sky-600 text-white">Pay $253.00</button>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-700 italic text-center">Total cost: $253, with a VAT of $48 applicable in Italy.</div>
                                </div>
                            </div>

                            <div id="segment-2" class="hidden" role="tabpanel" aria-labelledby="segment-item-2">
                                <div class="space-y-4">
                                    <!-- Name on Card -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-name">Name on Card</label>
                                        <input id="card-name" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="John Doe" />
                                    </div>
                                    <!-- Email -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-email">Email</label>
                                        <input id="card-email" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="email" placeholder="john@company.com" />
                                    </div>
                                    <!-- Card Number -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-nr">Card Number</label>
                                        <input id="card-nr" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="1234 1234 1234 1234" />
                                    </div>
                                    <!-- Expiry and CVC -->
                                    <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-5">
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="card-expiry">Expiry Date</label>
                                            <input id="card-expiry" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="MM/YY" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="card-cvc">CVC</label>
                                            <input id="card-cvc" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="CVC" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Form footer -->
                                <div class="mt-6">
                                    <div class="mb-4">
                                        <button class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border rounded shadow-sm transition-all duration-500 w-full bg-sky-500 hover:bg-sky-600 text-white">Pay $253.00</button>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-700 italic text-center">Total cost: $253, with a VAT of $48 applicable in Italy.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/libs/preline/preline.js"></script>

</body>

</html>