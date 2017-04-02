<!DOCTYPE html>
<html lang="en">
    @include('photo.head')
    <table>
        @foreach($photos as $row)
            <tr>
                @foreach($row as $photo)
                    <td>
                        <img src="{{ URL::asset('img/photos/thumbnails/'.$photo->name.'.jpg') }}">
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
</html>
