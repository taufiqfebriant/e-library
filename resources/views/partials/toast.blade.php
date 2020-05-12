<div class="toast fixed-bottom w-75 custom-toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000">
    <div role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body d-flex justify-content-between align-items-center bg-{{ $type }} text-white">
            <div class="d-flex align-items-center">
                <i class="mdi mdi-checkbox-marked mdi-24px"></i>
                <span class="ml-3 font-weight-bold">{{ $message }}</span>
            </div>
            <button type="button" class="ml-2 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>