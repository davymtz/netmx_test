@if(session("error_messages"))
    @foreach (session('error_messages') as $value)
        <div class="alert alert-danger alert-dismissible">
            {{ $value }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif
@if(session("success_messages"))
    @foreach (session('success_messages') as $value)
        <div class="alert alert-success alert-dismissible">
            {{ $value }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif