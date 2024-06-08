@props(['messages'])

@if ($messages)
    <span style="font-style: bold; color: red;" >
            {{ $messages }}
    </span>
@endif
