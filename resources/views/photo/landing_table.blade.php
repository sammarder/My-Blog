<div>
    <table>
        <tr>
            @foreach ($rows as $row)
                @foreach ($row as $pic)
                    <td> {{ $pic->name }} </td>
                @endforeach
            @endforeach
        </tr>
    </table>
</div>

