<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SGC - Otmiza Sistemas New</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/src/images/favicon.png') ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/src/images/favicon.png') ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/src/images/favicon.png') ?>">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->	
	<link rel="stylesheet" href="<?php echo base_url('assets/src/fonts/font-googlepis.css') ?>">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/core.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/icon-font.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/styles/my_style.css') ?>">
	
	<!-- CSS Cadendar -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/fullcalendar/fullcalendar.css') ?>">
	
	<!-- JS para abrir Modal - obs: Só funciona se ficar aqui em cima -->
	<script src="<?php echo base_url('assets/src/scripts/jquery-1.11.0.min.js') ?>"></script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script src="<?php echo base_url('assets/src/scripts/googletagmanager.js') ?>"></script>

	<script>		
		// Função veio junto com o pacote DeskApp - Boostrap		
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-119386393-1');

		/**
		 * Variável global para imprementar um url.
		 */
		var base_url = "<?php echo base_url() ?>";
	</script>
</head>

<body>
	<!-- Perfil do usuário -->
	<div class="header">	
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search"></div>
		</div>
			<div class="header-right">
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
							<span class="user-icon">
								<img src="<?php echo base_url('assets/src/images/user.png')?>" alt="">
							</span>
							<span class="user-name">Ross C. Lopez</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
							<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Perfil</a>						
							<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Ajuda</a>
							<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Loga Outro</a>
						</div>
					</div>
				</div>			
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Configurações da interface-->
	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				CONFIGURAÇÃO
				<span class="btn-block font-weight-400 font-12">Configurações da interface</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Cabeçalho</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">Branco</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Escuro</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">Branco</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Escuro</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Ícone do Menu Suspenso </h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Ícone da Lista de Menus</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-outline-danger border-radius" id="reset-settings">Redefinir configurações</button>
				</div>
			</div>
		</div>
	</div>

	<!--Sidebar-->
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?php echo base_url('home');?>">
				<img src="<?php echo base_url('assets/src/images/logo_otmiza.png');?>" alt="" class="dark-logo">
				<img src="<?php echo base_url('assets/src/images/logo_otmiza_dark.png');?>" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<hr class="my-1 bg-light-green">
					<li>
						<a href="<?php echo base_url('empresa'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-factory1"></span><span class="mtext">EMPRESAS</span>
						</a>
					</li>
					<hr class="my-1 bg-light-green">
					<li>
						<a href="<?php echo base_url('cliente'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">CLIENTES</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('modelo'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-price-tag"></span><span class="mtext">MODELOS</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('tecido'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-sheet"></span><span class="mtext">TECIDOS</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('funcionario'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">FUNCIONÁRIOS</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('usuario'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user1"></span><span class="mtext">USUÁRIOS</span>
						</a>
					</li>
					<hr class="my-1 bg-light-green">					
					<li>
						<a href="<?php echo base_url('nota'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file2"></span><span class="mtext">NOTAS    </span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('estoque'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-box-1"></span><span class="mtext">ESTOQUE</span>
						</a>
					</li>
					<hr class="my-1 bg-light-green">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-money-2"></span><span class="mtext">FINACEIRO</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo base_url('financeiro/fluxo') ?>">FLUXO DE CAIXA</a></li>
							<li><a href="<?php echo base_url('financeiro/receita') ?>">RECEITAS</a></li>
							<li><a href="<?php echo base_url('financeiro/despesa') ?>">DESPESA</a></li>
							<li><a href="<?php echo base_url('financeiro/receber') ?>">CONTAS À RECEBER</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-file"></span><span class="mtext"> RELATÓRIOS </span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo base_url('relatorio/produto'); ?>">PODUTOS</a></li>
							<li><a href="<?php echo base_url('relatorio/cliente'); ?>">CLIENTES</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url('configuracao'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings1"></span><span class="mtext">CONFIGURAÇÕES</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('logs'); ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-binocular"></span><span class="mtext">LOG´S</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<!-- Chama as seções criadas -->
	<?php echo $this->renderSection('container') ?>
	
	<div class="footer-wrap navbar-fixed-bottom pd-20 card-box">
			© 2022 Otmiza - André Carlos (81) 9 9105-1938			
	</div>

<!-- JS Gerais -->
<script src="<?php echo base_url('assets/src/scripts/jquery.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/scripts/core.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/scripts/script.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/scripts/process.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/scripts/layout-settings.js') ?>"></script>
<script src="<?php echo base_url('assets/src/plugins/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?php echo base_url('assets/src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/scripts/dashboard.js') ?>"></script>

<!-- JS calendar -->
<script src="<?php echo base_url('assets/src/plugins/fullcalendar/fullcalendar.min.js') ?>"></script>
<script src="<?php echo base_url('assets/src/scripts/calendar-setting.js') ?>"></script>
	
<!-- JS para mascara -->
<script src="<?php echo base_url('assets/src/scripts/jquery.mask.min.js') ?>"></script>

<!-- JS Bootstrap -->
<script src="<?php echo base_url('assets/src/plugins/bootstrap/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/src/plugins/bootstrap/bootstrap.min.js') ?>"></script>

<!-- JS sweetalert -->
<script src="<?php echo base_url('assets/src/plugins/sweetalert2/sweetalert2.all.js') ?>"></script>
<script src="<?php echo base_url('assets/src/plugins/sweetalert2/sweet-alert.init.js') ?>"></script>
<!-- switchery js -->
<script src="<?php echo base_url('assets/src/plugins/switchery/switchery.min.js') ?>"></script>
<!-- bootstrap-tagsinput js -->
<script src="<?php echo base_url('assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')?> "></script>
<!-- bootstrap-touchspin js -->
<script src="<?php echo base_url('assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')?> "></script>
<script src="<?php echo base_url('assets/src/scripts/advanced-components.js')?> "></script>

</body>
</html