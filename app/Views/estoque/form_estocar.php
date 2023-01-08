<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!--##### fom_modelo #####--> 
<div class="container">
	<?php echo form_open('grade/salvar'); ?>
		<div class="row justify-content-sm-center ">
			<div class="col-sm-4 col-md-4">
				<label for="tamanho" class="control-label mt-2 mb-0 ml-2 text-center">TAMANHO </label>
				<div class="form-group d-flex">
					<input type="text" name="tamanho" id="referencia" class="form-control text-center" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($grade) ? $grade['tamanho'] : set_value('tamanho') ?>" autofocus>
					<?php if (!empty($errors['tamanho'])): ?>
						<div class="alert alert-danger mt-2">
							<?php echo $errors['tamanho']; ?>
						</div>
					<?php endif; ?>	
					<button type="submit" class="btn btn-outline-dark  mx-2 border-radius">
						<?php echo $botao ?>
					</button>
				</div>
			</div>
		</div>	
		<!-- campo invisivel para identificar o id do usuário  -->
		<input type="hidden" name="id" value="<?php echo isset($grade) ? $grade['id'] : set_value('id') ?>">
	    <input type="hidden" name="modelo_id" value="<?php  echo $id_modelo ?>">
	<?php echo form_close() ; ?>
</div>

<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>