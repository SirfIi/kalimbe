@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Bonjour!')
@endif
@endif

{{-- Intro Lines --}}
<!-- @foreach ($introLines as $line)
{{ $line }}

@endforeach -->
<p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Vous recevez cet email car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.</p>

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>

@component('mail::button', ['url' => $actionUrl, 'color' => $color])
<!-- {{ $actionText }} -->
Réinitialisation du mot de passe
@endcomponent
@endisset

{{-- Outro Lines --}}
<!-- @foreach ($outroLines as $line)
{{ $line }}

@endforeach -->

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Cordialement'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Si vous ne parvenez pas à cliquer sur le bouton \":actionText\" , copiez et collez l'URL ci-dessous\n".
    'dans votre navigateur web: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent
