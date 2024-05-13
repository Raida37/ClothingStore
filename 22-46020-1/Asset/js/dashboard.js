function retrieveDashboardInformation() {
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../Controller/retrieveDashboardInformation.php', true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let dashboardInformation = JSON.parse(this.responseText);
            let topSellers = dashboardInformation.topSellers;
            document.getElementById('totalProducts').innerHTML = dashboardInformation.totalProducts;
            document.getElementById('totalProductPrice').innerHTML = dashboardInformation.totalProductPrice;
            document.getElementById('totalTransactions').innerHTML = dashboardInformation.totalTransactions;
            document.getElementById('totalSellers').innerHTML = dashboardInformation.totalSellers;
            
            let topSellersContent = `<tr>
                                                <td><b>Id</b></td>
                                                <td><b>Username</b></td> 
                                                <td><b>Email</b></td> 
                                                <td><b>Status</b></td> 
                                    </tr>`


            for (let i = 0; i < topSellers.length; i++) {
                topSellersContent += `<tr>
                                                <td>${topSellers[i].id}</td>
                                                <td>${topSellers[i].username}</td> 
                                                <td>${topSellers[i].email}</td> 
                                                <td>${topSellers[i].status}</td> 
                                    </tr>`;
            }

            document.getElementById('topSellers').innerHTML = topSellersContent;
            
        }
    }

    xhttp.send();
}

retrieveDashboardInformation();