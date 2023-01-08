<?php echo $this->extend('_common/layout') ?>
<?php echo $this->section('container') ?>

<!-- script para chamada da função modal com autofocus -->
<script type="text/javascript">
	$(window).load(function() {
		$('#modalGrade').modal('show')
	});

	$(document).ready(function() {
  		$('#modalGrade').on('shown.bs.modal', function() {
    $('#tamanho').trigger('focus');
  });
});
</script>
<!--## formulário Modal Adicionar Grade ###-->
<div class="modal fade bd-example" id="modalGrade" tabindex="-1" role="dialog">
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
			<div class=" card">
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<dt class="col-sm-12 text-center">Referência e Modelo</dt>		
						<dd class="col-sm-12 text-center"><?php echo $modelos['referencia']. ' - ' .$modelos['descricao'] ?></dd>
					</div>
				</div>	
			</div>
			<?php echo form_open('grade/salvar'); ?>
			<div class="modal-body">
				<div class="row justify-content-sm-center ">
					<div class="row">
						<div class="col-md-12 col-sm-6">
							<label for="tamanho" class="control-label col-md-12 col-sm-6  text-center">TAMANHO </label>
							<input type="text" name="tamanho" id="tamanho" class="form-control text-center" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($grade) ? $grade['tamanho'] : set_value('tamanho') ?>" required>
						</div>
					</div>	
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
				<button type="submit" class="btn btn-outline-dark  border-radius">
					<?php echo $botao ?>
				</button>
			</div>		
				<!-- campo invisível para identificar o id do usuário  -->
				<input type="hidden" name="id" value="<?php echo isset($grade) ? $grade['id'] : set_value('id') ?>">
				<input type="hidden" name="modelo_id" value="<?php  echo $id_modelo ?>">
			<?php echo form_close() ; ?>
		</div>
	</div>
</div>


				

<?php echo $this->endSection('container') ?>