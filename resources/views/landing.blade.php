<html lang="en">
    @include("photo.head")
    <body>
        <select>
            <option value="all">All</option>
            @foreach($seasons as $season)
                <option value="{{ $season["value"] }}">{{ $season["display"] }}</option>
            @endforeach
        </select>
        @include("photo.landing_table")
    </body>
</html>
