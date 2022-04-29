function showCompanyData() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = () => {
            if (this.readyState == 4 && this.status == 200) {
                const data = this.response.text;
                const dataJson = JSON.parse(data);
                const dataTable = dataJson[1];
                console.log(dataTable[0]);
                document.getElementById('companyName').value = dataTable[0];
                document.getElementById('companyTin').value = dataTable[1];
                document.getElementById('companyStreetNumber').value = dataTable[2];
                document.getElementById('companyPostCode').value = dataTable[3];
                document.getElementById('companyCity').value = dataTable[4];
                document.getElementById('topBarCompanyName').innerHTML = dataTable[0];
            }
        }
        xmlhttp.open('GET', 'router.php?position=companyData');
        xmlhttp.send();
        resolve('Company data loaded successfully!');
    })
    p.then((message) => {
        console.log(message);
    })
}
