@component('mail::message')

# Hallo, {{ $content['name'] }}

Silahkan lakukan verifikasi terlebih dahulu sebelum anda melakukan pemesanan
pada situs website kami.

@component('mail::button', ['url' => $content['alamat']])
Verifikasi Disini
@endcomponent

@component('mail::panel')
Silahkan lakukan verifikasi pada alamat berikut jika tombol tidak dapat berfungsi.
<a href="{{ $content['alamat'] }}">{{ $content['alamat'] }}</a>

@endcomponent

Dari Kami,<br>
{{ config('app.name') }}
@endcomponent
