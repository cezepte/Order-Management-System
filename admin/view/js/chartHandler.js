function chartLoad(income, outcome) {
    const chartFinanceId = document.getElementById('finance').getContext('2d');
    const dataFinance = {
        labels: ['Przychody: ' + income + 'zł', 'Rozchody: ' + outcome + 'zł'],
        datasets: [{
            label: 'Finanse w iLikeMac',
            data: [income, outcome],
            backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 99, 132)'],
            hoverOffset: 4
        }]
    };
    const chartNewChartFinance = new Chart(chartFinanceId, {
        type: 'doughnut',
        data: dataFinance,
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'left',
                    align: 'start'
                },
            },
        }
    });
    const chartOrderCountId = document.getElementById('orderCount').getContext('2d');
    const dataOrderCount = {
        labels: ['Poniedzialek', 'Wtorek', 'Sroda', 'Czwartek', 'Piatek', 'Sobota', 'Niedziela'],
        datasets: [{
            label: 'Ilość zamówień na iLikeMac',
            data: [4, 5, 6, 7, 3, 3, 5],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    const chartNewChartOrderCount = new Chart(chartOrderCountId, {
        type: 'line',
        data: dataOrderCount,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            plugins: {
                legend: {
                    title: {
                        display: true,
                        text: 'Liczba zamówień w tym tygodniu'
                    },
                },
            },
        },
    });
}