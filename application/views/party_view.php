<!DOCTYPE html>
<html>
	<head>
		<title>Search Party</title>
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
					<a href="<?php echo base_url('')?>warzone">
						<div id="menuOption1" class="col-sm-1 text-center menuOption">
							WARZONE
						</div>
					</a>
					<a href="<?php echo base_url('')?>ml">
						<div id="menuOption2" class="col-sm-1 text-center menuOption">
							MAGIC LEVEL
						</div>
					</a>
					<a href="<?php echo base_url('')?>imbui">
						<div id="menuOption3" class="col-sm-1 text-center menuOption">
							IMBUEMENTS
						</div>
					</a>
					<a href="<?php echo base_url('')?>party">
						<div id="menuOption3" class="col-sm-1 text-center menuOption activeMenu">
							PARTY
						</div>
					</a>
					<a href="<?php echo base_url('')?>General">
                    	<div id="menuOption3" class="col-sm-1 text-center menuOption">
                        	GENERAL
                    </div>
                </a>
				</div>
				<div class="col-sm-5 ">
					<div class="input-group mb-1 mt-4">
						<div class="input-group-prepend">
							<label class="input-group-text" for="selectWorld">World</label>
						</div>
						<select class="custom-select" id="selectWorld"> </select>
					</div>
					
					<div class="input-group mb-1">
						<div class="input-group-prepend">
							<label class="input-group-text" for="level">&thinsp;Level&thinsp;</label>
						</div>
						<input class="form-control" type="number" id="level" value="1" max="9999" min="1">
					</div>
					
					<input class="btn btn-outline-secondary" type="button" value="Search" onclick="searchParty()" id="searchButton">
					
					<div class="input-group col-sm-4" style="float:right;">
						<div class="input-group-prepend">
							<label class="input-group-text" for="levelMax">&thinsp;Max</label>
						</div>
						<input class="form-control" type="text" disabled="true" id="levelMax">
					</div>
					<div class="input-group col-sm-4" style="float:right;">
						<div class="input-group-prepend">
							<label class="input-group-text" for="levelMin">&thinsp;Min&thinsp;</label>
						</div>
						<input class="form-control" type="text" disabled="true" id="levelMin">
					</div>
					
					<div class="col-sm-12 border rounded mt-5 p-3 bg-white text-right">
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="name">Name&ensp;&ensp;&thinsp;&thinsp;&thinsp;&thinsp;</label> </div>
							<input class="form-control" type="text" id="name">
							<div class="input-group-append"> <button class="btn btn-outline-secondary" onclick="searchInfoChar()" type="button" id="buttonSearchChar">Search</button> </div>
						</div>
						
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="vocation">Vocation&ensp;</label> </div>
							<input class="form-control" type="text" disabled="true" id="vocation">
						</div>
						
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="levelSearch">Level&emsp;&ensp;&ensp;&thinsp;</label> </div>
							<input class="form-control" type="text" disabled="true" id="levelSearch">
						</div>
						
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="guild">Guild&ensp;&ensp;&ensp;&thinsp;&thinsp;&thinsp;</label> </div>
							<input class="form-control" type="text" disabled="true" id="guild">
						</div>
						
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="world">World&ensp;&ensp;&thinsp;&thinsp;&thinsp;&thinsp;</label> </div>
							<input class="form-control" type="text" disabled="true" id="world">
						</div>
						
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="residence">Residence</label> </div>
							<input class="form-control" type="text" disabled="true" id="residence">
						</div>
						
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="account">Account&thinsp;&thinsp;&thinsp;&thinsp;</label> </div>
							<input class="form-control" type="text" disabled="true" id="account">
						</div>
						
						<div class="input-group col-sm-12 mb-1">
							<div class="input-group-prepend"> <label class="input-group-text" for="created">Created&ensp;&ensp;</label> </div>
							<input class="form-control" type="text" disabled="true" id="created">
						</div>
						
					</div>
				</div>
				<div class="col-sm-7">
					<table id="table" class="table table-sm table-hover table-dark">
						<thead>
							<tr>
								<th>Name</th><th>Level</th><th>Vocation</th>
							</tr>
						</thead>
						<tbody id="tableTbody" style="display: none;">
						</tbody>
					</table>
					<div class="loader" style="display: none;"></div>
				</div>
			</div>
		</div>
		
		
	
		
	<script>
		$(document).ready(
			function() {
				table = $('#table').DataTable( {
					"paging":			false,				
					"scrollY":			"540px",
					"scrollCollapse":	true,
					"info":				false,
					"columnDefs": [
						{ width: 400, targets: 0 }
					]
				} );
				getWorlds();
			}
		);
		
		function searchInfoChar(){
			$("#buttonSearchChar").prop("disabled",true);
			if ($('#name').val() === " " || $('#name').val() === "") {
				alert("Insira o nome do personagem."); 
				$("#name").focus();
				$("#buttonSearchChar").prop("disabled",false);
				return false;
			}
			$name = $('#name').val().replace(" ", "+");
			
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url('')?>Party/callAPIInfoPlayer",
				data: {name: $name},
				success: function(data){
					data = JSON.parse(data);
					dataJsonCharactersExist = data.characters;
					console.log(dataJsonCharactersExist);
					if( dataJsonCharactersExist['error'] ){
						alert("Inserá o nome do seu personagem válido."); 
						$("#buttonSearchChar").prop("disabled",false);
						$("#name").focus();
						return false;
					} else {
						//console.log('nome valido');
						$('#vocation').val(dataJsonCharactersExist.data.vocation);     					//vocation
						$('#levelSearch').val(dataJsonCharactersExist.data.level);     						//level
						if (dataJsonCharactersExist.data['guild']) $('#guild').val(dataJsonCharactersExist.data.guild.name); else $('#guild').val(""); //guild
						$('#world').val(dataJsonCharactersExist.data.world);     						//world
						$('#residence').val(dataJsonCharactersExist.data.residence);     				//residence
						$('#account').val(dataJsonCharactersExist.data.account_status);     			//account
						$('#created').val(dataJsonCharactersExist.account_information.created.date);    //created
						$("#buttonSearchChar").prop("disabled",false);
					}
				},
				error: function(){
					console.error('no results');
				},
				complete: function(){
					$("#buttonSearchChar").prop("disabled",false);
				}
			});	

		}
		function searchParty(){
			$("#searchButton").prop("disabled",true);
			$level = parseInt($('#level').val());
			if ($level < 1 || $level > 9999) {
				alert('Invalid level.');
				$("#level").focus();
				$("#searchButton").prop("disabled",false);
				return false;
			}
			table.clear().draw();
			$('.loader').show();
			$levelMin = $level - Math.trunc($level/3); 
			$levelMax = $level + Math.trunc($level/2);
			$world = $('#selectWorld').val();
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url('')?>Party/callAPIPlayersWorld",
				data: {world: $world},
				success: function(dataWorld){
						dataWorld = JSON.parse(dataWorld);
						dataJsonWorldPlayersOnline = dataWorld.world.players_online;
						getDataChar();
				},
				error: function(){
					console.error('no results');
				}
			});
		}
		function getDataChar(){
			for (iPO = 0; iPO < dataJsonWorldPlayersOnline.length; iPO++){
				$levelPO = parseInt(dataJsonWorldPlayersOnline[iPO].level);
				if($levelPO >= $levelMin && $levelPO <= $levelMax){
					//console.log(dataJsonWorldPlayersOnline[iPO].name + " " + dataJsonWorldPlayersOnline[iPO].level + " " +  dataJsonWorldPlayersOnline[iPO].vocation);
					table.row.add( [ dataJsonWorldPlayersOnline[iPO].name, dataJsonWorldPlayersOnline[iPO].level, dataJsonWorldPlayersOnline[iPO].vocation ] )
					.node();
				}
			}
			setTimeout(function(){ 
					table.order( [ 0, 'desc' ] ).draw();
					setTimeout(function(){ 
						table.order( [ 0, 'asc' ] ).draw();
					}, 10);
				}, 10);
			
			$('#levelMin').val($levelMin);
			$('#levelMax').val($levelMax);
			$('.loader').hide();
			$("#tableTbody").show();
			$("#searchButton").prop("disabled",false);
		}
		function getWorlds(){
			$.ajax({
				type: 'GET',
				url:  "<?php echo base_url('')?>Party/callAPIWorlds",
				success: function(data){
					data = JSON.parse(data);
					let dataJson = data.worlds.allworlds;
					for (i = 0; i < dataJson.length; i++){
						$( "#selectWorld" ).append( "<option>"+dataJson[i].name+"</option>" );
					}
				},
				error: function(){
					console.error('no results'); 
				}
			});
		}
	</script>
	</body>
</html>