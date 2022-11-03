@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('Pihak Berkuasa Kemajuan Pekebun Kecil Perusahaan ') }}
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
© {{ date('Y') }} {{ config('Pihak Berkuasa Kemajuan Pekebun Kecil Perusahaan ') }}. @lang('Hak Cipta Terpelihara.')
@endcomponent
@endslot
@endcomponent
