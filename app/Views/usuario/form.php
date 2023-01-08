<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!--##### fom_usuario #####-->
<div class="container">
	<?php echo form_open('usuario/salvar'); ?>
		<div class="row">
			<div class="col-sm-8 col-md-8">
				<label for="nome" class="control-label mt-2 mb-0 ml-2"> NOME </label>
				<input type="text" name="nome" id="nome" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($usuario) ? $usuario['nome'] : set_value('nome') ?>" autofocus>
				<?php if (!empty($errors['nome'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['nome']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-4 col-md-4">
				<label for="login" class="control-label mt-2 mb-0 ml-2">LOGIN</label>
				<input type="text" name="login" id="login" class="form-control" value="<?php echo isset($usuario) ? $usuario['login'] : set_value('login') ?>">
				<?php if (!empty($errors['login'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['login']; ?> 
					</div>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-md-8">
				<label for="email" class="control-label mt-2 mb-0 ml-2" >E-MAIL</label>
				<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($usuario) ? $usuario['email'] : set_value('email') ?>">
				<?php if (!empty($errors['email'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['email']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-4 col-md-4">
				<label for="senha" class="control-label mt-2 mb-0 ml-2">SENHA</label>
				<input type="password" name="senha" id="senha" class="form-control" value="<?php echo isset($usuario) ? $usuario['senha'] : set_value('senha') ?>">
				<?php if (!empty($errors['senha'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['senha']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-md-8">
				<label for="telefone" class="control-label mt-2 mb-0 ml-2" >TELEFONE</label>
				<input type="text" name="telefone" id="telefone" class="form-control" data-mask="(##)#.####-####" value="<?php echo isset($usuario) ? $usuario['telefone'] : set_value('telefone') ?>">
				<?php if (!empty($errors['telefone'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['telefone']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-md-4">
				<label for="permissao_id" class="control-label mt-2 mb-0 ml-2">Permissão</label>
				<?php $options = [
						'' => 'Selecionar...',	                           
						'1' => 'ADMINISTRADOR',
						'2' => 'USUARIO'
					] ; ?>
					<?php echo form_dropdown('permissao_id', $options, !empty($usuario['permissao_id']) ? $usuario['permissao_id'] : set_value('permissao_id'), ['id' => 'permissao_id', 'class' => 'custom-select'])?>
					<?php if (!empty($errors['permissao_id'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['permissao_id']; ?>
					</div>
				<?php endif; ?>	
			</div>   
		</div>  
		<div class="modal-footer mt-3">
			<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
			<button type="submit" class="btn btn-outline-success border-radius">SALVAR</button>
		</div>
		<!-- campo invisivel para identificar o id do usuário  -->
		<input type="hidden" name="id" value="<?php echo isset($usuario) ? $usuario['id'] : set_value('id') ?>">
	<?php echo form_close() ; ?>  
</div>

<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>