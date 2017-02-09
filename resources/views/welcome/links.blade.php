<div class="links flex-center">
    @foreach($links as $link)
    <a href="{{ $link->link }}" title="{{ $link->tip }}">
        {{ $link->link_text }}
    </a>
    @endforeach
</div>
