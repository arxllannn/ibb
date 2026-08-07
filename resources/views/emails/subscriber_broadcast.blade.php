<x-mail::message>
    {{-- Render the HTML content using the {!! !!} syntax --}}
    {!! $emailContent !!}

    <x-mail::button :url="'https://infinitybusinessbrokers.com'">
        Visit our Website
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>