<html>
<head>
	<title></title>
	<script src="jquery.js"></script>
	<script src="highcharts.js"></script>
	<script src="exporting.js"></script>

	<script>
		/*
		var d1 = <?php echo $d1; ?>;
		var d2 = <?php echo $d2; ?>;
		var d3 = <?php echo $d3; ?>;
		var d4 = <?php echo $d4; ?>;
		var d5 = <?php echo $d5; ?>;
		var d6 = <?php echo $d6; ?>;
		var d7 = <?php echo $d7; ?>;
		var d8 = <?php echo $d8; ?>;

		var i1 = <?php echo $i1; ?>;
		var i2 = <?php echo $i2; ?>;
		var i3 = <?php echo $i3; ?>;
		var i4 = <?php echo $i4; ?>;
		var i5 = <?php echo $i5; ?>;
		var i6 = <?php echo $i6; ?>;
		var i7 = <?php echo $i7; ?>;
		var i8 = <?php echo $i8; ?>;
		*/
	    
		//var der = new Array(d1, d2, d3, d4, d5, d6, d7, d8);
		//var izq = new Array(i1, i2, i3, i4, i5, i6, i7, i8);
		var der = new Array(10, 15, 20, 25, 35, 50, 85, 90);
		var izq = new Array(20, 25, 35, 45, 50, 65, 70, 80);

		//url_der = 'url(http://www.mallki.pusku.com/rojo_derecho.png)';

		//url_izq = 'url(http://www.mallki.pusku.com/azul_izquierdo.png)';
		//url_izq = 'url(http://www.mallki.pusku.com/circulo_aspa.png)';

		$(function () {
			$('#container1').highcharts({
		        title: {
		            text: ' ',
		            x: -20 //center
		        },
		        plotOptions: { //opções de plotagem geral
		            series: {
		                marker: {
		                    radius: 4
		                }
		            }
		        },
		        xAxis: {
		            opposite: true, //põe os valores de x no topo do gráfico
		            allowDecimals: true, //permite valores decimais
		            showFirstLabel: true, //esconde primeiro valor do X (valores que aparecem no label)
		            gridLineWidth: 1, //espessura da linha do grid X
		            tickmarkPlacement: 'on', // coloca os valores do categories em cima dos traços
		            title: {
                		enabled: true,
                		text: 'Hz' //título de x
            		},
		            minorTickInterval: 1, //menor intervalo entre os traços
		            categories: ['.25k', '.5k', '1k', '2k', '3k', '4k', '6k', '8k']
		        },
		        yAxis: {
		            min:-10,
		            max:120,
		            tickInterval: 5,
		            reversed: true,
		            title: {
		                enabled: true,
		                text: 'dB(A)'
		            },
		            plotLines: [{
		                value: 25,
		                width: 1,
		                color: '#FF0000'
		            }]
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
		        legend: {
		            layout: 'horizontal',
		            align: 'center',
		            //verticalAlign: 'middle',
		            horizontalAlign: 'middle',
		            borderWidth: 0,
		            enabled: true
		        },
		        series: [
		        	{
			            name: 'First Test/Baseline',
			            color: 'black',
			            data: der,
			            marker: {
			                symbol: 'circle',
			            },
			           	//lineWidth: 0
			        },
		        	{
			            name: 'Current Test',
			            color: 'blue',
			            data: izq,
			            marker: {
			                symbol: 'circle',
			            },
			            //lineWidth: 0
		        	}
		    	],
		      	exporting: {
		        	enabled: false
		    	},
		    	credits: {
            		enabled: false // destivado os créditos do site highcharts
        		}
		    });
		});


		$(function () {
			$('#container2').highcharts({
		        title: {
		            text: ' ',
		            x: -20 //center
		        },
		        plotOptions: { //opções de plotagem geral
		            series: {
		                marker: {
		                    radius: 4
		                }
		            }
		        },
		        xAxis: {
		            opposite: true, //põe os valores de x no topo do gráfico
		            allowDecimals: true, //permite valores decimais
		            showFirstLabel: true, //esconde primeiro valor do X (valores que aparecem no label)
		            gridLineWidth: 1, //espessura da linha do grid X
		            tickmarkPlacement: 'on', // coloca os valores do categories em cima dos traços
		            title: {
                		enabled: true,
                		text: 'Hz' //título de x
            		},
		            minorTickInterval: 1, //menor intervalo entre os traços
		            categories: ['.25k', '.5k', '1k', '2k', '3k', '4k', '6k', '8k']
		        },
		        yAxis: {
		            min:-10,
		            max:120,
		            tickInterval: 5,
		            reversed: true,
		            title: {
		                enabled: true,
		                text: 'dB(A)'
		            },
		            plotLines: [{
		                value: 25,
		                width: 1,
		                color: '#FF0000'
		            }]
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
		        legend: {
		            layout: 'horizontal', //pone los textos en la forma horizontal, los dos textos
		            align: 'center',
		            //verticalAlign: 'middle', //alinea el texto al lado vertical
		            horizontalAlign: 'middle',
		            borderWidth: 0,
		            enabled: true
		        },
		        series: [
		        	{
			            name: 'First Test/Baseline',
			            color: 'black',
			            data: der,
			            marker: {
			                symbol: 'square',
			            },
			           	//lineWidth: 0
			        },
		        	{
			            name: 'Current Test',
			            color: 'red',
			            data: izq,
			            marker: {
			                symbol: 'square',
			            },
			            //lineWidth: 0
		        	}
		    	],
		      	exporting: {
		        	enabled: false
		    	},
		    	credits: {
            		enabled: false // destivado os créditos do site highcharts
        		}
		    });
		});
</script>

</head>
<body>
	<div style="width: 720px; height: 350px; margin: 0 auto">
		<div id="container1" style="width: 360px; height: 350px; float:left; margin: 0 auto"></div>
		<div id="container2" style="width: 360px; height: 350px; float:left; margin: 0 auto"></div>
	</div>
</body>
</html>