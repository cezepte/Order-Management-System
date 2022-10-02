"use strict"

export default class Services {
    constructor() { }

    serviceInsert() {
        let p = new Promise((resolve, reject) => {
            const serviceForm = document.getElementById('addServiceForm')
            var data = new FormData(serviceForm)
            data.append('insertService', true)
            console.log(data)
            let xmlhttp = new XMLHttpRequest()
            xmlhttp.onreadystatechange = () => {
                if (this.readystate === this.DONE) {
                    console.log(this.responseText)
                    resolve('Service added successfully!')
                } else {
                    reject('An error occured!')
                }
            }
            xmlhttp.open('POST', 'router.php?position=servicesInsert')
            xmlhttp.setRequestHeader('Accept', '*/*')
            xmlhttp.send(data)
        })
        p.then((msg) => {
            console.log(msg)
            new Toast({ text: 'Usługa dodana pomyślnie!' })
        })
        p.catch((err) => {
            console.log(err)
        })
    }
}