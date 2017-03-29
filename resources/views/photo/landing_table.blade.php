<div>
    <table>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $pic)
                    <td>
                        <img src="{{ URL::asset('img/photos/thumbnails/'.$pic->name.'.jpg') }}">
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
</div>

