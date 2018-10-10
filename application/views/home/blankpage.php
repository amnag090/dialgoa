<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="page-header">
        Home
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <?php
         /*
       <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Sales Admin</div>
                                </div>
                            </div>
                        </div>
                        <a href="sales_admin_list.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Vendor Admin</div>
                                </div>
                            </div>
                        </div>
                        <a href="vendor_admin_list.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>Customer</div>
                                </div>
                            </div>
                        </div>
                        <a href="customer_list.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Operator Staff</div>
                                </div>
                            </div>
                        </div>
                        <a href="vendor_operator_list.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-motorcycle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>2 Wheelers</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="salesadmin.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cab fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>4 Wheelers</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>6 Wheelers</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Others</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> -->
                    </div>
                </div>
            </div>
            ?>
      <!-- Small boxes (Stat box) -->
  <?php /*
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile"> <br/>
             <h2 class="text-center" style="color:#75a34b;">Piani</h2> <br/>
              <p class="text-muted text-center">Imposta ciascun piano tarrifarrio:<br/> Prezzo, Descrizione, Durata</p> <br/>
              <div class="text-center"><a href="<?php print site_url('plan'); ?>" class="btn btn-primary text-center"><b>Vai Ora!</b></a></div><br/>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile"> <br/>
             <h2 class="text-center" style="color:#75a34b;">News</h2> <br/>
              <p class="text-muted text-center">Tieni sempre aggiornato il tuoi utenti<br/> creando sempre nuovi contenuti.</p> <br/>
              <div class="text-center"><a href="<?php print site_url('news'); ?>" class="btn btn-primary text-center"><b>Vai Ora!</b></a></div><br/>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile"> <br/>
             <h2 class="text-center" style="color:#75a34b;">Diario</h2> <br/>
              <p class="text-muted text-center">Crea le prorammazioni<br/>per ciascun utente o per somatipo.</p> <br/>
              <div class="text-center"><a href="<?php print site_url('diary'); ?>" class="btn btn-primary text-center"><b>Vai Ora!</b></a></div><br/>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <br/>
             <h2 class="text-center" style="color:#75a34b;">Ricette</h2> <br/>
              <p class="text-muted text-center">Crea e inventa nuove ricette da<br/>condividere con i tuoi utenti</p> <br/>
              <div class="text-center"><a href="<?php print site_url('recipe'); ?>" class="btn btn-primary text-center"><b>Vai Ora!</b></a></div><br/>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile"> <br/>
             <h2 class="text-center" style="color:#75a34b;">Chat</h2> <br/>
              <p class="text-muted text-center">Tieniti sempre in contatto con tutti<br/>i tuoi utenti e rispondi alle loro domande</p> <br/>
              <div class="text-center"><a href="<?php print site_url('messages'); ?>" class="btn btn-primary text-center"><b>Vai Ora!</b></a></div><br/>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile"> <br/>
             <h2 class="text-center" style="color:#75a34b;">Alimenti</h2> <br/>
              <p class="text-muted text-center">Aggiungi o modifica gli alimenti <br/>con la relativa tabella nutrizionale.</p> <br/>
              <div class="text-center"><a href="<?php print site_url('foods'); ?>" class="btn btn-primary text-center"><b>Vai Ora!</b></a></div><br/>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       
      </div>*/ ?>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>