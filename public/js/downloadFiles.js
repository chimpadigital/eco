

function donwloadFile(that, page_url, urlNotification,elementProgress) {

    var req = new XMLHttpRequest();   
    req.open("POST", page_url, true);
    req.addEventListener("progress", function (evt) {
        if(evt.lengthComputable) {
            console.log(req.getResponseHeader("file-size"));
            var percentComplete = evt.loaded / evt.total;
            percentComplete.toFixed(2);   
            

            percentComplete = Math.trunc( percentComplete * 100 ) ;

            
      
            elementProgress.css('width', percentComplete+'%').attr('aria-valuenow', percentComplete).text(percentComplete+'%');
            
            
            
        }
    }, false);

    req.responseType = "blob";
    req.setRequestHeader("X-CSRF-Token", $('meta[name="csrf-token"]').attr('content')); 
    req.onreadystatechange = function () {
        if (req.readyState === 4 && req.status === 200) {
            var filename = $(that).data('filename');
            if (typeof window.chrome !== 'undefined') {
                // Chrome version
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(req.response);
                link.download = filename;
                link.click();
            } else if (typeof window.navigator.msSaveBlob !== 'undefined') {
                // IE version
                var blob = new Blob([req.response], { type: 'application/force-download' });
                window.navigator.msSaveBlob(blob, filename);
            } else {
                // Firefox version
                var file = new File([req.response], filename, { type: 'application/download' });
                window.open(URL.createObjectURL(file));
            }

            notifyDownload(urlNotification);

            var img = document.createElement("img");

            img.src = "assets/img/icon-check-download.svg";

            var elementReplace= document.getElementById(elementProgress.attr('id')).parentElement;

            elementReplace.parentNode.replaceChild(img,elementReplace);
        }
    };
    req.send();

}

function notifyDownload(urlNotification){

    fetch(urlNotification,{
        method: 'post',
        headers: {
            'content-type': 'application/json',
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify({})
    }).then(function(res){
        
        if(res.status == 200 ){
            console.log(res);
        }

    })

}



$('.next-step').click(function(e) {
    e.preventDefault();
    
    fetch(URL_VERIFICATION_STEP,{
        method: 'post',
        headers: {
            'content-type': 'application/json',
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify({})
    }).then(function(res){
        
        
        if(res.status == 200 ){
            window.location.href = e.target.href;
        }else{
            swal(title_2, p_3, "error");
        }

    })
    
});
