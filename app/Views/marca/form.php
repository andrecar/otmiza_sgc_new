<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<!-- script para chamada o formulario modal com autofocus -->
<script type="text/javascript">
	/**
	 * Chama o modal Adicionar Marca
	 */		
	$(document).ready(function() {
    $('#modalAdicionarMarca').modal('show');
	$('#modalAdicionarMarca').on('shown.bs.modal', function () {
    $('#descricao').focus();
})
	});	
</script>


<!--## formulário Modal Adicionar Grade ###-->
<div class="modal fade bd-example" id="modalAdicionarMarca" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="page-header widget-style1 col-md-12 mb-0  " style="background-color: lightsteelblue;">
					<div class="row">
						<div class="col-md-3 col-sm-5">
							<div class="progress-data">
								<img src="<?php echo $imagem ?>" alt="">
							</div>
						</div>	
						<div class="col-md-9 col-sm-6 text-center">
							<div class="title h2 ">
								<?php echo $titulo ; ?>
							</div>
						</div>
					</div>	                
				</div>        
			</div>			
			<div class="modal-body">				
				<?php  echo form_open('marca/salvar'); ?>					
				<div class="row justify-content-sm-center ">
					<div class="row">
						<div class="form-group">
							<div class="col-sm-12 col-md-12 text-center">
								<label for="descricao" class="control-label">DESCRIÇÃO</label>
								<input type="text" name="descricao" id="descricao" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($marca) ? $marca['descricao'] : set_value('descricao') ?>">
								<?php if (!empty($errors['descricao'])): ?>
									<div class="alert alert-danger mt-2">
										<?php echo $errors['descricao']; ?>
									</div>
								<?php endif; ?>	
							</div>
						</div>
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
					<button type="submit" class="btn btn-outline-dark  border-radius">SALVAR</button>
				</div>
				<input type="hidden" name="id" value="<?php echo isset($marca) ? $marca['id'] : set_value('id') ?>">
	
				<?php  echo form_close(); ?>		
			</div>
		</div>
	</div>
</div>

<?php echo $this->endSection('container') ?>