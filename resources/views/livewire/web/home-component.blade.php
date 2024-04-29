<div>
    <x-navbar />

    <main>
        <div class="py-1">
            <div class="drawer lg:drawer-open">
                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                <div class="flex flex-col items-center justify-center drawer-content">
                    <div class="mx-auto mt-2 max-w-7xl">
                        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                            <section class="p-5 my-4 ">
                                <div class="flex items-center justify-between p-2">
                                    <div>
                                        <div class="text-sm breadcrumbs">
                                            <ul>
                                                <li><a class="text-gray-950 dark:bg-white">Home</a></li>
                                                <li class="text-gray-950 dark:bg-white"><a
                                                        class="text-gray-950 dark:bg-white">Documents</a></li>
                                                <li class="text-gray-950 dark:bg-white">Add Document</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flex justify-between gap-1 m-1">
                                        <div>
                                            <div class="join">
                                                <div>
                                                    <div>
                                                        <input class="input input-bordered join-item"
                                                            wire:model.live="search" name="search"
                                                            placeholder="Product Search here..." />
                                                    </div>
                                                </div>
                                                <select class="select select-bordered join-item" name="catgeory"
                                                    wire:model.live="category">
                                                    <option value="all">Filter</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->name }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <select class="w-full max-w-xs select select-success"
                                                wire:model.live="perPage" name="perPage">
                                                <option value="6" selected>Product Per Page</option>
                                                <option value="3">3</option>
                                                <option value="9">9</option>
                                                <option value="9">12</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-3 m-1 lg:grid-cols-3 xl:grid-cols-3">
                                    @foreach ($products as $product)
                                        <div class="shadow-xl card card-compact w-96 bg-base-100 ">
                                            <figure onclick="my_modal_4.showModal()" class="cursor-pointer">
                                                <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                                                    alt="Shoes" />
                                            </figure>
                                            <div class="card-body">
                                                <div class="flex justify-between ">
                                                    <h2 class="card-title">{{ $product->name }}</h2>
                                                    <h2 class="card-title">Stock: <span
                                                            class="font-extrabold text-white bg-green-500 badge">{{ $product->qty }}</span>
                                                    </h2>
                                                </div>
                                                <p>{{ Str::limit($product->short_description, 50, '...') }}</p>
                                                <div class="flex justify-between my-1">
                                                    @if ($product->sale_price > 0)
                                                        <h2 class="line-through card-title">Price: <span
                                                                class="font-extrabold text-white bg-red-500 badge">{{ $product->price }}</span>
                                                        </h2>
                                                        <h2 class="card-title">Sale Price: <span
                                                                class="font-extrabold text-white bg-green-500 badge">{{ $product->sale_price }}</span>
                                                        </h2>
                                                    @else
                                                        <h2 class="card-title">Sale Price: <span
                                                                class="font-extrabold text-white bg-green-500 badge">{{ $product->price }}</span>
                                                        </h2>
                                                    @endif
                                                </div>
                                                <div class="flex justify-between card-actions">
                                                    <div>
                                                        <input type="number" name="qty_{{ $product->id }}"
                                                            id="qty_{{ $product->id }}" min="1"
                                                            value="{{ $this->qty[$product->id] ?? 1 }}"
                                                            wire:model="qty.{{ $product->id }}"
                                                            class="w-32 px-2 rounded-md shadow-md border-1 border-gray-50"
                                                            placeholder="0.0" max="qty_{{ $product->id }}">
                                                    </div>

                                                    @if ($product->sale_price > 0)
                                                        <button class="btn btn-success btn-sm"
                                                            wire:click='addItem({{ $product->id }},"{{ $product->name }}",{{ $product->price }})'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-success btn-sm"
                                                            wire:click='addItem({{ $product->id }},"{{ $product->name }}",{{ $product->sale_price }})'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </button>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                                <div class="flex justify-center mt-5 mb-2">
                                    <div class="join">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </section>

                            <footer class="p-4 footer footer-center bg-base-300 text-base-content">
                                <aside>
                                    <p>Copyright © 2024 - All right reserved by ACME Industries Ltd</p>
                                </aside>
                            </footer>
                        </div>
                    </div>


                </div>
                <div class=" drawer-side">
                    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul class="min-h-full p-4 bg-white menu w-60 text-base-content">
                        @foreach ($categories as $category)
                            <li class="my-2"><a class="cursor-pointer"
                                    wire:click='getNames("{{ $category->name }}")'>{{ $category->name }}</a></li>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
    </main>


    <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Click the button below to close</p>
            <div class="modal-action">
                <form method="dialog">

                    <div class="bg-white">
                        <div class="pt-6">
                            <nav aria-label="Breadcrumb">
                                <ol role="list"
                                    class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                                    <li>
                                        <div class="flex items-center">
                                            <a href="#" class="mr-2 text-sm font-medium text-gray-900">Men</a>
                                            <svg width="16" height="20" viewBox="0 0 16 20"
                                                fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                            </svg>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <a href="#"
                                                class="mr-2 text-sm font-medium text-gray-900">Clothing</a>
                                            <svg width="16" height="20" viewBox="0 0 16 20"
                                                fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                            </svg>
                                        </div>
                                    </li>

                                    <li class="text-sm">
                                        <a href="#" aria-current="page"
                                            class="font-medium text-gray-500 hover:text-gray-600">Basic Tee 6-Pack</a>
                                    </li>
                                </ol>
                            </nav>

                            <div
                                class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                                <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg"
                                        alt="Two each of gray, white, and black shirts laying flat."
                                        class="h-full w-full object-cover object-center">
                                </div>
                                <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                                    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg"
                                            alt="Model wearing plain black basic tee."
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                                            alt="Model wearing plain gray basic tee."
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                </div>
                                <div
                                    class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg"
                                        alt="Model wearing plain white basic tee."
                                        class="h-full w-full object-cover object-center">
                                </div>
                            </div>


                            <div
                                class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Basic Tee
                                        6-Pack</h1>
                                </div>


                                <div class="mt-4 lg:row-span-3 lg:mt-0">
                                    <h2 class="sr-only">Product information</h2>
                                    <p class="text-3xl tracking-tight text-gray-900">$192</p>


                                    <div class="mt-6">
                                        <h3 class="sr-only">Reviews</h3>
                                        <div class="flex items-center">
                                            <div class="flex items-center">

                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <p class="sr-only">4 out of 5 stars</p>
                                            <a href="#"
                                                class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117
                                                reviews</a>
                                        </div>
                                    </div>



                                    {{-- <div>
                                            <h3 class="text-sm font-medium text-gray-900">Color</h3>

                                            <fieldset class="mt-4">
                                                <legend class="sr-only">Choose a color</legend>
                                                <div class="flex items-center space-x-3">


                                                    <label
                                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                                                        <input type="radio" name="color-choice" value="Gray"
                                                            class="sr-only" aria-labelledby="color-choice-1-label">
                                                        <span id="color-choice-1-label" class="sr-only">Gray</span>
                                                        <span aria-hidden="true"
                                                            class="h-8 w-8 bg-gray-200 rounded-full border border-black border-opacity-10"></span>
                                                    </label>

                                                    <label
                                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-900">
                                                        <input type="radio" name="color-choice" value="Black"
                                                            class="sr-only" aria-labelledby="color-choice-2-label">
                                                        <span id="color-choice-2-label" class="sr-only">Black</span>
                                                        <span aria-hidden="true"
                                                            class="h-8 w-8 bg-gray-900 rounded-full border border-black border-opacity-10"></span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div> --}}

                                    {{-- <div class="mt-10">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-sm font-medium text-gray-900">Size</h3>
                                                <a href="#"
                                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size
                                                    guide</a>
                                            </div>

                                            <fieldset class="mt-4">
                                                <legend class="sr-only">Choose a size</legend>
                                                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-not-allowed bg-gray-50 text-gray-200">
                                                        <input type="radio" name="size-choice" value="XXS"
                                                            disabled class="sr-only"
                                                            aria-labelledby="size-choice-0-label">
                                                        <span id="size-choice-0-label">XXS</span>
                                                        <span aria-hidden="true"
                                                            class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                                                            <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200"
                                                                viewBox="0 0 100 100" preserveAspectRatio="none"
                                                                stroke="currentColor">
                                                                <line x1="0" y1="100" x2="100"
                                                                    y2="0"
                                                                    vector-effect="non-scaling-stroke" />
                                                            </svg>
                                                        </span>
                                                    </label>

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                        <input type="radio" name="size-choice" value="XS"
                                                            class="sr-only" aria-labelledby="size-choice-1-label">
                                                        <span id="size-choice-1-label">XS</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                        <input type="radio" name="size-choice" value="S"
                                                            class="sr-only" aria-labelledby="size-choice-2-label">
                                                        <span id="size-choice-2-label">S</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                        <input type="radio" name="size-choice" value="M"
                                                            class="sr-only" aria-labelledby="size-choice-3-label">
                                                        <span id="size-choice-3-label">M</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                        <input type="radio" name="size-choice" value="L"
                                                            class="sr-only" aria-labelledby="size-choice-4-label">
                                                        <span id="size-choice-4-label">L</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                        <input type="radio" name="size-choice" value="XL"
                                                            class="sr-only" aria-labelledby="size-choice-5-label">
                                                        <span id="size-choice-5-label">XL</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                        <input type="radio" name="size-choice" value="2XL"
                                                            class="sr-only" aria-labelledby="size-choice-6-label">
                                                        <span id="size-choice-6-label">2XL</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>

                                                    <label
                                                        class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                        <input type="radio" name="size-choice" value="3XL"
                                                            class="sr-only" aria-labelledby="size-choice-7-label">
                                                        <span id="size-choice-7-label">3XL</span>

                                                        <span class="pointer-events-none absolute -inset-px rounded-md"
                                                            aria-hidden="true"></span>
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div> --}}

                                    <button type="submit"
                                        class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add
                                        to bag</button>

                                </div>

                                <div
                                    class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">

                                    <div>
                                        <h3 class="sr-only">Description</h3>

                                        <div class="space-y-6">
                                            <p class="text-base text-gray-900">The Basic Tee 6-Pack allows you to fully
                                                express your vibrant personality with three grayscale options. Feeling
                                                adventurous? Put on a heather gray tee. Want to be a trendsetter? Try
                                                our exclusive colorway: &quot;Black&quot;. Need to add an extra pop of
                                                color to your outfit? Our white tee has you covered.</p>
                                        </div>
                                    </div>

                                    <div class="mt-10">
                                        <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

                                        <div class="mt-4">
                                            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                                <li class="text-gray-400"><span class="text-gray-600">Hand cut and
                                                        sewn locally</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Dyed with our
                                                        proprietary colors</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp;
                                                        pre-shrunk</span></li>
                                                <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100%
                                                        cotton</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="mt-10">
                                        <h2 class="text-sm font-medium text-gray-900">Details</h2>

                                        <div class="mt-4 space-y-6">
                                            <p class="text-sm text-gray-600">The 6-Pack includes two black, two white,
                                                and two heather gray Basic Tees. Sign up for our subscription service
                                                and be the first to get new, exciting colors, like our upcoming
                                                &quot;Charcoal Gray&quot; limited release.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </dialog>
</div>
