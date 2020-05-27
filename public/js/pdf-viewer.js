$(function() {
    let file, loadingTask, limit;

    var myState = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }

    function base64ToUint8Array(base64) {
        var raw = atob(base64);
        var uint8Array = new Uint8Array(raw.length);
        for (var i = 0; i < raw.length; i++) {
            uint8Array[i] = raw.charCodeAt(i);
        }
        return uint8Array;
    }
    
    // // Book data
    $.ajax({
        url: `${base_url}/books/files/${segments[3]}`,
        success: function(response) {
            file = base64ToUint8Array(response.file);
            loadingTask = pdfjsLib.getDocument(file)
            loadingTask.promise.then(function (pdf) {
                myState.pdf = pdf;
                // Loan data
                $.ajax({
                    data: {
                        book_id: segments[3]
                    },
                    url: `${base_url}/loans/auth-user`,
                    success: function(response) {
                        if (Object.keys(response).length === 0 && response.constructor === Object) {
                            limit = 10
                        } else {
                            limit = myState.pdf._pdfInfo.numPages
                        }
                    }
                });
                render();
            });
        }
    });

    function render() {
        myState.pdf.getPage(myState.currentPage).then(function (page) {
            var canvas = document.getElementById("pdf_renderer");
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport({scale: myState.zoom});
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }

    document.getElementById('go_previous').addEventListener('click', (e) => {
        if (myState.pdf == null
           || myState.currentPage == 1) return;
        myState.currentPage -= 1;
        document.getElementById("current_page")
                .value = myState.currentPage;
        render();
    });

    document.getElementById('go_next').addEventListener('click', (e) => {
        if (myState.pdf == null || myState.currentPage >= limit) {
            return;
        }
        myState.currentPage += 1;
        document.getElementById("current_page")
                .value = myState.currentPage;
        render();
    });

    document.getElementById('current_page')
    .addEventListener('keypress', (e) => {
        if(myState.pdf == null) return;
     
        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);
     
        // If key code matches that of the Enter key
        if(code == 13) {
            var desiredPage = 
                    document.getElementById('current_page')
                            .valueAsNumber;
                             
            if(desiredPage >= 1 
               && desiredPage <= myState.pdf
                                        ._pdfInfo.numPages) {
                    myState.currentPage = desiredPage;
                    document.getElementById("current_page")
                            .value = desiredPage;
                    render();
            }
        }
    });

    document.getElementById('zoom_in')
    .addEventListener('click', (e) => {
        if(myState.pdf == null) return;
        myState.zoom += 0.1;
        render();
    });

    document.getElementById('zoom_out')
    .addEventListener('click', (e) => {
        if(myState.pdf == null) return;
        myState.zoom -= 0.1;
        render();
    });
});
