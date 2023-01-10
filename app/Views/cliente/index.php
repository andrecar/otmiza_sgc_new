<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!-- INDEX CLIENTE -->

<script>
    function confirmar() {
    if (!confirm("Deseja excluir cliente?")) {
        return false;
    } 
        return true;    
    }
</script>


<!-- CardBox CLIENTE -->
<div class="row">
	<div class="col-xl-6">
		<div class="card-box pd-10 bg-dark text-white mb-2">
			<div class="d-flex flex-wrap align-items-center">							
				<div class="widget-data">
					<div class="font-20 mx-2"><?php echo count($clientes) ?> - Cadastros Encontrados</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pesquisa de CLIENTE -->
	<div class="col-xl-6 ">
		<form class="form-group" method="GET" action="<?php  echo base_url('cliente'); ?>">
			<div class="form-group d-flex justify-content-center justify-content-sm-between">
				<i class="dw dw-search2 my-auto"></i>
				<input class="form-control search-input mx-2" type="search" name="pesquisar" autocomplete="off" oninput="this.value = this.value.toUpperCase()" value="<?php echo $pesquisar ?>" placeholder="Pesquisar...">
				<button type="submit" class="btn-dark btn-sm mx-2">
					OK
				</button>
			</div>
		</form>
	</div>
</div>
<!-- Tabela -->
<div class="pd-10 card-box mb-10">
	<div class="clearfix">				
		<a href="<?php echo base_url('cliente/formulario_pf') ?>">		
		<button type="button" class="btn btn-outline-dark border-radius mb-2">
		<i class="micon dw dw-add-user"></i> 
				NOVO CLIENTE - P. FÍSICA
		</button>
		</a>
		<a href="<?php echo base_url('cliente/formulario_pj') ?>">		
		<button type="button" class="btn btn-outline-dark border-radius mb-2">
		<i class="micon dw dw-factory1"></i> 		
				NOVO CLIENTE - P. JURÍDICA
		</button>
		</a>
	</div>
	<div class="card-box">
		<table class="table table-hover table-responsive-xl">
			<thead>
				<tr>					
					<th>NOME</th>
					<th>CADASTRO</th>
					<th>CPF/CNPJ</th>
					<th class="text-center">CONTATOS</th>
					<th class="text-center">OPÇÕES</th>					
				</tr>
			</thead>
			<tbody>
				<?php if (count($clientes) > 0 ) : ?>				
				<?php foreach ($clientes as $cliente) : ?>
					<?php $cliente_text_color = $cliente['tipo_cadastro'] == '2' ? 'class="text-primary"' : 'class="text-success"' ?>
					<?php $cliente_tipo_cadastro = $cliente['tipo_cadastro'] == '1' ? 'P. FÍSICA' : 'P.JURÍDICA' ?>
					<tr <?php echo $cliente_text_color ?> >					
						<td><?php echo $cliente['nome_razao'] ?></td>
						<td><?php echo $cliente_tipo_cadastro ?></td>
						<td><?php echo $cliente['cpf_cnpj'] ?></td>
						<td class="text-center"><?php echo $cliente['telefone_1']. ' <=> ' .$cliente['telefone_2']?></td>
						<td class="text-center">
							<div class="dropdown">
								<button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="<?php echo base_url("cliente/visualizar/{$cliente['id']}") ?>"><i class="dw dw-eye"></i> VISUALIZAR</a>
									<a class="dropdown-item" href="<?php echo base_url("cliente/edit/{$cliente['id']}") ?>"><i class="dw dw-edit2"></i> EDITAR</a>
									<a class="dropdown-item" href="<?php echo base_url("cliente/excluir/{$cliente['id']}")?>" onclick="return confirmar()" ><i class="dw dw-delete-3"></i> EXCLUIR</a>
								</div>
							</div> 	
						</td>	
					</tr>				
				<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="5" >Nenhum CLEINTE encontrado!</td>
					</tr>
				<?php endif; ?>	
			</tbody>
		</table>
	</div>
</div>
<!--Paguinação -->
<div class="clearfix mb-30">
	<?php echo $paginacao->links('default', 'bootstrap_pager') ?>
</div>	
        
<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>
