<?php $this->load->view('admin/includes/header_css_js'); ?>

<style>
    .back_imag{
        background-image: <?= base_url(); ?>libs/images/banner.jpg;
    }
</style>
<body id="pages" style="background-color: #fff;" class="full-layout no-nav-left no-nav-right  nav-top-fixed     responsive remove-navbar login-layout   clearfix" data-active="pages "  data-smooth-scrolling="1">     
  <div class="vd_body">
    <!-- Header Start -->

    <!-- Header Ends --> 
    <div class="content">
      <div class="container"> 

        <!-- Middle Content Start -->

        <div class="vd_content-wrapper" style="background-color: #fff;">
            <div class="vd_container">
                <div class="vd_content clearfix">
                    <div class="vd_content-section clearfix " style="background-color: #fff;">
                        <div class="vd_login-page" style="background: #26e6d66e;">
                            <div class="heading clearfix" >
                                <div class="logo" style="margin-top: 15px;">
                                    <h2 class="mgbt-xs-5"><img src="<?= base_url(); ?>libs/images/logo.png" alt="logo" style="height: 100px; "></h2>
                                </div>
                                <h4 class="text-center font-semibold vd_grey">LOGIN TO YOUR ACCOUNT</h4>
                            </div>
                            <div class="panel widget">
                                <div class="panel-body">
                                    
                                    <form class="form-horizontal" id="login-form" action="#" role="form">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again. 
                                        </div>
                                        <div class="alert alert-success vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                        </div>                  
                                        <div class="form-group  mgbt-xs-20">
                                            <div class="col-md-12">
                                                <div class="label-wrapper sr-only">
                                                    <label class="control-label" for="email">Email</label>
                                                </div>
                                                <div class="vd_input-wrapper" style="background-color: #fff; margin-bottom: 2px;" id="email-input-wrapper"> <span class="menu-icon"> <i class="fa fa-user" style="line-height: 2.3;"></i> </span>
                                                    <input type="email" placeholder="User name" id="email" name="email" class="required" required autocomplete="false">
                                                </div>
                                                <div class="label-wrapper">
                                                    <label class="control-label sr-only" for="password">Password</label>
                                                </div>
                                                <div class="vd_input-wrapper" style="background-color: #fff" id="password-input-wrapper" > <span class="menu-icon"> <i class="fa fa-lock" style="line-height: 2.3;"></i> </span>
                                                    <input type="password" placeholder="Password" id="password" name="password" class="required" required>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="form-group">
                                            <div class="col-md-12 text-center mgbt-xs-5">
                                                <button class="btn vd_bg-green vd_white width-100" type="submit" id="login-submit">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                <!-- Panel Widget -->
                        </div>
                        <!-- .vd_content-section --> 

                    </div>
                    <!-- .vd_content --> 
                </div>
                <!-- .vd_container --> 
            </div>
        </div>
        <!-- .container --> 
    </div>
    <!-- .content -->

    <!-- Footer Start -->
    <footer class="footer-2"  id="footer">      
        <div class="vd_bottom " style="background:#00c4ff;position: fixed; width: 100%; bottom: 0;">
            <div class="container">
                <div class="row">
                    <div class=" col-xs-12">
                        <div class="copyright text-center">
                            Copyright &copy;2014 Venmond Inc. All Rights Reserved 
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- container -->
        </div>
    </footer>
<!-- Footer END -->

</div>


<?php $this->load->view('admin/includes/footer_css_js'); ?>


<!-- Specific Page Scripts Put Here -->
<script type="text/javascript">
    $(document).ready(function() {

      "use strict";

      var form_register_2 = $('#login-form');
      var error_register_2 = $('.alert-danger', form_register_2);
      var success_register_2 = $('.alert-success', form_register_2);

      form_register_2.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                email: {
                    required: true,
                    email: true
                },              
                password: {
                    required: true,
                    minlength: 6
                },

            },

            errorPlacement: function(error, element) {
                if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
                   element.parent().append(error);
               } else if (element.parent().hasClass("vd_input-wrapper")){
                   error.insertAfter(element.parent());
               }else {
                   error.insertAfter(element);
               }
           }, 

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success_register_2.hide();
                error_register_2.show();


            },

            highlight: function (element) { // hightlight error inputs

                $(element).addClass('vd_bd-red');
                $(element).parent().siblings('.help-inline').removeClass('help-inline hidden');
                if ($(element).parent().hasClass("vd_checkbox") || $(element).parent().hasClass("vd_radio")) {
                   $(element).siblings('.help-inline').removeClass('help-inline hidden');
               }

           },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label, element) {
                    label
                    .addClass('valid').addClass('help-inline hidden') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                    $(element).removeClass('vd_bd-red');


                },

                submitHandler: function (form) {
                    $(form).find('#login-submit').prepend('<i class="fa fa-spinner fa-spin mgr-10"></i>')/*.addClass('disabled').attr('disabled')*/;                    
                    success_register_2.show();
                    error_register_2.hide();                
                    setTimeout(function(){window.location.href = "index.php"},2000)  ;              
                }
            }); 


  });
</script>


</body>
</html>