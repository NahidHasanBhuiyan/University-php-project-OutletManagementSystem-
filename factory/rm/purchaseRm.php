<?php

		include_once "../../inc/function.php";

		session_start();

		if(empty($_SESSION['facLayout'])){
			header("location: ../../factoryLogin.php");
		}

		date_default_timezone_set("Asia/Dhaka");
		$date = date('d-m-Y / D');
		$today = date('d-m-Y');

		$sl = $_GET['sl'];


		$outlet = $conn->query("SELECT srcName,sl FROM crsrc WHERE sl=$sl");
		$outlet1=$outlet->fetch_assoc();
		$source= $outlet1['srcName'];

	

		
		





?>
<!DOCTYPE HTML>
<html>
<head>
<title>Bhuiyan Group | Factory | Purchase Row Material</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="../../js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="../../css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<!-- chosen CSS
		============================================ -->
    <link rel="stylesheet" href="../../plugin/chosen/bootstrap-chosen.css">
  <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="../../plugin/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../../plugin/data-table/bootstrap-editable.css">
    <link rel="stylesheet" href="../../plugin/data-table/style.css">


<script src="../../js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="../../js/chartinator.js" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="../../js/skycons.js"></script>
<!--//skycons-icons-->
<style>
	.form-control option{
		padding: 0px 15px;
	}
</style>
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left" style="background-color: #00bfff; ">
							<div class="logo-nam">
									 <h1 class="text-center" style="padding: 5px; color: #fff"><b>Purchase RM</b></h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  								
							</div>
							<!--search-box-->
								
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right" style="background-color: #00bfff; ">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">0</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 0 new messages</h3>
												</div>
											
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<?php
											$ord = $conn->query("SELECT * FROM advanceorder WHERE factoryStatus='Pending' ORDER BY orderDelDate ASC");
											$row = $ord->num_rows;
										?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $row;?></span></a>
										<ul class="dropdown-menu">

											<li>
												<div class="notification_header">
													<h3>You have <span><?php echo $row;?></span> new orders</h3>
												</div>
											</li>
											<?php
												while($order = $ord->fetch_assoc()):
											?>
											<li><a href="../../factory/order/order.php">
												
											   <div class="notification_desc">
												<p><?php echo $order['outlet'];?></p>
												<p><span><?php echo $order['orderDate'];?> / <?php echo $order['orderTime'];?> </span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a>
											</li>
											<?php endwhile;?>
											 
												<div class="notification_bottom">
													<a href="../../factory/order/order.php">See all orders</a>
												</div> 
											</li>
										</ul>
									</li>	
									<li class="dropdown head-dpdn">
										<?php
											$ord1 = $conn->query("SELECT * FROM advanceorder WHERE factoryStatus='In Progress' ORDER BY orderDelDate ASC");
											$row1 = $ord1->num_rows;
										?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1"><?php echo $row1;?></span></a>
										<ul class="dropdown-menu">
											<li>
												<li>
													<div class="notification_header">
														<h3>You have <span><?php echo $row1;?></span> pending orders</h3>
													</div>
												</li>
											</li>
											<?php
												while($order1 = $ord1->fetch_assoc()):
											?>
											<li><a href="../../factory/order/order.php">
												
											   <div class="notification_desc">
												<p><?php echo $order1['outlet'];?></p>
												<p><span><?php echo $order1['orderDelDate'];?> / <?php echo $order1['orderDelTime'];?> </span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a>
											</li>
											<?php endwhile;?>
											<li>
												<div class="notification_bottom">
													<a href="../../factory/order/order.php">See all pending orders</a>
												</div>  
											</li>
										</ul>
									</li>	
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="../../images/p1.png" alt=""> </span> 
												<div class="user-name">
													<p><?php echo $_SESSION['facLayout']?></p>
													<span>Bhuiyan Group</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="../../inc/factoryLogout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block" >
<!--market updates updates-->
	 <div class="container-fluid" >
		<p class="alert bg-info text-right">Date: <?php echo $date?></p>

		

				
							    
                                <div class="panel panel-success" style="margin-top: 10px">
								<?php
									if(isset($_POST['addAccont'])){
										$pSource = $source;
										$pAmount = $_POST['pAmount'];
										$pPaid = $_POST['pPaid'];
										
										date_default_timezone_set("Asia/Dhaka");
										$pDate = date('d-m-Y');
										$pTime = date('h:i:s A');
										$pMonth = date('m');

										
											if(empty($pAmount) && empty($pPaid)  ){
											$message = "<p class='alert alert-danger'>Field Must Not Be Empty</p>";

											}else{
												

													$conn-> query("INSERT INTO rmaccount(pDate,pTime,pSource,pAmount,pPaid,pMonth) VALUES('$pDate','$pTime','$pSource','$pAmount','$pPaid','$pMonth')");
											
												$message = "<p class='alert alert-success'>Successfully updated Accounts!</p>";
												}
												
											
											echo $message;
									}
								?>
								<form action="" method="POST">
                                    
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        
                                                    
                                                    
                                                    
		                                            <div class="form-group" style="margin-top: 8px;">
                                                    	<label for=""><i class="fa fa-money" aria-hidden="true"></i> Purchase Amount</label>
                                                        
                                                        <input name="pAmount" type="text" class="form-control" placeholder="Ex: 500">
                                                    </div>
                                                    <div class="form-group" style="margin-top: 8px;">
                                                    	<label for=""><i class="fa fa-money" aria-hidden="true"></i> Paid Amount</label>
                                                        
                                                        <input name="pPaid" type="text" class="form-control" placeholder="Ex: 500">
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row" style="margin-top: 8px">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                    
                                                    <input name="addAccont" class="btn btn-success" type="submit" value="Submit">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                   
                                  </form>
                                </div>    


                                <div class="panel panel-success" style="margin-top: 10px">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="div">
                                                	
                                                	<h3 class="alert bg-primary text-capitalize"><?php echo $outlet1['srcName']?></h3>
                                                	<div class="row">
                                		<div class="col-md-6">
                                			<?php
                                				$e = $conn->query("SELECT SUM(pAmount) as d FROM rmaccount WHERE  pSource='$source' AND pDate='$today'");
                                				$z = $conn->query("SELECT SUM(pAmount) as y FROM rmaccount WHERE  pSource='$source' ");
                                				$h = $conn->query("SELECT SUM(pPaid) as g FROM rmaccount WHERE  pSource='$source'");
                                				$f=$e->fetch_assoc();
                                				
                                				$x = $z->fetch_assoc();
                                				$i = $h->fetch_assoc();

                                				$aamount = $x['y'];
                                				$ppaid = $i['g'];
                                				$due = $aamount-$ppaid;

                                			?>
		                                    <h3 class="alert alert-info"><b class="text-left">Today Purchased RM :</b ></h3>
		                                </div>
		                                <div class="col-md-6">
		                                    <h3 class="alert alert-info"><span class="text-right"><b>BDT <?php echo (double)$f['d']?></b></span></h3>
		                                </div>
                                    </div>
                                    <div class="row">
                                		<div class="col-md-6">
		                                    <h3 class="alert alert-info"><b class="text-left">Total Due Amount :</b ></h3>
		                                    </div>
		                                <div class="col-md-6">
		                                    <h3 class="alert alert-danger"><span class="text-right"><b>BDT <?php echo (double)$due?></b></span></h3>
		                                </div>
                                    </div>
                                 </div>
                                                <table class="table table-hover">
		                            	<thead class="thead thead-dark">
			                                <tr>
			                                    <th>Sl</th>
			                                    
			                                    <th>RM Name</th>
			                                    <th>Quantity</th>
			                                    <th>Unit</th>
			                                    <th>Price</th>
			                                    
			                                    <th>Action</th>

			                                    
			                                </tr>
		                                </thead>
		                                <tbody>
		                                	<?php
		                                	date_default_timezone_set("Asia/Dhaka");
		                                	$today = date('d-m-Y');
		                                		$dis = $conn->query("SELECT * FROM rowmaterial WHERE rmSource='$source' ORDER BY rmName");
		                                		$i=1;
		                                		while($dist= $dis->fetch_assoc()):
		                                			$num = $dist['sl'];

		                                			if(isset($_POST['addRM'][$num])){

		                                			$pRmName = $_POST['pRmName'];
													$pRmQuantity = $_POST['pRmQuantity'];
													$pRmUnit = $_POST['pRmUnit'];
													$pRmAmount = $_POST['pRmAmount'];
													
													$pStatus = "Pending";
													$pDisplay = "show";
													
													$pDate = date('d-m-Y');



		                                			if(empty($pRmName) || empty($pRmQuantity) || empty($pRmUnit)){
											$message = "<p class='alert alert-danger'>Field Must Not Be Empty</p>";

											}else{
												

													$conn-> query("INSERT INTO purchaserm(pRmName,pRmQuantity,pRmUnit,pRmAmount,pRmSrcName,pStatus,pDate,color) VALUES('$pRmName','$pRmQuantity','$pRmUnit','$pRmAmount','$source','$pStatus','$pDate','red')");
											
												$message = "<p class='alert alert-success'>Successfully added Purchased RM!</p>";
												
												}
												
											
											echo $message;
										}
		                                
		                                		$product = $dist['rmName'];
		                                		$colo = $conn->query("SELECT * FROM purchaserm WHERE  pDate='$today' AND pRmName='$product'");
		                                		$coloo = $colo->fetch_assoc();
		                                		$color = $coloo['color']; 



		                                	?>
		                                	<form action="" method="POST">
			                                <tr>
			                                    <td><?php echo $i++;?></td>
			                                    
			                                    <td class="text-capitalize">
			                                    	<input name="pRmName"  value="<?php echo $dist['rmName']?>" type="text" class="form-control text-capitalize" readonly>
			                                    </td>
			                                    <td>
		                                            <input  name="pRmQuantity"   type="number" min="1" value="">
		                                        </td>
			                                    <td class="text-capitalize">
			                                    	
													
													<input name="pRmUnit"  value="<?php echo $dist['rmUnit']?>" type="text" class="form-control" readonly>

			                                    </td>
			                                    <td>
		                                            <input  name="pRmAmount"   type="number" min="1" value="">
		                                        </td>

			                                    
			                                    
			                                    <td>
			                                        <button name="addRM[<?php echo $num;?>]" style="background-color: <?php echo $color?>" data-toggle="tooltip" title="All Ok" class="pd-setting-ed"><i class="fa fa-check" aria-hidden="true"></i></button>
					                           		 
			                                    </td>
			                                </tr>
			                            </form>
			                            <?php endwhile;?>
			                                
		                                </tbody>

		                            </table>
		                                                
		                                                    
		                                </div>    
		                            </div>
                        		</div>
                             
		<div class="product-status mg-tb-15" style="margin-top: 15px">
            
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h2 class="alert bg-danger"><b>Confirmation List</b></h2>
                            
                            <div class="table-responsive">
                            <table class="table table-hover">
                            	<thead class="thead thead-dark">
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>RM Name</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    
                                    <th>Amount</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                
                                	$frm = $conn->query("SELECT * FROM purchaserm WHERE pStatus= 'Pending' AND pRmSrcName='$source' ORDER BY sl DESC");
                                	$i=1;
                                	while($fpur=$frm->fetch_assoc()):


                                ?>
                                
                                <tr >
                                    <td><?php echo $i++;?></td>
                                    <td ><?php echo $fpur['pDate']?></td>
                                    <td class="text-capitalize"><?php echo $fpur['pRmName']?></td>
                                    <td><?php echo $fpur['pRmQuantity']?></td>
                                    <td class="text-capitalize"><?php echo $fpur['pRmUnit']?></td>
                                    <td><?php echo $fpur['pRmAmount']?> <span>TK</span></td>
                                    
                                    <td>
                                        <a onclick="javascript: return confirm('Are You Sure?');" href="inc/purchaseRmConfirm.php?sl=<?php echo $fpur['sl']?>&key=<?php echo $sl?>"><button data-toggle="tooltip" title="All Ok" class="pd-setting-ed"><i class="fa fa-check" aria-hidden="true"></i></button></a>
                                        <a onclick="javascript: return confirm('Please Confirm Delation');" href="inc/purchaseRmDelete.php?sl=<?php echo $fpur['sl']?>&key=<?php echo $sl?>"><button data-toggle="tooltip" title="Delete" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                                <?php endwhile;?>
                                </tbody>

                            </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
	
		<div class="panel panel-info" style="margin-top: 20px">
			 <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15" style="margin-top: 15px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h3 class="alert bg-success"><b>Purchase RM List</b></h3>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                  
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="sl">Sl</th>
                                                <th data-field="Date" data-editable="false">Date</th>
                                                <th data-field="Product Name" data-editable="false">RM Name</th>
                                                <th data-field="Quantity" data-editable="false">Quantity</th>
                                                <th data-field="Unit" data-editable="false">Unit</th>
                                                
                                                <th data-field="Amount" data-editable="false">Amount</th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	
			                                <?php
                                        		$today = date('d-m-Y');
                                        		$month = date('m');
												

												

											if(empty($_SESSION['facTaxUser']) AND empty($_SESSION['facTaxPass']) ){
												$frm = $conn->query("SELECT * FROM purchaserm WHERE (pStatus= 'Confirmed' AND pRmSrcName='$source' AND  pMonth= '$month') ORDER BY sl DESC ");
											}else{
												$rr = $conn->query("SELECT * FROM purchaserm WHERE (pStatus= 'Confirmed' AND pRmSrcName='$source' AND  pMonth= '$month') ORDER BY sl DESC ");
												$rrr = $rr-> num_rows;
												 $rrrr = ceil(($rrr*30)/100);

												$frm = $conn->query("SELECT * FROM purchaserm WHERE (pStatus= 'Confirmed' AND pRmSrcName='$source' AND  pMonth= '$month') ORDER BY sl DESC LIMIT $rrrr");
											}
			                                	
			                                	$j=1;

			                                	while($fpur=$frm->fetch_assoc()):



			                                ?>
                                
											<tr >
												<td></td>
			                                    <td><?php echo $j++;?></td>
			                                     <td><?php echo $fpur['pDate']?></td>
			                                    <td class="text-capitalize"><?php echo $fpur['pRmName']?></td>
			                                    <td><?php echo $fpur['pRmQuantity']?></td>
			                                    <td class="text-capitalize"><?php echo $fpur['pRmUnit']?></td>
			                                    <td><?php echo $fpur['pRmAmount']?> <span>TK</span></td>
			                                    
			                                    
			                                </tr>
			                                <?php endwhile;?>
                                		</tbody>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
		</div>


		<div class="panel panel-info" style="margin-top: 20px">
			 <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15" style="margin-top: 15px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h3 class="alert bg-warning"><b>Accounts Info</b></h3>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                  
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="sl">Sl</th>
                                                <th data-field="Date" data-editable="false">Date</th>
                                                <th data-field="Time" data-editable="false">Time</th>
                                                <th data-field="Purchase Amount" data-editable="false">Purchase Amount</th>
                                                <th data-field="Purchase Paid" data-editable="false">Purchase Paid</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	
			                                <?php
                                        		$today = date('d-m-Y');
                                        		$month = date('m');
												

												

											
												$ac = $conn->query("SELECT * FROM rmaccount WHERE  pSource='$source' AND  pMonth= '$month' ORDER BY sl DESC ");
												

												
											
			                                	
			                                	$j=1;

			                                	while($account=$ac->fetch_assoc()):



			                                ?>
                                
											<tr >
												<td></td>
			                                    <td><?php echo $j++;?></td>
			                                     <td><?php echo $account['pDate']?></td>
			                                    <td ><?php echo $account['pTime']?></td>
			                                    
			                                   
			                                    <td><?php echo (double)$account['pAmount']?> <span>TK</span></td>
			                                    <td><?php echo (double)$account['pPaid']?> <span>TK</span></td>
			                                    
			                                    
			                                </tr>
			                                <?php endwhile;?>
                                		</tbody>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
		</div>


		<p class="alert bg-info " style="text-align: center; margin-top:80px">Powered By @ NAHID HASAN BHUIYAN & TEAM</p>

		</div>
		
<!--market updates end here-->
<!--mainpage chit-chating-->

<!--main page chart layer2-->

<!--climate start here-->

<!--climate end here-->
</div>
<!--inner block end here-->

</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="../../factory.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        <li><a href="../../factory/order/order.php"><i class="fa fa-cart-plus"></i><span>Ad. Orders</span><span></span></a>
		        </li>
		        <li id="menu-academico" ><a href="#"><i class="fa fa-industry"></i><span>Row Material</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-academico-sub" >
		          	 <li id="menu-academico-boletim" ><a href="../../factory/rm/byout_sum.php">Purchased Row Material</a></li>
		            <li id="menu-academico-avaliacoes" ><a href="../../factory/rm/usedRm.php">Used Row Material</a></li>		           
		            <li id="menu-academico-avaliacoes" ><a href="../../factory/rm/wastageRm.php">Wastage Row Material</a></li>		           
		          </ul>
		        </li>
		        
		        <li><a href="#"><i class="fa fa-money"></i><span>Expenses</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="../../factory/expense/fexpense.php">Factory Expenses</a></li>
			            <li id="menu-academico-boletim" ><a href="../../factory/expense/rNd.php">Research & Development</a></li>
			            
		             </ul>
		         </li>
		         <li><a href="#"><i class="fa fa-birthday-cake"></i><span>Product</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="../../factory/product/category.php">Product Made</a></li>
			            <li id="menu-academico-boletim" ><a href="../../factory/product/cat.php">Product Distribution</a></li>
			            
		             </ul>
		        </li>
		          
		        <li id="menu-comunicacao" ><a href="../../factory/facReports/facReports.php"><i class="fa fa-home nav_icon"></i><span>Factory Reports</span></a>
		        </li>
		        
		        
		        
		         <li><a href="../../factory/outReports/outReports.php"><i class="fa fa-bar-chart"></i><span>Outlet Reports</span></a></li>
		         
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="../../js/jquery.nicescroll.js"></script>
		<script src="../../js/scripts.js"></script>
		<!--//scrolling js-->
<script src="../../js/bootstrap.js"> </script>
<!-- mother grid end here-->

<!-- data table JS
		============================================ -->
    <script src="../../plugin/data-table/bootstrap-table.js"></script>
    <script src="../../plugin/data-table/tableExport.js"></script>
    <script src="../../plugin/data-table/data-table-active.js"></script>
    <script src="../../plugin/data-table/bootstrap-table-editable.js"></script>
    <script src="../../plugin/data-table/bootstrap-editable.js"></script>
    <script src="../../plugin/data-table/bootstrap-table-resizable.js"></script>
    <script src="../../plugin/data-table/colResizable-1.5.source.js"></script>
    <script src="../../plugin/data-table/bootstrap-table-export.js"></script>


    <!-- chosen JS
		============================================ -->
    <script src="../../plugin/chosen/chosen.jquery.js"></script>
    <script src="../../plugin/chosen/chosen-active.js"></script>
</body>
</html>                     