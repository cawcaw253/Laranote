<div class="card-content">
    <div class="card-content-block">
        <h3 class="title">TAGS</h3>
        <div class="content">
            @foreach ($tags as $tag)
            <div class="tag">
                <a href="{{ route('notes.index', ['tags[0]' => $tag->title]) }}">
                    <span
                        style="background-color: {!! $tag->color_code !!}; color: {!! $tag->contrast_font_color !!};">{{ $tag->title }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>