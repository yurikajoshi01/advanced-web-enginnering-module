//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
//https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods
//https://developer.mozilla.org/en-US/docs/Web/HTTP/Status

window.onload = function() {
    document.addEventListener('click', e => {
        if (e.target.matches('button.select-product')){
            getProductByID(e.target.value);
        }
    });
}

function getProductByID(id){
    window.location = "/products/"+id;
}

