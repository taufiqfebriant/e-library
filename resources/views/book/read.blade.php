@extends('layouts.body')
@section('title', "Baca {$book->title}")

@section('content')
    <div class="d-flex" style="height: 5vh">
        <div id="navigation_controls" class="d-flex w-100">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary rounded-0 py-0">
                <div class="d-flex align-items-center h-100">
                    <span>Kembali</span>
                </div>
            </a>
            <button id="go_previous" class="btn btn-outline-primary btn-sm rounded-0">
                <i class="fas fa-chevron-left"></i>
            </button>
            <input id="current_page" value="1" type="number" class="form-control rounded-0 h-100">
            <button id="go_next" class="btn btn-outline-primary btn-sm rounded-0">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div id="zoom_controls" class="d-flex">  
            <button id="zoom_in" class="btn btn-outline-primary rounded-0 btn-sm">
                <i class="fas fa-plus"></i>
            </button>
            <button id="zoom_out" class="btn btn-outline-primary rounded-0 btn-sm">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div id="my_pdf_viewer">
        <div id="canvas_container" class="position-relative">
            <canvas id="pdf_renderer"></canvas>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/pdfjs-dist@latest/build/pdf.min.js"></script>
    <script src="{{ asset('js/pdf-viewer.js') }}"></script>
@endpush