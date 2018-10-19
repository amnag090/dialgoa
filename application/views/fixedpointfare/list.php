<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Fixed Point Fares
            <small></small>
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">

    <div class="alert alert-dismissible" id="div-fixedptfare-list-alert" style="display: none;"></div>
     <?php
         if($this->session->flashdata('successMsg')){
            ?>
         <div class="alert alert-success alert-dismissible" id="alert-success"">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4> <?php echo $this->session->flashdata('successMsg'); ?>
        </div>
        <?php
        }
        if($this->session->flashdata('errorMsg')){
            ?>
        <div class="alert alert-danger alert-dismissible" id="alert-error"">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4><i class="icon fa fa-warning"></i>Error!</h4>
            <span id="message-alert-error">Some error occured, please try again later</span>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Action</label>
                                <select class="form-control" name="fare_status" id="sel-fixedptfare-action">
                                    <option value=" " disabled="" selected="">Select</option>
                                    <option value="activate">Activate</option>
                                    <option value="deactivate">Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input name="activate" value="Apply" class="btn btn-success"  id="btn-fixedptfare-action" style="margin-top:25px;" type="button">
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="<?php print site_url('FixedPointFare/addnew'); ?>"><i class="fa fa-plus"></i> Add Fares</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover datatable" id="" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;"><input name="chk[]"  id="chk-fixedptfare-list-head" type="checkbox">&nbsp;&nbsp;Mark All</th>
                                <th>Sr No.</th>
                                <th>From - To</th>
                                <th>Date</th>
                                <th>Days</th>
                                <th>ST</th>
                                <th>ET</th>
                                <th>OW AC</th>
                                <th>Round AC</th>
                                <th>OW NAC</th>
                                <th>Round NAC</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list AS $i=>$row): ?>
                                <tr>
                                    <td><div class="checkbox"><label><input name="chk[]" value="<?php print $row->id; ?>" class="chk-fixedptfare-row" type="checkbox"></label></div></td>
                                    <td><?php print $i+1; ?></td>
                                    <td><?php print $row->start_city_name; ?> - <?php print $row->start_addr; ?> To <?php print $row->end_city_name; ?> - <?php print $row->end_addr; ?></td>
                                    <td><?php print date("d/m/Y",strtotime($row->start_date)); ?></td>
                                    <td><?php print $row->days_fmt; ?></td>
                                    <td><?php print date("h:i A", strtotime($row->start_time)); ?></td>
                                    <td><?php print date("h:i A", strtotime($row->end_time)); ?></td>
                                    <td><?php print number_format($row->one_way_ac,2); ?></td>
                                    <td><?php print number_format($row->round_trip_ac,2); ?></td>
                                    <td><?php print number_format($row->one_way_non_ac,2); ?></td>
                                    <td><?php print number_format($row->round_trip_non_ac,2); ?></td>
                                    <td>
                                        <?php 
                                            if($row->status == '1')
                                                print '<small class="label pull-right bg-green">Activated</small>';
                                            elseif($row->status == '0')
                                                print '<small class="label pull-right bg-red">Deactivated</small>';
                                        ?>
                                    </td>
                                    <td><a href="<?php print site_url('FixedPointFare/edit/'.$row->id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> &nbsp;&nbsp; </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>