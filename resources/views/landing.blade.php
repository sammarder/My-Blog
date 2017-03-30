<html lang="en">
    @include("photo.head")
    <body>
        <form id="landing" method="POST">
            {{ csrf_field() }}
            <div class="content">
                <div class="row">
                    <select>
                        <option value="all">All</option>
                        @foreach($seasons as $season)
                            <option value="{{ $season["value"] }}">{{ $season["display"] }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Search</button>
                </div>
            </div>
        @include("photo.landing_table")
        </form>
    </body>
</html>
