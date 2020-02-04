<!DOCTYPE html>
<html>
	<head>
		<title>WarZone Logs</title>
		<script src="<?php echo base_url('includes/js/jquery_3_3_1.min.js')?>"></script>
		<script src="<?php echo base_url('includes/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('includes/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo base_url('includes/js/dataTables.bootstrap4.min.js')?>"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('includes/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('includes/css/loader.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('includes/css/default.css')?>">
		
		
		
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div id="menu" class="col-sm-12">
					<a href="<?php echo base_url('')?>Warzone">
						<div id="menuOption1" class="col-sm-1 text-center menuOption activeMenu">
							WARZONE
						</div>
					</a>
					<a href="<?php echo base_url('')?>Ml">
						<div id="menuOption2" class="col-sm-1 text-center menuOption">
							MAGIC LEVEL
						</div>
					</a>
					<a href="<?php echo base_url('')?>Imbui">
						<div id="menuOption3" class="col-sm-1 text-center menuOption">
							IMBUEMENTS
						</div>
					</a>
					<a href="<?php echo base_url('')?>Party">
						<div id="menuOption3" class="col-sm-1 text-center menuOption">
							PARTY
						</div>
					</a>
					<a href="<?php echo base_url('')?>General">
                    	<div id="menuOption3" class="col-sm-1 text-center menuOption">
                        	GENERAL
                    </div>
                </a>
				</div>
				<div class="col-sm-4">
					<input class="col-sm-6 form-control" type="text" placeholder="Name of your character." id="nameChar">
					<textarea class="col-sm-12 form-control" id="log" rows="20"  placeholder="Paste server log."></textarea>
					<div class="col-sm-6" style="float: left;">
						<br><input type="button" value="Execute" onclick="geraTable()" id="executeButton">
						<input type="button" value="Clear All" onclick="reloadPage()">
					</div>
					<div class="col-sm-6" style="float: left;">
						<br><input class="col-sm-12 form-control" style="float: right; margin-bottom: 5px;" type="text" placeholder="Porcentagem" id="porcentForm">
						<input class="col-sm-12 form-control" type="text" style="float: right; margin-bottom: 5px;" placeholder="Experiência" id="expForm"><br>
						<input type="button" value="Resultado:" onclick="calcExp()" id="resultButtom">
						<input class="col-sm-6 form-control" style="float: right;" disabled="true" type="text" placeholder="Resultado" id="resultForm">
					</div>					
				</div>
				<div class="col-sm-8">
					<table id="tableExp" class="table table-sm table-hover table-dark">
						<thead>
							<tr>
								<th>Name</th><th>Level</th><th>Vocation</th><th>Guild</th><th>Versperoth</th><th>Deathstrike</th><th>Gnomevil</th><th>Abyssador</th><th>Total</th>
							</tr>
						</thead>
						<tbody id="tableExpTbody" style="display: none;">
							
						</tbody>

					</table>
					<table id="TotalExpBoss" class="table table-sm table-hover table-dark" style="display: none;"></table>
					<div class="loader" style="display: none;"></div>
				</div>
			</div>
		</div>
		
		
	
		
	<script>
		countResponse = 0; 
		$(document).ready(
			function() {
				table = $('#tableExp').DataTable( {
					"paging":			false,				
					"scrollY":			"540px",
					"scrollCollapse":	true,
					"info":				false,
					"columnDefs": [
						{ width: 200, targets: 0 }
					]
				} );
				


				//testes
				//$.ajax({ type: 'GET', url:  "<?php echo base_url('')?>Warzone/callQuest",
				//	success: function(data){ console.log(data); },
				//	error: function(){ console.error('no results'); } }).responseJSON;				

				//$.ajax({
				//	type: 'GET',
				//	contentType: 'application/json',
				//	url: "https://api.tibiadata.com/v2/characters/Iluria.json",
				//	success: function(msg) {
				//		console.log(msg);
				//	}
				//});

				//$.ajax({
				//	type: 'POST',
				//	url:  "<?php echo base_url('')?>Warzone/callAPI",
				//	data: {name: "Arvoros"},
				//	success: function(data){
				//		data = JSON.parse(data);
				//		let dataJsonCharactersExist = data.characters;
				//		if( dataJsonCharactersExist.error ){
				//			alert("Insira o nome do seu personagem válido."); 
				//			return false;
				//		} else {
				//			console.log("chama buscaDadosAPI")
				//		}
				//	},
				//	error: function(){
				//		console.error('no results');
				//		$("#executeButton").prop("disabled",false);
				//	}
				//}).responseJSON;
				
				
			}
		);
		function geraTable(){
			$("#executeButton").prop("disabled",true);
			$nameCharYou = " " + $('#nameChar').val();
			consultPlayerExist($nameCharYou);
		}
		function consultPlayerExist(nameConsultPlayerExist){
			if (nameConsultPlayerExist === " ") {
				alert("Inserá o nome do seu personagem."); 
				$("#nameChar").focus();
				$("#executeButton").prop("disabled",false);
				return false;
			}
			table.clear().draw();
			$nameConsultPlayerExistSplit = getNameAPI(nameConsultPlayerExist.split(' '));
			$.ajax({
					type: 'POST',
					url:  "<?php echo base_url('')?>Warzone/callAPI",
					data: {name: $nameConsultPlayerExistSplit},
					success: function(data){
						data = JSON.parse(data);
						let dataJsonCharactersExist = data.characters;
						if( dataJsonCharactersExist['error'] ){
							alert("Inserá o nome do seu personagem válido."); 
							$("#executeButton").prop("disabled",false);
							$("#nameChar").focus();
							return false;
						} else {
							buscaDadosAPI();
						}
					},
					error: function(){
						console.error('no results');
						$('.loader').hide();
						$("#executeButton").prop("disabled",true);
					}
				});
		}
		function buscaDadosAPI(){
			$('.loader').show();
			$('#TotalExpBoss').hide();
			$("#tableExpTbody").hide();
			$infoArray = [];
			$firstLineExp = 0; $lineExp = ''; $iboss = 0;
			$logLine = $('#log').val().split('\n');
			$data = getData();
			$expTotalBoss = [0,0,0,0,0];
			
			
			table.clear().draw();
			
			for( i = 0 ; i < $logLine.length; i++){
				if ( $logLine[i].includes('experience points.') ) {
					if ( $lineExp !== '' ) 		{ $lineExp += '\n'; }
					if ($firstLineExp === 0)	{  verifyBoss(); }
					$lineExp += $logLine[i];
					$nameSplit = $logLine[i].split(' gained ')[0].split(' ');
					if ($nameSplit[1] === "You" && $nameSplit.length === 2) {
						$nameSplit = $nameCharYou.split(' ');
					}
					$name = getName($nameSplit);
					$nameAPI = getNameAPI($nameSplit);
					$expSplit = parseInt($logLine[i].split(' gained ')[1].split(' ')[0]);
					
					
					if ( consultCharContain() ){ $infoArray.push( new infoChar($name,$nameAPI,"","",[0,0,0,0],0, "") ); }
					$indexChar = consultCharIndex($name);
					$infoArray[$indexChar].expBoss[$iboss] += $expSplit;
					$infoArray[$indexChar].expTotal += $expSplit;
					$expTotalBoss[$iboss] += $expSplit;
					$expTotalBoss[4] += $expSplit;
					
				} else { $firstLineExp = 0; }
			}
			getDataCharAPI();
			//console.log($infoArray);
			//console.log($lineExp);
		}
		function getDataCharAPI(){
			countResponse = 0;
			for (p = 0 ; p < $infoArray.length ; p++) {
				$.ajax({
					type: 'POST',
					url:  "<?php echo base_url('')?>Warzone/callAPI",
					data: {name: $infoArray[p].nameAPI},
					success: function(data){
						data = JSON.parse(data);
						let dataJsonCharInfoAPI = data.characters;

						if (dataJsonCharInfoAPI['error']) { 
							console.log(dataJsonCharInfoAPI);
							console.log('Char não encontrado');
						} else {
							if(dataJsonCharInfoAPI.data['former_names']){ 
								idxAPI = consultCharIndexNameOld(dataJsonCharInfoAPI.data.name, dataJsonCharInfoAPI.data.former_names); 
							} else { 
								idxAPI = consultCharIndex(dataJsonCharInfoAPI.data.name); 	
							}

							if (dataJsonCharInfoAPI.data['level']){ $infoArray[idxAPI].lvl = dataJsonCharInfoAPI.data.level;}
							if (dataJsonCharInfoAPI.data['vocation']){ $infoArray[idxAPI].vocation = dataJsonCharInfoAPI.data.vocation;}
							if (dataJsonCharInfoAPI.data['guild']){ $infoArray[idxAPI].guild = dataJsonCharInfoAPI.data.guild.name;} 
						}
							countResponse++;
					},
					error: function(){
						console.error('no results');
						$('.loader').hide();
						$("#executeButton").prop("disabled",false);
					}
				});				
			}
			window.setTimeout( insertDataTable , 1000 ); 
		}
		function insertDataTable(){
			if(countResponse < $infoArray.length) {
				//console.log("Waiting... ", countResponse, ' ', $infoArray.length);
				setTimeout( insertDataTable , 1000);
			} else {
				console.log("Inserindo dados na tabela... ", countResponse, ' ', $infoArray.length);
				for(aT = 0 ; aT < $infoArray.length ; aT++){
					table.row.add( [ $infoArray[aT].name, $infoArray[aT].lvl, $infoArray[aT].vocation, $infoArray[aT].guild, $infoArray[aT].expBoss[0], $infoArray[aT].expBoss[1], $infoArray[aT].expBoss[2], $infoArray[aT].expBoss[3], $infoArray[aT].expTotal ] )
					.node();
				}
				$('#TotalExpBoss').html("<thead> <tr> <th>Exp Total Boss</th><th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th><th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th><th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th><th>"+$expTotalBoss[0]+"</th><th>"+$expTotalBoss[1]+"</th><th>"+$expTotalBoss[2]+"</th><th>"+$expTotalBoss[3]+"</th><th>"+$expTotalBoss[4]+"</th> </tr> </thead>");
				setTimeout(function(){ 
					table.order( [ 0, 'desc' ] ).draw();
					setTimeout(function(){ 
						table.order( [ 0, 'asc' ] ).draw();
					}, 10);
				}, 10);
				
				$('.loader').hide();
				$("#tableExpTbody").show();
				$('#TotalExpBoss').show();
				$("#executeButton").prop("disabled",false);
			}
		}
		function calcExp(){
			$porcentForm = $("#porcentForm").val();
			$expForm = $("#expForm").val();
			if ($porcentForm === "") {
				alert("Inserá a porcentagem de bonus.");
				return false; 
			}
			if ($expForm === "") {
				alert("Inserá a experiência.");
				return false;
			}
			$resultForm = Math.trunc((parseInt($expForm)/parseInt($porcentForm))*100);
			$("#resultForm").val($resultForm);
		}
		function getData(){
			for( j = 0 ; j < $logLine.length; j++){
				if ( $logLine[j].includes('Channel Server Log saved')) {
					$dataSplit = $logLine[j].split(' ');
					$data = $dataSplit[6] + $dataSplit[5] + $dataSplit[8] + $dataSplit[4];
					return $data;
				}
			}
		}
		function verifyBoss(){
			$firstLineExp = 1;
			for (j = 1 ; i-j >= 0 ; j++){
				if ( $logLine[i-j].includes('Versperoth') 	) {	$iboss = 0; $lineExp += 'Versperoth\n';		break;}
				if ( $logLine[i-j].includes('Deathstrike') 	) {	$iboss = 1; $lineExp += 'Deathstrike\n';	break;}
				if ( $logLine[i-j].includes('Gnomevil') 	) {	$iboss = 2; $lineExp += 'Gnomevil\n';		break;}
				if ( $logLine[i-j].includes('Abyssador') 	) {	$iboss = 3; $lineExp += 'Abyssador\n';		break;}
			}
		}
		function getName($nameSplit){
			$nameR = $nameSplit[1];
			if ($nameSplit.length > 1){ for (ns = 2 ; ns < $nameSplit.length ; ns++){ $nameR += " " + $nameSplit[ns]; } }
			return $nameR;
		}
		function getNameAPI($nameAPISplit){
			$nameAPIR = $nameAPISplit[1];
			if ($nameAPISplit.length > 1){ for (nas = 2 ; nas < $nameAPISplit.length ; nas++){ $nameAPIR += "+" + $nameAPISplit[nas]; } }
			return $nameAPIR;
		}
		function consultCharContain(){
			for (a = 0 ; a < $infoArray.length; a++){
				if ($infoArray[a].name === $name){
					return false;
				}
			}
			return true;
		}
		function infoChar(name,nameAPI,lvl,guild,expBoss,expTotal,vocation){
			this.name = name; 
			this.nameAPI = nameAPI; 
			this.lvl = lvl; 
			this.guild = guild; 
			this.expBoss = expBoss; 
			this.expTotal = expTotal;
			this.vocation = vocation;
		}
		function consultCharIndex($name){
			for (a = 0 ; a < $infoArray.length; a++){
				if ($infoArray[a].name.toUpperCase() === $name.toUpperCase()){
					return a;
				}
			}
		}
		function consultCharIndexNameOld($name, $name_old){
			for (a = 0 ; a < $infoArray.length; a++){
				if ($infoArray[a].name === $name || $infoArray[a].name === $name_old){
					return a;
				}
			}
		}
		function reloadPage(){
			location.reload();
		}
		
	</script>
	</body>
</html>