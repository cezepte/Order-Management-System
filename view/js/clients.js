// function clientDetails(clientId) {
//     let p = new Promise((resolve, reject) => {
//         const xmlhtpp = new XMLHttpRequest();
//         xmlhtpp.onreadystatechange = function () {
//             if (this.readyState == 4 && this.status == 200) {
//                 const data = this.responseText;
//                 const clientsTable = JSON.parse(data);
//                 const userData = clientsTable[clientId];
//                 document.getElementById('firstName').innerHTML = userData[1];
//                 document.getElementById('lastName').innerHTML = userData[2];
//                 document.getElementById('company').innerHTML = userData[3];
//                 document.getElementById('tin').innerHTML = userData[4];
//                 document.getElementById('telNumber').innerHTML = userData[5];
//                 document.getElementById('email').innerHTML = userData[6];
//             }
//         }
//         xmlhtpp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=clients ');
//         xmlhtpp.send();
//         resolve("Client's details loaded successfully!");
//     })
//     p.then((message) => {
//         console.log(message);
//     })
// }
function clientList() {
    let p = new Promise((resolve, reject) => {
        const xmlhtpp = new XMLHttpRequest();
        xmlhtpp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const data = this.responseText;
                const clients = JSON.parse(data);
                const clientsPlaceholder = document.getElementById('clientList');
                console.log(clients);
                for (let client of clients) {
                    let line = document.createElement('tr');
                    let cell = document.createElement('td');
                    let moreButton = document.createElement('button');
                    cell.innerHTML = client[2];
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    cell.innerHTML = client[1];
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    cell.innerHTML = client[3];
                    line.appendChild(cell);
                    moreButton.classList.add('btn', 'btn-success', 'clientDetails');
                    moreButton.id = client[0];
                    moreButton.setAttribute('onclick', 'clientDetails(this.id)')
                    clientsPlaceholder.appendChild(line);
                }
            }
        }
        xmlhtpp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=clientsByLastname');
        xmlhtpp.send();
        resolve("Client's list loaded successfully!");
    })
    p.then((message) => {
        console.log(message);
    })
}