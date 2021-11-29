<?php 

$url = 'https://covid-19-bolivia.com/CSV/Historico_completo.csv'; 
$file_name = basename($url);
$file = file_get_contents($url) . "";

$pattern = '/[0-9][0-9][0-9][0-9]-.*?[0-9]-.*?[0-9]/m';
$datosFechaActual = preg_split($pattern, $file);

$pattern1 = '/,/m';
$data = preg_split($pattern1, $datosFechaActual[count($datosFechaActual)-1]);

$departamentos = ["La Paz", "Oruro", "Potosi", "Cochabamba", "Chuquisaca", "Tarija", "Beni", "Pando", "Santa Cruz"];
$dataOutput = array();
$iterator = 1;

array_push($dataOutput, array(
	"confirmed"=> $data[count($data)-5],
	"recovered"=> $data[count($data)-4],
	"deaths"=> $data[count($data)-3],
	"countryregion"=> "Bolivia",
	"location"=> array("lat"=> -16.290154, "lng"=> -63.588653)
));

foreach ($departamentos as $x) {
	if ($x == "La Paz"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -16.5, "lng"=> -68.1500015)
			));
	}
	if ($x == "Oruro"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -17.9833298, "lng"=> -67.1500015)
			));
	}
	if ($x == "Potosi"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -19.5836105, "lng"=> -65.7530594)
			));
	}
	if ($x == "Cochabamba"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -17.3894997, "lng"=> -66.1567993)
			));
	}
	if ($x == "Chuquisaca"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -19.0333195, "lng"=> -65.2627411)
			));
	}
	if ($x == "Tarija"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -21.58549, "lng"=> -63.8295609)
			));
	}
	if ($x == "Beni"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -14.8333302, "lng"=> -64.9000015)
			));
	}
	if ($x == "Pando"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -11.0267096, "lng"=> -68.7691803)
			));
	}
	if ($x == "Santa Cruz"){
		array_push($dataOutput,array(
				"confirmed"=> $data[$iterator],
				"recovered"=> $data[$iterator+1],
				"deaths"=> $data[$iterator+2],
				"countryregion"=> $x,
				"location"=> array("lat"=> -17.8146, "lng"=> -63.1561)
			));
	}
	$iterator += 5;
}

$fp = fopen('DatosBolivia.json', 'w');
fwrite($fp, json_encode($dataOutput));
fclose($fp);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="./iconoU.jpg">

	<title>Proyecciones de Bolivia</title>

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
			font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
			background-color: #eeeae9;
			color: #333333;
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
		.my-Row1 {
			justify-content: center;
			align-content: center;
			align-items: center;
			text-align: center;
		}
		.my-Col {
			justify-content: center;
			align-content: center;
			align-items: center;
			text-align: left;
		}
		@media screen and (min-width: 500px) {
			.resp {
				width: 100%;
				height: auto;
			}
		}

		@media screen and (max-width: 499px) {
			.resp {
				width: 100%;
				height: auto;
			}
		}
		@media screen and (min-width: 500px) {
			.resp1 {
				width: 50%;
				height: auto;			
			}
		}

		@media screen and (max-width: 499px) {
			.resp1 {
				width: 100%;
				height: auto;
			}
		}
	</style>

	<style>
		.borde {
			border-top: 1.5px solid #eeeae9;/*rgba(0,0,0,0.5);*/
		}

		.topnav {
			overflow: hidden;
			background-color: #30323e;
		}

		.topnav a {
			float: left;
			display: block;
			color: #eeeae9;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: #333333;
		}

		.topnav a.active {
			background-color: #e25f4e;
			color: #eeeae9;
		}

		.topnav a.active:hover {
			background-color: #ddd;
			color: #333333;
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
	<div class="container-fluid" style="background-color: #30323e;">
		<div class="row my-Row1">
			<img class="resp1" src="logo2.png" onclick="location.href='index.html';">
		</div>
	</div>
	
	<div class="topnav borde" id="myTopnav" style="position: sticky; top: 0%;z-index: 1;">
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
			if (x.className === "topnav" || x.className === "topnav borde" ) {
				x.className += " responsive";
			} else {
				x.className = "topnav borde";
			}
		}
	</script>

	<script>
		window.addEventListener("scroll",function(){
			if(window.scrollY > 100){
				$("#myTopnav").removeClass("borde");
			}else{
				$("#myTopnav").addClass("borde");
			}
		});
	</script>

	<img class="resp" id="resp" src="logovirus.jpg" onclick="location.href='index.html';">

	<br>
	<br>

	<div class="container my-Container">
		<div class="row my-Row">
			<div class="col my-Col">
				<p style="font-size: 25px;text-align: center;"><strong>PROYECCIONES DE BOLIVIA</strong></p>
				<p>En esta página se utiliza el modelo SIR para realizar las proyecciones de Bolivia.</p>
				<p>En ocho gráficas se presentan las proyecciones de los susceptibles a contagiarse, detectados activos, detectados y no detectados desde el primero de Junio del 2020 hasta el 27 de Marzo del 2021.</p>
				<p>Cada gráfica tiene una distinta tasa de transmisión del virus con el objetivo de representar distintas aproximaciones a situaciones reales segun el comportamiento de la poblaci&oacute;n.</p>
				<strong><p>Deslizar el cursor en cada gr&aacute;fica para ver la informaci&oacute;n de cada día.</p>
				<p>Poblaci&oacute;n estimada: 11350000.</p>
				<p id="aproxReal"></p></strong>
			</div>
		</div>
	</div>

	<br>

	<div class="container my-Container">
		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>1.</strong> Tasa de transmisión: 0.023585714e-6</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer1" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>

		<br><br>

		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>2.</strong> Tasa de transmisión: 0.024160975e-6</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer2" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>

		<br><br>

		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>3.</strong> Tasa de transmisión: 0.024765e-6</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer3" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>

		<br><br>

		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>4.</strong> Tasa de transmisión: 0.0.0254e-6</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer4" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>

		<br><br>

		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>5.</strong> Tasa de transmisión: 0.026068421e-6</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer5" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>

		<br><br>

		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>6.</strong> Tasa de transmisión: 0.026772972e-6</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer6" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>

		<br><br>

		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>7.</strong> Tasa de transmisión: 0.027516666e-6</h5>	
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer7" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>

		<br><br>

		<div class="row my-Row">
			<div class="col my-Col">
				<h5><strong>8.</strong> Tasa de transmisión: 0.028302857e-6</h5>
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer8" style="width: 100%; height: 80vh;"></div>
			</div>
		</div>
	</div>

	<br><br>
	<hr>

	<div class="container-fluid my-Container">
		<div class="row my-Row">
			<div class="col-lg-6 my-Col" style="text-align: center;margin: 15px;">
				<a style="color: rgba(51, 51, 51, 0.6);" href="https://www.boliviasegura.gob.bo/" target="_blank">Visita el sitio oficial del Gobierno de Bolivia sobre el COVID-19</a>
			</div>
			<div class="col-lg-6 my-Col" style="text-align: center;margin: 15px;">
				<p style="color: rgba(51, 51, 51, 0.6);">Desarrollado por Gustavo Gudiño, estudiante de Ing. de Sistemas con la supervisión de Hugo Loza, Responsable de Gestión Tecnológica de la UCB Tarija y la Lic. Sandra Lima, Docente del Depto. de Ingenierías y Ciencias Exactas</p>
			</div>
		</div>
	</div>
	<br>

	<script type="text/javascript">
		async function graficar(){
			SIR_infectados = [];
			SIR_infectados = await $.get("SIR_Infectados10_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados = SIR_infectados.split("[");
			SIR_infectados = SIR_infectados["1"].split("]");
			SIR_infectados = SIR_infectados["0"].split(",");
			SIR_infectados = SIR_infectados.map(Number);
  			SIR_puntos = []
			var ll;
			fechaInicial = 1
			for (ll = 0; ll < SIR_infectados.length; ll++) {
				SIR_puntos.push({ x: new Date(2020, 5, fechaInicial), y: SIR_infectados[ll] });
				fechaInicial++;
			}

			SIR_sospechosos = [];
			SIR_sospechosos = await $.get("SIR_Sospechosos10_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos = SIR_sospechosos.split("[");
			SIR_sospechosos = SIR_sospechosos["1"].split("]");
			SIR_sospechosos = SIR_sospechosos["0"].split(",");
			SIR_sospechosos = SIR_sospechosos.map(Number);
 			SIR_puntos1 = []
			var ll1;
			fechaInicial1 = 1
			for (ll1 = 0; ll1 < SIR_sospechosos.length; ll1++) {
				SIR_puntos1.push({ x: new Date(2020, 5, fechaInicial1), y: SIR_sospechosos[ll1] });
				fechaInicial1++;
			}

			SIR_recuperados = [];
			SIR_recuperados = await $.get("SIR_Recuperados10_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados = SIR_recuperados.split("[");
			SIR_recuperados = SIR_recuperados["1"].split("]");
			SIR_recuperados = SIR_recuperados["0"].split(",");
			SIR_recuperados = SIR_recuperados.map(Number);
 			SIR_puntos2 = []
			var ll2;
			fechaInicial2 = 1
			for (ll2 = 0; ll2 < SIR_recuperados.length; ll2++) {
				SIR_puntos2.push({ x: new Date(2020, 5, fechaInicial2), y: SIR_recuperados[ll2] });
				fechaInicial2++;
			}

			CanvasJS.addColorSet("paleta2",[
	            "rgb(110, 69, 69)",
	            "rgb(243, 220, 213)",    
	            "rgb(239, 180, 134)",
	            "rgb(226, 95, 78)",
	            "rgb(235, 202, 173)",
	            "rgb(124, 116, 120)",
	            "rgb(183, 164, 164)",
	            "rgb(161, 116, 116)",
	            "rgb(176, 175, 174)",
	            "rgb(204, 188, 188)"
            ]);

			chart = new CanvasJS.Chart("chartContainer1", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2
	  				}
  				]
			});
			chart.render();


			//BETA = 0.11
			SIR_infectados11 = [];
			SIR_infectados11 = await $.get("SIR_Infectados11_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados11 = SIR_infectados11.split("[");
			SIR_infectados11 = SIR_infectados11["1"].split("]");
			SIR_infectados11 = SIR_infectados11["0"].split(",");
			SIR_infectados11 = SIR_infectados11.map(Number);
  			SIR_puntos_11 = []
			var ll_11;
			fechaInicial_11 = 1
			for (ll_11 = 0; ll_11 < SIR_infectados11.length; ll_11++) {
				SIR_puntos_11.push({ x: new Date(2020, 5, fechaInicial_11), y: SIR_infectados11[ll_11] });
				fechaInicial_11++;
			}

			SIR_sospechosos_11 = [];
			SIR_sospechosos_11 = await $.get("SIR_Sospechosos11_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos_11 = SIR_sospechosos_11.split("[");
			SIR_sospechosos_11 = SIR_sospechosos_11["1"].split("]");
			SIR_sospechosos_11 = SIR_sospechosos_11["0"].split(",");
			SIR_sospechosos_11 = SIR_sospechosos_11.map(Number);
 			SIR_puntos1_11 = []
			var ll1_11;
			fechaInicial1_11 = 1
			for (ll1_11 = 0; ll1_11 < SIR_sospechosos_11.length; ll1_11++) {
				SIR_puntos1_11.push({ x: new Date(2020, 5, fechaInicial1_11), y: SIR_sospechosos_11[ll1_11] });
				fechaInicial1_11++;
			}

			SIR_recuperados_11 = [];
			SIR_recuperados_11 = await $.get("SIR_Recuperados11_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados_11 = SIR_recuperados_11.split("[");
			SIR_recuperados_11 = SIR_recuperados_11["1"].split("]");
			SIR_recuperados_11 = SIR_recuperados_11["0"].split(",");
			SIR_recuperados_11 = SIR_recuperados_11.map(Number);
 			SIR_puntos2_11 = []
			var ll2_11;
			fechaInicial2_11 = 1
			for (ll2_11 = 0; ll2_11 < SIR_recuperados_11.length; ll2_11++) {
				SIR_puntos2_11.push({ x: new Date(2020, 5, fechaInicial2_11), y: SIR_recuperados_11[ll2_11] });
				fechaInicial2_11++;
			}

			chart11 = new CanvasJS.Chart("chartContainer2", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries1
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1_11
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos_11
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2_11
	  				}
  				]
			});
			chart11.render();

			//BETA = 0.12
			SIR_infectados12 = [];
			SIR_infectados12 = await $.get("SIR_Infectados12_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados12 = SIR_infectados12.split("[");
			SIR_infectados12 = SIR_infectados12["1"].split("]");
			SIR_infectados12 = SIR_infectados12["0"].split(",");
			SIR_infectados12 = SIR_infectados12.map(Number);
  			SIR_puntos_12 = []
			var ll_12;
			fechaInicial_12 = 1
			for (ll_12 = 0; ll_12 < SIR_infectados12.length; ll_12++) {
				SIR_puntos_12.push({ x: new Date(2020, 5, fechaInicial_12), y: SIR_infectados12[ll_12] });
				fechaInicial_12++;
			}

			SIR_sospechosos_12 = [];
			SIR_sospechosos_12 = await $.get("SIR_Sospechosos12_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos_12 = SIR_sospechosos_12.split("[");
			SIR_sospechosos_12 = SIR_sospechosos_12["1"].split("]");
			SIR_sospechosos_12 = SIR_sospechosos_12["0"].split(",");
			SIR_sospechosos_12 = SIR_sospechosos_12.map(Number);
 			SIR_puntos1_12 = []
			var ll1_12;
			fechaInicial1_12 = 1
			for (ll1_12 = 0; ll1_12 < SIR_sospechosos_12.length; ll1_12++) {
				SIR_puntos1_12.push({ x: new Date(2020, 5, fechaInicial1_12), y: SIR_sospechosos_12[ll1_12] });
				fechaInicial1_12++;
			}

			SIR_recuperados_12 = [];
			SIR_recuperados_12 = await $.get("SIR_Recuperados12_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados_12 = SIR_recuperados_12.split("[");
			SIR_recuperados_12 = SIR_recuperados_12["1"].split("]");
			SIR_recuperados_12 = SIR_recuperados_12["0"].split(",");
			SIR_recuperados_12 = SIR_recuperados_12.map(Number);
 			SIR_puntos2_12 = []
			var ll2_12;
			fechaInicial2_12 = 1
			for (ll2_12 = 0; ll2_12 < SIR_recuperados_12.length; ll2_12++) {
				SIR_puntos2_12.push({ x: new Date(2020, 5, fechaInicial2_12), y: SIR_recuperados_12[ll2_12] });
				fechaInicial2_12++;
			}

			chart12 = new CanvasJS.Chart("chartContainer3", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries2
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1_12
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos_12
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2_12
	  				}
  				]
			});
			chart12.render();

			//BETA = 0.13
			SIR_infectados13 = [];
			SIR_infectados13 = await $.get("SIR_Infectados13_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados13 = SIR_infectados13.split("[");
			SIR_infectados13 = SIR_infectados13["1"].split("]");
			SIR_infectados13 = SIR_infectados13["0"].split(",");
			SIR_infectados13 = SIR_infectados13.map(Number);
  			SIR_puntos_13 = []
			var ll_13;
			fechaInicial_13 = 1
			for (ll_13 = 0; ll_13 < SIR_infectados13.length; ll_13++) {
				SIR_puntos_13.push({ x: new Date(2020, 5, fechaInicial_13), y: SIR_infectados13[ll_13] });
				fechaInicial_13++;
			}

			SIR_sospechosos_13 = [];
			SIR_sospechosos_13 = await $.get("SIR_Sospechosos13_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos_13 = SIR_sospechosos_13.split("[");
			SIR_sospechosos_13 = SIR_sospechosos_13["1"].split("]");
			SIR_sospechosos_13 = SIR_sospechosos_13["0"].split(",");
			SIR_sospechosos_13 = SIR_sospechosos_13.map(Number);
 			SIR_puntos1_13 = []
			var ll1_13;
			fechaInicial1_13 = 1
			for (ll1_13 = 0; ll1_13 < SIR_sospechosos_13.length; ll1_13++) {
				SIR_puntos1_13.push({ x: new Date(2020, 5, fechaInicial1_13), y: SIR_sospechosos_13[ll1_13] });
				fechaInicial1_13++;
			}

			SIR_recuperados_13 = [];
			SIR_recuperados_13 = await $.get("SIR_Recuperados13_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados_13 = SIR_recuperados_13.split("[");
			SIR_recuperados_13 = SIR_recuperados_13["1"].split("]");
			SIR_recuperados_13 = SIR_recuperados_13["0"].split(",");
			SIR_recuperados_13 = SIR_recuperados_13.map(Number);
 			SIR_puntos2_13 = []
			var ll2_13;
			fechaInicial2_13 = 1
			for (ll2_13 = 0; ll2_13 < SIR_recuperados_13.length; ll2_13++) {
				SIR_puntos2_13.push({ x: new Date(2020, 5, fechaInicial2_13), y: SIR_recuperados_13[ll2_13] });
				fechaInicial2_13++;
			}

			chart13 = new CanvasJS.Chart("chartContainer4", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries3
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1_13
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos_13
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2_13
	  				}
  				]
			});
			chart13.render();

			//BETA = 0.14
			SIR_infectados14 = [];
			SIR_infectados14 = await $.get("SIR_Infectados14_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados14 = SIR_infectados14.split("[");
			SIR_infectados14 = SIR_infectados14["1"].split("]");
			SIR_infectados14 = SIR_infectados14["0"].split(",");
			SIR_infectados14 = SIR_infectados14.map(Number);
  			SIR_puntos_14 = []
			var ll_14;
			fechaInicial_14 = 1
			for (ll_14 = 0; ll_14 < SIR_infectados14.length; ll_14++) {
				SIR_puntos_14.push({ x: new Date(2020, 5, fechaInicial_14), y: SIR_infectados14[ll_14] });
				fechaInicial_14++;
			}

			SIR_sospechosos_14 = [];
			SIR_sospechosos_14 = await $.get("SIR_Sospechosos14_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos_14 = SIR_sospechosos_14.split("[");
			SIR_sospechosos_14 = SIR_sospechosos_14["1"].split("]");
			SIR_sospechosos_14 = SIR_sospechosos_14["0"].split(",");
			SIR_sospechosos_14 = SIR_sospechosos_14.map(Number);
 			SIR_puntos1_14 = []
			var ll1_14;
			fechaInicial1_14 = 1
			for (ll1_14 = 0; ll1_14 < SIR_sospechosos_14.length; ll1_14++) {
				SIR_puntos1_14.push({ x: new Date(2020, 5, fechaInicial1_14), y: SIR_sospechosos_14[ll1_14] });
				fechaInicial1_14++;
			}

			SIR_recuperados_14 = [];
			SIR_recuperados_14 = await $.get("SIR_Recuperados14_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados_14 = SIR_recuperados_14.split("[");
			SIR_recuperados_14 = SIR_recuperados_14["1"].split("]");
			SIR_recuperados_14 = SIR_recuperados_14["0"].split(",");
			SIR_recuperados_14 = SIR_recuperados_14.map(Number);
 			SIR_puntos2_14 = []
			var ll2_14;
			fechaInicial2_14 = 1
			for (ll2_14 = 0; ll2_14 < SIR_recuperados_14.length; ll2_14++) {
				SIR_puntos2_14.push({ x: new Date(2020, 5, fechaInicial2_14), y: SIR_recuperados_14[ll2_14] });
				fechaInicial2_14++;
			}

			chart14 = new CanvasJS.Chart("chartContainer5", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries4
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1_14
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos_14
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2_14
	  				}
  				]
			});
			chart14.render();

			//BETA = 0.15
			SIR_infectados15 = [];
			SIR_infectados15 = await $.get("SIR_Infectados15_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados15 = SIR_infectados15.split("[");
			SIR_infectados15 = SIR_infectados15["1"].split("]");
			SIR_infectados15 = SIR_infectados15["0"].split(",");
			SIR_infectados15 = SIR_infectados15.map(Number);
  			SIR_puntos_15 = []
			var ll_15;
			fechaInicial_15 = 1
			for (ll_15 = 0; ll_15 < SIR_infectados15.length; ll_15++) {
				SIR_puntos_15.push({ x: new Date(2020, 5, fechaInicial_15), y: SIR_infectados15[ll_15] });
				fechaInicial_15++;
			}

			SIR_sospechosos_15 = [];
			SIR_sospechosos_15 = await $.get("SIR_Sospechosos15_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos_15 = SIR_sospechosos_15.split("[");
			SIR_sospechosos_15 = SIR_sospechosos_15["1"].split("]");
			SIR_sospechosos_15 = SIR_sospechosos_15["0"].split(",");
			SIR_sospechosos_15 = SIR_sospechosos_15.map(Number);
 			SIR_puntos1_15 = []
			var ll1_15;
			fechaInicial1_15 = 1
			for (ll1_15 = 0; ll1_15 < SIR_sospechosos_15.length; ll1_15++) {
				SIR_puntos1_15.push({ x: new Date(2020, 5, fechaInicial1_15), y: SIR_sospechosos_15[ll1_15] });
				fechaInicial1_15++;
			}

			SIR_recuperados_15 = [];
			SIR_recuperados_15 = await $.get("SIR_Recuperados15_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados_15 = SIR_recuperados_15.split("[");
			SIR_recuperados_15 = SIR_recuperados_15["1"].split("]");
			SIR_recuperados_15 = SIR_recuperados_15["0"].split(",");
			SIR_recuperados_15 = SIR_recuperados_15.map(Number);
 			SIR_puntos2_15 = []
			var ll2_15;
			fechaInicial2_15 = 1
			for (ll2_15 = 0; ll2_15 < SIR_recuperados_15.length; ll2_15++) {
				SIR_puntos2_15.push({ x: new Date(2020, 5, fechaInicial2_15), y: SIR_recuperados_15[ll2_15] });
				fechaInicial2_15++;
			}

			chart15 = new CanvasJS.Chart("chartContainer6", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries5
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1_15
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos_15
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2_15
	  				}
  				]
			});
			chart15.render();

			//BETA = 0.16
			SIR_infectados16 = [];
			SIR_infectados16 = await $.get("SIR_Infectados16_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados16 = SIR_infectados16.split("[");
			SIR_infectados16 = SIR_infectados16["1"].split("]");
			SIR_infectados16 = SIR_infectados16["0"].split(",");
			SIR_infectados16 = SIR_infectados16.map(Number);
  			SIR_puntos_16 = []
			var ll_16;
			fechaInicial_16 = 1
			for (ll_16 = 0; ll_16 < SIR_infectados16.length; ll_16++) {
				SIR_puntos_16.push({ x: new Date(2020, 5, fechaInicial_16), y: SIR_infectados16[ll_16] });
				fechaInicial_16++;
			}

			SIR_sospechosos_16 = [];
			SIR_sospechosos_16 = await $.get("SIR_Sospechosos16_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos_16 = SIR_sospechosos_16.split("[");
			SIR_sospechosos_16 = SIR_sospechosos_16["1"].split("]");
			SIR_sospechosos_16 = SIR_sospechosos_16["0"].split(",");
			SIR_sospechosos_16 = SIR_sospechosos_16.map(Number);
 			SIR_puntos1_16 = []
			var ll1_16;
			fechaInicial1_16 = 1
			for (ll1_16 = 0; ll1_16 < SIR_sospechosos_16.length; ll1_16++) {
				SIR_puntos1_16.push({ x: new Date(2020, 5, fechaInicial1_16), y: SIR_sospechosos_16[ll1_16] });
				fechaInicial1_16++;
			}

			SIR_recuperados_16 = [];
			SIR_recuperados_16 = await $.get("SIR_Recuperados16_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados_16 = SIR_recuperados_16.split("[");
			SIR_recuperados_16 = SIR_recuperados_16["1"].split("]");
			SIR_recuperados_16 = SIR_recuperados_16["0"].split(",");
			SIR_recuperados_16 = SIR_recuperados_16.map(Number);
 			SIR_puntos2_16 = []
			var ll2_16;
			fechaInicial2_16 = 1
			for (ll2_16 = 0; ll2_16 < SIR_recuperados_16.length; ll2_16++) {
				SIR_puntos2_16.push({ x: new Date(2020, 5, fechaInicial2_16), y: SIR_recuperados_16[ll2_16] });
				fechaInicial2_16++;
			}

			chart16 = new CanvasJS.Chart("chartContainer7", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries6
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1_16
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos_16
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2_16
	  				}
  				]
			});
			chart16.render();

			//BETA = 0.17
			SIR_infectados17 = [];
			SIR_infectados17 = await $.get("SIR_Infectados17_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_infectados17 = SIR_infectados17.split("[");
			SIR_infectados17 = SIR_infectados17["1"].split("]");
			SIR_infectados17 = SIR_infectados17["0"].split(",");
			SIR_infectados17 = SIR_infectados17.map(Number);
  			SIR_puntos_17 = []
			var ll_17;
			fechaInicial_17 = 1
			for (ll_17 = 0; ll_17 < SIR_infectados17.length; ll_17++) {
				SIR_puntos_17.push({ x: new Date(2020, 5, fechaInicial_17), y: SIR_infectados17[ll_17] });
				fechaInicial_17++;
			}

			SIR_sospechosos_17 = [];
			SIR_sospechosos_17 = await $.get("SIR_Sospechosos17_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_sospechosos_17 = SIR_sospechosos_17.split("[");
			SIR_sospechosos_17 = SIR_sospechosos_17["1"].split("]");
			SIR_sospechosos_17 = SIR_sospechosos_17["0"].split(",");
			SIR_sospechosos_17 = SIR_sospechosos_17.map(Number);
 			SIR_puntos1_17 = []
			var ll1_17;
			fechaInicial1_17 = 1
			for (ll1_17 = 0; ll1_17 < SIR_sospechosos_17.length; ll1_17++) {
				SIR_puntos1_17.push({ x: new Date(2020, 5, fechaInicial1_17), y: SIR_sospechosos_17[ll1_17] });
				fechaInicial1_17++;
			}

			SIR_recuperados_17 = [];
			SIR_recuperados_17 = await $.get("SIR_Recuperados17_Bolivia.txt", function(data) { 
				return data;
			});
			SIR_recuperados_17 = SIR_recuperados_17.split("[");
			SIR_recuperados_17 = SIR_recuperados_17["1"].split("]");
			SIR_recuperados_17 = SIR_recuperados_17["0"].split(",");
			SIR_recuperados_17 = SIR_recuperados_17.map(Number);
 			SIR_puntos2_17 = []
			var ll2_17;
			fechaInicial2_17 = 1
			for (ll2_17 = 0; ll2_17 < SIR_recuperados_17.length; ll2_17++) {
				SIR_puntos2_17.push({ x: new Date(2020, 5, fechaInicial2_17), y: SIR_recuperados_17[ll2_17] });
				fechaInicial2_17++;
			}

			chart17 = new CanvasJS.Chart("chartContainer8", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
  				axisX: {
  					valueFormatString: "DD MMM,YY",
  					labelFontColor: "#eeeae9"
  				},
				axisY: {
					labelFontColor: "#eeeae9",
					title: "",
					titleFontColor: "#eeeae9",
					includeZero: true,
					suffix: " casos"
				},
				legend:{
					fontColor: "#eeeae9",
					cursor: "pointer",
					fontSize: 16,
					itemclick: toggleDataSeries7
				},
				toolTip:{
					shared: true,
					backgroundColor: "rgba(34,34,34,1)",
					fontColor: "#eeeae9",
					cornerRadius: 5,
					borderColor: "black"
				},
  				data: [
	  				{
	  					name: "Susceptibles",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(252, 207, 140)",
						dataPoints: SIR_puntos1_17
	  				},
	  				{
	  					name: "Detectados activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(229, 94, 75)",
						dataPoints: SIR_puntos_17
	  				},
	  				{
	  					name: "Detectados y no detectados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "rgb(245, 235, 226)",
						dataPoints: SIR_puntos2_17
	  				}
  				]
			});
			chart17.render();

			activosActualBolivia = 0;
			await $.getJSON("DatosBolivia.json").then(data => {
				const countries = data;
				countries.forEach(country => {
					if(country.countryregion == "Bolivia"){
						activosActualBolivia = country.confirmed - country.deaths - country.recovered;
					}
				});
			});

			fechaActual = new Date();

			for (var ix = 0; ix < SIR_puntos.length; ix++) {
				if(SIR_puntos[ix]["x"].getFullYear()==fechaActual.getFullYear() && SIR_puntos[ix]["x"].getMonth()==fechaActual.getMonth() && SIR_puntos[ix]["x"].getDate()==fechaActual.getDate()){
					if(Math.abs(SIR_puntos[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 1 es la mas aproximada a la situación actual.");
						break;
					}
					if(Math.abs(SIR_puntos_11[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 2 es la mas aproximada a la situación actual.");
						break;
					}
					if(Math.abs(SIR_puntos_12[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 3 es la mas aproximada a la situación actual.");
						break;
					}
					if(Math.abs(SIR_puntos_13[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 4 es la mas aproximada a la situación actual.");
						break;
					}
					if(Math.abs(SIR_puntos_14[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 5 es la mas aproximada a la situación actual.");
						break;
					}
					if(Math.abs(SIR_puntos_15[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 6 es la mas aproximada a la situación actual.");
						break;
					}
					if(Math.abs(SIR_puntos_16[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 7 es la mas aproximada a la situación actual.");
						break;
					}
					if(Math.abs(SIR_puntos_17[ix]["y"] - activosActualBolivia) < 0.05 * activosActualBolivia){
						$("#aproxReal").html("La gráfica 8 es la mas aproximada a la situación actual.");
						break;
					}
				}
			}
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
		function toggleDataSeries1(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart1.render();
		}
		function toggleDataSeries2(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart12.render();
		}
		function toggleDataSeries3(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart13.render();
		}
		function toggleDataSeries4(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart14.render();
		}
		function toggleDataSeries5(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart15.render();
		}
		function toggleDataSeries6(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart16.render();
		}
		function toggleDataSeries7(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart17.render();
		}
		graficar();
	</script>

</body>
</html>