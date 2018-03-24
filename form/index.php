<?php 

require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CallHealth | Wellness </title>
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">
 <link href="assets/css/style.css" rel="stylesheet">
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">	
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

 </head>
  <body>
  <div class="container">
   <div class="row" id="topc">
	  <div class="col-md-4 col-xs-5">
	  <a class="navbar-brand pull-left" ><img src="assets/images/logo.png" class="img-responsive"/></a>
	  </div>
	  <div class="col-md-5 col-xs-7">
	  <div class="ph"><img src="assets/images/ph.png"/>&nbsp;&nbsp;<a href="tel:9133557799">91 33 55 77 99</a></div>
	  </div>
	  <div class="col-md-3 hidden-xs">
	  <div class="logo2"><img src="assets/images/logo2.png" class="img-responsive"/></div>
	  </div>
	  </div>
	  </div>
    <div id="content">
	<img src="assets/images/banner.jpg" class="img-responsive topbanner"/>
      <div class="container">
        <!-- begin:latest -->
      <div class="row">
	  <div class="col-xs-12">
	  <div class="pagehead">Welcome to CALLHEALTH WELLNESS program.</div>
	  </div>
	  </div>
      <div class="row">
	  <div class="col-sm-12">
	  <div class="login-panel panel panel-default">
			<div class="panel-body">
				<form role="form" name="callhealth" id="RegFrom" action="emailer.php" method="post">
					<fieldset>
					<div class="row" id="frmblock"> 
					
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<input class="form-control" placeholder="First name" name="empfname" id="fname" pattern="[A-zÀ-ž\s]{2,}" type="text" title="Incorrect name format" required>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<input class="form-control" placeholder="Last name" name="emplname" pattern="[A-zÀ-ž\s]{2,}" type="text" title="Incorrect name format" required>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
								<div class="form-group">
								<select id="branch" name="branch" class="form-control" required>
								   <option value="">Select Company</option>
		                            <?php 
		                             $sql1 = "SELECT * FROM branches where status = 1";  
		                                $result = mysqli_query($conn,$sql1);
		                                while($data = mysqli_fetch_object($result)){
		                               // while($branchesData) { 
		                                ?>
		                             <option value="<?php echo $data->id; ?>" ><?php echo $data->branchName; ?></option>
		                             <?php } ?>
								</select>
								</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<input class="form-control" placeholder="Employee ID" name="empid" id="empid" type="text" required>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
						<select id="empgender" name="empgender" class="form-control" required>
						 <option value="">Gender</option>
						 <option value="male">Male</option>
						 <option value="female">Female</option>
						 </select>
					   
						</div>
					</div>

					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<input class="form-control" placeholder="Mobile no" name="empphone" type="text" pattern="^([0|\+[0-9]{1,5})?([1-9][0-9]{9})$" maxlength="10" required>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
					<div class="form-group">
					 <input type="text" id="datepicker" name ="empdob" class="form-control" placeholder="Age ex:30" pattern="^[0-9]{2}$" required >
					</div>
					</div>
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<input class="form-control" placeholder="Address" name="address" type="text" maxlength="500" required>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<input class="form-control" placeholder="Pincode" name="pincode" type="text" pattern="[0-9]{6}" maxlength="6" required>
						</div>
					</div>
					
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
							<input class="form-control" placeholder="email ID" name="empemail" type="email" required>
						</div>
					</div>
				
					<div class="col-md-6 col-xs-12">
						<div class="form-group">
						<select id="program" name="program" class="form-control" required>
						
								   <option value="">Select Program</option>
		                            <?php 
		                             $sql1 = "SELECT * FROM programs where status = 1";  
		                                $result = mysqli_query($conn,$sql1);
		                                while($data = mysqli_fetch_object($result)){
		                               // while($branchesData) { 
		                                ?>
		                             <option value="<?php echo $data->programName; ?>" ><?php echo $data->programName; ?></option>
		                             <?php } ?>
								</select>
					   
						</div>
					</div>
					
					
					<div class="col-xs-12">
					<center><div class="form-group" id="empcheck">
					<input type="checkbox" name="empcheckbox" value="check" id="agree1" required /> I consent to give my information.
					</div></center>
					</div>
					<div class="col-xs-12">
					<div class="terms1"><a href="#" data-toggle="modal" data-target="#aboutemp">Terms & conditions</a></div>
					</div>
					</div>
		                    <div class="row" id="frmblock1">
							<div class="col-xs-12">
							<div class="fhead">Add Family Member</div>
							</div>
							<div class="col-md-4 col-md-offset-4 col-xs-12">
							<div class="form-group">
							<div class="input-group">
							  <span class="input-group-btn">
								  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
									  <span class="glyphicon glyphicon-minus"></span>
								  </button>
							  </span>
							  <input type="text" name="quant[1]" id="quant" class="form-control input-number" value="0" min="0" max="6">
							  <span class="input-group-btn">
								  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
									  <span class="glyphicon glyphicon-plus"></span>
								  </button>
							  </span>
						  </div>
							</div>
							</div>
							
							<div class="row">
							<div class="col-xs-12">
							<div class="relatives"></div>
							</div>
							</div>
							<div class="row">
							<div class="col-xs-12">
							<center><div class="form-group">
							<input type="checkbox" name="checkbox" value="check" id="agree" required /> I declare that I have necessary consent from my family members to create their CallHealth account and I agree to the terms and conditions of the same
							</div></center>
							</div>
							<div class="col-xs-12">
							<div class="terms"><a href="#" data-toggle="modal" data-target="#aboutrel">Terms & conditions</a></div>
							</div>

							</div>
							</div>
						
		                    <div class="form-group">
							     <input class="btn btn-sm btn-block btn-blue text-uppercase" type="submit" value="SUBMIT" id="submitBtn">
							</div>
							</fieldset>
						</form> 
					</div>
                </div>
	    </div>
        </div>
    </div>
        </div>
   <div class="modal fade" id="aboutemp" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content1">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="assets/images/close-black.png"></button>
         
        </div>
        <div class="modal-body">
		 <div class="desc">
		 <div class="head"><center><h4>Terms & Conditions</h4></center></div>
		  <p>I take full responsibility in accessing the E.H.R. pertaining to my medical history and CallHealth shall not be liable in whatsoever manner, for the same.</p>
		  <p>I shall absolve CallHealth in case of any claim or dispute that may arise in case of such accessing of the E.H.R pertaining to my medical history.</p>
		  <p>Any deviations of the above clauses, the terms and conditions of CallHealth shall prevail.  </p>
		  <p>I have read and understood the terms and conditions of CallHealth, which are available at CallHealth' website: https://www.callhealth.com/legal/terms-of-use.</p>
		 </div>
         
        </div>
       
      </div>
      
    </div>
  </div>
<div class="modal fade" id="aboutrel" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content1">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="assets/images/close-black.png"></button>
         
        </div>
        <div class="modal-body">
		 <div class="desc">
		 <div class="head"><center><h4>Terms & Conditions</h4></center></div>
		  <p>I take full responsibility in accessing the E.H.R. of the above mentioned family members and CallHealth shall not be liable in whatsoever manner, for the same.</p>
		  <p>I shall absolve CallHealth in case of any claim or dispute that may arise in case of such accessing of the E.H.R of my family member(s) by me.</p>
		  <p>I have the consent of my family members to access their health records, whom I have registered with CallHealth. I want to view the Electronic Health Record of my family member(s).</p>
		  <p>Any deviations of the above clauses, the terms and conditions of CallHealth shall prevail.</p>
		  <p>I have read and understood the terms and conditions of CallHealth, which are available at CallHealth' website: https://www.callhealth.com/legal/terms-of-use</p>
		 </div>
         
        </div>
       
      </div>
      
    </div>
  </div>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$('#empposition').on('change',function(){
    if($(this).val()=='consultant'){
        $('#vaccin1').attr('disabled','disabled');

    }else{
        $('#vaccin1').removeAttr('disabled');
    }
});
	$(function() {
			// date range
			function addZero(i) {
            if (i < 10) {
				i = "0" + i;
						}
				return i;
			}

			var d = new Date();
			var time = addZero(d.getHours()) + ":" + addZero(d.getMinutes()) + ":" + addZero(d.getSeconds());
			if(time <= '17:30:00')
			{
					$( "#bookslot" ).datepicker({
						dateFormat : 'mm/dd/yy',
						changeMonth : true,
						changeYear : true,
						yearRange: '-100y:c+nn',
						minDate: '+2d'
						
					});
					}
			else{
				 $( "#bookslot" ).datepicker({
						dateFormat : 'mm/dd/yy',
						changeMonth : true,
						changeYear : true,
						yearRange: '-100y:c+nn',
						minDate: '+3d'
						
					});
			}
			
			//date range
			
			
			$("#bookslot").on("change",function(){
		        var selectedDate = $(this).val();
		         var branch = $('#branch').val();
		        var center = $('#center').val();
		        var quant = parseInt($('#quant').val())+1;
		        //alert(quant);
		        var empid = $('#empid').val(); 

		        //alert(selectedDate+center+quant);
		        $.ajax({  
                              type: 'POST',
                              url: 'checkSlotAjax.php',
                              data: { branch : branch,
                                    center : center,
                                    date1 : selectedDate,
                                    quant : quant, 
                                    empid : empid                           },
                              success : (function(data) {
                              	console.log(data);
                                    var b=JSON.parse(data);
                                   var status = b.status;
                                   if(status == 0){
                                        $("#error_message").fadeIn(); 
                                         $('#error_message').html(b.message);  
                                         $("#error_message").fadeOut(5000);                                    
                                        $('#bookslot').val('');
                                        $('#submitBtn').prop("disabled",true);
                                    }
                                    else{
                                          $("#error_message").fadeIn(); 
                                         $('#error_message').html(b.message);
                                         $("#error_message").fadeOut(5000);   
                                         $("input[type=submit]").removeAttr("disabled");                                  
                                        //$("#createSlotFrm")[0].reset();
                                    }
                              }),
                              error : (function(){
                                alert('Whoops! This didn\'t work. Please contact us.')
                              }),
                        });

		    });
    });
$(function() {
        $( "#datepickerrel1" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
           yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<script>
  $(".btn-number[data-type='plus']").click(function(e){
  e.preventDefault();
 var i = $('.input-number').val();
     $(".relatives").append('\
	 <div class="row" id="rel'+i+'"><div class="col-xs-6">\
	 <div class="form-group">\
	 <input class="form-control" placeholder="First name" name="fname[]" pattern="[A-zÀ-ž\s]{2,}" type="text" title="Incorrect name format" required>\
	 </div></div>\
	 <div class="col-xs-6"><div class="form-group"><input class="form-control" placeholder="Last name" name="lname[]" pattern="[A-zÀ-ž\s]{2,}" type="text" title="Incorrect name format" required>\
	 </div></div>\
	 <div class="col-xs-6">\
	 <div class="form-group">\
	<input class="form-control" placeholder="Mobile no" name="phone[]" type="text" pattern="^([0|\+[0-9]{1,5})?([1-9][0-9]{9})$" maxlength="10" required>\
	</div>\
	 </div>\
	 <div class="col-xs-6"><div class="form-group">\
	 <select id="gender[]" name="gender[]" class="form-control" required>\
	 <option value="">Gender</option>\
	 <option value="male">Male</option>\
	 <option value="female">Female</option>\
	 </select>\
     </div></div>\
	  <div class="col-xs-6"><div class="form-group"><input class="form-control" placeholder="Relation with Employee" name="prelation[]" pattern="[A-zÀ-ž\s]{2,}" type="text" title="Incorrect name format" required>\
	 </div></div>\
	 <div class="col-md-6 col-xs-12">\
	<div class="form-group">\
	<input type="text" id="datepickerrel'+i+'" class="form-control" placeholder="Age ex:30" name="pdob[]" pattern="^[0-9]{2}$" required>\
	</div>\
	</div>\
	<div class="col-md-6 col-xs-12">\
	<div class="form-group">\
	<input type="text" id="email'+i+'" class="form-control" placeholder="Email" name="email[]">\
	</div>\
	</div>\
	 </div>');
	 
 });

$(".btn-number[data-type='minus']").click(function(e){
        e.preventDefault();
		var z = $('.input-number').val();
		z= parseInt(z) + 1;
		$(".relatives #rel"+z).remove();
        //$('#errMsg').html('');
      });
 
</script>
 <script>
	$(document).ready(function() {	
    $('#myCarousel1').carousel({
	    interval: 3000
	})
    $('#myCarousel').carousel({
        interval: 5000 //changes the speed
    })
	});
    </script>
<script>
var $root = $('html, body');
$('.login-panel a').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {
        window.location.hash = href;
    });
    return false;
});
</script>

  </body>
</html>
