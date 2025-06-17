<?php if ( ! defined('ABSPATH')) exit; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta charset="utf-8">
	  <meta name="apple-mobile-web-app-capable" content="yes">
	  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucid">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	  <link rel="stylesheet" href="<?php echo HOME_URI;?>/views/_css/login.css">
	  <link rel="stylesheet" href="<?php echo HOME_URI;?>/views/_css/estilo.css">

	  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>
	  	
	<title><?php echo $this->title; ?></title>
</head>
<body>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

	<script>
		$(function(){
			$(".button-collapse").sideNav();
		});
		$(document).ready(function(){
			$("#btn-dropdown1").dropdown();
			$('select').material_select();
			$("#btn-dropdown2").dropdown();
			$('select').material_select();
			$("#btn-dropdown3").dropdown();
		});

		

		Waves.attach('.YOUR-Button-Class', ['waves-button', 'waves-float']);

    function mostrarTabela(){
    document.getElementById('custo').style.display = '';  
    }

  


	</script>

	<script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['orgchart']});
      google.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
        data.addRows([
          [{v:'HORTIPRICE', f:'HORTIPRICE'}, '', ''],
          [{v:'CADASTROS', f:'CADASTROS'}, 'HORTIPRICE', ''],
          [{v:'ÁREA', f:'ÁREA'}, 'CADASTROS', ''],
          [{v:'CATEGORIA', f:'CATEGORIA'}, 'CADASTROS', ''],
          [{v:'SUBCATEGORIA', f:'SUBCATEGORIA'}, 'CADASTROS', ''],
          [{v:'CUSTO', f:'CUSTO'}, 'CADASTROS', ''],
          [{v:'TIPO', f:'TIPO'}, 'CADASTROS', ''],
          [{v:'UNIDADE', f:'UNIDADE'}, 'CADASTROS', ''],
          [{v:'COMPONENTE', f:'COMPONENTE'}, 'CADASTROS', ''],
          [{v:'PRODUTIVIDADE', f:'PRODUTIVIDADE'}, 'CADASTROS', ''],
          [{v:'DIRECIONADOR', f:'DIRECIONADOR'}, 'CADASTROS', ''],
          [{v:'ATIVIDADE', f:'ATIVIDADE'}, 'CADASTROS', ''],
          [{v:'SIMULAÇÕES', f:'SIMULAÇÕES'}, 'HORTIPRICE', ''],
          [{v:'CUSTEIO ABC', f:'CUSTEIO ABC'}, 'SIMULAÇÕES', ''],
          [{v:'CUSTEIO POR ABSORÇÃO', f:'CUSTEIO POR ABSORÇÃO'}, 'SIMULAÇÕES', ''],
          [{v:'CUSTEIO VARIÁVEL', f:'CUSTEIO VARIÁVEL'}, 'SIMULAÇÕES', ''],
          [{v:'RELATÓRIOS', f:'RELATÓRIOS'}, 'HORTIPRICE', ''],
          [{v:'CUSTOS DE PRODUÇÃO', f:'CUSTOS DE PRODUÇÃO'}, 'RELATÓRIOS', ''],
          [{v:'CUSTO UNITÁRIO', f:'CUSTO UNITÁRIO'}, 'RELATÓRIOS', ''],
          [{v:'TOTAIS POR CUSTO', f:'TOTAIS POR CUSTO'}, 'RELATÓRIOS', ''],
          [{v:'CUSTO ABC', f:'CUSTO ABC'}, 'RELATÓRIOS', ''],

            ]);

     
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        chart.draw(data, {size:'small',allowHtml:true, allowCollapse:true});
      }
    </script>




<div>