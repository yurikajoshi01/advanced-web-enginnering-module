//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
//https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods
//https://developer.mozilla.org/en-US/docs/Web/HTTP/Status

window.onload = function() {
    document.addEventListener('change', e => {    
        if (e.target.matches('select.select-box')) {
            //example for dropdown list event
        }
    });   
    document.addEventListener('click', e => {
        if (e.target.matches('button.select-product')){
            getProductByID(e.target.value);
        }
         if (e.target.matches('button.edit-product')) {
            //example for button click event
        }
    });
}

function getProductByID(id){
    window.location = "/products/"+id;
}

