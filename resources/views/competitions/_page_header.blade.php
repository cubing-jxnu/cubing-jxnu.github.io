<div class="page-header text-center" style="margin-top: 0; padding-bottom: 0;">
    <h2 style="margin-top: 15px;">
        <a href="{{ route('competition.detail',$competition->id) }}" style="text-decoration: none;">
            {{ $competition->name }}
            <p class="lead" style="margin: 2px auto 2px;">{{ $competition->id }}</p>
        </a>
    </h2>
</div>