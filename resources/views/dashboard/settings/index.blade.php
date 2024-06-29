@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="w-full text-white bg-emerald-500">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                        </path>
                    </svg>

                    <p class="mx-3">{{ session('success') }}</p>
                </div>

                <button class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="w-full text-white bg-red-500">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                        </path>
                    </svg>

                    <p class="mx-3">{{ $errors->first() }}</p>
                </div>

                <button class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <form id="my-form" method="POST" enctype="multipart/form-data"
          action="{{ route('settings.update', $setting->id) }}">
        @method('patch')
        @csrf
        <div class="grid grid-cols-1 gap-8 mt-8">
            <div class="p-4 bg-white rounded-lg xl:p-6">
                <h1 class="text-lg font-medium text-gray-700 capitalize sm:text-xl">Contact info</h1>

                <section class="mt-6 space-y-5">
                    <div>
                        <label for="phone" class="block text-sm text-gray-700 capitalize font-semibold">Phone number</label>
                        <input value="{{ $setting->mobile }}" name="mobile" type="text"
                               class="block w-full px-3 py-2 mt-3 text-gray-600 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    </div>
                </section>

                <section class="mt-6 space-y-5">
                    <div>
                        <label for="phone" class="block text-sm text-gray-700 capitalize font-semibold">Whatsapp enable</label>
                        <select name="is_whatsapp_enable"
                                class="block w-full px-3 py-2 mt-3 text-gray-600 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            <option value="1" {{ $setting->is_whatsapp_enable === 1 ? 'selected' : '' }}>Enable</option>
                            <option value="0" {{ $setting->is_whatsapp_enable === 0 ? 'selected' : '' }}>Disable</option>
                        </select>
                    </div>
                </section>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button id="btn-submit" type="submit"
                    class=" px-4 py-2.5 mt-4 text-sm tracking-wide -mx-1 text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                <div class="flex items-center justify-center">
                    <svg class="w-5 h-5 mx-1" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"></path>
                    </svg>

                    <span class="mx-1">Update</span>
                </div>
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#my-form").submit(function (e) {
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").find("span").text("Updating ...");
                return true;
            });
        });
    </script>
@endsection
