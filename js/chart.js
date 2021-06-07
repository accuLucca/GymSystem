$('document').ready(function () {

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../php/grafico.php",
        success: function (data) {

            var horaMarcada = [];

            for (var i in data) {
                horaMarcada.push(data[i].horaMarcada);
                console.info(data[i].horaMarcada);
            }
            grafico(horaMarcada);
        }
    });

})

function grafico(hora) {

    var ctx = document.getElementById('myChart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'],
            datasets: [{
                label: 'Pessoas',
                backgroundColor: '#150485',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            }],
        },
        options: {},
    })
}