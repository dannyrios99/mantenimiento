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

    <section class="px-4 py-12 flex items-center justify-center">
        <div class="container">
            <img src="assets/images/logo-dark.png" class="h-6 mx-auto" alt="">
            <div class="max-w-4xl p-6 mx-auto bg-gray-50 rounded-md drop-shadow-md mt-10">
                <h1 class="text-xl font-bold text-gray-700 capitalize">Account settings</h1>
                <form>
                    <div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2">
                        <div>
                            <label class="text-gray-700" for="username">Username</label>
                            <input id="username" type="text" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                        </div>

                        <div>
                            <label class="text-gray-700" for="emailAddress">Email</label>
                            <input id="emailAddress" type="email" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                        </div>

                        <div>
                            <label class="text-gray-700" for="password">Password</label>
                            <input id="password" type="password" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                        </div>

                        <div>
                            <label class="text-gray-700" for="passwordConfirmation">Password Confirmation</label>
                            <input id="passwordConfirmation" type="password" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                        </div>
                        <div>
                            <label class="text-gray-700" for="passwordConfirmation">Color</label>
                            <input id="color" type="color" class="h-10 form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                        </div>
                        <div>
                            <label class="text-gray-700" for="passwordConfirmation">Select</label>
                            <select class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                                <option>Surabaya</option>
                                <option>Jakarta</option>
                                <option>Tangerang</option>
                                <option>Bandung</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-gray-700" for="passwordConfirmation">Range</label>
                            <input type="range" class="w-full bg-transparent cursor-pointer appearance-none disabled:opacity-50 disabled:pointer-events-none focus:outline-none
                            [&::-webkit-slider-thumb]:w-2.5
                            [&::-webkit-slider-thumb]:h-2.5
                            [&::-webkit-slider-thumb]:-mt-0.5
                            [&::-webkit-slider-thumb]:appearance-none
                            [&::-webkit-slider-thumb]:bg-white
                            [&::-webkit-slider-thumb]:shadow-[0_0_0_4px_rgba(37,99,235,1)]
                            [&::-webkit-slider-thumb]:rounded-full
                            [&::-webkit-slider-thumb]:transition-all
                            [&::-webkit-slider-thumb]:duration-150
                            [&::-webkit-slider-thumb]:ease-in-out
                            
                            [&::-moz-range-thumb]:w-2.5
                            [&::-moz-range-thumb]:h-2.5
                            [&::-moz-range-thumb]:appearance-none
                            [&::-moz-range-thumb]:bg-white
                            [&::-moz-range-thumb]:border-4
                            [&::-moz-range-thumb]:border-blue-600
                            [&::-moz-range-thumb]:rounded-full
                            [&::-moz-range-thumb]:transition-all
                            [&::-moz-range-thumb]:duration-150
                            [&::-moz-range-thumb]:ease-in-out
                            
                            [&::-webkit-slider-runnable-track]:w-full
                            [&::-webkit-slider-runnable-track]:h-2
                            [&::-webkit-slider-runnable-track]:bg-gray-200
                            [&::-webkit-slider-runnable-track]:rounded-full
                            
                            [&::-moz-range-track]:w-full
                            [&::-moz-range-track]:h-2
                            [&::-moz-range-track]:bg-gray-100
                            [&::-moz-range-track]:rounded-full" id="basic-range-slider-usage">
                        </div>
                        <div>
                            <label class="text-gray-700" for="passwordConfirmation">Date</label>
                            <input id="date" type="date" class="form-input text-gray-700/80 block w-full rounded-md py-2 px-4 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25">
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-gray-700" for="passwordConfirmation">Address</label>
                            <textarea id="textarea" type="textarea" class="h-24 form-input text-gray-700/80 block w-full rounded-md py-1 px-2 mt-2 bg-white border border-gray-300 focus:ring-transparent focus:border-gray-700/25"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Image
                            </label>
                            <div class="relative mt-3 h-32 p-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <i class="ti ti-photo-plus text-4xl text-gray-700"></i>
                                    <label for="file-upload" class="absolute inset-0 cursor-pointer bg-transparent rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none ring-0 focus:ring-transparent focus:outline-0">
                                        <div class="relative mt-16">
                                            <h3 class="flex items-center justify-center"><span class="">Upload a file</span>
                                                <p class="pl-1 text-gray-700">or drag and drop</p>
                                            </h3>
                                            <p class="text-xs text-gray-700">PNG, JPG, GIF up to 10MB</p>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>

</body>

</html>