@component('mail::message')
    {{-- Greeting --}}
    @if (! empty($greeting))
        # {{ $greeting }}
    @else
        @if ($level === 'error')
            # @lang('Whoops!')
        @else
            # @lang('Hello!')
        @endif
    @endif

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        {{ $line }}

    @endforeach

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
            {{ $actionText }}
        @endcomponent
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        {{ $line }}

    @endforeach

    {{-- Salutation --}}
    @if (! empty($salutation))
        {{ $salutation }}
    @else
        @lang('Cheers'),<br>
        Your Friends at Origins Wine Mag
    @endif

    P.s. You can follow us on social media for even more must-know Armenian news.
    <a href="{{!is_null($socialLinks) && $socialLinks->facebook  ? $socialLinks->facebook  : '' }}" target="_blank" class="icon icon-fb"></a>
    <a href="{{!is_null($socialLinks) && $socialLinks->twitter   ? $socialLinks->twitter   : '' }}" target="_blank" class="icon icon-tw"></a>
    <a href="{{!is_null($socialLinks) && $socialLinks->instagram ? $socialLinks->instagram : '' }}" target="_blank" class="icon icon-in"></a>
@endcomponent
