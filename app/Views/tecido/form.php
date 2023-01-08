<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!--##### formulário tecidos #####-->
<div class="container">
	<?php echo form_open('tecido/salvar'); ?>
		<div class="row">
			<div class="col-sm-6 col-md-6">	
				<label for="marca_id" class="control-label mt-2 mb-0 ml-2"> MARCA </label>
					<?php echo form_dropdown('marca_id', $formDropDown, isset($tecido) ? $tecido['marca_id'] : set_value('marca_id'),  ['id' => 'marca_id', 'class' => 'custom-select', 'autofocus' => true, ]) ?>
					<?php if (!empty($errors['marca_id'])): ?> 
						<div class="alert alert-danger mt-2">
							<?php echo $errors['marca_id']; ?>
						</div>
					<?php endif; ?>	
				<div class="text-center mt-2">
					<a href="<?php echo base_url("marca") ?> ">
						<i class="dw dw-edit2"></i> 
						Adicionar/Editar MARCA
					</a>
				</div>					
			</div>				
		</div>			
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<label for="tipo" class="control-label mt-2 mb-0 ml-2"> TIPO </label>
				<input type="text" class="form-control" name="tipo" id="tipo" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($tecido) ? $tecido['tipo'] : set_value('tipo') ?>">
				<?php if (!empty($errors['tipo'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['tipo']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>			
		<div class="row">		
			<div class="col-sm-6 col-md-6">
				<label for="composicao" class="control-label mt-2 mb-0 ml-2"> COMPOSIÇÃO </label>
				<textarea type="text" class="form-control" name="composicao" id="composicao"  oninput="this.value = this.value.toUpperCase()"><?php echo isset($tecido) ? $tecido['composicao'] : set_value('composicao') ?></textarea>
				<?php if (!empty($errors['composicao'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['composicao']; ?>
					</div>
				<?php endif; ?>	
			</div>	
		</div>					
		<div class="modal-footer mt-3">
			<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
			<button type="submit" class="btn btn-outline-success border-radius">SALVAR</button>
		</div>
		<!-- campo invisivel para identificar o id do usuário  -->
		<input type="hidden" name="id" value="<?php echo isset($tecido) ? $tecido['id'] : set_value('id') ?>">
	<?php echo form_close() ; ?>  
</div>

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
						<di class="form-group">
							<div class="col-md-12 col-sm-6">
								<label for="marca" class="control-label col-md-12 col-sm-6  text-center">ADICIONAR MARCA </label>
								<input type="text" name="marca" id="marca" class="form-control" oninput="this.value = this.value.toUpperCase()" required>
								<div id="erro_marca"></div>
							</div>
						</di>
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
					<button type="submit" class="btn btn-outline-dark  border-radius">SALVAR</button>
				</div>
				<?php  echo form_close(); ?>		
			</div>
		</div>
	</div>
</div>

<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>