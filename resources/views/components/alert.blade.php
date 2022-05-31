@if (session()->has('flash-primary'))
    <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('flash-primary') }}.
        </div>
    </div>
@endif
@if (session()->has('flash-success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('flash-success') }}.
        </div>
    </div>
@endif
@if (session()->has('flash-danger'))
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('flash-danger') }}.
        </div>
    </div>
@endif
@if (session()->has('flash-warning'))
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('flash-warning') }}.
        </div>
    </div>
@endif