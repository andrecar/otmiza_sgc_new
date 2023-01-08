<?php echo $this->extend('_common/layout') ?>
<?php echo $this->section('container') ?>

<!-- chamada da função modal -->
<script type="text/javascript">
$(window).load(function() {
	$('#modalVisualizar').modal('show');
});
</script>

<div class="modal fade bd-example-modal-lg" id="modalVisualizar" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="page-header widget-style1 col-md-12 mb-0  " style="background-color: lightsteelblue;">
					<div class="row">
						<div class="col-md-2 col-sm-2">
							<div class="progress-data">
								<img src="<?php echo $imagem ?>" alt="">
							</div>
						</div>	
						<div class="col-md-10 col-sm-10">
							<div class="title h3 text-center ">
								<?php echo $titulo ; ?>
							</div>
						</div>
					</div>	                
				</div>        
			</div>
			<div class="modal-body">
				<dl class="row">		
					<dt class="col-sm-4">ID</dt>												
					<dd class="col-sm-8"><?php  echo $tecidos['id'] ?></dd>
					<dt class="col-sm-4">Marca</dt>												
					<dd class="col-sm-8"><?php  echo $marcaTecidos['descricao'] ?></dd>
					<dt class="col-sm-4">Tipo</dt>		
					<dd class="col-sm-8"><?php echo $tecidos['tipo'] ?></dd>
					<dt class="col-sm-4">Composição</dt>		
					<dd class="col-sm-8"><?php echo $tecidos['composicao'] ?></dd>
				</dl>
            </div>    				
			<div class="modal-footer mt-0">
				<button type="button" class="btn btn-outline-dark border-radius"> <a href="<?php echo base_url("tecido/edit/{$tecidos['id']}") ?>"><i class="dw dw-edit2"></i> EDITAR</a></button>
				<button type="button" class="btn btn-outline-danger border-radius" data-dismiss="modal" onclick="history.go(-1);">SAIR</button>
			</div>
		</div>	
    </div>
</div>
<?php echo $this->endSection('container') ?>

<input type="hidden" name="id" value="<?php echo isset($tecidos) ? $tecidos['id'] : set_value('id') ?>">

