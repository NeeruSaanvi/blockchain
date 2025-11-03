<?php
 $session_id ='';
 if(!empty($this->session->userdata('session_data'))){
 $session = $this->session->userdata('session_data') ; //Retrive ur session
 $session_accont = $session['name'];
 $session_email = $session['email'];
 $walletaddress = $session['account'];
 @$logger_password = $session['user_password'];
 @$logger_private_key = $session['private_key'];

 
 header('Access-Control-Allow-Origin: *');
}
    date_default_timezone_set("UTC");
    $this->db->select("created_date_time");
    $this->db->from("result");
    $this->db->limit(1);
    $this->db->order_by('result_id',"DESC");
    $query = $this->db->get();
    $result = $query->result_array();
    foreach($result as $row){
        $date_and_time = date('Y-m-d\TH:i:s\Z',strtotime($row['created_date_time']."+4 minutes"));
    }
   $start_date = new DateTime();
   $since_start = $start_date->diff(new DateTime($date_and_time));
   
   echo $newminut  =  $since_start->i;
   echo $newsecond = $since_start->s;
?>

<section class="body-inner">
    <div class="container">
        <div class="row">

            <div class="w-min first-blog">
                <div class="data-header-left">RESULTS</div>
                <div class="data-table">
                    <div class="result-box" id="five_digit">
                    </div>
                </div>
            </div>


            <!-- mobile div 8.4 -->
            <div class="w-min mobile_div">
                <div class="heading-top w-100 text-center c-white">
                    <h4>LIVE</h4>
                </div>
                <div class="data-table">

                    <div class="content-wrap-text" id="winning_result-1">
                    </div>
                </div>
            </div>
            <!-- mobile div 8.4 -->



            <div class="w-max">
                <div class="new-list">
                    <div class="list-header"> <span class=" value-1">BLOCK</span> <span class=" value-2">HASH</span>
                        <span class=" value-3">TIME</span>
                    </div>
                </div>
                <div class="tickets_wrapper">
                    <div class="tickets">
                        <ul class="list">
                            <div id="list_data">

                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-wrap">
                <div class="form-box">
                    <div class="left-box-w-75">
                        <div class="auto-switch auto-switch-mobile">

                            <div class="auto-switch__control">
                                <div class="top-list">
                                    <div class="bet-limit">
                                        <div>Bet Limit</div>
                                        <div class="list-devide">
                                            <font>
                                                <div id="bet_limit"></div>
                                            </font><i></i>
                                        </div>
                                        <span>5%</span>
                                    </div>
                                    <div class="numnber-warp">
                                        <div class="no-white">No. <label class="red"></label></div>
                                    </div>
                                    <div class="countup-warp">BANK <font class="text-o">
                                            <div class="bank_amount">0</div>
                                        </font>
                                    </div>
                                    <div class="countdown">

                                        <i class="fa fa-clock-o"></i>
                                        <font class="text-o"><span id="time"> 
                                          <!-- <?php for($i=0;$i<$newminut;$i++){
                                              if($newsecond >=1){
                                                --$newsecond; 
                                              }else if($newsecond ==1){
                                                  --$newminut;
                                              }
                                          }
                                          echo $newminut.':'.$newsecond;
                                          ?> -->
                                        </span>
                                        </font>
                                    </div>
                                    <div class="combination">COMBINATION</div>
                                </div>
                            </div>
                            <div class="button-links">
                                <div class="comman-div">
                                    <div class="pagination-button select">

                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">
                                                <input type="checkbox" name='type'
                                                    class='bid_method_small1 count_value0 nature' id="bid_method_small1"
                                                    value="SMALL">
                                                <span class="checkmark">0 - 4</span>
                                            </label>
                                        </div>

                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">
                                                <input type="checkbox" name='type'
                                                    class='bid_method_big1 count_value0 nature' id="bid_method_big1"
                                                    value="BIG">
                                                <span class="checkmark">5 - 9</span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="pagination-button reset">
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">
                                                <input type="checkbox" name='type' class='count_value0 bat_type'
                                                    id="bid_seqence_odd" value="ODD">
                                                <span class="checkmark">ODD</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">
                                                <input type="checkbox" name='type' class='count_value0 bat_type'
                                                    id="bid_seqence_even" value="EVEN">
                                                <span class="checkmark">EVEN</span>
                                            </label>
                                        </div>
                                        <button type="button" class="reset-btn count_value0"
                                            id="reset_button1">RESET</button>
                                    </div>
                                    <div class="bet-list">[ <font><span id="bid_method_result"></span></font> ]</div>
                                </div>
                                <blockquote>
                                    <?php
              $class='';
              $style = '';
              $j=0;
              for ($i = 0; $i < 5; $i++) {
                $class ='showbet_0';
                if($i == 1){
                  $class = 'showbet_1';
                  $style = 'style="display: none;"';
                }
                elseif($i == 2){
                  $class = 'showbet_2';
                  $style = 'style="display: none;"';
                }
                elseif($i == 3 ){
                  $class = 'showbet_3';
                  $style = 'style="display: none;"';
                }
                elseif($i == 4 ){
                  $class = 'showbet_4';
                  $style = 'style="display: none;"';
                }

                ?>
                                    <div class="pagination-link <?php echo $class; ?>" <?php echo $style; ?>>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">0
                                                <input type="checkbox" name='type' value="0" id="0<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">0</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">1
                                                <input type="checkbox" name='type' value="1" id="1<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">1</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">2
                                                <input type="checkbox" name='type' value="2" id="2<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">2</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">3
                                                <input type="checkbox" name='type' value="3" id="3<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">3</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">4
                                                <input type="checkbox" name='type' value="4" id="4<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">4</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">5
                                                <input type="checkbox" name='type' value="5" id="5<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">5</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">6
                                                <input type="checkbox" name='type' value="6" id="6<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">6</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">7
                                                <input type="checkbox" name='type' value="7" id="7<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">7</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">
                                                <input type="checkbox" name='type' value="8" id="8<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>">
                                                <span class="checkmark">8</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input">
                                            <label class="check-inline">
                                                <input type="checkbox" name='type' id="9<?php echo $i; ?>"
                                                    class="checkBoxClass<?php echo $i; ?> count_value<?php echo $i; ?>"
                                                    value="9">
                                                <span class="checkmark">9</span>
                                            </label>
                                        </div>
                                        <div class="lable-chekcbox-input all-btn">
                                            <label class="check-inline">
                                                <input type="checkbox" class="count_value<?php echo $i; ?>"
                                                    id="all-btn<?php echo $i; ?>">
                                                <span class="checkmark">ALL</span>
                                            </label>
                                        </div>


                                        <button type="button" class="reset-btn count_value<?php echo $i; ?>"
                                            id="reset-btn<?php echo $i; ?>">
                                            RESET</button>


                                        <div class="bet-list first-label-lne">[ <font><span
                                                    id="bid_number_result<?php echo $i; ?>"></span></font> ]</div>
                                    </div>
                                    <?php
            }
            ?>
                                </blockquote>

                            </div>


                        </div>
                    </div>
                    <div class="left-box-w-25">
                        <div class="switch-tabs" style="display: none;">
                            <label class="first-label">ADVANCED</label>

                            <label class="switch">
                                <input value="1" class="toggle-checkbox advanced" name="toogle" type="checkbox">
                                <span class="slider round" value="1" name="toogle" type="checkbox"></span>
                            </label>
                        </div>
                        <div class="small-pager-block" style="display: none;">


                            <label class="first-label float-right">BITS</label>
                            <div class="right-checkedbox">
                                <div class="lable-chekcbox-input">
                                    <label class="check-inline">1
                                        <input type="radio" name="bits" id="bits_1" class='bat_level'>
                                        <span class="checkmark">1</span>
                                    </label>
                                </div>
                                <div class="lable-chekcbox-input">
                                    <label class="check-inline">2
                                        <input type="radio" name="bits" id="bits_2" class='bat_level'>
                                        <span class="checkmark">2</span>
                                    </label>
                                </div>
                                <div class="lable-chekcbox-input">
                                    <label class="check-inline">3
                                        <input type="radio" name="bits" id="bits_3" class='bat_level'>
                                        <span class="checkmark">3</span>
                                    </label>
                                </div>
                                <div class="lable-chekcbox-input">
                                    <label class="check-inline">4
                                        <input type="radio" name="bits" id="bits_4" class='bat_level'>
                                        <span class="checkmark">4</span>
                                    </label>
                                </div>
                                <div class="lable-chekcbox-input">
                                    <label class="check-inline">5
                                        <input type="radio" name="bits" id="bits_5" checked="" class='bat_level'>
                                        <span class="checkmark">5</span>
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div class="beat-text-box">
                            <div class="beat-amount">
                                <p>BET AMOUNT</p>
                            </div>
                            <div class="controlls">
                                <input type="text" name="bet_charge" value="0.005" id="bet_charge" class="bet_charge"
                                    readonly>
                                <button type="button" id="bet_charge_max" class="value-btn" value="1"> MAX</button>
                                <button type="button" id="bet_charge_2x" class="value-btn" value="1">2X</button>
                                <button type="button" id="bet_charge_half_x" class="value-btn" value="1">1/2</button>
                            </div>
                            <div class="count-numner">
                                <p>COUNT <span id='count'>0</span></p>
                                <p>TOTAL<span id='total'>0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="log-in">
                    <?php if(empty($session_accont)){ ?>
                    <!-- <div class="login-box"><a data-toggle="modal" data-target="#myModal2" href="#"> -->
                    <div class="login-box"><a data-toggle="modal" data-target="#Login_for_ask_modal" href="#">

                            <font>Login</font>
                        </a></div>
                    <?php 
                    }
                    else{
                        ?>
                    <div class="login-box" id="metamask_payment"><a href="javascript:;">
                            <font>Bet</font>
                        </a></div>
                    <?php
                    }
                   ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bottom-table">
    <div class="container">
        <div class="row">
            <div class="w-min">
                <div class="data-table">
                    <div class="heading-top w-100 text-center c-white">
                        <h4>LIVE</h4>
                    </div>
                    <div class="content-wrap-text" id="winning_result">
                    </div>
                </div>
            </div>
            <div class="w-max bottom">
                <section id="tabs" class="project-tab">
                    <div class="container">
                        <div class="row">
                            <div class="tickets w-100">
                                <div class="col-md-12">
                                    <nav>
                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true">RESULTS</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">My Bets</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <table class="table" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>No.</th>
                                                        <th>Number</th>
                                                        <th>BS/OE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="row_appand">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">
                                            <table class="table" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Order List</th>
                                                        <th>No</th>
                                                        <th>Content</th>
                                                        <th>Type</th>
                                                        <th>Amount</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="winbatstb">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="hash_modal_open" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">CHECK RESULT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span> </button>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <div class="row justify-content-center">

                        <!-- <table class="table" cellspacing="0">
                                                <tbody id="hash_show">

                                                </tbody>
                                            </table> -->
                        <div id="hashes_append">

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- modal for asking to use payment gateway modal start-->
<div class="modal modal-login fade input modal-opn" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                  if(empty($session_accont)){
                 ?>
                <label class="radio">METAMASK
                    <input type="radio" class="metamask_login" id="metamask_login" name="radio" value="1">
                    <span class="checkmark"></span>
                </label>
                <label class="radio">USE YOUR WALLET
                    <input type="radio" id="user_private_key" name="radio" data-toggle="modal"
                        data-target="#Login_for_ask_modal" value="1">
                    <span class="checkmark"></span>
                </label>
                <?php
                  }
                 ?>
            </div>
        </div>
    </div>
</div>
<!-- modal for asking to use payment gateway modal End-->


<!--login ask Modal start -->
<div id="Login_for_ask_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class=" control-label" for="walleter_username">Email</label>
                        <div class="col-sm-12"><input type="email" class="form-control w-100" name="wallet_email" <?php if($this->input->cookie('user_email',true)){
                               ?> value="<?php echo $this->input->cookie('user_email',true); ?>" <?php
                             } 
                           ?> id="wallet_email" placeholder="Email" />
                        </div>
                    </div>

                    <div class="form-group mt-4 d-inline-block w-100">
                        <label class="control-label" for="wallet_password">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="wallet_password" id="wallet_password" <?php if($this->input->cookie('user_password',true)){
                               ?> value="<?php echo $this->input->cookie('user_password',true); ?>" <?php
                             } 
                           ?> placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" id="wallet_login" class="btn btn-sign_in">Login</button>
                        </div>
                    </div>
                    <p class="saperate text-center">OR</p>
                    <a class="text-center" href='#'>
                        <h3 data-toggle="modal" data-target="#wallet_create_modal"><span id="create_new_account">Create
                                new account</span>
                        </h3>
                        <h3 data-toggle="modal" data-target="#forgot_password"><span id="forgot">Forgot Password?</span>
                        </h3>
                    </a>
                </form>
            </div>
        </div>

    </div>
</div>
<!--login ask Modal End -->


<!--show wallet address Modal start -->
<div class="modal modal-login fade input modal-opn" id="show_wallet_address">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class='wallet_address'><?php echo isset($walletaddress)?$walletaddress:''; ?></p>
                <div><button type="button" onclick="copyToClipboard('.wallet_address')"
                        class="btn btn-link wallet_copy_button">Copy</button></div>
            </div>
        </div>
    </div>
</div>
<!--show wallet address Modal End -->

<!--show withdraw amount Modal start -->
<div class="modal modal-login fade input modal-opn" id="withdraw_amount">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class=" control-label" for="walleter_username">Address</label>
                    <div class="col-sm-12"><input type="text" class="form-control w-100" name="withdraw_address"
                            id="withdraw_address" placeholder="Address" />
                    </div>
                </div>

                <div class="form-group">
                    <label class=" control-label" for="walleter_username">Amount</label>
                    <div class="col-sm-12"><input type="text" class="form-control w-100" name="withdraw_amount"
                            id="withdraw_amounts" placeholder="Amount" />
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="button" id="withdraw_amountsubmit" class="btn btn-sign_in">Send Amount</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--show withdraw amount Modal End -->


<!-- create wallet Modal strat -->
<div id="wallet_create_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Account</h4>
            </div>
            <div class="modal-body1">
                <form class="form-horizontal row" role="form">
                    <div class="form-group col-12 col-sm-6">
                        <label class=" control-label" for="walleter_name">Nickname</label>
                        <div class="col-sm-12"><input type="text" class="form-control w-100" name="walleter_name"
                                id="walleter_name" placeholder="Nickname" />
                        </div>
                    </div>

                    <div class="form-group  mt-1 d-inline-block col-12 col-sm-6">
                        <div class="form-group">
                            <label class=" control-label" for="walleter_name">Email</label>
                            <div class="col-sm-12"><input type="email" class="form-control w-100" name="walleter_email"
                                    id="walleter_email" placeholder="Email" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group  mt-1 d-inline-block col-12 col-sm-6">
                        <label class=" control-label" for="walleter_password">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="walleter_password" id="walleter_password"
                                placeholder="Password" />
                                <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                        </div>

                    </div>

                    <div class="form-group mt-1 d-inline-block  col-12 col-sm-6">
                        <label class=" control-label" for="confirm_walleter_password">Confirm Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="confirm_walleter_password"
                                id="confirm_walleter_password" placeholder="Confirm Password" />
                        </div>

                    </div>
                    

                    <div class="col-sm-12 col-md-6  mt-1">
                        <div class="g-recaptcha" id="capcha"
                            data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="">
                            <button type="button" id="create_wallet" class="btn btn-sign_in">Create Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
<!-- create wallet Modal End -->

<!--forgot password modal start-->
<div id="forgot_password" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Get Password</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal row" role="form">

                    <div class="form-group  mt-1 d-inline-block col-12 col-sm-6">
                        <div class="form-group">
                            <label class=" control-label" for="forgetor_email">Email</label>
                            <div class="col-sm-12"><input type="email" class="form-control w-100" name="forgetor_email"
                                    id="forgetor_email" placeholder="Email" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="">
                            <button type="button" id="get_password" class="btn btn-sign_in">Get Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
<!--forgot password modal End-->



<!--bat successfull modal start-->
<div class="modal fade" id="bat_success" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="thank-you-pop">
                    <img src="<?php echo base_url()."assets/"; ?>images/Green-Round-Tick.png" alt="">
                    <h1>Thank You!</h1>
                    <p>Your BET has been received.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                    onclick="bat_success_close_modal();">Ok</button>
            </div>
        </div>
    </div>
</div>
<!--bat successfull modal End-->





<!-- download private key Modal strat -->
<div class="modal fade" role="dialog" aria-labelledby="download_private_key" id="download_private_key">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">

                    <label class=" control-label" for="password">Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="pass_for_private_key"
                            id="pass_for_private_key" placeholder="Password" />
                    </div>

                    <p class='mt-3 pl-3'>Your Wallet Address: <strong
                            class='text-center'><?php if(isset($walletaddress)){ echo $walletaddress; } ?></strong></p>
                    <div class="form-group mt-3">
                        <div class="col-sm-12">
                            <button type="button" id="show_private_key" class="btn btn-sign_in">Show Private
                                Key</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--download private key Modal End-->
<style>
#last_num {
    position: absolute !important;
    top: 3px !important;
    min-width: 61px !important;
    text-align: center !important;
    right: -70px !important;
}

#last_num p {
    background: #a8fde2 !important;
    color: #000 !important;
    font-size: 13px !important;
    border-radius: 10px 0 0 6px !important;
    padding: 0px 6px !important;
    width: 70px;
}

#last_num label {
    content: "";
    position: absolute !important;
    border: 4px solid #a8fde2 !important;
    border-width: 10px !important;
    border-color: transparent #a8fde2 transparent transparent !important;
    left: -14px !important;
    top: 0px !important;
}

.jconfirm-content .private_key_text {
    word-break: break-all;
}

@media(max-width:1001px) {}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dist/web3.js"></script>
<script type="text/javascript">
var lastTranasctionHash = "";
var balance = 0;
var bankBalanceLimit = 0;
var private_key = null;
var password = null;
var arr = [];
var last_result_id = null;
var nextBlockNumber = '';
var isRun = '';
var lastBNUm = 0;
var createIndex = 0;
var minut_sec = <?php echo json_encode($date_and_time); ?>;
var lastTranDate = '';
var session_name = '<?php echo @$session_accont; ?>';
var session_account = '<?php echo @$walletaddress; ?>';
private_key = '<?php echo @$logger_private_key; ?>';
password = '<?php echo @$logger_password; ?>';
var metamask_wallet_address = '<?php echo Meta_mask_wallet_address;?>';

var stillUtc = moment.utc(minut_sec).toDate();
var countDownDate = new Date(minut_sec).getTime();

var now = new Date()
var stillUtc2 = moment.utc(now).toDate();

var x = setInterval(function() {

var utctime  = new Date();

var distance = countDownDate - utctime.getTime();

var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
document.getElementById("time").innerHTML = addZeroBefore(minutes) + " : " + addZeroBefore(seconds) + "";

if (distance > 0) {
    distance -= 1000;
}
if (distance <= 0) {
    distance = 240 * 1000;
    countDownDate = countDownDate+(240 * 1000);
}


}, 1000);

function bat_success_close_modal() {
    // location.reload();
}

function dec2hex(dec) {
    return ('0' + dec.toString(16)).substr(-2)
}

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

function generateId(len) {
    var arr = new Uint8Array((len || 40) / 2)
    window.crypto.getRandomValues(arr)
    return Array.from(arr, dec2hex).join('')
}

function convertUTCDateToLocalDate(date) {
    return new Date(date.getTime() - date.getTimezoneOffset() * 60 * 1000);
}

function addZeroBefore(n) {
    return (n < 10 ? '0' : '') + n;
}

function theAjaxCall() {
    getLatestTxn(function(error, output) {
        if (error == null) {
            jQuery("#list_data").prepend(setcolorarrow(output.blockNumber, output.txHash, output.timestamp));
            setInterval(nextAjaxCall, 1000);
        } else {
            theAjaxCall();
        }
    });
}




function nextAjaxCall() {
    getLatestTxnByBlock(nextBlockNumber, function(error, output) {
        if (error == null) {
            jQuery("#list_data").prepend(setcolorarrow(output.blockNumber, output.txHash, output.timestamp));
        } else {

        }
    });
}


function setcolorarrow(block_number, randomstr, timestamp) {
    nextBlockNumber = parseInt(block_number) + 1;
    var str1 = randomstr.replace(/[^\d.]/g, '');
    var lastnumber = str1.substr(str1.length - 1);
    var utcdate = timestamp;


    var d = new Date(utcdate * 1000);

    var local_Date = moment.utc(d).local().format();
    var localDate = new Date(local_Date);
    var date = localDate.getDate();
    var day = localDate.getDay();
    var fullyear = localDate.getFullYear();
    var hours = localDate.getHours();
    var milisecond = localDate.getMilliseconds();
    var minut = localDate.getMinutes();
    var month = localDate.getMonth();
    var seconds = localDate.getSeconds();
    var timezone = localDate.getTimezoneOffset()
    var utcdate2 = addZeroBefore(hours) + ':' + addZeroBefore(minut) + ':' + addZeroBefore(
        seconds);
    var a = arr.indexOf(block_number);
    if (a < 0) {

        arr.push(block_number);
        var showLast = '';

        var temp = lastTranDate.replace(/-/g, "/");
        var d1 = moment.utc(temp).local().format();
        var ts1 = Date.parse(d1);
        var ts2 = utcdate * 1000;
        var hash = randomstr.substr(randomstr.length - 37);

        if (isRun == 1 && createIndex == 0 && ts1 <= ts2) {
            createIndex++;
            lastBNUm = parseInt(lastBNUm);
            showLast = "<div id='last_num'><label></label><p>" + lastBNUm + "</p></div>";
            isRun = '';

            var sttrr = randomstr.substr(randomstr.length - 36);
            var str = sttrr.lastIndexOf(str1.substr(str1.length - 1));
            var slice = sttrr.slice(0, str);
            var slice1 = sttrr.slice(str + 1, sttrr.length);

            hash = slice + '<div style="color:rgb(255,165,0)!important;">' + str1.substr(str1.length - 1) +
                '</div>' + slice1;

        } else
        if (createIndex > 0 && ts1 < ts2) {
            var sttrr = randomstr.substr(randomstr.length - 36);
            var str = sttrr.lastIndexOf(str1.substr(str1.length - 1));
            var slice = sttrr.slice(0, str);
            var slice1 = sttrr.slice(str + 1, sttrr.length);
            createIndex++;
            hash = slice + '<div style="color:rgb(255,165,0)!important;">' + str1.substr(str1.length - 1) +
                '</div>' + slice1;
        }
        var string =
            "<li><div class='float-left c-white value-1'><a href='https://etherscan.io/block/" +
            block_number + "' target='_blank'>" +
            block_number +
            "</a></div><div class='float-left c-white value-2'><a href='#'>..." + hash +
            "</a></div><div class='float-left c-white value-3'>" + utcdate2 +
            "</div>";
        if (createIndex == 5) {
            createIndex = 0;
        }
        string += showLast + '</li><br>';
        return string;
    }

}

var web3 = new Web3();
web3.setProvider(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/fb65cf4b158e4ba89897f84c18d7ae42"));

function getLatestTxn(callback) {
    web3.eth.getBlockNumber(function(error, result) {
        if (!error) {
            web3.eth.getBlock(result, false, function(err, res) {
                if (!err) {
                    var obj = {
                        blockNumber: result,
                        txHash: res.transactions[(res.transactions.length) - 1],
                        timestamp: res.timestamp
                    };
                    callback(null, obj);
                } else {
                    callback("error in getblock " + err, 'error');
                }
            });
        } else {
            callback("error in blockNumber " + error, 'not found');
        }
    });
}

function getLatestTxnByBlock(blocknumber, callback) {
    web3.eth.getBlock(blocknumber, false, function(err, res) {
        if (!err && res != null) {
            var obj = {
                blockNumber: blocknumber,
                txHash: res.transactions[(res.transactions.length) - 1],
                timestamp: res.timestamp
            };
            callback(null, obj);
        } else {
            callback('error', 'not found');
        }
    });

}


function toTimestamp(strDate) {
    var datum = Date.parse(strDate);
    return datum / 1000;
}



function lotteryresult() {

    jQuery.ajax({
        method: "POST",
        url: "<?php echo base_url();?>checkResult",
        data: 'last_result_id=' + last_result_id,
        cache: false,
        success: function(response) {
            if (response.status == true) {
                last_result_id = null;
                var resultcontent = '';
                var resultcontent1 = "";
                for (var i = 0; i < response.result.length; i++) {
                    var counter = response.result[i];
                    var stillUtc = moment.utc(counter.created_date_time).toDate();

                    var local_Date = moment.utc(stillUtc).local().format();
                    var localDate = new Date(local_Date);
                    var hours = localDate.getHours();
                    var milisecond = localDate.getMilliseconds();
                    var minut = localDate.getMinutes();
                    var utcdate2 = addZeroBefore(hours) + ':' + addZeroBefore(minut) + ':00';

                  
                    if (response.result[response.result.length - 1].result_number.length < 5 && counter
                        .result_number.length == 0) {
                        lastTranDate = counter.created_date_time;
                        isRun = 1;

                    } else {
                        isRun = 0;
                    }

                    if (counter.result_number.length == 5) {

                        if (response.result.length == 1) {
                            lastBNUm = counter.result_serial_no;
                            jQuery('div').remove('#remove' + counter.result_id);
                            jQuery('tr').remove('#result' + last_result_id);
                            resultcontent1 += '<tr id="result' + counter.result_id + '"><td>' + utcdate2 +
                                '</td>';
                            resultcontent1 +=
                                ' <td><a data-toggle="modal" data-target="#modal-open" href="#"></a>' +
                                counter.result_serial_no + '</td>';
                            resultcontent1 +=
                                ' <td><a data-toggle="modal" data-target="#modal-open"  href="#"></a> ' +
                                counter.result_number + ' </td>';

                            var lastone = counter.result_number.toString().split('').pop();

                            if (lastone < 5) {

                                resultcontent1 +=
                                    ' <td class="td-bsoe"> B<span style="color:#00ffc6;"> S</span> | ';
                                if (lastone % 2 == 0) {
                                    resultcontent1 += 'O <span style="color:#00ffc6;">E</span></td></tr>';
                                } else {
                                    resultcontent1 += '<span style="color:#00ffc6;">O </span>E</td></tr>';
                                }
                            } else {

                                resultcontent1 +=
                                    ' <td class="td-bsoe"> <span style="color:#00ffc6;">B </span>S | ';
                                if (lastone % 2 == 0) {
                                    resultcontent1 += 'O <span style="color:#00ffc6;"> E</span></td></tr>';
                                } else {
                                    resultcontent1 += '<span style="color:#00ffc6;">O </span>E</td></tr>';
                                }
                            }
                        }
                        if (last_result_id == null) {
                            last_result_id = parseInt(counter.result_id) + 1;

                        }

                    } else {
                        if (last_result_id == null) {
                            lastBNUm = counter.result_serial_no;
                            last_result_id = counter.result_id;
                            jQuery('div').remove('#remove' + last_result_id);

                            jQuery('tr').remove('#result' + last_result_id);
                        }
                    }

                    if (i < response.result.length - 1) {
                        resultcontent1 += '<tr id="result' + counter.result_id + '"><td>' + utcdate2 +
                            '</td>';
                        resultcontent1 +=
                            ' <td><a data-toggle="modal" data-target="#modal-open" href="#"></a>' + counter
                            .result_serial_no + '</td>';
                        resultcontent1 +=
                            ' <td><a data-toggle="modal" data-target="#modal-open"  href="#"></a> ' +
                            counter.result_number + ' </td>';

                        var lastone = counter.result_number.toString().split('').pop();

                        if (lastone < 5) {

                            resultcontent1 +=
                                ' <td class="td-bsoe"> B<span style="color:#00ffc6;"> S</span> | ';
                            if (lastone % 2 == 0) {
                                resultcontent1 += 'O <span style="color:#00ffc6;">E</span></td></tr>';
                            } else {
                                resultcontent1 += '<span style="color:#00ffc6;">O </span>E</td></tr>';
                            }
                        } else {

                            resultcontent1 +=
                                ' <td class="td-bsoe"> <span style="color:#00ffc6;">B </span>S | ';
                            if (lastone % 2 == 0) {
                                resultcontent1 += 'O <span style="color:#00ffc6;"> E</span></td></tr>';
                            } else {
                                resultcontent1 += '<span style="color:#00ffc6;">O </span>E</td></tr>';
                            }
                        }
                    }

                    resultcontent += '<div class="result-box" id="remove' + counter.result_id + '">';
                    resultcontent += '<div class="content-inner ">';
                    resultcontent +=
                        '<div class="item tal modal-open"><a onclick="result_hash(' + counter.result_id +
                        ')" href="#">' +
                        '<span class="result_hashs" value=' + counter.result_serial_no + '>' + counter
                        .result_serial_no + '</span></a></div>';
                    resultcontent +=
                        '<div class="item tac modal-open"><a onclick="result_hash(' + counter.result_id +
                        ')"  href="#">' +
                        '<span class="result_hashs" value=' + counter.result_serial_no + '>';

                    if (counter.result_number.length == 5) {
                        var sttrr1 = counter.result_number.substr(0, counter.result_number.length - 1);
                        var sttrr = counter.result_number.substr(counter.result_number.length - 1);

                        resultcontent += sttrr1 + '<span style="color:orange">' + sttrr +
                            '</span></span></a></div>';
                    } else {
                        resultcontent += counter.result_number + '</span></a></div>';
                    }



                    resultcontent += '<div class="item time"><a href="#">' + utcdate2 +
                        '</a></div></div></div>';
                }

                jQuery("#row_appand").prepend(resultcontent1);
                jQuery("#five_digit").prepend(resultcontent);
            }
        }
    });
}



function result_hash($id) {
    td_value = $id;
    // alert(td_value);
    jQuery.ajax({
        url: '<?php echo base_url();?>lottery/get_hash',
        method: "POST",
        cache: 'false',
        data: 'result_id= ' + td_value,
        success: function(response) {
            var resultAppend = '';
            if (response.stat == true) {
                if (response.result.length > 0) {
                    jQuery('#hash_modal_open').modal('show');
                    $("#hashes_append").empty();
                    for (var i = 0; i < response.result.length; i++) {
                        var id = response.result[i].hash_id;
                        var hashs = response.result[i].hashs_result;

                        var sttrr = hashs.substr(hashs.length - 35);
                        var result_inserted = response.result[i].created_date;
                        var hashesDateTime = moment.utc(result_inserted).toDate();
                        var hashesDateTimeLocal = moment.utc(hashesDateTime).local().format();
                        var hashesDateTimelocalDate = new Date(hashesDateTimeLocal);

                        resultAppend =
                            '<div class="col-12 col-sm-3 col-md-3 col-lg-2 float-md-left font-14 left-content">' +
                            id +
                            '</div><div class="col-12 col-sm-6 col-md-6 col-lg-6 block_id pl-0 pr-0 float-md-left font-14 center-content"> ...' +
                            sttrr +
                            '</div><div class="col-md-3 col-sm-3 col-lg-4 float-md-right font-14 right-content ">' +
                            addZeroBefore(hashesDateTimelocalDate.getHours()) +
                            ':' + addZeroBefore(hashesDateTimelocalDate.getMinutes()) + ':00' + '</div>';
                        jQuery("#hashes_append").append(resultAppend);

                    }
                }
            }
        }
    });
}

$('#bat_success').on('hidden.bs.modal', function() {
    // location.reload();
});

$('#metamask_login').click(function() {
    if (typeof(web3) === 'undefined') {
        jQuery.noConflict();
        jQuery.alert({
            title: 'Alert!',
            content: '<strong>Please install metamask plugin.</strong>',
            onContentReady: function() {
                var self = this;
                setTimeout(function() {
                    self.setContentAppend(
                        '<div><p class="pt-3">Follow below link for install. <a href="https://chrome.google.com/webstore/detail/metamask/nkbihfbeogaeaoehlefnkodbefgpgknn" class="alert-link">Click Here</a></p></div>'
                    );
                }, 1000);
            },
            columnClass: 'medium',
        });
    } else {
        web3 = new Web3(web3.currentProvider);
        var account = web3.eth.accounts[0];
        if (web3.eth.accounts[0] !== account) {
            account = web3.eth.accounts[0];
        }
        web3.eth.getAccounts(function(err, accounts) {
            if (err != null) {
                alert("An error occurred: " + err);
            } else if (accounts.length == 0) {
                alert("You are not logged in to MetaMask");
            } else {
                if (session_name == null) {
                    var session_name = prompt("Please enter your name");
                }
                jQuery.ajax({
                    url: '<?php echo base_url();?>lottery/userlogin',
                    method: "POST",
                    cache: 'false',
                    data: 'account= ' + account + '&name=' + session_name,
                    success: function(output) {
                        if (output == "success") {
                            location.href = "<?php echo base_url();?>lottery/index";
                        } else {}
                    }
                });
            }
        });
    }
});

var eventsFired = 0;
$('#metamask_payment').click(function() {
    var value = $("#total").text();
    var count = $("#count").text();

    var bat_nature = 0;
    var bat_type = 0;

    var betTypeNumber = "";
    if ($("#bid_method_big1").prop("checked")) {
        bat_nature = 2;
        betTypeNumber = "B";
    } else
    if ($("#bid_method_small1").prop("checked")) {
        bat_nature = 1;
        betTypeNumber = "S";
    }

    if ($("#bid_seqence_odd").prop("checked")) {
        bat_type = 1;
        betTypeNumber += "O";
    } else
    if ($("#bid_seqence_even").prop("checked")) {
        bat_type = 2;
        betTypeNumber += "E";
    }

    var bat_numbers0 = $('#bid_number_result0').text();
    var bat_numbers1 = $('#bid_number_result1').text();
    var bat_numbers2 = $('#bid_number_result2').text();
    var bat_numbers3 = $('#bid_number_result3').text();
    var bat_numbers4 = $('#bid_number_result4').text();

    var bat_sequence_no = $('.red').text();
    var bat_amount = $('#bet_charge').val();
    var bat_count = $('#count').text();
    var bat_total = $('#total').text();
    var bet_con = '';

    jQuery.ajax({
        url: '<?php echo base_url();?>lottery/check_bet',
        method: "POST",
        cache: 'false',
        data: 'account=' + session_name + '&bet_sequence_no=' + bat_sequence_no,
        success: function(bet_check) {
            if (bet_con == 0 && eventsFired == 0 && bet_check == 0) {
                if (bat_total > 0) {
                    if (bankBalanceLimit >= bat_total) {
                        if (session_name != null && session_account != null && private_key == "") {
                            if (count > 0) {
                                web3 = new Web3(web3.currentProvider);
                                web3.eth.getAccounts(function(err, accounts) {
                                    if (err != null) {
                                        alert("An error occurred: " + err);
                                    } else if (accounts.length == 0) {
                                        alert("User is not logged in to MetaMask");
                                    } else {

                                        var account = web3.eth.accounts[0];
                                        if (web3.eth.accounts[0] !== account) {
                                            account = web3.eth.accounts[0];
                                        }
                                        web3.eth.sendTransaction({
                                            from: web3.eth.accounts[0],
                                            to: '<?php echo Meta_mask_wallet_address;?>',
                                            value: web3.toWei(value)
                                        }, (error, result) => {
                                            if (!error && result != null) {

                                                save_Bet_In_Db(bat_nature, bat_type,
                                                    bat_amount, bat_count,
                                                    bat_total, bat_sequence_no,
                                                    bat_numbers0, bat_numbers1,
                                                    bat_numbers2, bat_numbers3,
                                                    bat_numbers4, result);
                                            } else {
                                                alert(error);
                                            }
                                        });

                                    }
                                });
                            } else {
                                alert('please select any bet number.');
                            }
                        } else if (session_name != null && session_account != null && private_key !=
                            null && password != null) {
                            if (count > 0) {
                                bet_con = bet_check;
                                eventsFired++;
                                isPendingTnx(function(response) {
                                    if (response) {
                                        getBalance(session_account, function(error,
                                            output) {
                                            if (error == null) {
                                                if (parseFloat(bat_total) <
                                                    parseFloat(output)) {
                                                    sendTransaction(session_account,
                                                        private_key,
                                                        metamask_wallet_address,
                                                        bat_total, 'a' +
                                                        session_name + 'g' +
                                                        bat_sequence_no + 'b' +
                                                        betTypeNumber +
                                                        bat_numbers0,

                                                        function(error,
                                                            result) {
                                                            if (error == null) {

                                                                save_Bet_In_Db(
                                                                    bat_nature,
                                                                    bat_type,
                                                                    bat_amount,
                                                                    bat_count,
                                                                    bat_total,
                                                                    bat_sequence_no,
                                                                    bat_numbers0,
                                                                    bat_numbers1,
                                                                    bat_numbers2,
                                                                    bat_numbers3,
                                                                    bat_numbers4,
                                                                    result);

                                                                $('#withdraw_amount')
                                                                    .modal(
                                                                        'hide');
                                                            } else {
                                                                bet_con = 0;
                                                                eventsFired = 0;
                                                                alert(
                                                                    "Fail bet please try again."
                                                                );
                                                            }
                                                        });
                                                } else {
                                                    bet_con = 0;
                                                    eventsFired = 0;
                                                    alert(
                                                        "The amount is low in your wallet for applying a bet."
                                                    );
                                                }
                                            } else {
                                                bet_con = 0;
                                                eventsFired = 0;
                                            }
                                        });
                                    } else {
                                        alert(
                                            "Please wait for confirmation of last transaction"
                                        );
                                        bet_con = 0;
                                        eventsFired = 0;
                                    }
                                });
                            }
                        }
                    } else {
                        alert("Bet amount should be less then bank limit");
                    }
                } else {
                    alert("Please select how you want to play.");
                }

            } else {
                alert("Please wait for new drawing.");
            }
        }
    });
});

jQuery('#get_password').click(function() {
    var forgetor_email = jQuery('#forgetor_email').val();
    if (forgetor_email !== null) {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url();?>lottery/get_password",
            data: 'forgetor_email=' + forgetor_email,
            success: function(forget_res) {
                $('#forgot_password').modal('hide');
                alert(forget_res);
            }
        });
    } else {
        alert("please insert your email id.");
    }

});



function save_Bet_In_Db(bat_nature, bat_type, bat_amount, bat_count, bat_total, bat_sequence_no, bat_numbers0,
    bat_numbers1, bat_numbers2, bat_numbers3, bat_numbers4, result) {
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>bat_submit",
        data: 'bat_nature= ' + bat_nature +
            '&bat_type=' + bat_type +
            '&bat_amount=' + bat_amount +
            '&bat_count= ' + bat_count +
            '&bat_total=' + bat_total +
            '&bat_sequence_no=' +
            bat_sequence_no +
            '&bat_numbers0=' +
            bat_numbers0 +
            '&bat_numbers1=' +
            bat_numbers1 +
            '&bat_numbers2=' +
            bat_numbers2 +
            '&bat_numbers3=' +
            bat_numbers3 +
            '&bat_numbers4=' +
            bat_numbers4 +
            '&response=' + result,
        success: function(data) {
            if (data == "sucess") {
                $('#bid_method_big1').prop('checked', false);
                $('#bid_method_small1').prop('checked', false);
                $('#bid_seqence_odd').prop('checked', false);
                $('#bid_seqence_even').prop('checked', false);

                $(".nature").prop(
                    "checked",
                    false);
                $(".bat_type").prop(
                    "checked", false
                );
                $(".count_value").prop(
                    "checked", false
                );
                $("#bid_method_result")
                    .empty();
                $("#bid_number_result0")
                    .empty();
                $("#count").empty();
                $("#count").append(0);
                $("#total").empty();
                $("#total").append(0);
                // jQuery.noConflict();
                $(".checkBoxClass0").prop(
                    "checked", false
                );
                $('#bat_success').modal(
                    'show');
                bet_con = 0;
                eventsFired = 0;
                get_balance();
            } else {
                alert(data);
            }
        }
    });
}

function get_result_serial_no() {
    jQuery.ajax({
        url: '<?php echo base_url();?>get_result_serial_no',
        type: 'get',
        cache: 'false',
        success: function(output) {
            var result_serial_no = output;
            jQuery('.red').empty();
            jQuery('.red').append(parseInt(result_serial_no) + 1);
        }
    });
}

var last_batid = null;

function get_live_bat() {
    jQuery.ajax({
        url: '<?php echo base_url();?>lottery/get_bat',
        type: 'POST',
        data: 'last_bat_id=' + last_batid,
        success: function(output) {
            if (output.result.length > 0) {
                for (var i = 0; i < output.result.length; i++) {
                    if (i == 0) {
                        last_batid = output.result[i].id;
                    }
                    var bat_login_id = output.result[i].userId;
                    var bat_type = output.result[i].type;
                    var bat_total = output.result[i].amount;
                    var winner_single_bat_number = output.result[i].winner_bat_numbers;
                    var utcdateTemp = output.result[i].datetime;
                    var local_DateTemp = moment.utc(utcdateTemp).local().format();
                    var localDateTemp = new Date(local_DateTemp);
                    var date = localDateTemp.getDate();
                    var month = localDateTemp.getMonth();
                    var Year = localDateTemp.getYear();
                    var minut = localDateTemp.getMinutes();
                    var seconds = localDateTemp.getSeconds();
                    var hours = localDateTemp.getHours();
                    var utcdate2 = addZeroBefore(hours) + ':' + addZeroBefore(minut) + ':' +
                        addZeroBefore(
                            seconds);
                    var bat_sequence_no = output.result[i].betNumber;

                    var bat_temp = '' + bat_total;
                    if (bat_type == 'Win') {
                        bat_temp = '<span style="color:orange">+' + bat_total + '</span>';
                    }

                    if (output.result.length > 1) {
                        $("#winning_result").append(
                            "<div class='left-text'><div class='live-text-whte'><a>" +
                            bat_login_id +
                            "</a></div><div class='live-text-whte align-right'><a>" + bat_temp +
                            "</a></div><p class='c-blue'>" +
                            bat_sequence_no +
                            "</p> <p class='c-blue'>" + addZeroBefore(parseInt(month + 1)) + "/" +
                            addZeroBefore(date) + " " +
                            utcdate2 + "</p></div>");
                        $("#winning_result-1").append(
                            "<div class='left-text'><div class='live-text-whte'><a>" +
                            bat_login_id +
                            "</a></div><div class='live-text-whte align-right'><a>" + bat_temp +
                            "</a></div> <p class='c-blue'><span class='live_date_month'>" +
                            addZeroBefore(parseInt(month + 1)) + "/" +
                            addZeroBefore(date) + "</span>" +
                            utcdate2 + "</p></div>");
                    } else {
                        $("#winning_result").prepend(
                            "<div class='left-text'><div class='live-text-whte'><a>" +
                            bat_login_id +
                            "</a></div><div class='live-text-whte align-right'><a>" +
                            bat_temp + "</a></div><p class='c-blue'>" +
                            bat_sequence_no +
                            "</p> <p class='c-blue'>" + addZeroBefore(parseInt(month + 1)) + "/" +
                            addZeroBefore(date) + " " +
                            utcdate2 + "</p></div>");

                        $("#winning_result-1").prepend(
                            "<div class='left-text'><div class='live-text-whte'><a>" +
                            bat_login_id +
                            "</a></div><div class='live-text-whte align-right'><a>" +
                            bat_temp + "</a></div><p class='c-blue'>" +
                            bat_sequence_no +
                            "</p> <p class='c-blue'><span class='live_date_month'>" + addZeroBefore(
                                parseInt(month + 1)) + "/" +
                            addZeroBefore(date) + "</span>" +
                            utcdate2 + "</p></div>");
                    }
                }

            }
        }
    });
}
jQuery('#create_new_account').click(function() {
    $('#Login_for_ask_modal').modal('hide');
});

jQuery('#forgot').click(function() {
    $('#Login_for_ask_modal').modal('hide');
});

jQuery("#wallet_create_modal").on("hidden.bs.modal", function() {
    jQuery('#walleter_name').val(null);
    jQuery('#walleter_email').val(null);
    jQuery('#walleter_password').val(null);
    jQuery('#confirm_walleter_password').val(null);
    jQuery('#divCheckPasswordMatch').empty();
    grecaptcha.reset();
});


jQuery('#create_wallet').click(function() {
    var walleter_name = jQuery('#walleter_name').val();
    var walleter_email = jQuery('#walleter_email').val();
    var walleter_password = jQuery('#walleter_password').val();
    var walleter_confirm_passoword = jQuery("#confirm_walleter_password").val();

    if (grecaptcha === undefined) {
        alert('Recaptcha not defined');
    }
    var response = grecaptcha.getResponse();

    if (!response) {
        alert('Coud not get recaptcha response');
    }

    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                alert(this.responseText);
            }
        }
    }
    if (walleter_password == walleter_confirm_passoword) {
        if (walleter_name != null && walleter_password != null) {
            jQuery.ajax({
                url: 'http://ethplay.io:4001/createAccount',
                type: 'POST',
                data: 'username=' + walleter_name + '&password=' + walleter_password,
                success: function(msg) {
                    var jsonObj = JSON.parse(msg);
                    var status = jsonObj.status;
                    var address = jsonObj.address;
                    var message = jsonObj.message;
                    var private_key = jsonObj.key;
                    if (status == 200) {
                        jQuery.ajax({
                            type: 'POST',
                            url: '<?php echo base_url();?>/lottery/create_wallet',
                            data: 'wallet_name=' + walleter_name +
                                '&wallet_email=' + walleter_email +
                                '&g-recaptcha-response=' + response +
                                '&wallet_password=' + walleter_password +
                                '&wallet_address=' + address +
                                '&wallet_private_key=' + private_key,
                            success: function(msg) {
                                if (msg == "success") {
                                    alert(
                                        'Your wallet has been created.');
                                    jQuery('#wallet_create_modal')
                                        .modal('hide');
                                    jQuery('#Login_for_ask_modal')
                                        .modal('hide');
                                    jQuery('#myModal2').modal('hide');
                                    jQuery('body').removeClass(
                                        'modal-open');
                                    jQuery('.modal-backdrop').remove();
                                } else {
                                    alert(msg);
                                    jQuery('#walleter_name').val("");
                                    jQuery('#walleter_email').val("");
                                    jQuery('#walleter_password').val("");
                                    jQuery('#confirm_walleter_password').val("");
                                    jQuery('#divCheckPasswordMatch').empty();
                                    grecaptcha.reset();
                                }
                            }
                        });
                    }
                }
            });
        } else {
            alert("Please input name and Password");
        }
    } else {
        alert("Password does not match.")
    }
});

jQuery('#wallet_login').click(function() {
    var walleter_email = $('#wallet_email').val();
    var walleter_password = $('#wallet_password').val();
    if (walleter_email != null && walleter_password != null && walleter_email != "" && walleter_password !=
        "") {
        jQuery.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>/lottery/wallet_login',
            data: 'wallet_email=' + walleter_email + '&wallet_password=' +
                walleter_password,
            success: function(msg) {
                if (msg == "success") {
                    window.location.href = "<?php echo base_url();?>lottery/index";
                } else {
                    alert(msg);
                }
            }
        });
    } else {
        alert("Please input email and Password");
    }
});

function SHA256(s) {
    var chrsz = 8;
    var hexcase = 0;

    function safe_add(x, y) {
        var lsw = (x & 0xFFFF) + (y & 0xFFFF);
        var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
        return (msw << 16) | (lsw & 0xFFFF);
    }

    function S(X, n) {
        return (X >>> n) | (X << (32 - n));
    }


    function R(X, n) {
        return (X >>> n);
    }


    function Ch(x, y, z) {
        return ((x & y) ^ ((~x) & z));
    }


    function Maj(x, y, z) {
        return ((x & y) ^ (x & z) ^ (y & z));
    }


    function Sigma0256(x) {
        return (S(x, 2) ^ S(x, 13) ^ S(x, 22));
    }


    function Sigma1256(x) {
        return (S(x, 6) ^ S(x, 11) ^ S(x, 25));
    }


    function Gamma0256(x) {
        return (S(x, 7) ^ S(x, 18) ^ R(x, 3));
    }


    function Gamma1256(x) {
        return (S(x, 17) ^ S(x, 19) ^ R(x, 10));
    }

    function core_sha256(m, l) {
        var K = new Array(0x428A2F98, 0x71374491, 0xB5C0FBCF, 0xE9B5DBA5, 0x3956C25B, 0x59F111F1, 0x923F82A4,
            0xAB1C5ED5, 0xD807AA98, 0x12835B01, 0x243185BE, 0x550C7DC3, 0x72BE5D74, 0x80DEB1FE, 0x9BDC06A7,
            0xC19BF174, 0xE49B69C1, 0xEFBE4786, 0xFC19DC6, 0x240CA1CC, 0x2DE92C6F, 0x4A7484AA, 0x5CB0A9DC,
            0x76F988DA, 0x983E5152, 0xA831C66D, 0xB00327C8, 0xBF597FC7, 0xC6E00BF3, 0xD5A79147, 0x6CA6351,
            0x14292967, 0x27B70A85, 0x2E1B2138, 0x4D2C6DFC, 0x53380D13, 0x650A7354, 0x766A0ABB, 0x81C2C92E,
            0x92722C85, 0xA2BFE8A1, 0xA81A664B, 0xC24B8B70, 0xC76C51A3, 0xD192E819, 0xD6990624, 0xF40E3585,
            0x106AA070, 0x19A4C116, 0x1E376C08, 0x2748774C, 0x34B0BCB5, 0x391C0CB3, 0x4ED8AA4A, 0x5B9CCA4F,
            0x682E6FF3, 0x748F82EE, 0x78A5636F, 0x84C87814, 0x8CC70208, 0x90BEFFFA, 0xA4506CEB, 0xBEF9A3F7,
            0xC67178F2);
        var HASH = new Array(0x6A09E667, 0xBB67AE85, 0x3C6EF372, 0xA54FF53A, 0x510E527F, 0x9B05688C, 0x1F83D9AB,
            0x5BE0CD19);
        var W = new Array(64);
        var a, b, c, d, e, f, g, h, i, j;
        var T1, T2;
        m[l >> 5] |= 0x80 << (24 - l % 32);
        m[((l + 64 >> 9) << 4) + 15] = l;
        for (var i = 0; i < m.length; i += 16) {
            a = HASH[0];
            b = HASH[1];
            c = HASH[2];
            d = HASH[3];
            e = HASH[4];
            f = HASH[5];
            g = HASH[6];
            h = HASH[7];
            for (var j = 0; j < 64; j++) {
                if (j < 16) W[j] = m[j + i];
                else W[j] = safe_add(safe_add(safe_add(Gamma1256(W[j - 2]), W[j - 7]), Gamma0256(W[j - 15])), W[j -
                    16]);
                T1 = safe_add(safe_add(safe_add(safe_add(h, Sigma1256(e)), Ch(e, f, g)), K[j]), W[j]);
                T2 = safe_add(Sigma0256(a), Maj(a, b, c));
                h = g;
                g = f;
                f = e;
                e = safe_add(d, T1);
                d = c;
                c = b;
                b = a;
                a = safe_add(T1, T2);
            }
            HASH[0] = safe_add(a, HASH[0]);
            HASH[1] = safe_add(b, HASH[1]);
            HASH[2] = safe_add(c, HASH[2]);
            HASH[3] = safe_add(d, HASH[3]);
            HASH[4] = safe_add(e, HASH[4]);
            HASH[5] = safe_add(f, HASH[5]);
            HASH[6] = safe_add(g, HASH[6]);
            HASH[7] = safe_add(h, HASH[7]);
        }
        return HASH;
    }

    function str2binb(str) {
        var bin = Array();
        var mask = (1 << chrsz) - 1;
        for (var i = 0; i < str.length * chrsz; i += chrsz) {
            bin[i >> 5] |= (str.charCodeAt(i / chrsz) & mask) << (24 - i % 32);
        }
        return bin;
    }

    function Utf8Encode(string) {
        string = string.replace(/\r\n/g, "\n");
        var utftext = "";
        for (var n = 0; n < string.length; n++) {
            var c = string.charCodeAt(n);
            if (c < 128) {
                utftext += String.fromCharCode(c);
            } else if ((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            } else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }
        }
        return utftext;
    }

    function binb2hex(binarray) {
        var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
        var str = "";
        for (var i = 0; i < binarray.length * 4; i++) {
            str += hex_tab.charAt((binarray[i >> 2] >> ((3 - i % 4) * 8 + 4)) & 0xF) +
                hex_tab.charAt((binarray[i >> 2] >> ((3 - i % 4) * 8)) & 0xF);
        }
        return str;
    }
    s = Utf8Encode(s);
    return binb2hex(core_sha256(str2binb(s), s.length * chrsz));
}

jQuery('#show_private_key').click(function() {
    var walleterr_password = jQuery('#pass_for_private_key').val();
    var encode_password = SHA256(walleterr_password);
    if (session_account != null && encode_password != null) {
        jQuery.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>/lottery/get_private_key',
            data: 'wallet_address=' + session_account + '&wallet_password=' +
                encode_password,
            success: function(msg) {
                if (msg != null) {
                    jQuery.noConflict();
                    jQuery.alert({
                        title: "<div>Private Key</div>",
                        content: "<div class='text-center'>Your private is looking down.</div>",
                        onContentReady: function() {
                            var self = this;
                            setTimeout(function() {
                                self.setContentAppend(
                                    '<div class="pt-3 private_key_text">' +
                                    msg + '</div>');
                            }, 1000);
                        },
                        columnClass: 'medium',
                    });
                } else {
                    alert(msg);
                }
            }
        });
    } else {
        alert("Please input name and Password");
    }
});



function checkPasswordMatch() {
    var password = jQuery("#walleter_password").val();
    var confirmPassword = jQuery("#confirm_walleter_password").val();

    if (password != confirmPassword)
        jQuery("#divCheckPasswordMatch").html(
            "<div class='alert alert-danger'><strong>Passwords do not match!</strong></div>");
    else
        jQuery("#divCheckPasswordMatch").html(
            "<div class='alert alert-success'><strong>Passwords match.</strong></div>");
}

function get_balance() {
    var balance = '';
    if (session_account != null && session_account != "") {
        getBalance(session_account, function(error, result) {
            if (result != null) {
                jQuery("#wallet_amont").empty();
                jQuery("#wallet_amont").append(parseFloat(result).toFixed(4));
            }
        });
    }
}


function get_bank_balance() {
    getBalance(metamask_wallet_address, function(error, result) {
        if (result != null) {
            jQuery(".bank_amount").empty();
            jQuery(".bank_amount").append(parseFloat(result).toFixed(4));
            var five_prcent = (parseFloat(result) * 5 / 100).toFixed(4);
            jQuery("#bet_limit").empty();
            $("#bet_limit").append(five_prcent);
            bankBalanceLimit = five_prcent;
        }
    });
}



jQuery('#withdraw_amountsubmit').click(function() {
    var withdaraw_address = jQuery("#withdraw_address").val();
    var withdaraw_amount = jQuery("#withdraw_amounts").val();

    isPendingTnx(function(response) {
        if (response) {
            getBalance(session_account, function(error, output) {
                if (error == null) {
                    if (parseFloat(withdaraw_amount) <= parseFloat(output)) {
                        sendTransaction(session_account, private_key, withdaraw_address,
                            withdaraw_amount,
                            'withdraw',
                            function(error, result) {
                                if (error == null) {
                                    $('#withdraw_amount').modal('hide');
                                    alert("Your withdraw Has been successful");
                                    get_balance();
                                } else {
                                    alert("You have an error in withdraw amount.");
                                }
                            });
                    } else {
                        alert("Dont have sufficent balance.");
                    }
                }
            });

        } else {
            alert("Please wait for last transaction confirmation");
        }
    });

});




function sendTransaction(address, key, to, value, input, callback) {
    jQuery.ajax({
        type: 'POST',
        url: 'http://ethplay.io:4000/sendTransaction',
        data: 'address=' + address + '&key=' + key + '&to=' + to + '&value=' + value + '&input=' + input,
        success: function(msg) {
            var stringify = JSON.parse(msg);
            callback(null, msg);

            lastTranasctionHash = stringify.hash;

            jQuery.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>/setHashSession',
                data: 'hash=' + lastTranasctionHash,
                success: function(msg) {}
            });
        },
        error: function(xhr, status, error) {
            callback(error, null);

        }
    });
}



function getBalance(address, callback) {

    var web3 = new Web3();
    web3.setProvider(new Web3.providers.HttpProvider("https://ropsten.infura.io/v3/fb65cf4b158e4ba89897f84c18d7ae42"));

    web3.eth.getBalance(address, function(error, wei) {
        if (!error) {
            callback(null, web3.fromWei(wei.toString(), 'ether'));

        } else {
            callback('error', null);
        }
    });
}

function getLoginUserWinBats() {
    jQuery.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>/getLoginWinBats',
        data: 'loginid=' + '<?php echo $this->session->userdata('session_data')['name'];?>',
        success: function(response) {
            // console.log(response);
            var resultAppend = '';
            if (response.stat == true) {
                if (response.result.length > 0) {
                    for (var i = 0; i < response.result.length; i++) {
                        var id = response.result[i].id;
                        var No = response.result[i].orderNumber;
                        var bet_numbers = response.result[i].betNumber.replace(/,/g, "");
                        var result = response.result[i].result;
                        var bet_content = response.result[i].betContent.replace(/ /g, "");
                        var type = response.result[i].type;
                        var amount = response.result[i].amount;
                        var winner_created_date_time = response.result[i].datetime;
                        var winnerDateTime = moment.utc(winner_created_date_time).toDate();
                        var winnerDateTimeLocal = moment.utc(winnerDateTime).local().format();
                        var winnerDateTimelocalDate = new Date(winnerDateTimeLocal);

                        resultAppend += '<tr>';
                        resultAppend += '<td>' + parseInt(parseInt(id) + 100); + '</td>';
                        resultAppend += '<td>' + bet_numbers + '</td>';
                        resultAppend += '<td>' + bet_content + '</td>';


                        resultAppend += '<td>' + type + '</td>';
                        resultAppend += '<td>' + amount + '</td>';
                        resultAppend += '<td>' + addZeroBefore(winnerDateTimelocalDate.getDate()) + '-' +
                            addZeroBefore(parseInt(winnerDateTimelocalDate.getMonth() + 1)) + '-' +
                            parseInt(winnerDateTimelocalDate.getYear() + 1900) + ' ' + addZeroBefore(
                                winnerDateTimelocalDate.getHours()) +
                            ':' + addZeroBefore(winnerDateTimelocalDate.getMinutes()) + ':00' + '</td>';
                        resultAppend += '</tr>';


                    }
                    $("#winbatstb").empty();
                    $("#winbatstb").append(resultAppend);
                }
            }
        },
        error: function(xhr, status, error) {}
    });
}


function isPendingTnx(callback) {
    if (lastTranasctionHash == "" || lastTranasctionHash == null)
        lastTranasctionHash = '<?php echo $this->session->userdata("hash"); ?>';

    if (lastTranasctionHash != null && lastTranasctionHash != "") {

        var web3 = new Web3();
        web3.setProvider(new Web3.providers.HttpProvider("https://ropsten.infura.io/v3/fb65cf4b158e4ba89897f84c18d7ae42"));

        const trx = web3.eth.getTransaction(lastTranasctionHash, function(error, logs) {
            callback(logs.blockNumber == null ? false : true);
        });
    } else {
        callback(true);

    }

}


jQuery(document).ready(function() {
   
    theAjaxCall();
    get_balance();
    setInterval(get_balance, 2000); //every 2 sec
    get_bank_balance();
    get_result_serial_no();
    setInterval(get_live_bat, 2000); //every 2 sec
    setInterval(get_bank_balance, 30000);
    setInterval(lotteryresult, 2000); //every 2 sec
    setInterval(get_result_serial_no, 1000); //every 1 sec
    jQuery("#walleter_password, #confirm_walleter_password").keyup(checkPasswordMatch);


    <?php if($this->session->userdata('session_data')['name']!=null): ?>
    getLoginUserWinBats();
    setInterval(getLoginUserWinBats, 2000); //every 1 sec
    <?php endif;?>


});
</script>