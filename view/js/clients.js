import Toast from './toasts.js'

export default class Clients {
    constructor() { }

    clientSelectList() {
        let p = new Promise((resolve, reject) => {
            const xmlhtpp = new XMLHttpRequest();
            xmlhtpp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const data = this.responseText;
                    const clients = JSON.parse(data);
                    const clientsList = document.querySelector('.clientsList');
                    console.log(clients);
                    for (let client of clients) {
                        const option = document.createElement('option');
                        option.value = client[0];
                        option.innerHTML = client[1] + " " + client[2];
                        clientsList.appendChild(option);
                    }
                }
            }
            xmlhtpp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=clientsList');
            xmlhtpp.send();
            resolve("Client's list loaded successfully!");
        })
        p.then((message) => {
            console.log(message);
        })
    }
    clientList() {
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
    clientsInsert() {
        let p = new Promise((resolve, reject) => {
            const clientsInsertForm = document.getElementById('clientsInsertForm')
            const data = new FormData(clientsInsertForm)
            data.append('insertClient', true)
            const xmlhttp = new XMLHttpRequest()
            xmlhttp.addEventListener('readystatechange', () => {
                if (this.readyState === this.DONE) {
                    resolve('Client added to the database')
                } else {
                    reject('An error occured')
                }
            })
            xmlhttp.open('POST', 'router.php?position=clientsInsert')
            xmlhttp.setRequestHeader('Accept', '*/*')
            xmlhttp.send(data)
        }).then((msg) => {
            console.log(msg)
            new Toast({ text: "Klient został dodany do bazy danych!" })
        }).catch((err) => {
            console.log(err)
        })
    }
}