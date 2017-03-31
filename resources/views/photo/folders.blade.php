<table>
    @foreach ($seasons as $row)
        <tr>
            @foreach ($row as $season)
                <td>
                    <a href="{{ route('thumbnails', ['season' => $season['value']]) }}">{{ $season['display'] }}</a>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>

