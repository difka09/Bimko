@if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p>{{ session('info') }}</p>
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger" id="alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p>{{ session('danger') }}</p>
    </div>
@endif

