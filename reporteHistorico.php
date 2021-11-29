<?php 

$url = 'https://covid-19-bolivia.com/CSV/Historico_completo.csv'; 
$file_name = basename($url);
$file = file_get_contents($url) . "";

$pattern = '/[0-9][0-9][0-9][0-9]-.*?[0-9]-.*?[0-9]/m';
$datos = preg_split($pattern, $file);

$pattern1 = '/,/m';
$historicoBolivia = array();
$historicosDepartamentos = array();

for ($x = 1; $x < count($datos); $x++) {
	$datos1 = preg_split($pattern1, $datos[$x]);
	array_push($historicoBolivia, array(
		"confirmed"=> $datos1[count($datos1)-5],
		"recovered"=> $datos1[count($datos1)-4],
		"deaths"=> $datos1[count($datos1)-3],
		"nuevos"=> $datos1[count($datos1)-2],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-1])[0]		
	));
}

array_push($historicosDepartamentos, array(
	"La Paz"=>array()
));
array_push($historicosDepartamentos, array(
	"Oruro"=>array()
));
array_push($historicosDepartamentos, array(
	"Potosi"=>array()
));
array_push($historicosDepartamentos, array(
	"Cochabamba"=>array()
));
array_push($historicosDepartamentos, array(
	"Chuquisaca"=>array()
));
array_push($historicosDepartamentos, array(
	"Tarija"=>array()
));
array_push($historicosDepartamentos, array(
	"Beni"=>array()
));
array_push($historicosDepartamentos, array(
	"Pando"=>array()
));
array_push($historicosDepartamentos, array(
	"Santa Cruz"=>array()
));

for ($x = 1; $x < count($datos); $x++) {
	$datos1 = preg_split($pattern1, $datos[$x]);
	//LA PAZ
	array_push($historicosDepartamentos[0]["La Paz"], array(
		"confirmed"=> $datos1[count($datos1)-50],
		"recovered"=> $datos1[count($datos1)-49],
		"deaths"=> $datos1[count($datos1)-48],
		"nuevos"=> $datos1[count($datos1)-47],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-46])[0]
	));
	//ORURO
	array_push($historicosDepartamentos[1]["Oruro"], array(
		"confirmed"=> $datos1[count($datos1)-45],
		"recovered"=> $datos1[count($datos1)-44],
		"deaths"=> $datos1[count($datos1)-43],
		"nuevos"=> $datos1[count($datos1)-42],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-41])[0]
	));
	//POTOSI
	array_push($historicosDepartamentos[2]["Potosi"], array(
		"confirmed"=> $datos1[count($datos1)-40],
		"recovered"=> $datos1[count($datos1)-39],
		"deaths"=> $datos1[count($datos1)-38],
		"nuevos"=> $datos1[count($datos1)-37],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-36])[0]
	));
	//COCHABAMBA
	array_push($historicosDepartamentos[3]["Cochabamba"], array(
		"confirmed"=> $datos1[count($datos1)-35],
		"recovered"=> $datos1[count($datos1)-34],
		"deaths"=> $datos1[count($datos1)-33],
		"nuevos"=> $datos1[count($datos1)-32],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-31])[0]
	));
	//CHUQUISACA
	array_push($historicosDepartamentos[4]["Chuquisaca"], array(
		"confirmed"=> $datos1[count($datos1)-30],
		"recovered"=> $datos1[count($datos1)-29],
		"deaths"=> $datos1[count($datos1)-28],
		"nuevos"=> $datos1[count($datos1)-27],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-26])[0]
	));
	//TARIJA
	array_push($historicosDepartamentos[5]["Tarija"], array(
		"confirmed"=> $datos1[count($datos1)-25],
		"recovered"=> $datos1[count($datos1)-24],
		"deaths"=> $datos1[count($datos1)-23],
		"nuevos"=> $datos1[count($datos1)-22],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-21])[0]
	));
	//BENI
	array_push($historicosDepartamentos[6]["Beni"], array(
		"confirmed"=> $datos1[count($datos1)-20],
		"recovered"=> $datos1[count($datos1)-19],
		"deaths"=> $datos1[count($datos1)-18],
		"nuevos"=> $datos1[count($datos1)-17],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-16])[0]
	));
	//PÁNDO
	array_push($historicosDepartamentos[7]["Pando"], array(
		"confirmed"=> $datos1[count($datos1)-15],
		"recovered"=> $datos1[count($datos1)-14],
		"deaths"=> $datos1[count($datos1)-13],
		"nuevos"=> $datos1[count($datos1)-12],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-11])[0]
	));
	//SANTA CRUZ
	array_push($historicosDepartamentos[8]["Santa Cruz"], array(
		"confirmed"=> $datos1[count($datos1)-10],
		"recovered"=> $datos1[count($datos1)-9],
		"deaths"=> $datos1[count($datos1)-8],
		"nuevos"=> $datos1[count($datos1)-7],
		"activos"=> preg_split('/[^0-9]/m', $datos1[count($datos1)-6])[0]
	));
}

$fp = fopen('HistoricoBolivia.json', 'w');
fwrite($fp, json_encode($historicoBolivia));
fclose($fp);

$fp = fopen('HistoricosDepartamentos.json', 'w');
fwrite($fp, json_encode($historicosDepartamentos));
fclose($fp);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="./iconoU.jpg">

	<title>Reporte historico</title>

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
			font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";;
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
			<div class="col my-Col" style="text-align: center;">
				<p style="font-size: 25px;"><strong>REPORTE HISTORICO</strong></p>
				<strong>
					<p>Deslizar el cursor en cada gr&aacute;fica para ver la informaci&oacute;n de cada día.</p>
				</strong>
			</div>
		</div>
	</div>

	<br>

	<div class="container my-Container">
		<div class="row my-Row">
			<div class="col my-Col">
				<h5>Total de casos Bolivia</h5>
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
				<h5>Nuevos casos por dia</h4>
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
				<h5>Casos por departamento</h4>
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
				<h5>Último reporte nacional (en porcentajes)</h4>
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
				<h5>Casos confirmados por departamentos respecto al total de la poblaci&oacute;n (en porcentajes)</h4>
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
				<h5>Casos confirmados por departamentos respecto al total de casos confirmados (en porcentajes)</h4>
			</div>
		</div>

		<hr>

		<div class="row my-Row">
			<div class="col my-Col">
				<div class="chart" id="chartContainer6" style="width: 100%; height: 80vh;"></div>
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
		confirmados = [];
		recuperados = [];
		decesos = [];
		nuevos = [];
		activos = [];

		nuevosLaPaz = [];
		nuevosOruro = [];
		nuevosPotosi = [];
		nuevosCochabamba = [];
		nuevosChuquisaca = [];
		nuevosTarija = [];
		nuevosBeni = [];
		nuevosPando = [];
		nuevosSantaCruz = [];

		confirmadosLaPaz = [];
		confirmadosOruro = [];
		confirmadosPotosi = [];
		confirmadosCochabamba = [];
		confirmadosChuquisaca = [];
		confirmadosTarija = [];
		confirmadosBeni = [];
		confirmadosPando = [];
		confirmadosSantaCruz = [];

		async function getDataBolivia(){
			await $.getJSON("HistoricoBolivia.json").then(data => {
				const datosBolivia1 = data;
				datosBolivia1.forEach(dia => {
					confirmados.push(parseInt(dia.confirmed));
					recuperados.push(parseInt(dia.recovered));
					decesos.push(parseInt(dia.deaths));
					nuevos.push(parseInt(dia.nuevos));
					activos.push(parseInt(dia.activos));
				});
			});
			await $.getJSON("HistoricosDepartamentos.json").then(data => {
				const datosDepartamentos = data;
				datosDepartamentos[0]["La Paz"].forEach(dia => {
					nuevosLaPaz.push(parseInt(dia.nuevos));
					confirmadosLaPaz.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[1]["Oruro"].forEach(dia => {
					nuevosOruro.push(parseInt(dia.nuevos));
					confirmadosOruro.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[2]["Potosi"].forEach(dia => {
					nuevosPotosi.push(parseInt(dia.nuevos));
					confirmadosPotosi.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[3]["Cochabamba"].forEach(dia => {
					nuevosCochabamba.push(parseInt(dia.nuevos));
					confirmadosCochabamba.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[4]["Chuquisaca"].forEach(dia => {
					nuevosChuquisaca.push(parseInt(dia.nuevos));
					confirmadosChuquisaca.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[5]["Tarija"].forEach(dia => {
					nuevosTarija.push(parseInt(dia.nuevos));
					confirmadosTarija.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[6]["Beni"].forEach(dia => {
					nuevosBeni.push(parseInt(dia.nuevos));
					confirmadosBeni.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[7]["Pando"].forEach(dia => {
					nuevosPando.push(parseInt(dia.nuevos));
					confirmadosPando.push(parseInt(dia.confirmed));
				});
				datosDepartamentos[8]["Santa Cruz"].forEach(dia => {
					nuevosSantaCruz.push(parseInt(dia.nuevos));
					confirmadosSantaCruz.push(parseInt(dia.confirmed));
				});
			});
		}

		async function graficarBolivia(){
			await getDataBolivia();

			//NACIONAL
			confirmadosPuntos = [];
			fechaInicial = 8;
			var i;
			for (i = 0; i < confirmados.length; i++) {
				confirmadosPuntos.push({ x: new Date(2020, 2, fechaInicial), y: confirmados[i] });
				fechaInicial++;
			}

			recuperadosPuntos = [];
			fechaInicial1 = 8;
			var i1;
			for (i1 = 0; i1 < recuperados.length; i1++) {
				recuperadosPuntos.push({ x: new Date(2020, 2, fechaInicial1), y: recuperados[i1] });
				fechaInicial1++;
			}

			decesosPuntos = [];
			fechaInicial2 = 8;
			var i2;
			for (i2 = 0; i2 < decesos.length; i2++) {
				decesosPuntos.push({ x: new Date(2020, 2, fechaInicial2), y: decesos[i2] });
				fechaInicial2++;
			}

			nuevosPuntos = [];
			fechaInicial3 = 8;
			var i3;
			for (i3 = 0; i3 < nuevos.length; i3++) {
				nuevosPuntos.push({ x: new Date(2020, 2, fechaInicial3), y: nuevos[i3] });
				fechaInicial3++;
			}			

			activosPuntos = [];
			fechaInicial4 = 8;
			var i4;
			for (i4 = 0; i4 < activos.length; i4++) {
				activosPuntos.push({ x: new Date(2020, 2, fechaInicial4), y: activos[i4] });
				fechaInicial4++;
			}

			//DEPARTAMENTOS
			nuevosLaPazPuntos = [];
			fechaInicial5 = 8;
			var i5;
			for (i5 = 0; i5 < nuevosLaPaz.length; i5++) {
				nuevosLaPazPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosLaPaz[i5] });
				fechaInicial5++;
			}

			nuevosOruroPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosOruro.length; i5++) {
				nuevosOruroPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosOruro[i5] });
				fechaInicial5++;
			}

			nuevosPotosiPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosPotosi.length; i5++) {
				nuevosPotosiPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosPotosi[i5] });
				fechaInicial5++;
			}		

			nuevosCochabambaPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosCochabamba.length; i5++) {
				nuevosCochabambaPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosCochabamba[i5] });
				fechaInicial5++;
			}

			nuevosChuquisacaPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosChuquisaca.length; i5++) {
				nuevosChuquisacaPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosChuquisaca[i5] });
				fechaInicial5++;
			}

			nuevosTarijaPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosTarija.length; i5++) {
				nuevosTarijaPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosTarija[i5] });
				fechaInicial5++;
			}

			nuevosBeniPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosBeni.length; i5++) {
				nuevosBeniPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosBeni[i5] });
				fechaInicial5++;
			}

			nuevosPandoPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosPando.length; i5++) {
				nuevosPandoPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosPando[i5] });
				fechaInicial5++;
			}

			nuevosSantaCruzPuntos = [];
			fechaInicial5 = 8;
			for (i5 = 0; i5 < nuevosSantaCruz.length; i5++) {
				nuevosSantaCruzPuntos.push({ x: new Date(2020, 2, fechaInicial5), y: nuevosSantaCruz[i5] });
				fechaInicial5++;
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
	  					name: "Confirmados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "tomato",
						dataPoints: confirmadosPuntos
	  				},
	  				{
	  					name: "Activos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "gold",
						dataPoints: activosPuntos
	  				},
	  				{
	  					name: "Recuperados",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "lightgreen",
						dataPoints: recuperadosPuntos
	  				},
	  				{
	  					name: "Decesos",
	  					type: "spline",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "lightblue",
						dataPoints: decesosPuntos
	  				}
  				]
			});
			chart.render();

			chart1 = new CanvasJS.Chart("chartContainer2", {
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
	  					name: "Casos nuevos",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					color: "rgb(229, 94, 75)",
						dataPoints: nuevosPuntos
	  				}
  				]
			});
			chart1.render();

			chart2 = new CanvasJS.Chart("chartContainer3", {
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
	  					name: "La Paz",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#551bb3",
						dataPoints: nuevosLaPazPuntos
	  				},
	  				{
	  					name: "Oruro",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#1b1bb3",
						dataPoints: nuevosOruroPuntos
	  				},
	  				{
	  					name: "Potosi",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#1b64b3",
						dataPoints: nuevosPotosiPuntos
	  				},
	  				{
	  					name: "Cochabamba",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#1ba6b3",
						dataPoints: nuevosCochabambaPuntos
	  				},
	  				{
	  					name: "Chuquisaca",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#1bb362",
						dataPoints: nuevosChuquisacaPuntos
	  				},
	  				{
	  					name: "Tarija",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#2c7a23",
						dataPoints: nuevosTarijaPuntos
	  				},
	  				{
	  					name: "Beni",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#5c7a23",
						dataPoints: nuevosBeniPuntos
	  				},
	  				{
	  					name: "Pando",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#81823c",
						dataPoints: nuevosPandoPuntos
	  				},
	  				{
	  					name: "Santa Cruz",
	  					type: "column",
	  					yValueFormatString: "###,### casos",
	  					showInLegend: true,
	  					//color: "#826a3c",
						dataPoints: nuevosSantaCruzPuntos
	  				}
  				]
			});
			chart2.render();

			chart3 = new CanvasJS.Chart("chartContainer4", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
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
  				data: [{
					type: "doughnut",
					startAngle: 25,
					toolTipContent: "<b>{label}</b>: {y}%",
					showInLegend: "true",
					legendText: "{label}",
					indexLabelFontSize: 17,
					indexLabelFontColor: "#eeeae9",
					indexLabel: "{label} - {y}%",
					dataPoints: [
						{ y: activos[activos.length-1]*100/11350000, label: "Activos" },
						{ y: (11350000-confirmados[confirmados.length-1])*100/11350000, label: "Susceptibles" },
						{ y: recuperados[recuperados.length-1]*100/11350000, label: "Recuperados" },
						{ y: decesos[decesos.length-1]*100/11350000, label: "Decesos" }
					]
	  			}] 								
			});
			chart3.render()

			chart4 = new CanvasJS.Chart("chartContainer5", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
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
  				data: [{
					type: "doughnut",
					startAngle: 25,
					toolTipContent: "<b>{label}</b>: {y}%",
					showInLegend: "true",
					legendText: "{label}",
					indexLabelFontSize: 17,
					indexLabelFontColor: "#eeeae9",
					indexLabel: "{label} - {y}%",
					dataPoints: [
						{ y: confirmadosLaPaz[confirmadosLaPaz.length-1]*100/11350000, label: "La Paz" },
						{ y: (11350000-confirmados[confirmados.length-1])*100/11350000, label: "Susceptibles" },
						{ y: confirmadosOruro[confirmadosOruro.length-1]*100/11350000, label: "Oruro" },
						{ y: confirmadosPotosi[confirmadosPotosi.length-1]*100/11350000, label: "Potosi" },
						{ y: confirmadosCochabamba[confirmadosCochabamba.length-1]*100/11350000, label: "Cochabamba" },
						{ y: confirmadosChuquisaca[confirmadosChuquisaca.length-1]*100/11350000, label: "Chuquisaca" },
						{ y: confirmadosTarija[confirmadosTarija.length-1]*100/11350000, label: "Tarija" },
						{ y: confirmadosBeni[confirmadosBeni.length-1]*100/11350000, label: "Beni" },
						{ y: confirmadosPando[confirmadosPando.length-1]*100/11350000, label: "Pando" },
						{ y: confirmadosSantaCruz[confirmadosSantaCruz.length-1]*100/11350000, label: "Santa Cruz" }
					]
	  			}] 								
			});
			chart4.render()

			chart5 = new CanvasJS.Chart("chartContainer6", {
				colorSet: "paleta2",
				exportEnabled: true,
				zoomEnabled: true,
			    backgroundColor: "#222222",
			    animationEnabled: true,
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
  				data: [{
					type: "pie",
					startAngle: 25,
					toolTipContent: "<b>{label}</b>: {y}%",
					showInLegend: "true",
					legendText: "{label}",
					indexLabelFontSize: 17,
					indexLabelFontColor: "#eeeae9",
					indexLabel: "{label} - {y}%",
					dataPoints: [
						{ y: confirmadosLaPaz[confirmadosLaPaz.length-1]*100/confirmados[confirmados.length-1], label: "La Paz" },
						{ y: confirmadosOruro[confirmadosOruro.length-1]*100/confirmados[confirmados.length-1], label: "Oruro" },
						{ y: confirmadosPotosi[confirmadosPotosi.length-1]*100/confirmados[confirmados.length-1], label: "Potosi" },
						{ y: confirmadosCochabamba[confirmadosCochabamba.length-1]*100/confirmados[confirmados.length-1], label: "Cochabamba" },
						{ y: confirmadosChuquisaca[confirmadosChuquisaca.length-1]*100/confirmados[confirmados.length-1], label: "Chuquisaca" },
						{ y: confirmadosTarija[confirmadosTarija.length-1]*100/confirmados[confirmados.length-1], label: "Tarija" },
						{ y: confirmadosBeni[confirmadosBeni.length-1]*100/confirmados[confirmados.length-1], label: "Beni" },
						{ y: confirmadosPando[confirmadosPando.length-1]*100/confirmados[confirmados.length-1], label: "Pando" },
						{ y: confirmadosSantaCruz[confirmadosSantaCruz.length-1]*100/confirmados[confirmados.length-1], label: "Santa Cruz" },
					]
	  			}] 								
			});
			chart5.render()
		}
		graficarBolivia();
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
			chart2.render();
		}
		function toggleDataSeries3(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart3.render();
		}
		function toggleDataSeries4(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart4.render();
		}
		function toggleDataSeries5(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart5.render();
		}
	</script>
</body>
</html>