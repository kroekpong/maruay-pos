<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Result</h3>
					</div>
					<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs" id="tab_tpac">
								<li class="active">
									<a href="#tab_1" data-toggle="tab">TSP</a>
								</li>
								<li>
									<a href="#tab_2" data-toggle="tab">Benzene</a>
								</li>
								<li>
									<a href="#tab_3" data-toggle="tab">Formaldehyde</a>
								</li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<h4 class="border-bottom">Packing Unit</h4>
									<table class="table table-bordered table-striped " id="tableTab1">
										<thead class="bg-warning">
											<tr>
												<th class="text-center" width="10%" rowspan="2">Year</th>
												<th class="text-center" width="30%" colspan="4">TPAC1(K2T)</th>
												<th class="text-center" width="30%" colspan="4">TPAC2(K2U)</th>
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
								<div class="tab-pane" id="tab_2">
									<?php $name2 = array("Formalin Plant","Monomer Plant", "Polymer Plant");
											for ($j=0; $j < count($name2); $j++):
									?>
									
									<h4 class="border-bottom"><?php echo $name2[$j]; ?></h4>
									<table class="table table-bordered table-striped " id="tableTab1">
										<thead class="bg-warning">
											<tr>
												<th class="text-center" width="10%" rowspan="2">Year</th>
												<th class="text-center" width="30%" colspan="4">TPAC1(K2T)</th>
												<th class="text-center" width="30%" colspan="4">TPAC2(K2U)</th>
												<th class="text-center" width="30%" colspan="4">TPAC3(K2W)</th>
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

								<div class="tab-pane" id="tab_3">
									<?php $name2 = array("Formalin Plant","Monomer Plant", "Polymer Plant", "Wast water treatment (WWT)");
											for ($j=0; $j < count($name2); $j++):
									?>
									
									<h4 class="border-bottom"><?php echo $name2[$j]; ?></h4>
									<table class="table table-bordered table-striped " id="tableTab1">
										<thead class="bg-warning">
											<tr>
												<th class="text-center" width="10%" rowspan="2">Year</th>
												<th class="text-center" width="30%" colspan="4">TPAC1(K2T)</th>
												<th class="text-center" width="30%" colspan="4">TPAC2(K2U)</th>
												<th class="text-center" width="30%" colspan="4">TPAC3(K2W)</th>
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