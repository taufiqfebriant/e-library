
<!-- success -->
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<!-- error -->
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<!-- warning -->
@if(session('warning'))
<div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

<!-- info -->
@if(session('info'))
<div class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endif