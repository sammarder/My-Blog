<table>
    @foreach ($thumbnails as $row)
        <tr>
            @foreach ($row as $thumbnail)
                <td>
                    <a href="{{ route('detail', ['season' => $season, 'id' => $thumbnail['index']]) }}">
                        <div class="row">
                            <img class="thumbnail" src="{{ URL::asset('img/photos/thumbnails/'.$thumbnail->name.'.jpg') }}">
                        </div>
                        <div class="row">
                            {{ $thumbnail['name'] }}
                        </div>
                    </a>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>

