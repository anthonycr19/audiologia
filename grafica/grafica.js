$(function () {
    $('#container').highcharts({
        chart: {
            renderTo: 'OD', //plotar o gráfico no div com id OD
            //defaultSeriesType: 'spline' //tipo de gráfico
        },
        title: {
            text: 'OD' //título do gráfico
        },
        subtitle: {
            text: 'Audiometria' // subtítulo do gráfico
        },
        plotOptions: { //opções de plotagem geral
            series: {
                marker: {
                    radius: 5
                }
            }
        },
        //xAxis -> Parte x do gráfico
        xAxis: {
            opposite: true, //põe os valores de x no topo do gráfico
            allowDecimals: true, //permite valores decimais
            showFirstLabel: true, //esconde primeiro valor do X (valores que aparecem no label)
            gridLineWidth: 1, //espessura da linha do grid X
            tickmarkPlacement: 'on', // coloca os valores do categories em cima dos traços
            title: {
                enabled: true,
                text: 'Khz' //título de x
            },
            categories: ['250', '500', '1000', '2000', '3000', '4000', '6000', '8000'], //valores do label x
            minorTickInterval: 1, //menor intervalo entre os traços
            //tickInterval: 1,
            //min: 0,
        },
        //yAxis -> Parte y do gráfico
        yAxis: {
            reversed: true, //valores menores em cima e maiores embaixo
            showFirstLabel: false, //esconde primeiro valor do y (valores que aparecem no label)
            title: {
                enabled: true,
                text: 'dB', //título de y
            },
            tickInterval: 10, //intervalo entre os traços de Y
            min:-10, //valor minimo de Y que irá aparecer no gráfico
            max:120    , // valor máximo de Y que irá aparecer no gráfico
            plotLines: [{ //linha vermelha que corta o gráfico
                color: '#CC0000', //cor: vermelho escuro
                width: 2, // espessura
                value: 25 // valor 25 em Y
            }]
        },
        credits: {
            enabled: false // destivado os créditos do site highcharts
        },
        tooltip: {
            crosshairs: [{ //insere linha preta no x e y ao passar o mouse no ponto
                width: 1, // espessura
                color: 'black' //cor
                }, {
                width: 1, // espessura
                color: 'black' // cor
            }]
        },
        series: [{ //Sequencia de dados que será plotado no gráfico
            name: 'First Test/Baseline', //nome (aparece na legenda)
            color: 'red', //cor
            marker: {
                symbol: 'circle', // simbolo do ponto
            },
            data: [25, 30, 35, 45, 55, 75, 85, 90], // 8 posições de dados, nulos para aperecerem só ao ser inserido na caixa de texto
        },
        {// segunda sequenca de dados q será plotado no gráfico
            name: 'Current Test',
            color: 'blue',
            marker: {
                symbol: 'square',
            },
            data: [15, 20, 40, 55, 55, 65, 85, 95],
            //lineWidth: 0,
        }],
        exporting: {
        enabled: false
    }
        
    });
});