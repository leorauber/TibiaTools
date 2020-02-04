<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>General</title>
    <link href="<?php echo base_url('')?>includes/css/estilos.css" rel="stylesheet"></link>
    <link href="<?php echo base_url('')?>includes/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
    <script src = "<?php echo base_url('')?>includes/js/jquery.min.js"></script>
    <script src = "<?php echo base_url('')?>includes/js/jquery-2.1.1.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('includes/css/default.css')?>">
</head>
<body>
    <div id="menuGeneral" class="col-sm-12">
        <a href="<?php echo base_url('')?>Warzone">
            <div id="menuOption1" class="col-sm-1 text-center menuOption ">
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
            <div id="menuOption3" class="col-sm-1 text-center menuOption activeMenu">
                GENERAL
            </div>
        </a>
    </div>
    <div id="container" class="col-xs-12 col-xs-offset-0">
        <div id="body" class="col-xs-10 col-xs-offset-1" style="height: 657px;">
            
            <h1 style="margin-top: 250px;" id="abertura">Welcome to</h1>
            <!--tela inicial-->
            <div id="jogo" style="display: none;"> 
                <h1 style="font-size: 120px; margin-bottom: 80px;">General</h1>
                <div class="col-xs-2 col-xs-offset-5" id="buttonStyle" onclick="play()">Play</div>
                <div class="col-xs-2 col-xs-offset-5" id="buttonStyle" onclick="results()">Results</div>
                <div class="col-xs-2 col-xs-offset-5" id="buttonStyle" onclick="exit()">Exit</div>
            </div>
            <!--tela modoplay-->
            <div id="modoplay" style="display: none;">
                <div class="col-xs-4 col-xs-offset-4" id="buttonStyle" onclick="nomep1p2()">Player vs Player</div>
                <div class="col-xs-4 col-xs-offset-4" id="buttonStyle" onclick="nomep1pc()">Player vs PC</div>
                <div class="col-xs-2 col-xs-offset-5" id="buttonStyle" onclick="returnMenu()">Back</div>
            </div>
            
            <!--tela playervsplayer-->
            <div id="nomep1p2" style="display: none;">
                <h1>Player 1</h1> <input id="nome1" type="text"><br>
                <h1>Player 2</h1> <input id="nome2" type="text"><br><br><br>
                <div id="buttonStyle" class="col-xs-2 col-xs-offset-5" onclick="playervsplayer()">Play</div>
            </div>
            <div id="playervsplayer" style="display: none;">
                <h1 id="nomeplayvsplay" class=" col-xs-4 col-xs-offset-4"></h1>
                <div class="col-xs-2 col-xs-offset-2" id="buttonStyle" onclick="returnMenuDoJogoPvsP()">Back</div>
                
                <div id="divPlay1dePlayervsPlayer" class="col-xs-6">
                    <div id="buttonStyle" class="player1 col-xs-4 col-xs-offset-4" onclick="rolaDados(1)">Play</div>
                    <div style="margin-bottom: 20px;" class="col-xs-12">
                        <img id="dado1p1" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado2p1" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado3p1" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado4p1" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado5p1" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                    </div>
                    <table class="table table-condensed table-striped col-xs-6" id="tableplayer1">
                        <thead>
                            <tr>
                                <th>Jogada</th>
                                <th>Dados</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyplayer1"></tbody>
                    </table>
                </div>
                <div id="divPlay2dePlayervsPlayer" class="col-xs-6">
                    <div id="buttonStyle" class="player2 col-xs-4 col-xs-offset-4" onclick="rolaDados(2)">Play</div>
                    <div style="margin-bottom: 20px;" class="col-xs-12">
                        <img id="dado1p2" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado2p2" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado3p2" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado4p2" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado5p2" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                    </div>
                    <table class="table table-condensed table-striped col-xs-6" id="tableplayer2">
                        <thead>
                            <tr>
                                <th>Jogada</th>
                                <th>Dados</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyplayer2"></tbody>
                    </table>
                </div>
                
            </div>
            <!--tela playervspc-->
            <div id="nomep1pc" style="display: none;">
                <h1>Player 1</h1> <input id="nome3" type="text"><br><br><br>
                <div id="buttonStyle" class="col-xs-2 col-xs-offset-5" onclick="playervspc()">Play</div>
            </div>
            <div id="playervspc" style="display: none;">
                <h1 id="nomeplayvspc" class="col-xs-4 col-xs-offset-4"></h1>
                <div class="col-xs-2 col-xs-offset-2" id="buttonStyle" onclick="returnMenuDoJogoPvsPC()">Back</div>
                
                <div id="divPlay3dePlayervsPC" class="col-xs-6">
                    <div id="buttonStyle" class="player3 col-xs-4 col-xs-offset-4" onclick="rolaDados(3)">Play</div>
                    <div style="margin-bottom: 20px;" class="col-xs-12">
                        <img id="dado1p3" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado2p3" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado3p3" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado4p3" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado5p3" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                    </div>
                    <table class="table table-condensed table-striped col-xs-6" id="tableplayer3">
                        <thead>
                            <tr>
                                <th>Jogada</th>
                                <th>Dados</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyplayer3"></tbody>
                    </table>
                </div>
                <div id="divPlay4dePlayervsPC" class="col-xs-6">
                    <div id="buttonStyle" class="player4 col-xs-4 col-xs-offset-4">PC</div>
                    <div style="margin-bottom: 20px;" class="col-xs-12">
                        <img id="dado1p4" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado2p4" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado3p4" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado4p4" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                        <img id="dado5p4" src="<?php echo base_url('')?>includes/imagens/dado/1.jpg"/>
                    </div>
                    <table class="table table-condensed table-striped col-xs-6" id="tableplayer4">
                        <thead>
                            <tr>
                                <th>Jogada</th>
                                <th>Dados</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyplayer4"></tbody>
                    </table>
                </div>
                
            </div>
            
            <div id="vcperdeu" style="display: none;">
                <h1>Você Perdeu!!!!</h1>
            </div>
            <div id="results" style="display: none;">
                <div class="col-xs-6" id="resultsPlayervsPlayer">
                    <h1>Player vs Player</h1>
                    <table class="table table-condensed table-striped" id="tableresultplayervsplayer">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Pontos</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyResultplayervsplayer" style="height: 300px; overflow: auto;"></tbody>
                    </table>
                </div>
                <div class="col-xs-6" id="resultsPlayervsPC">
                    <h1>Player vs PC</h1>
                    <table class="table table-condensed table-striped" id="tableresulplayervspc">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Pontos</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyResultplayervspc" style="height: 300px; overflow: auto;"></tbody>
                    </table>
                </div>
                <div class="col-xs-2 col-xs-offset-5" id="buttonStyle" onclick="returnMenu()">Back</div>
            </div>
            <div id="exit" style="display: none;">
                <h1 id="bye">Bye</h1>
            </div>
        </div>
    </div>
    
    
<script>
    var i = 58, limite = 61, o = 0.0;
    var lock = 0;
    var contjogadasPlayer = new Array(0,0,0,0,0);
    var resultadoPlayer = new Array(0,0,0,0,0);
    window.onload = function () {
        abertura1();
    };
   
    function rolaDados(player){
        
        if(contjogadasPlayer[player] < 10){
            var d = new Array();
            var dados = "";
            for(var i = 0; i < 5; i++){
                d[i] = Math.floor((Math.random() * 6) + 1);
                $("#dado"+(i+1)+"p"+player).prop("src", "<?php echo base_url('')?>includes/imagens/dado/"+d[i]+".jpg");
            }
            d.sort();
            for(var i = 0; i < 5; i++){
                dados += d[i] + " ";
            }
            if(contjogadasPlayer[player] < 10){
                contjogadasPlayer[player]++;
            }
            insereLinhaTabela(player, dados, d);
            
            if(contjogadasPlayer[1] === 10 && contjogadasPlayer[2] === 10){
                insereResultado(1, 2);
                registraBanco(1,2);
                window.setTimeout(function(){
                    resultadoPlayer[1] = 0; contjogadasPlayer[1] = 0; $("#tbodyplayer1").empty();
                    resultadoPlayer[2] = 0; contjogadasPlayer[2] = 0; $("#tbodyplayer2").empty();
                    returnMenu();
                },5000);
            }
            if(contjogadasPlayer[3] === 10 && contjogadasPlayer[4] === 10){
                insereResultado(3, 4);
                registraBanco(3,4);
                window.setTimeout(function(){
                    resultadoPlayer[3] = 0; contjogadasPlayer[3] = 0; $("#tbodyplayer3").empty();
                    resultadoPlayer[4] = 0; contjogadasPlayer[4] = 0; $("#tbodyplayer4").empty();
                    returnMenu();
                },5000);
            }
            if(player === 3) rolaDados(4);
        }
    }
    
    function registraBanco(p1, p2){
        if(resultadoPlayer[p1] >= resultadoPlayer[p2]){
            var vencedor = document.getElementById("nome"+p1).value;
            var pontos = resultadoPlayer[p1];
            alert(vencedor +" Venceu!!!");
        }else {
            var pontos = resultadoPlayer[p2];
            if(p2 === 4){
                var vencedor = "PC";
                alert("PC Venceu!!!");
            }else {
                var vencedor = document.getElementById("nome"+p2).value;
                alert(vencedor +" Venceu!!!");
            }
        }
        $.ajax({
            type: 'post',
            dataType: 'json', //tipo de retorno
            url: "<?php echo base_url('')?>General/registraBanco", //arquivo onde serão buscados os dados
            data: {
                Vencedor: vencedor,
                Pontos: pontos
            },
            success: function (dados) {
                if (dados) {
                    alert(dados);
                } 
                else {
                    alert("Erro Ajax.");
                }
            }
        });
    }
   
    function play(){
        $("#jogo").prop("style", "display: none;");
        $("#modoplay").prop("style", "margin-top: 200px;");
    }
    function results(){
        $("#jogo").prop("style", "display: none;");
        $("#results").prop("style", "margin-top: 20px;");
    }
    function exit(){
        $("#jogo").prop("style", "display: none;");
        $("#exit").prop("style", "margin-top: 200px;");
    }
    function nomep1p2(){
        $("#modoplay").prop("style", "display: none;");
        $("#nomep1p2").prop("style", "margin-top: 100px;");
    }
    function playervsplayer(){
        var nomes = document.getElementById("nome1").value + " VS " + document.getElementById("nome2").value;
        document.getElementById("nomeplayvsplay").innerHTML = nomes;
        $("#nomep1p2").prop("style", "display: none;");
        $("#playervsplayer").prop("style", "margin-top: 10px;");
    }
    function nomep1pc(){
        $("#modoplay").prop("style", "display: none;");
        $("#nomep1pc").prop("style", "margin-top: 150px;");
    }
    function playervspc(){
        var nomes = document.getElementById("nome3").value + " VS PC";
        document.getElementById("nomeplayvspc").innerHTML = nomes;
        $("#nomep1pc").prop("style", "display: none;");
        $("#playervspc").prop("style", "margin-top: 10px;");
    }
    
    function returnMenuDoJogoPvsP(){
        var c = confirm("Deseja sair do jogo?");
        if (c){
            resultadoPlayer[1] = 0; contjogadasPlayer[1] = 0; $("#tbodyplayer1").empty();
            resultadoPlayer[2] = 0; contjogadasPlayer[2] = 0; $("#tbodyplayer2").empty();
            $("#playervsplayer").prop("style", "display: none;");
            $("#vcperdeu").prop("style", "margin-top: 200px;");
            window.setTimeout(function(){
                $("#vcperdeu").prop("style", "display: none;");
                $("#jogo").prop("style", "margin-top: 100px;");
            },3000);
        }  
    }
    function returnMenuDoJogoPvsPC(){
        var c = confirm("Deseja sair do jogo?");
        if (c){
            resultadoPlayer[3] = 0; contjogadasPlayer[3] = 0; $("#tbodyplayer3").empty();
            resultadoPlayer[4] = 0; contjogadasPlayer[4] = 0; $("#tbodyplayer4").empty();
            $("#playervspc").prop("style", "display: none;");
            $("#vcperdeu").prop("style", "margin-top: 200px;");
            window.setTimeout(function(){
                $("#vcperdeu").prop("style", "display: none;");
                $("#jogo").prop("style", "margin-top: 100px;");
            },3000);
        }  
    }
 
    function calculaResultado(d, dados){
        
        if ( dados === "1 2 3 4 5 ") return 40; // sequencia baixa
        if ( dados === "2 3 4 5 6 ") return 30; // sequencia alta
        
        var contNDados = new Array(0,0,0,0,0,0);
        for(var i = 0; i<5 ; i++) {
            if (d[i] === 1) contNDados[0]++;
            if (d[i] === 2) contNDados[1]++;
            if (d[i] === 3) contNDados[2]++;
            if (d[i] === 4) contNDados[3]++;
            if (d[i] === 5) contNDados[4]++;
            if (d[i] === 6) contNDados[5]++;
        }
        
        for(var i = 5; i >= 0; i--){
            if(contNDados[i] === 3){
                for (var i = 5; i >= 0; i--){
                    if (contNDados[i] === 2){
                        return 25; //fullhouse
                    }
                }
                var soma = 0;
                for(var j = 0; j < 5; j++){
                    soma += d[j];
                }
                return soma; // trinca
            }
        } // trinca e full-house
        
        for(var i = 5; i >= 0; i--){
            if(contNDados[i] === 5) {return 50;} // general
            if(contNDados[i] === 4) {
                var soma = 0;
                for(var j = 0; j < 5; j++){
                    soma += d[j];
                }
                return soma;
            } // quadra
            if(contNDados[i] === 2) {return (i+1)*2;} // double
        } // quadra trinca double
        
        return 0;
    }
       
    function insereResultado(p1, p2){
        var tbody1 = document.getElementById("tbodyplayer"+p1);
        var row = document.createElement("tr");
        var cell = document.createElement("td");
        row.appendChild(cell);
        var cell = document.createElement("td");
        row.appendChild(cell);
        var cell = document.createElement("td");
        cellText = document.createTextNode(resultadoPlayer[p1]);
        cell.appendChild(cellText);
        row.appendChild(cell);
        tbody1.appendChild(row);
        
        
        var tbody2 = document.getElementById("tbodyplayer"+p2);
        var row = document.createElement("tr");
        var cell = document.createElement("td");
        row.appendChild(cell);
        var cell = document.createElement("td");
        row.appendChild(cell);
        var cell = document.createElement("td");
        cellText = document.createTextNode(resultadoPlayer[p2]);
        cell.appendChild(cellText);
        row.appendChild(cell);
        tbody2.appendChild(row);
    }
    function insereLinhaTabela(player, dados, d){
        var tbody = document.getElementById("tbodyplayer"+player);
        var cellText;

        var row = document.createElement("tr");

        var cell = document.createElement("td");
        cellText = document.createTextNode(contjogadasPlayer[player]);
        cell.appendChild(cellText);
        row.appendChild(cell);

        var cell = document.createElement("td");
        cellText = document.createTextNode(dados);
        cell.appendChild(cellText);
        row.appendChild(cell);
        
        var resultado = calculaResultado(d, dados);
        resultadoPlayer[player] += resultado;
        var cell = document.createElement("td");
        cellText = document.createTextNode(resultado);
        cell.appendChild(cellText);
        row.appendChild(cell);

        tbody.appendChild(row);
    }
       
    function returnMenu(){
        $("#modoplay").prop("style", "display: none;");
        $("#results").prop("style", "display: none;");
        $("#playervspc").prop("style", "display: none;");
        $("#playervsplayer").prop("style", "display: none;");
        
        $("#jogo").prop("style", "margin-top: 100px;");
    }
    function abertura1(){
        $("#abertura").prop("style","margin-top: 250px; font-size: "+i+"px; opacity: "+o+";");
        if (lock === 0){ 
            i = i + 0.1;
            o = o + 0.01;
        } else{ 
            i = i - 0.1;
            o = o - 0.01;
            if ( i < 58){
                $("#abertura").empty();
                var h1 = document.getElementById("abertura");
                h1.innerHTML = "General!!!";
                o = 0.0;
                lock = 0;
                abertura2();
                return 0;
            }
        }
        if(i > limite){
            lock = 1;
        }
        window.setTimeout(abertura1,20);
    }
    function abertura2(){
        $("#abertura").prop("style","margin-top: 250px; font-size: "+i+"px; opacity: "+o+";");
        if (lock === 0){ 
            i = i + 0.1;
            o = o + 0.01;
        } else{ 
            i = i - 0.1;
            o = o - 0.01;
            if ( i < 59){
                $("#abertura").remove();
                $("#jogo").prop("style","margin-top: 100px;");
                return 0;
            }
        }
        if(i > limite){
            lock = 1;
        }
        window.setTimeout(abertura2,20);
    }
</script>        
</body>
</html>