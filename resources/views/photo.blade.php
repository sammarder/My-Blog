<!DOCTYPE html>
<html lang="en">
    @include("photo.head")
    <body>
        <form id="photo" method="POST">
        {{ csrf_field() }}
            <div class="flex-center position-ref full-height">
                @include("nav")
                <div class="content">
                    <div class="row title m-b-md">
                        Photography
                    </div>
                    <input type="hidden" name="imageNum" value={{ $imageNum }} />
                    @include("photo.content")
                </div>
            </div>
        </form>
    </body>
</html>
