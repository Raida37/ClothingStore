function retrievePendingProducts(){
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../Controller/retrievePendingProducts.php', true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let products =  JSON.parse(this.responseText);
            let productContent = `<tr>
                                    <td><b>Id</b></td>
                                    <td><b>Name</b></td> 
                                    <td><b>Category</b></td> 
                                    <td><b>Price</b></td> 
                                    <td><b>Seller Id</b></td> 
                                    <td><b>Status</b></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr>`;
            for(let i=0;i<products.length;i++){
                productContent += `<tr>
                                    <td>${products[i].id}</td>
                                    <td>${products[i].name}</td> 
                                    <td>${products[i].category}</td> 
                                    <td>${products[i].price}</td> 
                                    <td>${products[i].sellerId}</td> 
                                    <td>${products[i].status}</td> 
                                    <td><button class='${products[i].id}' onclick='approveProduct(event)'>Approve</button></td> 
                                    <td><button class='${products[i].id}' onclick='rejectProduct(event)'>Reject</button></td> 
                                </tr>`;
            }
            document.getElementById('products').innerHTML = productContent;
        }
    }

    xhttp.send();
}

function approveProduct(event){
    let productId = event.target.classList[0];
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/approveProduct.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            retrievePendingProducts(); 
        }

    }

    xhttp.send('id=' + productId);
}

function rejectProduct(event){
    let productId = event.target.classList[0];
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/rejectProduct.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            retrievePendingProducts(); 
        }

    }

    xhttp.send('id=' + productId);
}

retrievePendingProducts();