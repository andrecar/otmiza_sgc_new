<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!-- INDEX USUÁRIOS -->

<script>
    function confirmar() {
    if (!confirm("Deseja excluir MODELO?")) {
        return false;
    } 
        return true;    
    }
</script>


<!-- CardBox estoques -->
<div class="row">
	<div class="col-xl-6">
		<div class="card-box pd-10 bg-dark text-white mb-2">
			<div class="d-flex flex-wrap align-items-center">							
				<div class="widget-data">
					<div class="font-20 mx-2"><?php // echo count($estoques) ?> - Cadastros Encontrados</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pesquisa de estoque -->
	<div class="col-xl-6 ">
		<form class="form-group" method="GET" action="<?php //  echo base_url('estoque'); ?>">
			<div class="form-group d-flex justify-content-center justify-content-sm-between">
				<i class="dw dw-search2 my-auto"></i>
				<input class="form-control search-input mx-2" type="search" name="pesquisar" autocomplete="off" value="<?php // echo $pesquisar ?>" placeholder="Pesquisar...">
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
		<a href="<?php echo base_url('estoque/formulario') ?>">		
		<button type="button" class="btn btn-outline-dark border-radius mb-2">
		<i class="micon dw dw-box-1"></i> 		
				NOVO ESTOQUE
		</button>
		</a>
	</div>
	<div class="card-box">
		<table class="table table-hover table-responsive-xl">
			<thead">
				<tr>
					<th>CLIENTE/TECIDOS</th>
					<th class="text-center">QUANT. ROLOS</th>
					<th class="text-center">METRAGEM</th>
					<th class="text-center">OPÇÃO</th>
					
				</tr>
			</thead>
			<tbody>
				<?php if (count($estoques) > 0 ) : ?>				
					<?php foreach ($estoques as $estoque) : ?>
						<tr>
							<td colspan="3" class="bg-light-orange border-radius-10">
								<h6 class=" text-white-50"><?php echo $estoque['cliente'] ?></h6>
							</td>
							<td class="text-center bg-light-orange border-radius-10" >
								<div class="dropdown">
									<button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="<?php // echo base_url("estoque/visualizar/{$estoque['estoque_id']}") ?>"><i class="dw dw-eye"></i> VISUALIZAR</a>
										<a class="dropdown-item" href="<?php // echo base_url("estoque/edit/{$estoque['estoque_id']}") ?>"><i class="dw dw-edit2"></i> EDITAR</a>
										<a class="dropdown-item" href="<?php // echo base_url("estoque/excluir/{$estoque['estoque_id']}")?>" onclick="return confirmar()" ><i class="dw dw-delete-3"></i> EXCLUIR</a>
									</div>
								</div> 	
							</td>	
						</tr>
						<?php foreach ($estoque['estoque'] as $estoque) : ?>
							<tr class=" text-primary">
								<td class="pl-5"><?php echo $estoque['marca_descricao']. ' - ' .$estoque['tecido_tipo'] ?></td>
								<td class="text-center"> 10 - rolos</td>
								<td class="text-center"> 755,0 - mt</td>
								
							</tr>
						<?php endforeach; ?>
				<?php endforeach; ?>
					


							
				<?php else : ?>
					<tr>
						<td colspan="4" >Nenhum ESTOQUE encontrado!</td>
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
