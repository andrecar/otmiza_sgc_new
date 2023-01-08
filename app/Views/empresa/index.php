<?php echo $this->extend('_common/layout') ?>

<?php echo $this->section('container') ?>
<?php echo $this->include('_common/header') ; ?>

<!-- INDEX EMPRESA -->

<script>
    function confirmar() {
    if (!confirm("Deseja excluir empresa?")) {
        return false;
    } 
        return true;    
    }
</script>


<!-- CardBox EMPRESA -->
<div class="row">
	<div class="col-xl-6">
		<div class="card-box pd-10 bg-dark text-white mb-2">
			<div class="d-flex flex-wrap align-items-center">							
				<div class="widget-data">
					<div class="font-20 mx-2"><?php echo count($empresas) ?> - Cadastros Encontrados</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pesquisa de EMPRESA -->
	<div class="col-xl-6 ">
		<form class="form-group" method="GET" action="<?php  echo base_url('empresa'); ?>">
			<div class="form-group d-flex justify-content-center justify-content-sm-between">
				<i class="dw dw-search2 my-auto"></i>
				<input class="form-control search-input mx-2" type="search" name="pesquisar" autocomplete="off" value="<?php echo $pesquisar ?>" placeholder="Pesquisar...">
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
		<a href="<?php echo base_url('empresa/formulario') ?>">		
		<button type="button" class="btn btn-outline-dark border-radius mb-2">
		<i class="micon dw dw-factory1"></i> 
				NOVA EMPRESA
		</button>
		</a>
	</div>
	<div class="card-box">
		<table class="table table-hover table-responsive-xl">
			<thead>
				<tr>
					<th>EMPRESA</th>					
					<th>TIPO</th>
					<th>RAZÃO SOCIAL</th>
					<th>RESPONSÁVEL</th>
					<th class="text-center">CONTATOS</th>
					<th class="text-center">OPÇÕES</th>					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($empresas as $empresa) : ?>
				<?php $empresa_text_color = $empresa['tipo_empresa'] == 'MATRIZ'? 'class="text-primary"' : 'class="text-dark"' ?>					
				<tr <?php echo $empresa_text_color ?> >
					<td><?php echo $empresa['fantasia'] ?></td>
					<td><?php echo $empresa['tipo_empresa'] ?></td>
					<td><?php echo $empresa['razao'] ?></td>
					<td><?php echo $empresa['responsavel'] ?></td>
					<td class="text-center"><?php echo $empresa['telefone_1']." <=> ".$empresa['telefone_2'] ?></td>					
					<td class="text-center">
						<div class="dropdown">
							<button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="<?php echo base_url("empresa/visualizar/{$empresa['id']}") ?>"><i class="dw dw-eye"></i> VISUALIZAR</a>
								<a class="dropdown-item" href="<?php echo base_url("empresa/edit/{$empresa['id']}") ?>"><i class="dw dw-edit2"></i> EDITAR</a>
								<a class="dropdown-item" href="<?php echo base_url("empresa/excluir/{$empresa['id']}")?>" onclick="return confirmar()" ><i class="dw dw-delete-3"></i> EXCLUIR</a>
							</div>
						</div> 	
					</td>	
				</tr>				
				<?php endforeach; ?>     
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
