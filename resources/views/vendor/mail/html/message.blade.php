@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
        This is a system generated mail. Please do not reply.
        For any queries mail us at support@fluidbn.com  <br>  
        © {{ date('Y') }} fluidbN Media Technologies . All rights reserved.
        @endcomponent
    @endslot
@endcomponent
