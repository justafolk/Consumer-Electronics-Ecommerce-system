/* globals Chart:false, feather:false */

(function () {
    'use strict'

    feather.replace({ 'aria-hidden': 'true' })

    // Graphs
    var ctx = document.getElementById('myChart').getContext('2d');
    // eslint-disable-next-line no-unused-vars
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],

            datasets: [{
                label: 'Ecommerce',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
                backgroundColor: 'rgb(75, 192, 192)',
            },
            {
                label: 'In-Store Purchase',
                data: [28, 48, 40, 19, 86, 27, 90],
                fill: false,
                borderColor: 'rgb(200, 0,0)',
                tension: 0.1
            }]
        },

        options: {
            
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    })


    var ctx = document.getElementById('visitors')
    // eslint-disable-next-line no-unused-vars
    var visitors = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Phones', 'Earphones', 'Computers', 'Televisions', 'Mobile Accessories', 'Others'],
            datasets: [{
                label: 'Visitor count per category',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            
        }
    })
    // insert a bar graph
    var ctxs = document.getElementById('sellers')
    // eslint-disable-next-line no-unused-vars
    var sellers = new Chart(ctxs, {
        type: 'bar',
        data: {
            labels: ['Pune', 'Thane', 'Satara', 'Noida', 'GandhiNagar', 'Matunga'],
            datasets: [{
                label: 'Top Sellers',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            
        }
    })
    








    var ctx2 = document.getElementById('lol').getContext('2d');
    var lol = new Chart(ctx2, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: [
                'Instagram',
                'Facebook',
                'Google Adsense',
            ],
            datasets: [{

                label: 'Website Hit Sources',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },

        // Configuration options go here
        options: {}
    });

    
    var ctxs = document.getElementById('myChart2')
    // eslint-disable-next-line no-unused-vars
    var myChart2 = new Chart(ctxs, {
        type: 'line',
        data: {
            labels: [
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October'
            ],
            datasets: [{
                data: [
                    30,
                    31,
                    28,
                    24,
                    25,
                    30,
                    31
                ],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    })
})()