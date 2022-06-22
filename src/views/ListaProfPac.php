<script src="assets/js/MenuProfPac.js"> </script>
<style>
    .fc-daygrid-day-frame:hover{
    background-color: rgb(204, 204, 204);
    transition: background-color 0.2s;
    cursor: pointer;
    }
    .fc-timegrid-slot:hover {
        background-color: rgb(204, 204, 204);
    cursor: pointer;
    }

</style>
<main class="content w3-animate-opacity" >
<?php
include(TEMPLATE_PATH . "/messages.php");
?>

    
    
    <div class="caixa-lista-paciente2">  
        <div class="caixa-lista-paciente-titulo">
            <?php renderTitle($title) ?>
            
        </div>
        <div class="caixa-lista-paciente-paciente">
            <a class="linkSem" href="?change=1">
                <h4> <i class="icofont-ui-user mr-3"></i><?= $pacInfo->name?> <i class="icofont-exchange"></i></h4>
            </a>
        </div>
        <div class="caixa-lista-paciente-conteudo" >
            <div class="mb-2 mt-2  posicao-form " >
                    <div class="posicao-form-esquerda ">
        
                    <a class="registro posicao-form-esquerda" 
                    href="ProfPac.php"> 
                    <i class="icofont-plus-circle h4 mt-1   mr-2 "></i> 
                    <h4>Adicionar novo registro </h4>
                    </a>

                    </div>
                    <div class="posicao-form-direita mb-1">
                        <button class="btn btn-primary ml-2" onclick="slcProfPacGrafico(event)">
                        <i class="icofont-dashboard-web"></i>
                        </button>
                    </div>
            </div>
            <hr>
            <div id="desenhoProfpac" class="w3-show">
                <div class="calendar"></div>
            </div>
            <div id="listaProfpac" class="w3-hide">
            <form class="mb-4" action="#" method="post" id="ocSelect" >
                <input type="hidden" id="desenho" name="desenho" value="<?= $desenho ?>"> 
                <table class="table table-bordered table-striped table-hover" id="myTable">
                    <thead>
                    <?php

                        if (!empty($listasprofpac2)){
                            echo"   <th>Profissional</th>";
                            echo"   <th>CBO</th>";
                            echo"   <th>Motivo</th>";
                            echo"   <th>Data da visita</th>"; 
                            echo"   <th>Hora </th>"; 
                            echo"   <th>Intervalo</th>"; 
                            echo"   <th>Turno</th>"; 
                            echo"   <th>Ciente</th>";  
                            echo"   <th>Ação</th>"; 

                        }else{
                            echo "<hr/>";
                            echo "<h3> <i class='icofont-exclamation-circle h2'></i> Não há registro cadastrado para esse paciente</h3>";}  
                    ?>
                    </thead>
                    <tbody>
                        <?php     
                    
                            foreach($listasprofpac2 as $profpac): ?>
                            <tr>
                            <td><?= html_entity_decode($profpac->nome_Prof)  ?></td>
                            <td><?= $profpac->descricao?></td>
                            <td><?= $profpac->motivo ?></td>
                            <td><?= $profpac->data ?></td>
                            <td><?=  substr($profpac->hora , 0, 5);?></td>
                            <td>
                                <?php
                                    if($profpac->periodicidade =='0' ){
                                        echo 'Única visita';
                                    }elseif($profpac->periodicidade =='1440' ) {
                                        echo "Todos os dias";
                                    }elseif($profpac->periodicidade =='2880'){
                                        echo "A cada 2 dias";
                                    }elseif($profpac->periodicidade == '4320'){
                                        echo "A cada 3 dias";
                                    }elseif($profpac->periodicidade == '5760'){
                                        echo "A cada 4 dias";
                                    }elseif($profpac->periodicidade == '7200'){
                                        echo "A cada 5 dias";
                                    }elseif($profpac->periodicidade == '8640'){
                                        echo "A cada 6 dias";
                                    }elseif($profpac->periodicidade == '10080'){
                                        echo "A cada 7 dias";
                                    }elseif($profpac->periodicidade == '21600'){
                                        echo "Quinzenalmente";
                                    }
                                ?>
                            </td>
                            <td><?= $profpac->turno ?></td>
                            <td><?= $profpac->ciente ? "Sim" : "Não"; ?></td>
                            
                            <td>
                            <a title="editar campos" href="ProfPac.php?view=<?= $profpac->id?>" 
                                    class="btn btn-warning rounded-circle ">
                                    <i class="icofont-list"></i>
                            </a>

                            <a title="desmarcar consulta" id="myDelete" href="?delete=<?= $profpac->id  ?>" onclick="myDeletes(event,this,<?= $paciente->id ?>)"
                                class=" ml-2 btn btn-danger rounded-circle">
                                <i class="icofont-close"></i>
                            </a>
                            </td>
                            </tr>
                            <?php endforeach ;

                        ?>

                    </tbody>	
                </table>
                </form>
            </div>
        </div>
    </div>

    <div id="id01" class="w3-modal  w3-animate-opacity">
    <div class="w3-modal-content rounded w3-card-4" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

        <div id="Paris" class="w3-container mt-4">
        <hr>
            <h2>Deseja remover o registro cadastrado?</h2>

        </div>


      <div class="w3-container rounded w3-border-top w3-padding-16 w3-light-grey">
       
   
        <a class="btn btn-danger btn-lg " onclick="document.getElementById('id01').style.display='none'">
            Não
        </a>  
        <a  id="img01" class="btn btn-success btn-lg ">
            Sim
        </a>      
    </div>


    </div>
  </div>
    
</main>
<script src="assets/vendor/fullcalendar/main.min.js"></script>


<script>
(function(win,doc){

    let calendarEl = doc.querySelector('.calendar')
    let calendar = new FullCalendar.Calendar(calendarEl, {
        height: 400,
        allDaySlot: false,
        initialView:  '<?= $initialview ?>', 
        initialDate: '<?= $initialDate ?>', 
        headerToolbar: {
            start: 'title', // will normally be on the left. if RTL, will be on the right
            center: 'dayGridMonth,timeGridWeek',
            end: 'todayButton,prevsButton,nextsButton' // will normally be on the right. if RTL, will be on the left
        },
        locale: 'pt-br',
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
        },
        dateClick: function(info) {
           
            window.location.href="ProfPac.php?calendar="+ info.dateStr
            // change the day's background color just for fun
           // info.dayEl.style.backgroundColor = 'green';
           // timeGridWeek
           let viewvx2 = calendar; 
           console.log(viewvx2);
        },
        customButtons: {
            prevsButton: {
                text: 'voltar',
                icon:'chevron-left',
                click: function() {
                let viewvx = calendar.view;
                let viewvx2 = calendar; 
                let currentday = viewvx2.currentData.calendarOptions.initialDate;
                let viewvxs='';
                if(viewvx.type == 'dayGridMonth'){
                    viewvxs='month'
                }else{
                    viewvxs='week'
                }
               // console.log(viewvx2)
                window.location.href="ListaProfPac.php?view="
                +viewvxs+"&next=1"+"&currentday="+currentday
                }
                
            },
            todayButton: {
                text: 'Hoje',
                click: function() {
                let viewvx = calendar.view;
                let viewvx2 = calendar; 
                let currentday = viewvx2.currentData.calendarOptions.initialDate;
                let viewvxs='';
                if(viewvx.type == 'dayGridMonth'){
                    viewvxs='month'
                }else{
                    viewvxs='week'
                }
               // console.log(viewvx2)
               window.location.href="ListaProfPac.php?view="
                +viewvxs+"&next=3"+"&currentday="+currentday
                }
                
            },
            nextsButton: {
            text: 'adiantar',
            icon:'chevron-right',

            click: function() {
                let viewvx = calendar.view;
                let viewvx2 = calendar; 
                let currentday = viewvx2.currentData.calendarOptions.initialDate;
                let viewvxs='';
                if(viewvx.type == 'dayGridMonth'){
                    viewvxs='month'
                }else{
                    viewvxs='week'
                }
                console.log(currentday)
                
                window.location.href="ListaProfPac.php?view="
                +viewvxs+"&next=2"+"&currentday="+currentday
            }
            }

        },
            events:[
                <?php foreach($listasprofpac as $profpac): ?>                  
                    {
                    url: 'ProfPac.php?view=<?= $profpac->id ?>',
                    title: '<?= $profpac->descricao?>',
                    start: '<?= $profpac->dataInicial ?>',
                    end: '<?= $profpac->dataFinal ?>',
                    color: '#007BFF',     // an option!
                    textColor: 'white', // an option!
                    backgroundColor: '#007BFF', // an option!

                    },    
                <?php endforeach; ?>

                ] 

    });
    calendar.render();

})(window,document)

function slcProfPacGrafico() {  

      if($("#desenhoProfpac" ).hasClass( "w3-show" ) == true){

        $("#desenhoProfpac").removeClass("w3-show");
        $("#desenhoProfpac").addClass("w3-hide");

        $("#listaProfpac").removeClass("w3-hide");
        $("#listaProfpac").addClass("w3-show");
        
        
      }else {
        $("#desenhoProfpac").removeClass("w3-hide");
        $("#desenhoProfpac").addClass("w3-show");

        $("#listaProfpac").removeClass("w3-show");
        $("#listaProfpac").addClass("w3-hide");
      }
}
  

function myDeletes(event,elmnt,clr) {
    event.preventDefault()
    document.getElementById("id01").style.display = "block";
    document.getElementById("img01").href = elmnt.href;
}
</script>

<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/cuidador.js"></script>
</body>
</html>