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
					<dt class="col-sm-4">Cliente</dt>		
					<dd class="col-sm-8"><?php echo $clientes['nome_razao'] ?></dd>
					<dt class="col-sm-4">Responsável</dt>												
					<dd class="col-sm-8"><?php echo $clientes['responsavel'] ?></dd>
					<dt class="col-sm-4">Nascimento</dt>												
					<dd class="col-sm-8"><?php echo $clientes['nascimento'] ?></dd>
					<dt class="col-sm-4">Documentos</dt>												
					<dd class="col-sm-8"><?php echo 'CPF/CNPJ nº '.$clientes['cpf_cnpj'] ?></dd>
					<dt class="col-sm-4"></dt>												
					<dd class="col-sm-8"><?php echo 'RG/Escrição nº '.$clientes['rg_escricao'] ?></dd>
					<dt class="col-sm-4">Endereço</dt>												
					<dd class="col-sm-8"><?php echo $clientes['logradouro'].', '.$clientes['numero'].' - '.$clientes['bairro'].'-'.$clientes['cidade'].' - '.$clientes['estado'].' - '.$clientes['cep'] ?></dd>
					<dt class="col-sm-4">Contatos</dt>												
					<dd class="col-sm-8">Tel: <?php echo $clientes['telefone_1'].' <=> '.$clientes['telefone_2'] ?></dd>
					<dt class="col-sm-4"></dt>												
					<dd class="col-sm-8">e-mail: <?php echo $clientes['email'] ?></dd>
					<dt class="col-sm-4">Ponto de referência</dt>												
					<dd class="col-sm-8"><?php echo $clientes['ponto_referencia'] ?></dd>
				</dl>
			</div>
			<div class="modal-footer mt-0">
				<button type="button" class="btn btn-outline-dark border-radius"> <a href="<?php echo base_url("cliente/edit/{$clientes['id']}") ?>"><i class="dw dw-edit2"></i> EDITAR</a></button>
				<button type="button" class="btn btn-outline-danger border-radius" data-dismiss="modal" onclick="history.go(-1);">SAIR</button>
			</div>
		</div>	
    </div>
</div>
<?php echo $this->endSection('container') ?>

<input type="hidden" name="id" value="<?php echo isset($clientes) ? $clientes['id'] : set_value('id') ?>">

