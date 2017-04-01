<!DOCTYPE html>
<html lang='en'>
    @include("photo.head")
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-left links">
                <a href="{{ route('thumbnails', ['season'=> $season]) }}">Back</a>
            </div>
            <div class="content">
                <div class="row title m-b-md">
                    {{ ucfirst($pic->name) }}
                </div>
                <div class="row">
                    @include("photo.detail")
                <div>
                <div class="row">
                    @include("photo.links")
                </div>
            </div>
        </div>
    </body>
</html>
