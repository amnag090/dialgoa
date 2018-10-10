<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Fares <small></small></h1>
    </section>
        <section class="content">
        <div class="alert alert-dismissible" id="div-fixpointfare-edit-alert" style="display: none;"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php print site_url('FixedPointFare/saveedit'); ?>" id="frm-fixpointfare-edit" name="fixed_point_fare_edit_form">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Point To Point</label>
                                        <select name="point_id" class="form-control" required="">
                                            <option value="" disabled="" selected="">Select Point</option>
                                            <?php foreach($fixedPoints as $point): ?>
                                                <option value="<?php print $point->id; ?>" <?php print ($point->id==$fixedPtFare->route_id) ? 'selected="selected"' :''; ?>>
                                                    <?php print $point->start_city_name; ?> - <?php print $point->start_addr; ?> To <?php print $point->end_city_name; ?> - <?php print $point->end_addr; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Start Date:</label>
                                        <input data-provide="datepicker" class="form-control" name="start_date" data-date-format="dd/mm/yyyy" required="" autocomplete="off" value="<?php print date('d/m/Y', strtotime($fixedPtFare->start_date)); ?>" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3 ed">
                                    <div class="form-group">
                                        <label>End Date:</label>
                                        <input data-provide="datepicker" class="form-control " name="end_date" data-date-format="dd/mm/yyyy" required="" autocomplete="off" value="<?php print date('d/m/Y', strtotime($fixedPtFare->end_date)); ?>" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Vehicle Type</label>
                                        <select name="vehicle_id" class="form-control" required="">
                                            <option value="" disabled="" selected="">Select Vehicle</option>
                                            <?php foreach($vehicleTypes as $type): ?>
                                                <option value="<?php print $type->id; ?>" <?php print ($type->id==$fixedPtFare->vehicle_type) ? 'selected="selected"' :''; ?>><?php print $type->title; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7">
                                    <label>Days</label>
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="checkbox"><label> <input class="chk-fare-days" required="" value="1" name="fare_days[]" type="checkbox" <?php print (in_array('1',$fixedPtFare->days)) ? 'checked="checked"' :''; ?> >Mon</label></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="checkbox"><label> <input class="chk-fare-days" required="" value="2" name="fare_days[]" type="checkbox" <?php print (in_array('2',$fixedPtFare->days)) ? 'checked="checked"' :''; ?>>Tue</label></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="checkbox"><label> <input class="chk-fare-days" required="" value="3" name="fare_days[]" type="checkbox" <?php print (in_array('3',$fixedPtFare->days)) ? 'checked="checked"' :''; ?>>Wed</label></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="checkbox"><label> <input class="chk-fare-days" required="" value="4" name="fare_days[]" type="checkbox" <?php print (in_array('4',$fixedPtFare->days)) ? 'checked="checked"' :''; ?>>Thu</label></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="checkbox"><label> <input class="chk-fare-days" required="" value="5" name="fare_days[]" type="checkbox" <?php print (in_array('5',$fixedPtFare->days)) ? 'checked="checked"' :''; ?>>Fri</label></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="checkbox"><label> <input class="chk-fare-days" required="" value="6" name="fare_days[]" type="checkbox" <?php print (in_array('6',$fixedPtFare->days)) ? 'checked="checked"' :''; ?>>Sat</label></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="checkbox"><label> <input class="chk-fare-days" required="" value="7" name="fare_days[]" type="checkbox" <?php print (in_array('7',$fixedPtFare->days)) ? 'checked="checked"' :''; ?>>Sun</label></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <select name="fixedp_start_time" class="form-control" id="at" required="">
                                            <option value="" disabled="" selected="">Select Timeslot</option>
                                            <?php for($i=0; $i<1440; $i+=15): ?>
                                                <?php $t = strtotime("2018-01-01 00:01:00 +{$i} minutes"); ?>
                                                <option value="<?php print date('H:i:s',$t); ?>" <?php print (date('H:i:s',$t)==$fixedPtFare->start_time) ? 'selected="selected"' :''; ?>><?php print date('h:i A',$t); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <select name="fixedp_end_time" class="form-control" id="bt" required="">
                                            <option value="" disabled="" selected="">Select Timeslot</option>
                                            <?php for($i=15; $i<=1440; $i+=15): ?>
                                                <?php $t = strtotime("2018-01-01 00:00:00 +{$i} minutes"); ?>
                                                <option value="<?php print date('H:i:s',$t); ?>" <?php print (date('H:i:s',$t)==$fixedPtFare->end_time) ? 'selected="selected"' :''; ?>><?php print date('h:i A',$t); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>One Way</th>
                                        <th>Round Trip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>AC Fare</b></td>
                                        <td>
                                            <input class="form-control" placeholder="Enter Cost" name="ac_one" required="" type="number" step="0.01" value="<?php print $fixedPtFare->one_way_ac; ?>">
                                        </td>
                                        <td>
                                            <input class="form-control" placeholder="Enter Cost" name="ac_round" required="" type="number" step="0.01" value="<?php print $fixedPtFare->round_trip_ac; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Non-AC Fare</b></td>
                                        <td>
                                            <input class="form-control" placeholder="Enter Cost" name="non_ac_one" required="" type="number" step="0.01" value="<?php print $fixedPtFare->one_way_non_ac; ?>">
                                        </td>
                                        <td>
                                            <input class="form-control" placeholder="Enter Cost" name="non_ac_round" required="" type="number" step="0.01" value="<?php print $fixedPtFare->round_trip_non_ac; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                            
                            <div class="row">
                                <div class=" col-md-offset-5 col-md-3">
                                    <input name="fare_id" type="hidden" value="<?php print $fixedPtFare->id; ?>">
                                    <input name="submit" value="Save" class="btn btn-success" type="submit">
                                    &nbsp;&nbsp;
                                    <input name="" value="Cancel" class="btn btn-success" onclick="location.replace('<?php print site_url('FixedPointFare'); ?>');" type="button">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </section>
</div>
