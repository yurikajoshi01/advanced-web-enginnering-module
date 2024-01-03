//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
//https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods
//https://developer.mozilla.org/en-US/docs/Web/HTTP/Status


window.onload=function(){
    document.addEventListener('change', e => {    
        if (e.target.matches('select.select-box')) {
            filterByProductType(e.target.value)
        }
    }); 
    document.addEventListener('click',e=>{
        if (e.target.matches('button.select-product')){
            getProductByID(e.target.value);
        }
        if (e.target.matches('button.update-product')) {
            updateProductByID(e.target.value);
        }
        if (e.target.matches('button.edit-product')) {
            editProductByID(e.target.value);        }

        if (e.target.matches('button.delete-product')) {
            deleteProductByID(e.target.value);
        }       
    });
}

function getProductByID(id){
    window.location="/products/"+id;
}

function editProductByID(id){
    window.location="/products/"+id+"/edit";
}

async function deleteProductByID(id){
    try{
        const response = await axios.delete('/products/'+id);
        if(response.data.msg=='success'){
            alert('The Product has been Successfully Deleted');
            window.location = '/products';
        }
    }
    catch (error){
        console.error(error);
    }
}

async function  filterByProductType(id) {
    try{
        const response = await axios.get('/search',
            {params: {producttype:id}}
        );
        
        var filter = document.getElementById("productlist");
        filter.innerHTML = response.data;
                
    }
    catch (error) {
        console.error(error);
    }
}