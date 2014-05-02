<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>TMA | Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
{{ HTML::style("assets/plugins/font-awesome/css/font-awesome.min.css") }}
{{ HTML::style("assets/plugins/bootstrap/css/bootstrap.min.css") }}
{{ HTML::style("assets/plugins/uniform/css/uniform.default.css") }}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{{ HTML::style("assets/plugins/select2/select2_metro.css") }}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
{{ HTML::style("assets/css/style-metronic.css") }}
{{ HTML::style("assets/css/style.css") }}
{{ HTML::style("assets/css/style-responsive.css") }}
{{ HTML::style("assets/css/plugins.css") }}
{{ HTML::style("assets/css/themes/default.css") }}
{{ HTML::style("assets/css/pages/login-soft.css") }}
{{ HTML::style("assets/css/custom.css") }}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
  <img src="assets/img/logo-big.png" alt=""/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
  <!-- BEGIN LOGIN FORM -->
  {{ Form::open(array('url'=>'login/signin','method'=>'post', 'class'=>'form-vertical login-form')) }}
    <h3 class="form-title">Login to your account</h3>
      @if(Session::has('loginstatus'))
        <span style="color:#b94a48;font-size: 15px;" class="help-block">{{ Session::get('loginstatus') }}</span>        
      @endif
    <div class="form-group">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="input-icon">
        <i class="fa fa-user"></i>
        {{ Form::text('email', null, array('class'=>'form-control placeholder-no-fix', 'placeholder'=>'Email')) }}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <div class="input-icon">
        <i class="fa fa-lock"></i>
        {{ Form::password('password', array('class'=>'form-control placeholder-no-fix', 'placeholder'=>'Password')) }}
      </div>
    </div>
    <div class="form-actions">
      <label class="checkbox">
      <input type="checkbox" name="remember" value="1"/> Remember me </label>
      <button type="submit" class="btn blue pull-right">
      Login <i class="m-icon-swapright m-icon-white"></i>
      </button>
    </div>
    <div class="forget-password">
      <h4>Forgot your password ?</h4>
      <p>
         no worries, click <a href="javascript:;" id="forget-password">here</a>
        to reset your password.
      </p>
    </div>
    <!-- <div class="create-account">
      <p>
         Don't have an account yet ?&nbsp; <a href="javascript:;" id="register-btn">Create an account</a>
      </p>
    </div> -->
  {{ Form::close(); }}
  <!-- END LOGIN FORM -->
  <!-- BEGIN FORGOT PASSWORD FORM -->
  <form class="forget-form" action="" method="post">
    <h3>Forget Password ?</h3>
    <p>
       Enter your e-mail address below to reset your password.
    </p>
    <div class="form-group">
      <div class="input-icon">
        <i class="fa fa-envelope"></i>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
      </div>
    </div>
    <div class="form-actions">
      <button type="button" id="back-btn" class="btn">
      <i class="m-icon-swapleft"></i> Back </button>
      <button type="submit" class="btn blue pull-right">
      Submit <i class="m-icon-swapright m-icon-white"></i>
      </button>
    </div>
  </form>
  <!-- END FORGOT PASSWORD FORM -->
  <!-- BEGIN REGISTRATION FORM -->
  <form class="register-form" action="" method="post">
    <h3>Sign Up</h3>
    <p>
       Enter your personal details below:
    </p>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Full Name</label>
      <div class="input-icon">
        <i class="fa fa-font"></i>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="fullname"/>
      </div>
    </div>
    <div class="form-group">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Email</label>
      <div class="input-icon">
        <i class="fa fa-envelope"></i>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Address</label>
      <div class="input-icon">
        <i class="fa fa-check"></i>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Address" name="address"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">City/Town</label>
      <div class="input-icon">
        <i class="fa fa-location-arrow"></i>
        <input class="form-control placeholder-no-fix" type="text" placeholder="City/Town" name="city"/>
      </div>
    </div>
    <p>
       Enter your account details below:
    </p>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="input-icon">
        <i class="fa fa-user"></i>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <div class="input-icon">
        <i class="fa fa-lock"></i>
        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
      <div class="controls">
        <div class="input-icon">
          <i class="fa fa-check"></i>
          <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label>
      <input type="checkbox" name="tnc"/> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
      </label>
      <div id="register_tnc_error">
      </div>
    </div>
    <div class="form-actions">
      <button id="register-back-btn" type="button" class="btn">
      <i class="m-icon-swapleft"></i> Back </button>
      <button type="submit" id="register-submit-btn" class="btn blue pull-right">
      Sign Up <i class="m-icon-swapright m-icon-white"></i>
      </button>
    </div>
  </form>
  <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
   2014 &copy; Gopal Systems.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
  <script src="assets/plugins/respond.min.js"></script>
  <script src="assets/plugins/excanvas.min.js"></script> 
  <![endif]-->
{{ HTML::script("assets/plugins/jquery-1.10.2.min.js") }}
{{ HTML::script("assets/plugins/jquery-migrate-1.2.1.min.js") }}
{{ HTML::script("assets/plugins/bootstrap/js/bootstrap.min.js") }}
{{ HTML::script("assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js") }}
{{ HTML::script("assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}
{{ HTML::script("assets/plugins/jquery.blockui.min.js") }}
{{ HTML::script("assets/plugins/jquery.cokie.min.js") }}
{{ HTML::script("assets/plugins/uniform/jquery.uniform.min.js") }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script("assets/plugins/jquery-validation/dist/jquery.validate.min.js") }}
{{ HTML::script("assets/plugins/backstretch/jquery.backstretch.min.js") }}
{{ HTML::script("assets/plugins/select2/select2.min.js") }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script("assets/scripts/app.js") }}
{{ HTML::script("assets/scripts/login-soft.js") }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {     
      App.init();
      Login.init();
    });
  </script>
<!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/metronic_admin/login_soft.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 10 Feb 2014 08:05:43 GMT -->
</html>