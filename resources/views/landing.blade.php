<html lang="en">
    @include("photo.head")
    <body>
        <form id="landing" method="POST" action="{{ route('landing') }}">
            {{ csrf_field() }}
            <div class="center.me">
                <div class="content">
                    <div class="row">
                        <div class="top-right">
                            <select name="season">
                                <option value="all" {{ $current == 'all' ? 'selected' : '' }}>All</option>
                                @foreach($seasons as $season)
                                    <option value="{{ $season["value"] }}" {{ $current == $season['value'] ? 'selected' : '' }}>{{ $season["display"] }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Search</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="title m-b-md">
                            Photography
                        </div>
                    </div>
                    <div class="row">
                        @include("photo.landing_table")
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
