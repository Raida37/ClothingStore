function retrieveTransactionHistory() {
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../Controller/retrieveTransactionHistory.php', true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let transactionHistory = JSON.parse(this.responseText);

            let transactionHistoryContent = `<tr>
                                                <td><b>Time</b></td>
                                                <td><b>Id</b></td> 
                                                <td><b>Product Id</b></td> 
                                                <td><b>Buyer Id</b></td> 
                                                <td><b>Seller Id</b></td> 
                                            </tr>`


            for (let i = 0; i < transactionHistory.length; i++) {
                transactionHistoryContent += `<tr>
                                                    <td>${transactionHistory[i].time}</td>
                                                    <td>${transactionHistory[i].id}</td> 
                                                    <td>${transactionHistory[i].productId}</td> 
                                                    <td>${transactionHistory[i].buyerId}</td> 
                                                    <td>${transactionHistory[i].sellerId}</td> 
                                            </tr>`;
            }
            document.getElementById('transactionHistory').innerHTML = transactionHistoryContent;
        }
    }

    xhttp.send();
}

retrieveTransactionHistory();