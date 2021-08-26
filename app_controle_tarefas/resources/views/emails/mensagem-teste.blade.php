@component('mail::message')
# Introdução

Corpo da mensagem

@component('mail::button', ['url' => ''])
Texto Botão
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
