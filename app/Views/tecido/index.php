<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<script>
    function confirmar() {
    if (!confirm("Deseja excluir TECIDO?")) {
        return false;
    } 
        return true;    
    }
</script>

<!-- CardBox TECIDO -->
<div class="row">
	<div class="col-xl-6">
		<div class="card-box pd-10 bg-dark text-white mb-2">
			<div class="d-flex flex-wrap align-items-center">							
				<div class="widget-data">
					<div class="font-20 mx-2"><?php echo count($tecidos) ?> - Cadastros Encontrados</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pesquisa de TECIDO -->
	<div class="col-xl-6 ">
		<form class="form-group" method="GET" action="<?php  echo base_url('tecido'); ?>">
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
		<a href="<?php echo base_url('tecido/formulario') ?>">		
		<button type="button" class="btn btn-outline-dark border-radius mb-2">
		<i class="micon dw dw-price-tag"></i> 		
				NOVO TECIDO
		</button>
		</a>
	</div>
	<div class="card-box">
		<table class="table tabel-hover table-responsive-xl">
			<thead>
				<tr>
					<th>MARCA</th>	
					<th>TIPO</th>
					<th>COMPOSIÇÃO</th>					
					<th class="text-center">OPÇÕES</th>					
				</tr>
			</thead>
			<tbody>
				<?php if (count($tecidos) > 0 ) : ?>				
					<?php foreach ($tecidos as $tecido) : ?>
						<tr>
							<td><?php echo $tecido['tecidos_marca_descricao'] ?></td>
							<td><?php echo $tecido['tecidos_tipo'] ?></td>
							<td><?php echo $tecido['tecidos_composicao'] ?></td>
							<td class=" text-center">
								<div class="dropdown">
									<button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="<?php echo base_url("tecido/visualizar/{$tecido['tecidos_id']}") ?>"><i class="dw dw-eye"></i> VISUALIZAR</a>
										<a class="dropdown-item" href="<?php echo base_url("tecido/edit/{$tecido['tecidos_id']}") ?>"><i class="dw dw-edit2"></i> EDITAR</a>
										<a class="dropdown-item" href="<?php echo base_url("tecido/excluir/{$tecido['tecidos_id']}")?>" onclick="return confirmar()" ><i class="dw dw-delete-3"></i> EXCLUIR</a>
									</div>
								</div> 	
							</td>
						</tr>				
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="5" >Nenhum TECIDO encontrado!</td>
					</tr>
				<?php endif; ?>	
			</tbody>
		</table>
	</div>
</div>
<!--Paguinação -->
<div class="clearfix mb-30">
	<?php // echo $paginacao->links('default', 'bootstrap_pager') ?>
</div>	

<?php echo $this->include('_common/footer') ; ?>
<?php echo $this->endSection('container') ?>