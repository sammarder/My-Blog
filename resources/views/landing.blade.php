<html lang="en">
    @include("photo.head")
    <body>
        <form id="landing" method="POST" action="{{ route('landing') }}">
            {{ csrf_field() }}
            <div class="content">
                <div class="row">
                    <select name="season">
                        <option value="all" {{ $current == 'all' ? 'selected' : '' }}>All</option>
                        @foreach($seasons as $season)
                            <option value="{{ $season["value"] }}" {{ $current == $season['value'] ? 'selected' : '' }}>{{ $season["display"] }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Search</button>
                </div>
            </div>
        @include("photo.landing_table")
        </form>
    </body>
</html>
