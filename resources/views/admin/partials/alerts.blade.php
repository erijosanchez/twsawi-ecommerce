{{-- resources/views/components/alerts.blade.php --}}
<div class="top-0 position-fixed p-3 end-0" style="z-index: 1055">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade custom-fade show" role="alert" id="alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade custom-fade show" role="alert" id="alert-error">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

