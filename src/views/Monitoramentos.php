<script src="assets/js/MenuMonitoramentos.js"> </script>
<main class="content w3-animate-opacity">
    <?php
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="mon-pac">
    <div class="mon-titulo">
        <h5>Aplicativo concentrador </h5>
    </div>
    <iframe class="monitoramento" src="http://<?= $_SESSION['IPIN'][0] ?>/concentrador/concentrador.php?<?= $data?>"  allowfullscreen></iframe>
    </div>
   

    
   
</main>


<script src="assets/js/app.js"></script>
</body>
</html>

