function retrieveAllProducts(){
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../Controller/retrieveAllProducts.php', true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let products =  JSON.parse(this.responseText);
            let productContent = `<tr>
                                    <td><b>Id</b></td>
                                    <td><b>Name</b></td> 
                                    <td><b>Category</b></td> 
                                    <td><b>Seller Id</b></td> 
                                    <td><b>Price</b></td> 
                                    <td><b>Discounted Price</b></td> 
                                    <td><b>Percent</b></td> 
                                    <td></td> 
                                </tr>`;
            for(let i=0;i<products.length;i++){
                productContent += `<tr>
                                    <td>${products[i].id}</td>
                                    <td>${products[i].name}</td> 
                                    <td>${products[i].category}</td> 
                                    <td>${products[i].sellerId}</td> 
                                    <td>${products[i].price}</td> 
                                    <td>${products[i].discountedPrice}</td> 
                                    <td><input type="number" name="discountAmount" id='${products[i].id}' value="0"/></td> 
                                    <td><button class='${products[i].id}' onclick='return applyDiscount(event)'>Apply Discount</button></td> 
                                </tr>`;
            }
            document.getElementById('products').innerHTML = productContent;
        }
    }

    xhttp.send();
}

function applyDiscount(event){
    let productId = event.target.classList[0];
    let discountAmount = document.getElementById(productId).value;

    if (discountAmount < 0 || discountAmount >= 100){
        alert('Invalid Discount Amount');
        return false;
    }

    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/applyDiscount.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            retrieveAllProducts(); 
        }

    }

    xhttp.send('id=' + productId + '&amount=' + discountAmount);
}


retrieveAllProducts();