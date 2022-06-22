

<main class="content">

    
    <div class="caixa-Lista-paciente">  
        <div class="caixa-titulo">
            <h2>Lista de paciente</h2>
        </div>
        <table class="table table-bordered table-striped table-hover">
			<thead>
				<th>valor Sinal vital</th>
				<th>valor 1</th>
				<th>valor 2</th>

			</thead>
			<tbody>
				<?php foreach($report as $registry): ?>
					<tr>
                    <td><?= $registry->sinalVital ?></td>
						<td><?= $registry->valor1 ?></td>
						<td><?= $registry->valor2 ?></td>
					</tr>
				<?php endforeach ?>
				<tr class="bg-primary text-white">
					<td>Horas Trabalhadas</td>
					<td colspan="3"><?= $sumOfWorkedTime ?></td>
					<td>Saldo Mensal</td>
					<td><?= $balance ?></td>
				</tr>
			</tbody>	
		</table>
    </div>


    
</main>

<script>
setInterval(function(){
    window.location.reload() 
    },2000)
</script>
<script src="assets/js/app.js"></script>
</body>
</html>