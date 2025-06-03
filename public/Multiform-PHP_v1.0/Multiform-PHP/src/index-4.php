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

    <section class="py-9 px-4 flex items-center justify-center">
        <div class="container">
            <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">

            <div class="max-w-4xl mx-auto mt-10">
                <div class="relative flex flex-col shadow-lg rounded-lg bg-white">
                    <div class="rounded-t border-b border-gray-200 p-6">
                        <div class="text-center flex flex-wrap justify-between gap-6">
                            <h6 class="text-gray-700 text-xl font-bold">
                                My account
                            </h6>
                            <button class="bg-blue-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-blue-600 outline-none focus:outline-none mr-1 transition-all duration-150" type="button">
                                Settings
                            </button>
                        </div>
                    </div>

                    <div class="flex-auto px-4 lg:px-10 py-10 pt-4">
                        <form>
                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">User Information</h6>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                                <div>
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Username
                                    </label>
                                    <input type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="lucky.jesse">
                                </div>
                                <div>
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Email address
                                    </label>
                                    <input type="email" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="jesse@example.com">
                                </div>
                                <div>
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        First Name
                                    </label>
                                    <input type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="Lucky">
                                </div>
                                <div>
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Last Name
                                    </label>
                                    <input type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="Jesse">
                                </div>
                            </div>

                            <hr class="my-6 border-b-1 border-gray-300">

                            <h6 class="text-gray-700 text-sm mt-3 mb-6 font-bold uppercase">Contact Information</h6>
                            <div class="mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Address
                                </label>
                                <input type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                            </div>

                            <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
                                <div>
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        City
                                    </label>
                                    <input type="email" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="New York">
                                </div>
                                <div>
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Country
                                    </label>
                                    <input type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="United States">
                                </div>
                                <div>
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Postal Code
                                    </label>
                                    <input type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" placeholder="Postal Code">
                                </div>
                            </div>

                            <hr class="my-6 border-gray-300">

                            <div class="flex flex-wrap">
                                <div class="relative w-full">
                                    <label class="block uppercase text-gray-600 text-sm font-bold mb-2" htmlfor="grid-password">
                                        About me
                                    </label>
                                    <textarea type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25" rows="4"> A beautiful UI Kit and Admin for JavaScript &amp; Tailwind CSS. It is Open Source.</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>