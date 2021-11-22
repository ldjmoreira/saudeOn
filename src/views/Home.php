
<main class="content w3-animate-opacity">
<div class="home">
<div class="content-title mb-4">
    
    <i class=" icon icofont-ui-home mr-2"></i>
    
    <div>
        <h1>Home</h1>
        <h2>Seja bem vindo ao SaudeOn!</h2>
    </div>
</div>

        <div class="summary-boxes">

        <div class="summary-box clickable1 " onclick="myhref('Home.php?update=1');">
            
            <i class="icon icofont-users"></i>
            <p class="title">Operadores</p>
            <h3 class="value" id="userid">0</h3>
            
        </div>


        <div class="summary-box clickable2  " onclick="myhref('Home.php');">
        
            <i class="icon icofont-patient-bed"></i>
            <p class="title">Pacientes monitorados</p>
            <h3 class="value"><?= count($concentradoresid) ?></h3>
            
        </div>
       
    </div>


        <div class="card mt-4 ">
            <div class="card-header">
            <?php
            if (isset($pacientesMon)) {
               echo " <h4 class=\"card-title\">Pacientes monitorados</h4>";
            } else if ($operadoresMon) {
            echo " <h4 class=\"card-title\">Operadores ativos</h4>";
            } else {
                echo " <h4 class=\"card-title\">Pacientes monitorados</h4>";
            }
            ?>
            </div>
            <div class="card-body ">
                <table class="table table-bordered table-striped table-hover">
                <thead>
                <?php
                    if (isset($pacientesMon)) {//modify echo
                    echo"   <th>Nome</th>";
                    echo"   <th>Data de admissão</th>";
                    echo"   <th>Prontuário</th>";
                    echo"   <th>Contato</th>";
                    echo"   <th>Sinais vitais</th>";
                    } else if(isset($operadoresMon)){
                        echo"   <th>Nome do operador</th>";
                        echo"   <th>Data de admissão</th>";
                        echo"   <th>E-mail</th>";
                    }
                    else {
                        echo "<hr/>";
                        echo "<h3><i class='icofont-exclamation-circle h2'></i> Não há pacientes monitorados</h3>";}  
      
                ?>
                </thead>
                <tbody>
                    <?php                        
                        if (isset($pacientesMon)) {
                            foreach($pacientesMon as $paciente): ?>
                            
                            <tr>
                            <td><?= $paciente->name ?></td>
                            <td><?= $paciente->dataAdmissao?></td>
                            <td><?= $paciente->prontuario ?></td>
                            <td><?= $paciente->telContato  ?></td>
                            <td>
                            <a href="Home.php?id=<?= $paciente->id?>" 
                                class="btn btn-warning rounded-circle mr-2">
                                <i class="icofont-rounded-right"></i>
                            </a>

                            
                            </td>
                            </tr>
                            <?php endforeach ;
                        } else if (isset($operadoresMon)) {
                            foreach($operadoresMon as $operador): ?>
                            
                                <tr>

                                <td><?= $operador->name ?></td>
                                <td><?= $operador->start_date?></td>
                                <td><?= $operador->email?></td>

                                </tr>
                                <?php endforeach ;
                        }



                    ?>

                </tbody>
                </table>
            </div>
        </div>


</div>
</main>

<script>
    

  setIntervalX(function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        let str = this.responseText.split("U") ;
        let userid = str[1].split("-") ;
        document.getElementById("userid").innerHTML = userid.length;
        }
    };
    xhttp.open("GET", "http://<?= $ipUser1 ?>/conectados", true);
    xhttp.send();
}, 1000, 5);

function setIntervalX(callback, delay, repetitions) {
    var x = 0;
    var intervalID = window.setInterval(function () {
    callback();
    if (++x === repetitions) {
        window.clearInterval(intervalID);
    }
    }, delay);
}

setTimeout(function() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
      let str = this.responseText.split("U") ;
      let userid = str[1].split("-") ;
      document.getElementById("userid").innerHTML = userid.length;
    }
  };
  xhttp.open("GET", "http://<?= $ipUser1 ?>/conectados", true);
  xhttp.send();

},1);

setInterval(function() {

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    
    let str = this.responseText.split("U") ;
    let userid = str[1].split("-") ;
    document.getElementById("userid").innerHTML = userid.length;
  }
};
xhttp.open("GET", "http://<?= $ipUser1 ?>/conectados", true);
xhttp.send();

},3600000);

</script>
<script src="assets/js/app.js"></script>
<script src="assets/js/home_.js"></script>
</body>
</html>


