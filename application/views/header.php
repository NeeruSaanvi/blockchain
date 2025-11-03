<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <?php
    $session_id ='';
    if(!empty($this->session->userdata('session_data'))){
    $session = $this->session->userdata('session_data') ; //Retrive ur session
    $session_name = $session['name'];
    $walletaddress = $session['account'];
    }
    ?>  
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ETHPlay.io</title>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/4.7.0_font-awesome.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/3.3.2_jquery-confirm.min.css"> -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
 
<!-- <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/bootstrap.min.js"></script> -->
<style>
.tickets_wrapper .tickets #list_data .last_num: {right: inherit !important; left: 52px !important;position:absolute !important; top: 3px; right: -68px !important; min-width: 61px !important; text-align: center !important;}
.tickets_wrapper .tickets #list_data .last_num p { background: #a8fde2 !important; color: #000!important; font-size: 13px !important; border-radius: 10px 0 0 6px !important; padding: 0px 6px !important;}
.tickets_wrapper .tickets #list_data .last_num label {content:""!important; position: absolute!important; border: 4px solid #a8fde2 !important; border-width: 10px !important; border-color: transparent #a8fde2 transparent transparent !important;left: -14px !important;top: 0px !important;}
</style>
<!-- Latest compiled and minified CSS and js start-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Latest compiled and minified CSS and js End-->

<!-- <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>custom_js/3.3.2_jquery-confirm.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>custom_js/moment.js"></script> -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<style>
.alert-danger, .alert-success {

    background-color: transparent;
    border-color: transparent;
    font-size: 12px;
}
</style>

</head>

<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg "> 
<a class="navbar-brand" href="<?php echo base_url('lottery/index');?>">ETHPlay.io</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
 

    <ul class="navbar-nav mr-auto">
      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('lottery/how_to_play');?>" target="_blank">HOW TO PLAY</a> 
      </li>
    </ul>
    
    
   
  <?php if(empty($session)){
    ?>
   <div class="btn_log_in" data-toggle="modal" data-target="#Login_for_ask_modal"><button type="button" class="login_btn">Login</button></div>
   <?php
   }

  ?>
    
    
     
    
    <?php if(!empty($session)){?> 
    

<div class="right_name_bla">
      <ul class="balance_ul">
        <li class="nav-item balance_li"><a class="nav-link" href="#"><?php echo $session_name; ?>&nbsp;(<span id="wallet_amont">00</span><img src="<?php echo base_url();?>assets/images/ETH-512.png">)</a></li>
     </ul>
    </div>

    <ul class="navbar-nav-right">
      
    <div class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" onclick="get_balance();">
    My Wallet
    </a>
    <div class="dropdown-menu">
      <!-- <a class="dropdown-item" href="#"><?php echo $session_name; ?></a> -->
      <!-- <a class="dropdown-item" href="#">Balance: <span id="wallet_amont">00</span> &nbsp;ETH</a> -->
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#show_wallet_address">Wallet Address</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#withdraw_amount">Withdraw</a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#download_private_key" >Private key</a>
      <a class="dropdown-item" href="<?php echo base_url('lottery/log_out');?>">Log Out</a>
    </div>
  </div>
  <?php
   }
  ?>
  </ul>
  </div>
</nav>


