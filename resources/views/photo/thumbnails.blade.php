<table>
    @foreach ($thumbnails as $row)
        <tr>
            @foreach ($row as $thumbnail)
                <td>
                    <a href="{{ route('pic', ['season' => $season, 'id' => $thumbnail['index']]) }}">{{ $thumbnail['name'] }}</a>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>

