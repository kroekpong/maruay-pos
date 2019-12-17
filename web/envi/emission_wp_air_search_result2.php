<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Result</h3>
    </div>
    <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="tab_tpac">
                <li class="active">
                    <a href="#tab_tpac_1" data-toggle="tab">TSP</a>
                </li>
                <li>
                    <a href="#tab_tpac_2" data-toggle="tab">MC</a>
                </li>
                <li>
                    <a href="#tab_tpac_3" data-toggle="tab">HE</a>
                </li>
                <li>
                    <a href="#tab_tpac_4" data-toggle="tab">CO</a>
                </li>
                <li>
                    <a href="#tab_tpac_5" data-toggle="tab">Cl2</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_tpac_1">
                    <h4 class="border-bottom">Packing Unit</h4>
                    <table class="table table-bordered table-striped " id="tableTab1">
                        <thead class="bg-warning">
                            <tr>
                                <th class="text-center" width="10%" rowspan="2">Year</th>
                                <th class="text-center" width="30%" colspan="4">TPCC1</th>
                                <th class="text-center" width="30%" colspan="4">TPCC2</th>
                                <th class="text-center" width="30%" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>

                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php for($i=2012;$i<=2013;$i++):?>
                            <tr>
                                <td class="text-center"><?php echo $i;?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-edit"></i>
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <?php endfor;?>
                        </tbody>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_tpac_2">
                    <?php $name2 = array("P-Stucture","G-Stucture", "Polymerization");
                            for ($j=0; $j < count($name2); $j++):
                    ?>
                    
                    <h4 class="border-bottom"><?php echo $name2[$j]; ?></h4>
                    <table class="table table-bordered table-striped " id="tableTab1">
                        <thead class="bg-warning">
                            <tr>
                                <th class="text-center" width="10%" rowspan="2">Year</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>

                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php for($i=2012;$i<=2013;$i++):?>
                            <tr>
                                <td class="text-center"><?php echo $i;?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>

                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-edit"></i>
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <?php endfor;?>
                        </tbody>
                    </table>
                    <?php endfor; ?>
                </div>

                <div class="tab-pane" id="tab_tpac_3">
                    <?php $name2 = array("G-Stucture", "Polymerization");
                            for ($j=0; $j < count($name2); $j++):
                    ?>
                    
                    <h4 class="border-bottom"><?php echo $name2[$j]; ?></h4>
                    <table class="table table-bordered table-striped " id="tableTab1">
                        <thead class="bg-warning">
                            <tr>
                                <th class="text-center" width="10%" rowspan="2">Year</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>

                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php for($i=2012;$i<=2013;$i++):?>
                            <tr>
                                <td class="text-center"><?php echo $i;?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>

                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-edit"></i>
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <?php endfor;?>
                        </tbody>
                    </table>
                    <?php endfor; ?>
                </div>

                <div class="tab-pane" id="tab_tpac_4">
                    <?php $name2 = array("CG Precess");
                            for ($j=0; $j < count($name2); $j++):
                    ?>
                    
                    <h4 class="border-bottom"><?php echo $name2[$j]; ?></h4>
                    <table class="table table-bordered table-striped " id="tableTab1">
                        <thead class="bg-warning">
                            <tr>
                                <th class="text-center" width="10%" rowspan="2">Year</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>

                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php for($i=2012;$i<=2013;$i++):?>
                            <tr>
                                <td class="text-center"><?php echo $i;?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>

                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-edit"></i>
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <?php endfor;?>
                        </tbody>
                    </table>
                    <?php endfor; ?>
                </div>

                <div class="tab-pane" id="tab_tpac_5">
                    <?php $name2 = array("CG Precess");
                            for ($j=0; $j < count($name2); $j++):
                    ?>
                    
                    <h4 class="border-bottom"><?php echo $name2[$j]; ?></h4>
                    <table class="table table-bordered table-striped " id="tableTab1">
                        <thead class="bg-warning">
                            <tr>
                                <th class="text-center" width="10%" rowspan="2">Year</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" colspan="4">TPCC</th>
                                <th class="text-center" width="30%" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>

                                <th class="text-center">1st</th>
                                <th class="text-center">2nd</th>
                                <th class="text-center">3st</th>
                                <th class="text-center">4st</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php for($i=2012;$i<=2013;$i++):?>
                            <tr>
                                <td class="text-center"><?php echo $i;?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>

                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                <td class="text-center">0.<?php echo rand(111,900)?></td>
                                
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-edit"></i>
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <?php endfor;?>
                        </tbody>
                    </table>
                    <?php endfor; ?>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->