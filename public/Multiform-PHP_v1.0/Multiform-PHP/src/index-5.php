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

    <section class="lg:h-screen py-20 px-4 flex items-center justify-center">
        <div class="container">
            <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">

            <div class="relative py-3 sm:max-w-lg sm:mx-auto mt-8">
                <div class="relative p-6 bg-white shadow">
                    <div class="max-w-md mx-auto">
                        <div class="flex sm:flex-nowrap flex-wrap items-center gap-5">
                            <div class="text-4xl font-normal text-red-500"><i class="ti ti-alert-triangle-filled"></i></div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                <h2 class="leading-relaxed">Create an Event</h2>
                                <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Event Title</label>
                                    <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600" placeholder="Event title">
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Event Subtitle</label>
                                    <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600" placeholder="Optional">
                                </div>
                                <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-5">
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Start</label>
                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                            <input type="date" class="pr-4 w-full pl-8 py-2 border focus:ring-gray-500 focus:border-gray-900 sm:text-sm border-gray-300 focus:outline-none text-gray-600" placeholder="25/08/2023">
                                            <div class="absolute left-1.5 top-0.5">
                                                <i class="ti ti-calendar-month text-2xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose">End</label>
                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                            <input type="date" class="pr-4 pl-8 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600" placeholder="26/02/2023">
                                            <div class="absolute left-1.5 top-0.5">
                                                <i class="ti ti-calendar-month text-2xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Event Description</label>
                                    <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600" placeholder="Optional">
                                </div>
                            </div>

                            <div class="pt-4 flex flex-wrap sm:flex-nowrap items-center gap-5">
                                <button class="px-4 py-2 flex justify-center items-center gap-2 text-base font-medium w-full bg-red-100 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-500">
                                    <i class="ti ti-x text-2xl"></i>
                                    Cancel
                                </button>
                                <button class="flex justify-center items-center w-full px-4 py-3 text-base font-medium text-white bg-blue-500 hover:bg-blue-600 transition-all duration-500">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>