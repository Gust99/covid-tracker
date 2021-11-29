<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="./iconoU.jpg">

	<title>SEIR de Tarija</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<script src="https://kit.fontawesome.com/f67e9384a7.js"></script>

	<style type="text/css">
		body{
			font-family: sans-serif;
			background-color: #ffffff;
			color: #2d4577;
			font-size: 17px;
		}
		.my-Container {
			justify-content: center;
			align-content: center;
			align-items: center;
			text-align: left;
		}
		.my-Row {
			justify-content: center;
			align-content: center;
			align-items: center;
			text-align: left;		
		}
		.my-Col {
			justify-content: center;
			align-content: center;
			align-items: center;
			text-align: left;
		}
		@media screen and (min-width: 500px) {
			.resp {
				width: 60%;
				height: 100%;
			}
		}

		@media screen and (max-width: 499px) {
			.resp {
				width: 100%;
				height: 100%;
			}
		}
	</style>

	<style>
		.topnav {
			overflow: hidden;
			background-color: #2d4577;
		}

		.topnav a {
			float: left;
			display: block;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		.topnav a.active {
			background-color: #fdbe24;
			color: black;
		}

		.topnav .icon {
			display: none;
		}

		@media screen and (max-width: 900px) {
			.topnav a:not(:first-child) {display: none;}
			.topnav a.icon {
				float: right;
				display: block;
			}
		}

		@media screen and (max-width: 900px) {
			.topnav.responsive {position: relative;}
			.topnav.responsive .icon {
				position: absolute;
				right: 0;
				top: 0;
			}
			.topnav.responsive a {
				float: none;
				display: block;
				text-align: left;
			}
		}
	</style>
</head>
<body>
	<div class="topnav" id="myTopnav" style="position: sticky; top: 0%;z-index: 1;">
		<a href="index.html" class="active">Inicio</a>
		<a href="proyeccionesTarija.php">Proyecciones Tarija</a>
		<a href="proyeccionesBolivia.php">Proyecciones Bolivia</a>
		<a href="centroMonitoreo.php">Centro de Monitoreo</a>
		<a href="reporteHistorico.php">Reporte Historico</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>

	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
	</script>

	<br>

	<div class="container-fluid" style="text-align: center;">
		<div class="row">
			<div class="col">
				<img class="resp" id="resp" src="logo1.png" onclick="location.href='index.html';">
			</div>
		</div>
	</div>

	<hr>
	<br>

	<div class="container my-Container">
		<div class="row my-Row">
			<div class="col my-Col">
				<h5>Tasa de contagios: 0.10</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer1" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>
	</div>

	<br>
	<hr>

	<div class="container-fluid my-Container">
		<div class="row my-Row">
			<div class="col-lg-6 my-Col" style="text-align: center;margin: 15px;">
				<a style="color: rgba(45, 68, 119, 0.6);" href="https://www.boliviasegura.gob.bo/" target="_blank">Visita el sitio oficial del Gobierno de Bolivia sobre el COVID-19</a>
			</div>
			<div class="col-lg-6 my-Col" style="text-align: center;margin: 15px;">
				<p style="color: rgba(45, 68, 119, 0.6);">Desarrollado por Gustavo Gudiño, estudiante de Ing. de Sistemas con la supervisión de Hugo Loza, Responsable de Gestión Tecnológica de la UCB Tarija y la Lic. Sandra Lima, Docente del Depto. de Ingenierías y Ciencias Exactas</p>
			</div>
		</div>
	</div>
	<br>

	<script type="text/javascript">
		async function graficar(){
			SEIR_sospechosos = [];
			SEIR_sospechosos = await $.get("SEIR_Sospechosos10.txt", function(data) { 
				return data;
			});
			SEIR_sospechosos = SEIR_sospechosos.split("[");
			SEIR_sospechosos = SEIR_sospechosos["1"].split("]");
			SEIR_sospechosos = SEIR_sospechosos["0"].split(",");
			SEIR_sospechosos = SEIR_sospechosos.map(Number);
  			SEIR_sospechosos_puntos = [];
			var l;
			fechaInicial = 1;
			for (l = 0; l < SEIR_sospechosos.length; l++) {
				SEIR_sospechosos_puntos.push({ x: new Date(2020, 5, fechaInicial), y: SEIR_sospechosos[l] });
				fechaInicial++;
			}

			SEIR_expuestos = [];
			SEIR_expuestos = await $.get("SEIR_Expuestos10.txt", function(data) {
				return data;
			});
			SEIR_expuestos = SEIR_expuestos.split("[");
			SEIR_expuestos = SEIR_expuestos["1"].split("]");
			SEIR_expuestos = SEIR_expuestos["0"].split(",");
			SEIR_expuestos = SEIR_expuestos.map(Number);
  			SEIR_expuestos_puntos = [];
			fechaInicial = 1;
			for (l = 0; l < SEIR_expuestos.length; l++) {
				SEIR_expuestos_puntos.push({ x: new Date(2020, 5, fechaInicial), y: SEIR_expuestos[l] });
				fechaInicial++;
			}

			SEIR_infectados = [];
			SEIR_infectados = await $.get("SEIR_Infectados10.txt", function(data) {
				return data;
			});
			SEIR_infectados = SEIR_infectados.split("[");
			SEIR_infectados = SEIR_infectados["1"].split("]");
			SEIR_infectados = SEIR_infectados["0"].split(",");
			SEIR_infectados = SEIR_infectados.map(Number);
  			SEIR_infectados_puntos = [];
			fechaInicial = 1;
			for (l = 0; l < SEIR_infectados.length; l++) {
				SEIR_infectados_puntos.push({ x: new Date(2020, 5, fechaInicial), y: SEIR_infectados[l] });
				fechaInicial++;
			}

			SEIR_recuperados = [];
			SEIR_recuperados = await $.get("SEIR_Recuperados10.txt", function(data) {
				return data;
			});
			SEIR_recuperados = SEIR_recuperados.split("[");
			SEIR_recuperados = SEIR_recuperados["1"].split("]");
			SEIR_recuperados = SEIR_recuperados["0"].split(",");
			SEIR_recuperados = SEIR_recuperados.map(Number);
  			SEIR_recuperados_puntos = [];
			fechaInicial = 1;
			for (l = 0; l < SEIR_recuperados.length; l++) {
				SEIR_recuperados_puntos.push({ x: new Date(2020, 5, fechaInicial), y: SEIR_recuperados[l] });
				fechaInicial++;
			}

			chart = new CanvasJS.Chart("chartContainer1", {
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "white"
  				},
				axisY: {
					labelFontColor: "white",
					title: "",
					titleFontColor: "white",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "white",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "white",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "S",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					color: "lightgreen",
						dataPoints: SEIR_sospechosos_puntos
	  				},
	  				{
	  					name: "E",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					color: "orange",
						dataPoints: SEIR_expuestos_puntos
	  				},
	  				{
	  					name: "I",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					color: "tomato",
						dataPoints: SEIR_infectados_puntos
	  				},
	  				{
	  					name: "R",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					color: "lightblue",
						dataPoints: SEIR_recuperados_puntos
	  				}
  				]
			});
			chart.render();
		}
		function toggleDataSeries(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart.render();
		}
		graficar();
	</script>
</body>
</html>