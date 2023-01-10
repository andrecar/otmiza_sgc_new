<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?> 

<!-- Faixa carregando -->
<div class="pre-loader">
	<div class="pre-loader-box">
		<div class="loader-logo"><img src="assets/src/images/logo_sis_corte.png" alt=""></div>
		<div class='loader-progress' id="progress_div">
			<div class='bar' id='bar1'></div>
		</div>
		<div class='percent' id='percent1'>100%</div>
		<div class="loading-text">
			Carregando...
		</div>
	</div>
</div>
<!-- Página HOME -->
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="row">
			<div class="col-xl-3 mb-20 mt-0">
				<div class="card-box height-100-p widget-style1"  style="background-color: lightsteelblue;">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<img src="assets/src/images/img_clientes.png" alt="">
						</div>
						<div class="widget-data">
							<div class="h2 mb-0 text-center text-primary ">75</div>
							<div class="weight-400 text-center font-16">CLIENTES</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 mb-20">
				<div class="card-box height-100-p widget-style1" style="background-color: lightsteelblue;">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<img src="assets/src/images/img_agenda.png" alt="">
						</div>
						<div class="widget-data">
							<div class="h2 mb-0 text-center text-info">12</div>
							<div class="weight-400 text-center font-16">CORTES AGENDADOS</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 mb-20">
				<div class="card-box height-100-p widget-style1" style="background-color: lightsteelblue;">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<img src="assets/src/images/img_vendas.png" alt="">
						</div>
						<div class="widget-data">
							<div class="h2 mb-0 text-center text-danger">28</div>
							<div class="weight-400 text-center font-16">NOTAS: <?php echo date("d/m/Y"); ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 mb-20">
				<div class="card-box height-100-p widget-style1" style="background-color: lightsteelblue;">
					<div class="d-flex flex-wrap align-items-center">
						<div class="progress-data">
							<img src="assets/src/images/img_money2.png" alt="">
						</div>
						<div class="widget-data">
							<div class="h2 mb-0 text-center text-success">R$ 785,42</div>
							<div class="weight-400 text-center font-16">TOTAL: <?php echo date("d/m/Y"); ?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6 mb-30">
				<div class="card-box height-100-p pd-20">
					<h2 class="h4 mb-20">Gráficos</h2>
					<div id="chart5"></div>
				</div>
			</div>
			<!-- calendar -->
			<div class="col-xl-6  mb-30">
				<div class="min-height-200px">
					<div class="pd-20 card-box">
						<div class="calendar-wrap">
							<div id="calendar"></div>
						</div>
						<!-- calendar modal -->
						<div id="modal-view-event" class="modal modal-top fade calendar-modal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-body">
										<h4 class="h4"><span class="event-icon weight-400 mr-3"></span><span class="event-title"></span></h4>
										<div class="event-body"></div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>		
						<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<form id="add-event">
										<div class="modal-body">
											<h4 class="text-blue h4 mb-10">Detalhes do Evento</h4>
											<div class="form-group">
												<label>Nome do Evento</label>
												<input type="text" class="form-control" name="ename">
											</div>
											<div class="form-group">
												<label>Data do Evento</label>
												<input type='text' class="datetimepicker form-control" name="edate">
											</div>
											<div class="form-group">
												<label>Descrição do evento</label>
												<textarea class="form-control" name="edesc"></textarea>
											</div>
											<div class="form-group">
												<label>Evento cor</label>
												<select class="form-control" name="ecolor">
													<option value="fc-bg-default">padrão</option>
													<option value="fc-bg-blue">Azul</option>
													<option value="fc-bg-lightgreen">Verde</option>
													<option value="fc-bg-pinkred">Vermelho</option>
													<option value="fc-bg-deepskyblue">Azul Celeste</option>
												</select>
											</div>
											<div class="form-group">
												<label>Event Icon</label>
												<select class="form-control" name="eicon">
													<option value="circle">ciclo</option>
													<option value="cog">cog</option>
													<option value="group">grupo</option>
													<option value="suitcase">suitcase</option>
													<option value="calendar">calendar</option>
												</select>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" >Salvar</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>					
			</div>
		</div>
		<div class="card-box mb-30">
			<h2 class="h4 pd-20">AGENDA DE CORTES</h2>
			<!-- Tabela -->
			<div class="clearfix">
				<button type="button" class="btn btn-outline-dark border-radius mb-2 ml-2" data-toggle="modal" data-target="#agendamento">
                     <i class="micon dw dw-file2"></i>	
						NOVO AGENDAMENTO
				</button>
			</div>				
			<table class="table table-hover table-responsive-xl">
				<thead>
					<tr>
						<th>SEQ.</th>							
						<th>DATA </th>							
						<th>CLIENTE</th>
						<th>MODELO</th>
						<th>TECIDO</th>
						<th>QUANT.</th>						
						<th class="text-center">OPÇÕES</th>
					</tr>
				</thead>
				<tbody>
					<?php // foreach ($usuarios as $usuario) : ?>
						<tr class="text-primary">
							<td><?php //echo $usuario['id'] ?>01</td> 
							<td><?php //echo $usuario['id'] ?>25/07/2022</td> 
							<td><?php //echo $usuario['nome'] ?>COLAGEM JEANS WEAR</td>
							<td><?php //echo $usuario['login'] ?>2589-CALÇA FEMININA</td>
							<td><?php //echo $usuario['login'] ?>CEDRO-KAZAM</td>
							<td><?php //echo $usuario['login'] ?>200,00 MTS</td>
							<td class="text-center">
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> VISUALIZAR</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> EDITAR</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> EXCLUIR</a>
									</div>
								</div>							
							</td>
						</tr>
					<?php // endforeach; ?>
				</tbody>
			</table>	
		</div>
	</div>
</div>

<!-- Modal AGENDA-->
<div class="modal fade" id="agendamento" tabindex="-1" role="dialog" aria-labelledby="modal fade bd-example-modal-xl" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-light-gray">
            <div class="page-header m-3" style="background-color: lightsteelblue;">
                <h3 class="modal-title text-center" id="agendamento">NOVO AGENDAMENTO</h3>               
            </div>   
			<div class="modal-body">
				<form method="post">
					<!--================================================================================================ -->
					<div class="row">
					    <div class="col-md-12">
		                    <label class="control-label mt-2 mb-0 ml-2">Cliente</label>
		                    <select name="cliente" class="form-control" onchange="location = this.value;">
		                       <option value="#">JOSE LAZARO</option>
		                       <option value="#">EDNALDO LIRA</option>
		                       <option value="#">SERGIO ARAUJO</option>
		                    </select>
						</div>
					</div>
					<div class="row">
					    <div class="col-md-12">
		                    <label class="control-label mt-2 mb-0 ml-2">Modelo</label>
		                    <select name="modeo" class="form-control" onchange="location = this.value;">
		                       <option value="#">2532 - SAIA ADULTO</option>
		                       <option value="#">3587 - CALÇA FEMININA</option>
		                       <option value="#">3587 - BERMUDA</option>
		                       <option value="<?php echo base_url('modelo/index') ?>">ADD MODELO</option>
		                    </select>
						</div>
					</div>	
					<div class="row">
					    <div class="col-md-12">
		                    <label class="control-label mt-2 mb-0 ml-2">Tecido</label>
		                    <select name="categotecidoria" class="form-control" onchange="location = this.value;">
		                       <option value="#">NEW ATI - CEDRO</option>
		                       <option value="#">MONALIZA - TEAR</option>
		                       <option value="#">TEXAS - JOLITEX</option>
		                       <option value="<?php echo base_url('tecido/index') ?>">ADD TECIDO</option>
		                    </select>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-4">
							<label for="quantidade" class="control-label mt-2 mb-0 ml-2">Quant.</label>
		                    <input name="quantidade" type="text" class="form-control" id="quantidade" placeholder="Quant">
				        </div>
						<div class="col-md-4">
							<label class="control-label mt-2 mb-0 ml-2">Unid.</label>
							<select name="unidade" class="form-control" onchange="location = this.value;">
							   <option value="#">ROLOS</option>
							   <option value="#">METROS</option>
							   <option value="#">KILOS</option>							   
							</select>
						</div>
					</div>
					<!-- GRADE ================================================================================================ -->
					
					<div class="modal-footer mt-3">
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal">CANCELAR</button>
						<button type="submit" class="btn btn-outline-success">AGENDAR</button>
					</div>
				</form>  
			</div>  
		</div>
	</div>
</div>
			
<!-- Modal AGENDA -->


<?php echo $this->endSection('container') ?> 
			