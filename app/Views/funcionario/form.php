<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!--##### fom_tecido#####-->
<div class="container">
	<?php echo form_open('funcionario/salvar'); ?>
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<label for="nome" class="control-label mt-2 mb-0 ml-2"> NOME </label>
				<input type="text" name="nome" id="nome" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($funcionario) ? $funcionario['nome'] : set_value('nome') ?>">
				<?php if (!empty($errors['nome'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['nome']; ?>
					</div>
				<?php endif; ?>	
			</div>			
		</div>			
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<label for="cargo_id" class="control-label mt-2 mb-0 ml-2"> CARGO </label>
				<?php echo form_dropdown('cargo_id', $formDropDown, isset($funcionario) ? $funcionario['cargo_id'] : set_value('cargo_id'),  ['id' => 'cargo_id', 'class' => 'custom-select', 'autofocus' => true ])  ?>
				<?php if (!empty($errors['cargo_id'])): ?> 
					<div class="alert alert-danger mt-2">
						<?php echo $errors['cargo_id']; ?>
					</div>
				<?php endif; ?>		
				<div class="text-center mt-2">
					<a href="<?php echo base_url("cargo") ?> ">
						<i class="dw dw-edit2"></i> 
						Adicionar/Editar CARGO
					</a>
				</div>						
			</div>
		</div>				
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<label for="telefone" class="control-label mt-2 mb-0 ml-2">FONE</label>
				<input type="text" name="telefone" id="telefone" class="form-control" data-mask="(##)#.####-####" value="<?php echo isset($funcionario) ? $funcionario['telefone'] : set_value('telefone') ?>">
				<?php if (!empty($errors['telefone'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['telefone']; ?>
					</div>
				<?php endif; ?>	
			</div>					
		</div>					
		<div class="modal-footer mt-3">
			<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
			<button type="submit" class="btn btn-outline-success border-radius">SALVAR</button>
		</div>
		<!-- campo invisivel para identificar o id do usuário  -->
		<input type="hidden" name="id" value="<?php echo isset($funcionario) ? $funcionario['id'] : set_value('id') ?>">
	<?php echo form_close() ; ?>  
</div>

<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>