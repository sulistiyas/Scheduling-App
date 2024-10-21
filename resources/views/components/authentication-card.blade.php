<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white-100 dark:bg-gray-900" style="background-image: url('{{asset('assets/dist/img/car_bg.jpg')}}'); background-repeat: no-repeat;background-attachment: fixed; background-size: 60% 80%; background-position: right;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
