<div>
    <table>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $pic)
                    <td>
                        <a href="{{route('detail', ['season' => 'test', 'id' => $pic->index])}}">
                            <img src="{{ URL::asset('img/photos/thumbnails/'.$pic->name.'.jpg') }}">
                        </a>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
</div>

