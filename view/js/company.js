"use strict"

import Toast from "./toasts.js";

export default class Company {
    constructor() { }

    async showCompanyData() {
        let p = new Promise((resolve, reject) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const data = this.responseText;
                    const dataJson = JSON.parse(data);
                    console.log(dataJson)
                    document.getElementById('companyName').value = dataJson[0][1]
                    document.getElementById('companyTin').value = dataJson[0][2]
                    document.getElementById('companyStreetNumber').value = dataJson[0][3]
                    document.getElementById('companyPostCode').value = dataJson[0][4]
                    document.getElementById('companyCity').value = dataJson[0][5]
                }
            }
            xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=companyData')
            xmlhttp.send()
            resolve('Statuses loaded successfully!')
        })
        p.then((message) => {
            console.log(message);
        })
    }

    async showCompanyHomePageData() {
        let p = new Promise((resolve, reject) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const data = this.responseText;
                    const dataJson = JSON.parse(data);
                    console.log(dataJson)
                    document.getElementById('topbarCompanyName').innerHTML = dataJson[0]['name']
                }
            }
            xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=companyData');
            xmlhttp.send();
            resolve('Statuses loaded successfully!');
        })
        p.then((message) => {
            console.log(message);
        })
    }
    async updateCompanyInfo(form) {
        let p = new Promise((resolve, reject) => {
            let data = new FormData(form)
            data.append('companyDataUpdate', true)
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    resolve('Company data updated')
                }
            }
            xmlhttp.open('POST', 'http://localhost/iLikeMac_ajax/router.php?position=companyDataUpdate');
            xmlhttp.send(data);
            resolve('Statuses loaded successfully!');
        })
        p.then((message) => {
            console.log(message);
            new Toast({ text: 'Informacje o firmie zostały zaktualizowane' })
        })
    }
}

