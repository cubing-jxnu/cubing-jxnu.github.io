@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))
        <div class="flash-message">
            <div class="alert alert-{{ $msg }} alert-dismissible">
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session()->get($msg) }}
            </div>
        </div>
    @endif
@endforeach