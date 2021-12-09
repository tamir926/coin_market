<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ url('/img/logo2.jpg') }}" alt="Logo" style="max-height: 80px; border-radius: 50%;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
