<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $resume->basics->name }} Resume</title>
        @vite(['resources/js/app.js'])
    </head>
    <body class="text-gray-800 bg-gray-50">
        <main class="mx-auto px-4 py-10 max-w-4xl">
            <header class="mb-12">
                <h1 class="text-4xl font-bold text-gray-800">
                    {{ $resume->basics->name}}
                </h1>
                <h2 class="text-xl font-medium text-blue-700">
                    {{ $resume->basics->label}} 
                </h2>
            <div class="mt-4 flex gap-3 text-gray-700">
                @if ($resume->basics->email)
                <div>
                    <a href="mailto:{{$resume->basics->email}}" class="hover: text-blue-700 mr-4">
                        {{$resume->basics->email}}
                    </a>
                </div>
                @endif
            </div>
            @if ($resume->basics->profiles)
                <div class="mt-4 flex flex-wrap">
                    @foreach ( $resume->basics->profiles as $profiles )
                            <a href="{{$profiles->url}}" class="hover:underline text-blue-700">
                                {{$profiles->network}}
                            </a>
                    @endforeach
                </div>
            @endif
            @if ($resume->basics->location->city && $resume->basics->location->region)
                <div>{{ $resume->basics->location->city}}, {{$resume->basics->location->region }}</div>
            @endif
            </header>
        </main>
    </body>
</html>