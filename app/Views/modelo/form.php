<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<script>
    function confirmar() {
    if (!confirm("Deseja excluir O TAMANHO DO MODELO?")) {
        return false;
    } 
        return true;    
    }
</script>

<!--##### fom_modelo #####-->
<div class="container">
	<?php echo form_open('modelo/salvar'); ?>
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<label for="cliente_id" class="control-label mt-2 mb-0 ml-2">SELECIONAR CLIENTE</label>				
					<?php echo form_dropdown('cliente_id', $formDropDown, isset($modelo) ? $modelo['cliente_id'] : set_value('cliente_id'), ['id' => 'cliente_id','class' => 'custom-select', 'autofocus' => true]) ?>
					<?php if (!empty($errors['cliente_id'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['cliente_id']; ?>						
					</div>
				<?php endif; ?>	
			</div>   
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<label for="referencia" class="control-label mt-2 mb-0 ml-2"> REFERÊNCIA </label>
				<input type="text" name="referencia" id="referencia" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($modelo) ? $modelo['referencia'] : set_value('referencia') ?>">
				<?php if (!empty($errors['referencia'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['referencia']; ?>
					</div>
				<?php endif; ?>	
			</div>
			<div class="col-sm-8 col-md-8">
				<label for="descricao" class="control-label mt-2 mb-0 ml-2">DESCRIÇÃO</label>
				<input type="text" name="descricao" id="descricao" class="form-control" oninput="this.value = this.value.toUpperCase()" value="<?php echo isset($modelo) ? $modelo['descricao'] : set_value('descricao') ?>">
				<?php if (!empty($errors['descricao'])): ?>
					<div class="alert alert-danger mt-2">
						<?php echo $errors['descricao']; ?>
					</div>
				<?php endif; ?>	
			</div>
		</div>
		<!-- Card Adicionar tamanhos -->
		<div class="card bg-light-blue mt-3">
			<?php if (isset($modelo['id'])) : ?>
				<div class="card-header p-2">
					<a href="<?php echo base_url("grade/formulario/{$modelo['id']}") ?>">
						<div class=" text-center font-24">
							<i class="dw dw-edit2"></i>
								ADICIONAR TAMANHOS
						</div>
					</a>
				</div>
			<?php else : ?>
				<div class="card-header">
					<a href="javascript:;" data-toggle="modal" data-target="#warning-modal">
						<div class="text-center font-24">
							<i class="dw dw-edit2"></i>	
								ADICIONAR TAMANHOS
						</div>		
					</a>
				</div>
			<?php endif; ?>	
			<!-- Modal de Atenção "Salvar antes de adicionar os tamanhos" -->			
				<div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered">
						<div class="modal-content bg-warning">
							<div class="modal-body text-center">
								<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO</h3>
								<p class=" font-30">Primeiro salve o MODELO!... <br> Depois adicione os TAMANHOS</p>
								<button type="button" class="btn btn-outline-dark border-radius" data-dismiss="modal">Ok</button>
							</div>
						</div>
					</div>
				</div>
			<!-- Fim - Modal de Atenção -->	
			<!-- MSG tamanhos "adicionado, editado ou excluído" com sucesso -->		
			<?php $mensagem = session()->getFlashdata('mensagem_grade') ?>
			<?php if (!empty($mensagem)) : ?>
				<div class="alert alert-dark text-blue text-center mb-0"><?php echo $mensagem ?></div>
			<?php endif; ?>
			<!-- Fim mensagens -->
			<!-- Grade -->
			<?php if (isset($modelo['id'])) : ?> 
				<?php if (count($gradeModelos) > 0) : ?>
					<ul class="list-group list-group-horizontal justify-content-center p-2">					
						<?php foreach($gradeModelos as $gradeModelo) : ?>
							<li class="list-group-item text-primary p-2 font-30 text-center" style="background-color: lightsteelblue;"><?php echo $gradeModelo['tamanho'] ?>
								<div class="mt-1">
									<a class="btn btn-sm btn-outline-dark mt-1" title="Editar tamanho" href="<?php echo base_url("grade/edit/{$gradeModelo['id']}/{$modelo['id']}") ?>"><i class="dw dw-edit2"></i></a>
									<a class="btn btn-sm btn-outline-danger mt-1" title="Excluir tamanho" href="<?php echo base_url("grade/excluir/{$gradeModelo['id']}/{$modelo['id']}") ?>" onclick="return confirmar()"><i class="dw dw-delete-3"></i></a>
								</div>
							</li>
						<?php endforeach ?>						
					</ul> 
				<?php else : ?>	
					<div class="alert bg-warning text-center mb-0">
						<h3><i class="fa fa-exclamation-triangle"></i> ATENÇÃO</h3>
						<p class=" font-24 m-0">"Modelo sem os TAMANHOS cadastrado!..."</p>	
					</div>
				<?php endif ?>	
			<?php endif ?>	
			<!-- Fim Grade  -->
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-danger border-radius"  onclick="history.go(-1)">CANCELAR</button>
			<button type="submit" class="btn btn-outline-success border-radius">SALVAR</button>
		</div>
		<!-- campo invisivel para identificar o id do usuário  -->
		<input type="hidden" name="id" value="<?php echo isset($modelo) ? $modelo['id'] : set_value('id') ?>">
	<?php echo form_close() ; ?>
</div>

<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>