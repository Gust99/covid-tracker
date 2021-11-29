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

	<title>Centro de Monitoreo</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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
		.my-Col1 {
			justify-content: center;
			align-content: center;
			align-items: center;
			text-align: center;
			border: 0.5px solid rgba(59, 51, 72, 0.1);/*rgba(0,0,0,0.1)*/
		}
		.responsive1 {
			width: 15%;
			max-width: 30px;
			height: auto;
			border: 0.5px solid rgba(0,0,0,0.15);
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
			<div class="col my-Col1" style="border: 0px;">
				<p style="font-size: 25px;"><strong>CENTRO DE MONITOREO</strong></p>
			</div>
		</div>
	</div>

	<br>

	<div class="container my-Container">
		<div class="row my-Row">
			<div class="col my-Col">
				<p><strong>Datos nacionales</strong></p>	
			</div>
		</div>

		<div class="row my-Row">	
			<div class="col-lg-3 col-md-3 my-Col1">
				<img src="bolivia.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Confirmados</strong>
				</p>
				<p id="confirmadosNacional"></p>
			</div>

			<div class="col-lg-3 col-md-3 my-Col1">
				<img src="bolivia.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Activos</strong>
				</p>
				<p id="activosNacional"></p>
			</div>

			<div class="col-lg-3 col-md-3 my-Col1">
				<img src="bolivia.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Recuperados</strong>
				</p>
				<p id="recuperadosNacional"></p>
			</div>

			<div class="col-lg-3 col-md-3 my-Col1">
				<img src="bolivia.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Decesos</strong>
				</p>
				<p id="decesosNacional"></p>
			</div>
		</div>

		<br>
		<br>

		<div class="row my-Row">
			<div class="col my-Col">
				<p><strong>Datos por departamento</strong></p>
			</div>
		</div>

		<div class="row my-Row">
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="lapaz.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>La Paz</strong>
				</p>
				<p id="LaPaz"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="oruro.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Oruro</strong>
				</p>
				<p id="Oruro"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="potosi.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Potos&iacute;</strong>
				</p>
				<p id="Potosi"></p>
			</div>
		</div>

		<div class="row my-Row">
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="cochabamba.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Cochabamba</strong>
				</p>
				<p id="Cochabamba"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="chuquisaca.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Chuquisaca</strong>
				</p>
				<p id="Chuquisaca"></p>
			</div>
			
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="tarija.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Tarija</strong>
				</p>
				<p id="Tarija"></p>
			</div>
		</div>

		<div class="row my-Row">
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="beni.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Beni</strong>
				</p>
				<p id="Beni"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="pando.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Pando</strong>
				</p>
				<p id="Pando"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="santacruz.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Santa Cruz</strong>
				</p>
				<p id="SantaCruz"></p>
			</div>
		</div>

		<br>
		<br>

		<div class="row my-Row">
			<div class="col my-Col">
				<p><strong>Datos de Sudamerica</strong></p>
			</div>
		</div>

		<div class="row my-Row">
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="peru.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Peru</strong>
				</p>
				<p id="Peru"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="brasil.png" class="responsive1" style="border-radius: 2px;padding: 0px;margin: 15px;">
				<p>
					<strong>Brasil</strong>
				</p>
				<p id="Brazil"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="paraguay.png" class="responsive1" style="border-radius: 2px;padding: 0px;margin: 15px;">
				<p>
					<strong>Paraguay</strong>
				</p>
				<p id="Paraguay"></p>
			</div>
		</div>

		<div class="row my-Row">
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="chile.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Chile</strong>
				</p>
				<p id="Chile"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="argentina.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Argentina</strong>
				</p>
				<p id="Argentina"></p>
			</div>
			
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="colombia.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Colombia</strong>
				</p>
				<p id="Colombia"></p>
			</div>
		</div>

		<div class="row my-Row">
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="ecuador.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Ecuador</strong>
				</p>
				<p id="Ecuador"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="venezuela.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Venezuela</strong>
				</p>
				<p id="Venezuela"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="uruguay.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Uruguay</strong>
				</p>
				<p id="Uruguay"></p>
			</div>
		</div>

		<div class="row my-Row">
			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="guyana.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Guyana</strong>
				</p>
				<p id="Guyana"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="surinam.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Surinam</strong>
				</p>
				<p id="Surinam"></p>
			</div>

			<div class="col-lg-4 col-md-4 my-Col1">
				<img src="guayanafrancesa.png" class="responsive1" style="border-radius: 2px;margin: 15px;">
				<p>
					<strong>Guayana Francesa</strong>
				</p>
				<p id="GuayanaFrancesa"></p>
			</div>
		</div>

		<br>
		<br>

		<div class="row my-Row">
			<div class="col my-Col">
				<p><strong>Mapa informativo</strong></p>	
			</div>
		</div>

		<div class="row my-Row">
			<div class="col my-Col">
				<div id='map' style='width: 100%; height: 80vh;border-radius: 5px;'></div>
			</div>
		</div>
	</div>

	<br><br>
	<hr>

	<div class="container-fluid my-Container">
		<div class="row my-Row">
			<div class="col-lg-6 my-Col" style="text-align: center;margin: 15px;border: 0px;">
				<a style="color: rgba(51, 51, 51, 0.6);" href="https://www.boliviasegura.gob.bo/" target="_blank">Visita el sitio oficial del Gobierno de Bolivia sobre el COVID-19</a>
			</div>
			<div class="col-lg-6 my-Col" style="text-align: center;margin: 15px;border: 0px;">
				<p style="color: rgba(51, 51, 51, 0.6);">Desarrollado por Gustavo Gudiño, estudiante de Ing. de Sistemas con la supervisión de Hugo Loza, Responsable de Gestión Tecnológica de la UCB Tarija y la Lic. Sandra Lima, Docente del Depto. de Ingenierías y Ciencias Exactas</p>
			</div>
		</div>
	</div>
	<br>

	<script type="text/javascript">
		mapboxgl.accessToken = 'pk.eyJ1IjoiZ3VzdDk5IiwiYSI6ImNrYTAwcXVubTBrMmwza283eHQwczdsdTUifQ.QmwtsSaIVNXTaJNIVMCerA';
		
		let map;

		$(document).ready(function(){
			map = new mapboxgl.Map({container: 'map',style: 'mapbox://styles/mapbox/light-v10',zoom: 3,center: [-63.5886536, -16.2901535]});
			renderizarContenidoMapa();
		});

		async function renderizarContenidoMapa(){
			fetch("https://wuhan-coronavirus-api.laeyoung.endpoint.ainize.ai/jhu-edu/latest")
			.then(response => response.json())
			.then(data => {
			const countries = data;
			const fechaFooter = new Date(countries["0"].lastupdate);
	        const fechaFooter1 = fechaFooter.getDate()+" / "+(fechaFooter.getMonth()+1)+" / "+fechaFooter.getFullYear();
			$("#FechaDatos").html("Fecha de actualizacion: " + fechaFooter1);
			countries.forEach(country => {
				const confirmed = country.confirmed;
				const deaths = country.deaths;
				const location = country.location;
				const recovered = country.recovered;
				const lastUpdate = country.lastupdate;
				const countryRegion = country.countryregion;
				const active = confirmed - deaths - recovered;
				if(countryRegion == "Peru"){
					$("#Peru").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Brazil"){
					$("#Brazil").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Paraguay"){
					$("#Paraguay").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Chile"){
					$("#Chile").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Argentina"){
					$("#Argentina").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Colombia"){
					$("#Colombia").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Ecuador"){
					$("#Ecuador").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Venezuela"){
					$("#Venezuela").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Uruguay"){
					$("#Uruguay").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Guyana"){
					$("#Guyana").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "Suriname"){
					$("#Surinam").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				else if(countryRegion == "France" && location.lat == 3.9339 && location.lng == -53.1258){
					$("#GuayanaFrancesa").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
				if(countryRegion != "Bolivia") {
					new mapboxgl.Marker({
						color: "#e25f4e"
					})
					.setLngLat([location.lng, location.lat])
					.setPopup(new mapboxgl.Popup({ offset: 25 })
					.setHTML(
						`<img src="https://img.icons8.com/color/48/000000/${countryRegion.toLowerCase()}-circular.png" class="responsive" style="padding: 0;width: 20px;height: 20px;">` +
						'<p style="text-align: left;"><b>' + countryRegion + '</b></p>' +
						'<div class="row" style="padding: 0px;">' +
						'<div class="col" style="text-align: left;">' +
						'<p style="margin: 0px;">Confirmados</p>' +
						'<p style="margin: 0px;">Activos</p>' +
						'<p style="margin: 0px;">Recuperados</p>' +
						'<p style="margin: 0px;">Decesos</p>' +
						'</div>' +
						'<div class="col" style="text-align: center;padding-right: 0px;">' +
						'<p style="margin: 0px;">' + confirmed + '</p>' +
						'<p style="margin: 0px;">' + active + '</p>' +
						'<p style="margin: 0px;">' + recovered + '</p>' +
						'<p style="margin: 0px;">' + deaths + '</p>' +
						'</div>' +
						'</div>'
						))
					.addTo(map);
				}
			});
			});
		}
	</script>

	<script>
		$(document).ready(function(){
			$.getJSON("DatosBolivia.json").then(data => {
			const countries = data;
			countries.forEach(country => {
				const confirmed = country.confirmed;
				const deaths = country.deaths;
				const recovered = country.recovered;
				const countryRegion = country.countryregion;
				const active = confirmed - deaths - recovered;
				const location = country.location;
				if(countryRegion == "Bolivia") {
					$("#confirmadosNacional").html(confirmed);
					$("#recuperadosNacional").html(recovered);
					$("#decesosNacional").html(deaths);
					$("#activosNacional").html(active);

					new mapboxgl.Marker({
						color: "#e25f4e"
					})
					.setLngLat([location.lng, location.lat])
					.setPopup(new mapboxgl.Popup({ offset: 25 })
					.setHTML(
						`<img src="https://img.icons8.com/color/48/000000/${countryRegion.toLowerCase()}-circular.png" class="responsive" style="padding: 0;width: 20px;height: 20px;">` +
						'<p style="text-align: left;"><b>' + countryRegion + '</b></p>' +
						'<div class="row" style="padding: 0px;">' +
						'<div class="col" style="text-align: left;">' +
						'<p style="margin: 0px;">Confirmados</p>' +
						'<p style="margin: 0px;">Activos</p>' +
						'<p style="margin: 0px;">Recuperados</p>' +
						'<p style="margin: 0px;">Decesos</p>' +
						'</div>' +
						'<div class="col" style="text-align: center;padding-right: 0px;">' +
						'<p style="margin: 0px;">' + confirmed + '</p>' +
						'<p style="margin: 0px;">' + active + '</p>' +
						'<p style="margin: 0px;">' + recovered + '</p>' +
						'<p style="margin: 0px;">' + deaths + '</p>' +
						'</div>' +
						'</div>'
						))
					.addTo(map);

				}else if(countryRegion == "La Paz") {
					$("#LaPaz").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}else if(countryRegion == "Santa Cruz") {
					$("#SantaCruz").html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}else {
					$("#"+countryRegion).html("Confirmados: "+confirmed+"<br>Activos: "+active+"<br>Recuperados: "+recovered+"<br>Decesos: "+deaths);
				}
			});
			});
		});
	</script>
</body>
</html>