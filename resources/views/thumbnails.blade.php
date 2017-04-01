<!DOCTYPE html>
<html lang="en">
    @include("photo.head")
    <body>
        <div class="center.me">
            <div class="content">
                <div class="row">
                    <div class="title m-b-md">
                        {{ preg_replace('/(\D+)(\d+)/', '$1 $2', $season) }}
                    </div>
                </div>
                <div class="row">
                    @include("photo.thumbnails")
                </div>
            </div>
        </div>
     </body>
</html>
