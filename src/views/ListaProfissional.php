<script src="assets/js/MenuListaProfissional.js"> </script>
<main class="content w3-animate-opacity" >
<?php
include(TEMPLATE_PATH . "/messages.php");
?>

    
    
    <div class="caixa-lista-paciente2">  
        <div class="caixa-lista-paciente-titulo">
            <?php renderTitle($title) ?>
            
        </div>

        <div class="caixa-lista-paciente-conteudo">
        <div class="mb-4 mt-2  posicao-form " >
                <div class="posicao-form-esquerda ">
    


                
                </div>
                <div class="posicao-form-direita mb-1">

                    
                </div>
            
            </div>
            <div id="desenhoProfpac" >
                <div class="calendar mb-4"></div>
            </div>
        
            
        </div>
    </div>


    
</main>
<script src="assets/vendor/fullcalendar/main.min.js"></script>
<script src="assets/js/lista_paciente.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/cuidador.js"></script>

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
                <?php foreach($listaProfissionais as $profpac): ?>                  
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
</script>
</body>
</html>