@component('mail::message')
    {!! request('message') !!}

    {!! config('app.name') !!}
@endcomponent
