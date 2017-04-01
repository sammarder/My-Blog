<table>
    @foreach ($seasons as $row)
        <tr>
            @foreach ($row as $season)
                <td>
                    <a href="{{ route('thumbnails', ['season' => $season['value']]) }}">
                        <div class="row">
                            <img class="folder" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Folder-orange.svg/1024px-Folder-orange.svg.png">
                        </div>
                        <div class="row">
                            {{ $season['display'] }}
                        </div>
                    </a>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>

