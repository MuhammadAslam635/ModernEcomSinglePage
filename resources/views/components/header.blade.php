<div class="flex-none">
    <div class="dropdown dropdown-end min-w-90">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
            <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="badge badge-sm indicator-item">{{ Cart::instance('cart')->count() }}</span>
            </div>
        </div>
        <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content  bg-base-100">
            <div class="card-body">
                <div class="flex-1 overflow-y-scroll px-4 py-6 sm:px-6">
                    <div class="flex items-start justify-between">
                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                        <div class="ml-3 flex h-7 items-center">
                            <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                @forelse (Cart::instance('cart')->content() as $item)
                                    <li class="flex py-6">
                                        <div
                                            class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-full border border-green-200">
                                            <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                                alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                class="h-full w-full object-cover object-center">
                                        </div>

                                        <div class="ml-4 flex flex-1 flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>
                                                        <a href="#">{{ $item->name }}</a>
                                                    </h3>
                                                    <p class="ml-4">{{ $item->price }}</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $item->model->category->name }}</p>
                                            </div>
                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                <p class="text-gray-500">Qty {{ $item->qty }}</p>

                                                <div class="flex">
                                                    <button type="button"
                                                        class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="flex py-6">
                                        <div
                                            class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                            <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                                alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                                class="h-full w-full object-cover object-center">
                                        </div>


                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="border-t  px-4 py-6 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <p>Subtotal</p>
                        <p>{{ Cart::subtotal() }}</p>
                    </div>
                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                    <div class="mt-6">
                        <button type="button" onclick="my_modal_5.showModal()"
                            class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</button>
                    </div>
                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                        <p>
                            or
                            <button type="button" onclick="my_modal_5.showModal()"
                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                Continue Shopping
                                <span aria-hidden="true"> &rarr;</span>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component"
                    src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
            </div>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[10] p-2 shadow-sm bg-green-300 rounded-md w-60">
            @auth
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                <li><a>Settings</a></li>
                <li><a>Logout</a></li>
            @else
                <li><a href="{{ route('login') }}">Login / SignIn</a></li>
                <li><a href="{{ route('register') }}">Register / SignUp</a></li>
            @endauth
        </ul>
    </div>
    <dialog id="my_modal_5" class="modal">
        <div class="modal-box w-11/12 max-w-auto">
            <h3 class="font-bold text-lg">CheckOut</h3>
            <p class="py-4">Fill Out The Form to Complete Checkout</p>
            <div class="modal-action">
                <form method="dialog">


                    <form>
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Info</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be not displayed
                                    publicly</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-6">
                                        <label for="username"
                                            class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                                <input type="text" name="username" id="username"
                                                    autocomplete="username"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="janesmith">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="email"
                                            class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                                <input type="email" name="email" id="email"
                                                    autocomplete="email"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="janesmith">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="mobile"
                                            class="block text-sm font-medium leading-6 text-gray-900">Mobile</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                                <input type="text" name="mobile" id="mobile"
                                                    autocomplete="mobile"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="03xxxxxxxxx">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="border-b border-gray-900/10 pb-12">


                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                                    <div class="col-span-full">
                                        <label for="street-address"
                                            class="block text-sm font-medium leading-6 text-gray-900">
                                            address</label>
                                        <div class="mt-2">
                                            <input type="text" name="street-address" id="street-address"
                                                autocomplete="street-address"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2 sm:col-start-1">
                                        <label for="city"
                                            class="block text-sm font-medium leading-6 text-gray-900">City</label>
                                        <div class="mt-2">
                                            <input type="text" name="city" id="city"
                                                autocomplete="address-level2"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="region"
                                            class="block text-sm font-medium leading-6 text-gray-900">State /
                                            Province</label>
                                        <div class="mt-2">
                                            <input type="text" name="region" id="region"
                                                autocomplete="address-level1"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="postal-code"
                                            class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal
                                            code</label>
                                        <div class="mt-2">
                                            <input type="text" name="postal-code" id="postal-code"
                                                autocomplete="postal-code"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-900/10 pb-12">


                                <div class="mt-10 space-y-10">
                                    <fieldset>
                                        <legend class="text-sm font-semibold leading-6 text-gray-900">Order Detail
                                        </legend>
                                        <div class="mt-6 space-y-6">
                                            <div class="relative flex gap-x-3">
                                                <div class="text-sm leading-6">
                                                    <label for="tax" class="font-medium text-gray-900">Shipping
                                                        Charges</label>
                                                    <p class="text-gray-500">300 Pkr.</p>
                                                </div>

                                            </div>
                                            <div class="relative flex gap-x-3">
                                                <div class="text-sm leading-6">
                                                    <label for="tax"
                                                        class="font-medium text-gray-900">Tax</label>
                                                    <p class="text-gray-500">{{ Cart::tax() }} Pkr</p>
                                                </div>
                                            </div>
                                            <div class="relative flex gap-x-3">

                                                <div class="text-sm leading-6">
                                                    <label for="subtotal"
                                                        class="font-medium text-gray-900">Subtotal</label>
                                                    <p class="text-gray-500">{{ Cart::subtotal() }} Pkr</p>
                                                </div>
                                            </div>
                                            <div class="relative flex gap-x-3">

                                                <div class="text-sm leading-6">
                                                    <label for="total" class="font-medium text-gray-900">Grand
                                                        Total</label>
                                                    <p class="text-gray-500">{{ Cart::total() + 300 }} Pkr</p>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button"
                                class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>

                </form>
            </div>
        </div>
    </dialog>
</div>
