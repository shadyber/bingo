<div class="row origin-top-right">
<div class="col-md-12">
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>error</strong> {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

@if(session('success'))
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success</strong> {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
@endif


    @if(session('warning'))
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning</strong> {{session('warning')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif

    @if(session('message'))
        @if(session('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Note: </strong> {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif



</div>

    </div>


