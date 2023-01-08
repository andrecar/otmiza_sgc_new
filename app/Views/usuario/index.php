<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!-- INDEX USUÁRIOS -->

<script>
    function confirmar() {
    if (!confirm("Deseja excluir usuário?")) {
        return false;
    } 
        return true;    
    }
</script>


<!-- CardBox usuários -->
<div class="row">
	<div class="col-xl-6">
		<div class="card-box pd-10 bg-dark text-white mb-2">
			<div class="d-flex flex-wrap align-items-center">							
				<div class="widget-data">
					<div class="font-20 mx-2"><?php echo count($usuarios) ?> - usuário(s) encontrado(s)</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pesquisa de Usuário -->
	<div class="col-xl-6 ">
		<form class="form-group" method="GET" action="<?php  echo base_url('usuario'); ?>">
			<div class="form-group d-flex justify-content-center justify-content-sm-between">
				<i class="dw dw-search2 my-auto"></i>
				<input class="form-control search-input mx-2" type="search" name="pesquisar" autocomplete="off" value="<?php // // echo $pesquisar ?>" placeholder="Pesquisar...">
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
		<a href="<?php echo base_url('usuario/formulario') ?>">		
		<button type="button" class="btn btn-outline-dark border-radius">
	<i class="micon dw dw-add-user"></i> 
				NOVO USUÁRIO
		</button>
		</a>
	</div>
	<div class="card-box">
		<table class="data-table table hover nowrap">
			<thead class="text-danger font-italic">
				<tr>
					<th class="table-plus datatable-nosort">ID</th>
					<th>NOME</th>
					<th>PERMISÃO</th>
					<th>LOGIN</th>
					<th>EMAIL</th>
					<th>TELEFONE</th>
					<th class="datatable-nosort text-center">OPÇÕES</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if (count($usuarios) > 0) : ?>
					<?php foreach ($usuarios as $usuario) : ?>
						<?php  $usuario_text = $usuario['permissao_id'] == '1' ? 'class="text-primary"' : 'class="text-dark"' ?>						
						<?php  $usuario_permissao = $usuario['permissao_id'] == '1' ? 'ADMISTRADOR' : 'USUÁRIO'; ?>					
						<tr <?php  echo $usuario_text ?> >
							<td class="table-plus font-weight-bolder"><?php echo $usuario['id'] ?></td>
							<td><?php echo $usuario['nome'] ?></td>
							<td><?php echo $usuario_permissao ?></td>
							<td><?php echo $usuario['login'] ?></td>
							<td><?php echo $usuario['email'] ?></td>
							<td><?php echo $usuario['telefone'] ?></td>
							<td class="text-center">
								<div class="dropdown">
									<button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="<?php echo base_url("usuario/visualizar/{$usuario['id']}") ?>"><i class="dw dw-eye"></i> VISUALIZAR</a>
										<a class="dropdown-item" href="<?php echo base_url("usuario/edit/{$usuario['id']}") ?>"><i class="dw dw-edit2"></i> EDITAR</a>
										<a class="dropdown-item" href="<?php echo base_url("usuario/excluir/{$usuario['id']}")?>" onclick="return confirmar()" ><i class="dw dw-delete-3"></i> EXCLUIR</a>
									</div>
								</div> 	
							</td>	
						</tr>				
					<?php endforeach; ?>  
				<?php else : ?>
					<tr>
						<td colspan="5">Nenhum USUÁRIO encontrado!</td>
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
