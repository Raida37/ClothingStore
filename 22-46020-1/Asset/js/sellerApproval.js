function retrievePendingSellers(){
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../Controller/retrievePendingSellers.php', true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let sellers =  JSON.parse(this.responseText);
            let sellerContent = `<tr>
                                    <td><b>Id</b></td>
                                    <td><b>Username</b></td> 
                                    <td><b>Email</b></td> 
                                    <td><b>Status</b></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr>`;
            for(let i=0;i<sellers.length;i++){
                sellerContent += `<tr>
                                    <td>${sellers[i].id}</td>
                                    <td>${sellers[i].username}</td> 
                                    <td>${sellers[i].email}</td> 
                                    <td>${sellers[i].status}</td> 
                                    <td><button class='${sellers[i].id}' onclick='approveSeller(event)'>Approve</button></td> 
                                    <td><button class='${sellers[i].id}' onclick='rejectSeller(event)'>Reject</button></td> 
                                </tr>`;
            }
            document.getElementById('sellers').innerHTML = sellerContent;
        }
    }

    xhttp.send();
}

function approveSeller(event){
    let sellerId = event.target.classList[0];
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/approveSeller.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            retrievePendingSellers(); 
        }

    }

    xhttp.send('id=' + sellerId);
}

function rejectSeller(event){
    let sellerId = event.target.classList[0];
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/rejectSeller.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            retrievePendingSellers(); 
        }

    }

    xhttp.send('id=' + sellerId);
}

retrievePendingSellers();