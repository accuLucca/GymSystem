var ctx = document.getElementById('myChart').getContext('2d');

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#150485',
            borderColor: 'rgb(255, 99, 132)',
            data: [5, 10, 5, 2, 20, 50, 10],
        }],
    },
    options: {},
})