@extends('statamic::layout')
@section('title', 'Resources')

@section('content')
<div class="flex items-center mb-3">
    <h1 class="flex-1">Resources</h1>

    @if($trelloUrl)
        <a href="{{ $trelloUrl }}" target="_blank" class="btn flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" class="pr-2 h-4">
                <defs>
                    <clipPath id="a">
                        <path
                            d="M22.216 0a2.997 2.997 0 0 1 2.992 2.993v19.19a2.997 2.997 0 0 1-2.992 3.009H2.996A2.997 2.997 0 0 1 0 22.183V2.993A2.997 2.997 0 0 1 2.997 0ZM9.862 4.648h-4.2a.998.998 0 0 0-.993.998v12.499c0 .55.444.995.993.997h4.2a1.002 1.002 0 0 0 1.01-.997l-.013-12.5a1.002 1.002 0 0 0-.997-.997Zm9.692 0h-4.2c-.55.002-.995.448-.997.998v6.76c.002.55.447.995.997.998h4.2a.998.998 0 0 0 1.01-.998l-.016-6.76a.998.998 0 0 0-.994-.998Z"
                        />
                    </clipPath>
                </defs>
                <g clip-path="url(#a)"><path d="M0 0h25.208v25.192H0V0z" /></g>
            </svg>
            Trello
        </a>
    @endif
</div>

@if(count($looms) > 0)
    <div class="card p-0 mb-4">
        <header class="flex justify-between items-center p-2 border-b">
            <h2 class="flex items-center">
                <span>{{ __('Videos') }}</span>
            </h2>
        </header>

        <section class="p-4">
            <div class="flex flex-row flex-wrap">
                @foreach($looms as $loom)
                    <div class="w-full md:w-1/2 mb-4 pr-4">
                        <div class="mb-2" style="position: relative; padding-bottom: 60.55625790139065%; height: 0;">
                            <iframe src="{{ $loom['embed_url'] }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                        <h3>{{ $loom['name'] }}</h3>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endif

@if(count($additionalResources) > 0)
    <div class="card p-0 mb-4">
        <header class="flex justify-between items-center p-2 border-b">
            <h2 class="flex items-center">
                <div class="h-6 w-6 mr-1 text-grey-80">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                    </svg>
                </div>
                <span>{{ __('Additional Resources') }}</span>
            </h2>
        </header>

        <section class="px-2 py-1">
            <div class="grid grid-cols-2 gap-4 py-2">
                <ul class="list-disc pl-2">
                    @foreach($additionalResources as $additionalResource)
                        <li><a class="text-blue hover:text-blue-dark" href="{{ $additionalResource['url'] }}">{{ $additionalResource['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
    @endif
@endsection

@push('head')
    <link rel="preconnect" href="https://loom.com" />
@endpush
