<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <meta name="HandheldFriendly" content="true" />
  <meta name="viewport" content="width=device-width;target-densitydpi=device-dpi;initial-scale=1.0; maximum-scale=1.0;minimum-scale=1.0; user-scalable=0;"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <title>PayUbiz</title>
  <script type="text/javascript">
  var baseImagePath = 'https://static.payu.in/images/';
  </script>
  <link rel="shortcut icon" type="image/ico" href="https://static.payu.in/images/favicon.png" />
      <link href="https://static.payu.in/css/screen.css?version=4"  rel="stylesheet" type="text/css" />
  <style type="text/css"></style>  </head>
<body>
<div data-role="page" class="container" id="page">  
    <div id="header" class="clearfix" style='width:100%;margin-top: 10%;' >
      <div id="payu_logo"
     >  
  </div>
    </div>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js oldie ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js oldie ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link type="text/css" rel="stylesheet" media="all" href="https://static.payu.in/css/base_mini.css?version=1.0.0" />
</head>
<body>

<div class="logo-container">

      <img src="https://static.payu.in/images/payu_india.gif">  
  </div>
<div id="content" class="borderNone message append-bottom" >
    <div class="message append-bottom prepend-top append-1 prepend-1">
                    <span style="color:#999" class="append-bottom">Your payment has been processed but transaction is not yet complete.</span><br>
            <img src="https://static.payu.in/images/ajax-loader-new.gif"><br><br>
            <span style="color:#999">Please do not hit refresh or back button or close this window.</span>
            </div>
</div>

<script language="javascript" type="text/javascript">
  function display_timer(seconds) {
    if(seconds > 1) {
      seconds-=1;
      document.getElementById('remaining_time').innerHTML = seconds;
      setTimeout( function(){ display_timer(seconds) }, 1000);
    }
  }
  display_timer(0);
</script>

<div>
<form name="frmPostBack" id="frmPostBack" action="localhost:3456/index.php" method="post" style="display:none;">
  <input type="hidden" name="mihpayid" value="15418439376" />
      <input type="hidden" name="mode" value="UPI" />
    <input type="hidden" name="status" value="success" />
  <input type="hidden" name="unmappedstatus" value="captured" />
  <input type="hidden" name="key" value="lv1XzK" />
  <input type="hidden" name="txnid" value="Avdhuts212" />
  <input type="hidden" name="amount" value="1.00" />
      <input type="hidden" name="discount" value="0.00" />    <input type="hidden" name="net_amount_debit" value="1" />  <input type="hidden" name="addedon" value="2022-06-28 22:46:37" />
  <input type="hidden" name="productinfo" value="iPhone" />
  <input type="hidden" name="firstname" value="Avdhut" />
  <input type="hidden" name="lastname" value="" />
  <input type="hidden" name="address1" value="" />
  <input type="hidden" name="address2" value="" />
  <input type="hidden" name="city" value="" />
  <input type="hidden" name="state" value="" />
  <input type="hidden" name="country" value="" />
  <input type="hidden" name="zipcode" value="" />
  <input type="hidden" name="email" value="avdhut.kamble776@gmail.com" />
  <input type="hidden" name="phone" value="9988776655" />
  <input type="hidden" name="udf1" value="" />
  <input type="hidden" name="udf2" value="" />
  <input type="hidden" name="udf3" value="" />
  <input type="hidden" name="udf4" value="" />
  <input type="hidden" name="udf5" value="" />
  <input type="hidden" name="udf6" value="" />
  <input type="hidden" name="udf7" value="" />
  <input type="hidden" name="udf8" value="" />
  <input type="hidden" name="udf9" value="" />
  <input type="hidden" name="udf10" value="" />
  <input type="hidden" name="hash" value="b8b113971723fdbb1f3b5d62b8d8d5938c8116013951df809cffb1d0a8036bc48e9281b028a5b93ef8d7e0fdfc64de198d2aad9643452d3e740a0bf8f42f1923" />
  <input type="hidden" name="field1" value="avdhut.kamble40@okhdfcbank" />
  <input type="hidden" name="field2" value="413472" />
  <input type="hidden" name="field3" value="avdhut.kamble40@okhdfcbank" />
  <input type="hidden" name="field4" value="AVDHUT AKASH KAMBLE" />
  <input type="hidden" name="field5" value="payumoney.payu@indus" />
  <input type="hidden" name="field6" value="INDBE286276B85E4335BE053F87C180A334" />
  <input type="hidden" name="field7" value="APPROVED OR COMPLETED SUCCESSFULLY|00" />
  <input type="hidden" name="field8" value="" />
  <input type="hidden" name="field9" value="Success|Completed Using Callback" />
  <input type="hidden" name="payment_source" value="payu" />
  <!--adding mecode in post back params -->
  <input type="hidden" name="meCode" value="{&quot;pgMerchantId&quot;:&quot;INDB000000301644&quot;,&quot;encKey&quot;:&quot;02be3a84b9fa9a23c49117e463f6ddfd92e19b7d71a1ead6e101417ca54420fd7248fd48195e70d01e6326fa82060919&quot;}" />   <!--  <input type="hidden" name="riskAction" value="ACCEPT" /> -->
<!--    
    <input type="hidden" name="field9" value="Success|Completed Using Callback" />
  -->
  <input type="hidden" name="PG_TYPE" value="UPI-PG" />
  <input type="hidden" name="bank_ref_num" value="217990566756" />
      <input type="hidden" name="bankcode" value="TEZ" />
        <input type="hidden" name="error" value="E000" />
    <input type="hidden" name="error_Message" value="No Error" />
    
    
        
      
</form>
  <script type="text/javascript">
    var opera = '0';
    

    
                if(opera==1)
    {
        document.getElementById('frmPostBack').submit();
    }
    else
    {
        setTimeout("if (document.frmPostBack) document.frmPostBack.submit(); else document.getElementById('frmPostBack').submit();", 0);
    }
    </script></div>


<div id="footer" class="">
</div>
</div>
<script language ='javascript' type="text/javascript">
  function openlink(url) {
    window.open(url, "DescriptiveWindow","toolbar=0,scrollbars=1,resizable=1,width=550,height=500");
    self.name = "mainWin";
  }
</script>
</body>
</html>

