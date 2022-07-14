





<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title></title>
    </head>
    <body>
	   <table width="100%" align="left" cellspacing="0" cellpadding="0">
		    <tr>		  		
		  		<td valign="top">





<html>
<head>
<meta charset="utf-8">
<title>Customer Interface</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<link href="pages/resources/css/cssForTrackingEnhancement/trackingenhance.css" rel="stylesheet">
<link href="pages/resources/js/jquery/jquery-ui_enhancement/jquery-ui.css" rel="stylesheet">
<link href="pages/resources/css/cssForTrackingEnhancement/bootstrap.min.css" rel="stylesheet">
<link href="pages/resources/css/cssForTrackingEnhancement/bootstrap-responsive.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="pages/resources/css/cssForTrackingEnhancement/font-awesome.css" rel="stylesheet">
<link href="pages/resources/css/cssForTrackingEnhancement/style.css" rel="stylesheet">
<link href="pages/resources/css/cssForTrackingEnhancement/bootstrap-slider.css" rel="stylesheet">

<script src="pages/resources/js/jquery/jquery-ui.min.js" type="text/javascript"></script>
<script src="pages/resources/js/ajax.js" type="text/javascript"></script> 
<script src="pages/resources/js/trackingEnhancement/prototype.js" type="text/javascript"></script>
<script src="pages/resources/js/trackingEnhancement/customerInterface.js" type="text/javascript"></script>

<style>
.mapshadow_style {
	height: 400px;
	width: 600px;
	z-index: 1;
	-webkit-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.75);
	-moz-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.75);
	box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.75);
}

.content_down {
	display: none;
}

.hide_div {
	display: none;
}

table {
	width: 100%;
}

#linkId {
	position: absolute;
}

#subscribe {
	float: left;
	padding-right: 10px;
}

#viewPOD {
	float: right;
}

/* .font_cap {
	text-transform: lowercase;
} */
.font_cap:first-letter {
	text-transform: capitalize;
}

.top_nav_style {
	margin-bottom: 1%;
}

.widget-header_new {
	background: #336699 none repeat scroll 0 0 !important;
	border-top: 4px solid #6699cc !important;
}

.widget-header_new h3 {
	text-shadow: 0px !important;
}

.white_style {
	color: #ffffff !important;
}

.widget-header_new [class^="icon-"],.widget-header_new [class*=" icon-"]
	{
	color: #ffffff !important;
}

.table th,.table td {
	font-size: 12px;
	padding: 1px !important;
	border-top: 0 solid #ffffff;
}

.widget-header h3 {
	line-height: 30px !important;
	margin-right: 21px;
	top: -2px;
}

.widget {
	margin: 0 auto;
	width: 60%;
	overflow: visible !important;
}

.widget-content {
	font-size: 13px !important;
}

.breadcrum2_style li {
	font-size: 12px;
	opacity: 0.5;
}

#href_style1 {
	width: 40%;
	float: left;
}

#href_style2 {
	width: 40%;
	float: right;
}

.table tbody tr:hover td,.table tbody tr:hover th {
	background-color: #ffffff !important;
}

.activity_details {
	border: 1px #dddddd solid;
}

#dlvColor {
	font-size: 14px;
	color: red;
}
/*
.activity_details th, .activity_details td{
padding:1%!important;
}*/
.activity_details1 th,.activity_details1 td {
	padding-left: 1% !important;
	padding-right: 0% !important;
}

.toggle {
	display: inline-block;
	height: 20px;
	width: 20px;
	background: url("http://us.marantz.com/Assets/images/plus_icon.png")
		no-repeat;
	cursor: pointer;
}

.toggle.expanded {
	height: 20px;
	width: 20px;
	background:
		url("https://bto.bluecoat.com/webguides/security_analytics/7.1/platform_webguide/desktop/_general-gfx/icon-minus.gif")
		no-repeat;
	cursor: pointer;
}

.widget-content {
	border-radius: 0;
	padding: 0 !important;
}

.new_header_style {
	height: 25px;
}

.new_header_style h3 {
	line-height: 20px !important;
}
.modal-rc{
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 1; /* Sit on top */
	padding-top: 100px; /* Location of the box */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0, 0, 0); /* Fallback color */
	background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
	margin: 0;
}
.modal-content-pod {
	background-color: #f0f2f3;
	margin: auto; /*padding: 20px;*/
	border: 1px solid #888;
	width: 50%;
	border-radius: 5px;
}
/*  Email Box  */

.mailIDbox{
		width: 254px;
		height: 40px;
		position: absolute;
		background: #2670ba;
	padding: 5px 10px;
		right: 50px;
		display:none;
		z-index: 9999;
	box-shadow: #a59e9e -3px 4px 5px;
	}
.mailIDbox input{
margin: 3px 0px;
padding: 15px;
	border: #ccc solid 2px;
}
.mailIDbox button{
margin-left:0px;
padding: 6px;
border-radius: 0px 6px 6px 0px;
	background-color: #ffe100;
	border: #ffe100 solid 1px;
}
.mailIDbox input[type="button"]{
margin-left:0px;
padding: 6px;
border-radius: 0px 6px 6px 0px;
	background-color: #ffe100;
	border: #ffe100 solid 1px;
	
}
.imageStyle {
	display: block;
	width: 27px;
	float: left;
}

/*  Email Box  */


</style>

</head>
<body>
<!-- Modal for RecordCommunication -->
	<div id="RCModal" class="modal-rc">
		<!-- Modal content -->
		<div class="modal-content-pod">
			<div style="background-color: #336699; color: #fff; padding: 10px;">
				<h4 style="display: inline;">
					<span id="popUpSenderReceiver">Record Communication Information</span>
				</h4>
				<span class="close">X</span>
			</div>
			<form style="padding: 10px; padding-bottom: 0;">
				               <div class="table-responsive">          
                              <table class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                       <th>#</th>
                                       <th>Date</th>
                                       <th>Record Comunication</th>
                                      </tr>
                                         </thead>
                                      <tbody>
                                      
                                     
                                              </tbody>
                                             </table>
                                           </div>
			</form>
		</div>
	</div>
	<!-- Modal for RecordCommunication -->
<div class="main" id="main" style="padding-bottom: 0em;">
<!-- padding is chnged to 0 from 5 as suggested by Debasish -->
<div class="main-inner">
<div class="container" style="width: 100%">
<!-- <div class="row"> -->
<div>
<span class="span12">
<div class="widget widget-table action-table" style="width: 100%">
	<div class="widget-header widget-header_new">
		<!--  <i class="icon-sign-blank "></i>-->
		<h3 class="white_style">Shipment Summary</h3>
		<h3 class="white_style" style="float:right; padding-top:3px;"><a style="color:#fff;" href="javascript:window.print()"><span class="icon-small icon-print">&nbsp;</span><span style="padding-right:7px; font-size:14px;" class="fa fa-instagram icon" class="fftxt">&nbsp;Print</span></a></h3>
        <h3 class="white_style" style="float:right; padding-top:3px;"><a style="color:#fff;" href="#" class="mailIDD"><span class="icon-small icon-envelope">&nbsp;</span><span style="padding-right:7px; font-size:14px;" class="fftxt">&nbsp;Mail Me</span></a></h3>
		<h3 class="white_style" style="float:right; padding-top:3px;"><div id="subscribe" style="display: block;"><a style="color:#fff;" href="#"><span class="icon-small icon-bell">&nbsp;</span><span style="padding-right:7px; font-size:14px;" class="fftxt">&nbsp;NotifyMe</span></a></div></h3>
		<h3 class="white_style" style="float:right; padding-top:3px;"><a style="color:#fff;" href="#" onclick="openRaisequeryWindow();"><span class="icon-small icon-pencil">&nbsp;</span><span style="padding-right:7px; font-size:14px;" class="fftxt">&nbsp;Raise your Query</span></a></h3>
		
	</div>
	<!-- Email Box -->
					
                  <div id="mailIDput" class="mailIDbox">
                    <form>
                      <input type="text" id="trackingEmail" placeholder="Enter Email Id" style="width: 195px;" >
                      <input type="button"  value="submit" 	class="internetEmailMeClick">
                     <!--  <button class="internetEmailMeClick">Send</button> -->
                    </form>
                  </div>
					
					<!-- Email Box -->
	<div class="widget-content">
	<table class="table">
	<tbody>
	
	<tr>
	<input	type="hidden" value="D13842775" id="cnNo"></input>
	<input	type="hidden" value="D13842775" id="cnNNo">
		<input type="hidden" value='Successfully Delivered' id='internetstatus'></input>
		<td width="25%" class="bold_style">Tracking No.</td>
		<td width="25%" id="cnNo">
		
		
			D13842775
		
	
	<input	type="hidden" value="D13842775" id="cnNo"></input>
	</td>
	<td class="bold_style">Last Status Date</td>
	<td id="lstStausDt">10<sup>th</sup> may'22</td>
	
	</tr>
	<tr>
		<td class="bold_style">Reference No.</td>
		<td id="refNumber">123368175954</td>
		<td width="25%" class="bold_style">Last Status</td>
	<td width="25%" id="lsSt" style="text-transform: capitalize">
	
	
	<B><font color="blue"><img
			src="pages/resources/images/trackingEnhancement/icons/delivery.png;jsessionid=0C2EE590901158F8A57840A038A2E8B4" />
	Successfully Delivered</B>
	</font>
	
	
	
	<div id="linkId">
				<div id="viewPOD" style="float:none;margin-left:25px;">
					<a href="#">View POD</a>&nbsp;&nbsp;
				</div>
				<div id="viewSignature" style="float:none;margin-left:25px;">
				<a href="#"> View Signature</a>
			</div>
			</div>
			</td>
		</td>
	</tr>
	<tr>
		<td class="bold_style">Booking Date.</td>
		<td id="bookingDate"> 06<sup>th</sup> may'22</td>
		<td class="bold_style">&nbsp;</td>
		<td>
		   <div id="viewDRSImage">
			 <a href="#" id="drsImgLink"><img class="imageStyle" src="pages\resources\images\trackingEnhancement\icons\deliveryrunsheet.png" title="view DRS Image" /> 
			 </a>
		   </div>
           <div id="viewImage">
			 <a href="#" id="podImgLink"><img class="imageStyle" src="pages\resources\images\trackingEnhancement\icons\viewpod.png" title="view POD" /> 
			 </a>
		   </div>
		</td>
	</tr>
	
	<tr>
		<td class="bold_style">&nbsp;</td>
		<td>&nbsp;</td>
   </tr>
	
	
	</tbody>
	</table>
							
								
							
								<div class="widget-header new_header_style">
									<h3>
										<u>Shipment Details</u>
									</h3>
								</div>
								<table class="table">

									<tbody>
										<tr>
											<td width="15%" class="bold_style">Origin</td>
											<td width="25%" style="text-transform: capitalize">
													
													
														pune
														

													
												</td>
											<td width="25%" class="bold_style">Destination</td>
											<td width="25%" style="text-transform: capitalize">
													
													
														jalgaon
														

													
												</td>
												<td width="20%" class="bold_style">Destination Pincode</td>
												<td width="20%" style="text-transform: capitalize">
												425107
												</td>
										</tr>
										<tr>
											<td class="bold_style">No. of pieces</td>
											<td id="numberOfPiece">1</td>
											<td class="bold_style">Service Type</td>
											<td style="text-transform: capitalize">
													
													
														lite
														

													
												</td>
										</tr>
										<tr>
											
											<td class="bold_style">Package contents</td>
											<td style="text-transform: capitalize">
													
													
														laptop

													
												</td>
											
										</tr>



									</tbody>
								</table>

								<div id="rcverDtls" style="display: none">
									<div class="widget-header">
										<h3>
											<u>Receiver Details</u>
										</h3>
									</div>
									<table class="table">

										<tbody>
											<tr>
												<td width="25%" class="bold_style">Receiver Name</td>
												<td width="25%" style="text-transform: capitalize">
														
														
															hitesh

														
													</td>
												<td width="25%" class="bold_style">Relationship</td>
												<td width="25%" style="text-transform: capitalize">
														
														
															relative

														
													</td>
											</tr>
											<tr>
												<!-- <td class="bold_style">Phone</td> -->
												<td></td>
												<td></td>
												
												<td class="bold_style">email</td>
												<td style="text-transform: capitalize">
														
														
															

														
													</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>


						</div>
						<!-- RECORD COMMUNICATION DETAILS -->
									<!-- <h3 >
										<div >
											<button type="button" class="btn icon-hand-right btn-info btn-rounded"	id="rcClick" > Record Communication Details</button>
										</div>
										</h3> -->
									<!-- RECORD COMMUNICATION DETAILS -->

					</span> <span class="span12">

						<div class="widget widget-table action-table"
							id="multiplePieceTag" style="display: none; width: 100%">
							<div class="widget-header widget-header_new">
								<!--  <i class="icon-sign-blank "></i>-->
								<h3 class="white_style">Multi-piece Shipment Details</h3>
							</div>


							<!-- /widget-header -->
							<div class="widget-content">


								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>AWB No.</th>
											<th>Delivery Status</th>
											<th>Date</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										

										
									</tbody>
								</table>
								<br>
							</div>
						</div>
						<div id="singleShipmentDisplay" style="cursor:pointer!important; display: none; width: 100%; margin: 1% auto 0;">
							<!-- width is changed from 60% to 100% as Debasish suggested -->
							
							
							<table>
								<tr >
											<td colspan="4"><a id="collapseOne_sign "
												class="accordion-toggle " data-toggle="collapse"
												data-parent="#accordion" href="#D13842775">
													<div class="widget-header widget-header_new">
														<h3 class="white_style">
															<u>Shipment Tracking History</u>
														</h3>
														<span style="float: right; margin-right: 10px;"> <span
															id="D13842775_sign"
															class="icon-large icon-plus-sign "
															style="font-size: 20px;"></span>
														</span>
													</div>
											</a></td>
										</tr>
								<tr>
									<td colspan="4">
										<div id="D13842775" class="panel-collapse collapse">
											<div class="panel-body">
												<br>
												<div id="D13842775_displayBar"
													style="display: none; margin-top: -15px;">
													<ul id="breadcrumbs-two" class="breadcrum2_style">
														<!-- removed bcz all icons are getting displayed -->
														<li id="pickedup_D13842775"><a href=""><i
																class="box_style" style="float: left;"></i>&nbsp;
																Pick Up</a></li>
														<li id="booked_D13842775"><a href=""><i
																class="box_style " style="float: left;"></i>&nbsp;Booked
																& Dispatch</a></li>
														<li id="inTran_D13842775"><a href=""><i
																class="intransit" style="float: left;"></i>&nbsp; In
																Transit</a></li>
														<li id="dest_D13842775"><a href=""><i
																class="destination" style="float: left;"></i>&nbsp; At
																Destination</a></li>
														<li id="outForDel_D13842775"><a href=""><i
																class="outfordelivery" style="float: left;"></i>&nbsp;
																Out for Delivery</a></li>
														<li id="del_D13842775"><a href=""><i
																class="delivery_icon" style="float: left;"></i>&nbsp;
																Delivered</a></li>
														<li id="heldUp_D13842775" style="display: none"><a
															href=""><i class="heldUp_icon" style="float: left;"></i>&nbsp;
																Held Up</a></li>
														<li id="misRoute_D13842775" style="display: none"><a
															href=""><i class="misroute_icon" style="float: left;"></i>&nbsp;
																MisRoute</a></li>
														<li id="undlvred_D13842775" style="display: none"><a
															href=""><i class="undlvred_icon" style="float: left;"></i>&nbsp;
																UnDelivered</a></li>
														<li id="RTO_D13842775" style="display: none"><a href=""><i
																class="RTO_icon" style="float: left;"></i>&nbsp; RTO</a></li>
													</ul>
													<table class="table activity_details activity_details1"
														style="background-color: #ffffff;">
														<thead style="background: #336699; color: #ffffff;">
															<tr>
																<th width="15%">Date</th>
																<th width="37%">Activity</th>
																<th width="4%"></th>
																<th width="4%"></th>
																<!-- <th width="33%">Location</th> -->
																<th width="18%">From</th>
																<th width="4%"></th>
																<th width="18%">To</th>
															</tr>
														</thead>
														</br>
														</div>
														<tbody id="activityDetailsForChildCn_D13842775"
															style="text-transform: capitalize !important;">

														</tbody>
													</table>
												</div>
											</div>
									</td>
								</tr>
								</tr>
							</table>

						</div> <br>
						<div class="widget" style="width: 100%">



							
							<!-- /widget-content -->
							<div class="account-container">

								<div class="content clearfix" style="display: none">

									<form name="customerInterfaceForm" id="customerInterfaceForm" method="post" action="/ctbs-tracking/customerInterface.do;jsessionid=0C2EE590901158F8A57840A038A2E8B4">
										<div class="widget-header widget-header_new"
											style="margin-top: 10px;">
											<!--  <i class="icon-sign-blank "></i>-->
											<h3 class="white_style">TRACKING</h3>
										</div>


										<div class="login-fields" id="TrackDiv1"
											style="display: block;">

											<p>
												<input type="radio" name="to.custType" value="Consignment" id="custType">&nbsp;Shipment No
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" name="to.custType" value="Ref" id="custType">&nbsp;Reference No
											</p>

											<div class="field textarea_style">
												<div id="validateCn"></div>
												<textarea name="to.consignmentNumber" id="consignmentNumber"></textarea>
												<!-- for multiple -->
												<font size="1" color="#990000"><a
													onMouseOver="this.style.cursor='pointer'"
													;  onClick="Javascript:switchMain('2');"></a> </font>


												<input type="button" name="button" value="Track" onclick="prepareUrlAndFormSubmit();" class="button btn btn-success btn-large">
												<input type="hidden" name="to.userType" value="1" id="userType">

											</div>
											<!-- /field -->


										</div>
										<!-- /login-fields -->

										<!-- for multiple track starts -->
										<div class="login-fields" id="TrackDiv2"
											style="display: none;">

											<p>
												<input type="radio" name="to.custTypeForMul" value="Consignment" id="custTypeMul">&nbsp;Shipment No
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" name="to.custTypeForMul" value="Ref" id="custTypeMul">&nbsp;Reference No
											</p>

											<div class="field textarea_style">
												<!-- <textarea name="consignmentNumber" rows="3" cols="50"></textarea> -->
												<textarea name="to.consignmentNumberForMul" id="consignmentNumberForMul"></textarea>
												<span><font size="1">Enter Multiple
														Consignment Numbers Upto 25 Seperated By Comma.</font></span><br> <font
													size="1" color="#990000"><a
													onMouseOver="this.style.cursor='pointer'"
													; onClick="Javascript:switchMain('1');"> Click Here To
														Track Single Consignments</a></font>

												<input type="button" name="button" value="Track" onclick="prepareUrlAndFormSubmitForMul();" class="button btn btn-success btn-large">
												<input type="hidden" name="to.userType" value="1" id="userType">
											</div>
											<!-- /field -->


										</div>
										<!-- /login-fields -->
										<!-- multiple Track ends -->
										<div class="login-actions">

											<span class="login-checkbox"> <label class="choice"
												for="Field"><a href="">Help Me Track</a> &nbsp; |
													&nbsp; <a href="">More Tracking Options</a></label>
											</span>



										</div>
										<!-- .actions -->



									</form>

								</div>
								<!-- /content -->

							</div>
							<!-- again ends -->
						</div>
				</div>
				</span>



			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>

	</div>





	<!-- Notify Enhancement Ends -->
	<!-- commented the footer as suggested by Debasish -->
	<!-- <div class="footer">
		<div class="footer-inner">
			<div class="container">
				<div class="row">
					<div class="span12">
						&copy; 2015 <a href="">DTDC</a>
					</div>
					/span12
				</div>
				/row
			</div>
			/container
		</div>
		/footer-inner
	</div> -->


	<!-- /footer -->
	<!-- Le javascript
================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="pages/resources/js/trackingEnhancement/jquery-1.7.2.min.js"></script>
	<script src="pages/resources/js/trackingEnhancement/bootstrap.js"></script>
	<script src="pages/resources/js/trackingEnhancement/bootstrap-slider.js"></script> 

	<!--  <script  src="pages/resources/js/jquery/jquery.blockUI.js"</script> -->

	<script type="text/javascript">
		$('.collapse').on(
				'shown.bs.collapse',
				function() {
					var GotId = $(this).attr('id');

					var count = 0;
					if (count == 0) {
						getLoadMovementDetails(GotId);

						count = count + 1;

					}
					$('#' + GotId + '_sign').find(".icon-plus-sign")
							.removeClass("icon-plus-sign").addClass(
									"icon-minus-sign");
				}).on(
				'hidden.bs.collapse',
				function() {
					var GotId = $(this).attr('id');

					document.getElementById("activityDetailsForChildCn_"
							+ GotId).innerHTML = "";
					$('#' + GotId + '_sign').find(".icon-minus-sign ")
							.removeClass("icon-minus-sign").addClass(
									"icon-plus-sign");
				});
	</script>
	<script type="text/javascript">
	/* RC SCRIPT */
	$('#rcClick').on('click', function() {
		var modal = $('#RCModal');
		modal.show();
	});
	$('#rcClick').css('cursor', 'pointer');
	$('.close').on('click', function() {
		var modal = $('#RCModal');
		modal.hide();
	});
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			var modal =document.getElementById('RCModal'); 
			modal.style.display = "none";
		}
	}; 
	/* RC SCRIPT */
	
	$('.mailIDD').on('click', function() {
		$("#mailIDput").slideToggle();
	});
		
	</script>
	<script>
		$(document)
				.ready(
						function() {
							var status = "false";
							var smartTrackSig = "";
							var $content = $(".content_down").hide();
							var drsImgPath = "http://rcspl.in/DRSDTDCPortal/DRSDTDCImages/DRSFile/PNQ/5008480089.pdf";  //drs Image Path
							var podImgPath = "http://rcspl.in/DRSDTDCPortal/DRSDTDCImages/AWBNo/PNQ/D13842775.pdf"; // pod image Path
							//hide of drs & pod image path on page load
							$("#viewDRSImage").hide();
							$("#viewImage").hide();
							
							
							
							if(document.getElementById("sc") != null){
								document.getElementById("sc").style.color = "red";
							}
							
							//console.log("DRS Path: "+drsImgPath+" , POD Path: "+podImgPath);
							$(".toggle").on("click", function(e) {
								$(this).toggleClass("expanded");
								$content.slideToggle();
							});
							//Added for View Signature
							$("#viewSignature").hide();
							$('#rcClick').hide();
							if (status == "true") {
								$("#viewSignature").hide();
							} else if (smartTrackSig != null && smartTrackSig != "") {
								$("#viewSignature").hide();
							} else {
								$("#viewSignature").hide();
							}
							//Added for View POD
							var podValue = '';
							if (podValue != null
									&& podValue != "") {
								$("#viewPOD").hide();
							} else {
								$("#viewPOD").hide();
							}//ends
							
							//DRS and POD validation on link show
							if(drsImgPath != null && drsImgPath != ""){
								$("#viewDRSImage").show();
								$("#viewDRSImage").click(function(){
									window.open(drsImgPath);
								});
							}
							
							if(podImgPath != null && podImgPath != ""){
								$("#viewImage").show();
								$('#viewImage a').click(function(){
									 window.open(podImgPath);
								});
							}
							
							var singleShipmentTag = 'singlePieceParent';
							var rcverDtls = 'D';
							var notifyEnabled = true;
							var recordCommunications = "[]";
							if (rcverDtls == "") {
								rcverDtls = '';
							}
							var ltstatus = 'Successfully Delivered';
							var lastStat =  ltstatus.replace(/[^\w\s]/gi, '');
							var lastStatus = lastStat.replace(/[^\w\s]/gi, '');

							document.getElementById("consignmentNumber").value = "";
							if (singleShipmentTag == 'singlePieceParent') {
								document.getElementById("multiplePieceTag").style.display = "none";
								document.getElementById("singleShipmentDisplay").style.display = "block";
							} else {
								document.getElementById("multiplePieceTag").style.display = "block";
								document.getElementById("singleShipmentDisplay").style.display = "none";
							}
							//RECORD COMMUNICATIONS
							if(recordCommunications != "[]"){
								$('#rcClick').show();
							}
							//Notify option condition
							if (lastStatus == "Delivered" || lastStatus == "RTO Delivered" || lastStatus == "Successfully Delivered" || rcverDtls == "D" || rcverDtls == "C") {
								document.getElementById("rcverDtls").style.display = "block";
								document.getElementById("subscribe").style.display = "none";
							}
							else {
								document.getElementById("subscribe").style.display = "block";
								/* if(notifyEnabled){
									  $("#notify").dialog({
									      autoOpen: true,
									   }); 
									 document.getElementById("subscribe").style.display = "block";
								}
								else {
									document.getElementById("subscribe").style.display = "none";
								} */
							}

						});
		
	</script>
	<script type="text/javascript"
		src="pages/resources/js/trackingEnhancement/emailalertTrackingEn.js"></script>
	<script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script
		src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


	<!--  added by khader-->
	<div id="notify" class="hide_div">
	Submit your Mobile no & Email Id for final Delivery Update.
		<div id="popUpMessage">&nbsp;</div>
		<form id="notifySubscribeForm" method="GET"
			action="/ctbs-tracking/notify.tr?submitName=notify"
			class="trackingenhancecontainer">
			<fieldset>
				<input type="hidden" name="consignmentNumber"
					id="trackingConsignmentNumber"><span
					class="trackingenhanceClose">X</span>
				<p class="trackingenhanceP">
					<label for="email">E-Mail ID :</label> <input type="text"
						name="email" id="trackingEmailt" class="trackingenhanceInputText"
						maxlength="50" required="required">
				</p>
				<p class="trackingenhanceP">
					<label for="mobileNumber">Mobile No:</label> <input type="text"
						name="mobileNumber" id="mobileNumber"
						class="trackingenhanceInputText" maxlength="10"
						required="required">
				</p>
				<p class="trackingenhanceP">
					<label for="space">&#32; </label><input type="button"
						value="submit" class="trackingenhanceInputSubmit">
				</p>
			</fieldset>
		</form>
	</div>
	<!--  added by khader-->
	<div id="subscribeStatus" class="trackingenhancecontainer hide_div">
		<h1 class="trackingenhanceh1">
			<p class="trackingenhanceP">Thank You.Your request has successfully submitted.</p>
			<p class="trackingenhanceP">We will notify you, once the consignment delivered.</p>
		</h1>
	</div>
	

	<!--  added by khader-->
	<script type="text/javascript"
		src="pages/resources/js/trackingEnhancement/jquery-1.7.2.min.js"></script>
	<script
		src="pages/resources/js/jquery/jquery-ui_enhancement/jquery-ui.min.js"
		type="text/javascript"></script>
	<script type="text/javascript"
		src="pages/resources/js/trackingEnhancement/notifyenhancement.js"></script>

	<script language="JavaScript"
		src="pages/resources/js/jquery/jquery.blockUI.js"
		type="text/javascript"></script>
		
		<script type="text/javascript">
			$('#viewPOD a').click(function() {
					//var consignmentNumber = $('#podConsignNumber').val();
					var status = "";
					if (status != null && status != "") {
							window.open(status);
					} else {
							$("#viewPOD").hide();
							//window.open("http://imagenew.dtdc.com:8080/dtdc/ImageIntegration/jsp/NGI_DocDetails.jsp?ConsgnNo="+consignmentNumber,"img","height=60,width=450,top=280,left=440,toolbar=no,menubar=no,status=yes,scroll=auto");
									}
						});
			
			

			$('#viewSignature a')
					.click(
							function() {
								var consignmentNumber = "D13842775";
								var status = "";
								if (status != null && status != "") {
									window.open(status);
								} else {
									window
											.open(
													"http://imagenew.dtdc.com:8080/dtdc/ImageIntegration/jsp/NGI_DocDetails.jsp?ConsgnNo="
															+ consignmentNumber,
													"img",
													"height=60,width=450,top=280,left=440,toolbar=no,menubar=no,status=yes,scroll=auto");
								}
							});
			
		</script>
	<!-- <script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o), m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script',
				'https://www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-81897746-3', 'auto');
		ga('send', 'pageview');
	</script>
 -->
<script type="text/javascript">
debugger; // var doctype = arrayOfTat[3] == 'D' ? 'Dox' : ((arrayOfTat[3] == 'N') ? 'Non-Dox' : ('N/A'));
	function openRaisequeryWindow(){
		var consgNo = $('#cnNo').val() == "" ? $('#cnNNo').val() : $('#cnNo').val();
		var w = 1000; //875;
    	var h = 650; //570;
    	var left = Number((screen.width/2)-(w/2));
    	var tops = Number((screen.height/2)-(h/2));
    	//var url = 'https://india.dtdc.in/CustomerFeedback/';
    	//var url = 'http://myquery.dtdc.com/CustomerFeedback/FeedbackPageController?conNumber='+consgNo+'&param2=QueryData'; 
    	//var url = 'https://india.dtdc.in/CustomerFeedback/feedback.jsp?conNumber='+consgNo+'&param2=QueryData';
    	//var url = 'https://support.dtdc.com';
		var url = 'https://crm.dtdc.com/crm-web/complainTicket?mode=website';
		//var url = 'https://crmuat.dtdc.com/crm-web-uat/complainTicket?mode=website';
		var queryWin = window.open(url, "RaiseQuery",'toolbar=yes, location=no, status=no, scrollbars=yes, resizable=yes, width='+w+', height='+h+', top='+tops+', left='+left);
	   
	    queryWin.document.close();
	    queryWin.focus();
	}

	function openEcNoteWindow(){
		var w = 875;
    	var h = 570;
    	var left = Number((screen.width/2)-(w/2));
    	var tops = Number((screen.height/2)-(h/2));
    	//var url = 'https://support.dtdc.com';
    	var url = '';
		var queryWin = window.open(url, "Ec Note",'toolbar=yes, location=no, status=no, scrollbars=yes, resizable=yes, width='+w+', height='+h+', top='+tops+', left='+left);
		queryWin.document.close();
	    queryWin.focus();
	}
</script>
</body>
</html>
</td>
		  	</tr>		  
	   </table>
    </body>
</html>

