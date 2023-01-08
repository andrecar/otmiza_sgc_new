<!-- Layoult resposável pelos formulários -->

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header widget-style1" style="background-color: lightsteelblue;">
                <div class="row">
					<div class="col-md-1 col-sm-2">
						<div class="progress-data">
							<img src="<?php echo $imagem ?>" alt="">
						</div>
					</div>	
                    <div class="col-md-7 col-sm-6">
                        <div class="title h1 ">
                            <?php echo $titulo ; ?>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo $url ?>"><?php echo $li_item ?></a></li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $li_active ?></li>
								</ol>
                    </div>
                    <div class="col-md-4 col-sm-4 text-right">                        
                        <h1 class="btn btn-secondary ">Data:
                            <?php echo Date('d/m/y') ?>
                        </h1>   
                    </div>
                </div>	                
            </div>
       