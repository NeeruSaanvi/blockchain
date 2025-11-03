<?php
 $session_id ='';
 if(!empty($this->session->userdata('session_data'))){
 $session = $this->session->userdata('session_data') ; //Retrive ur session
 $session_accont = $session['name'];
 $session_email = $session['email'];
 $walletaddress = $session['account'];
 @$logger_password = $session['password'];
 @$logger_private_key = $session['private_key'];
 header('Access-Control-Allow-Origin: *');
}
?>
<div class="update_password_form">
                   <form class="form-horizontal" action="<?php echo base_url();?>lottery/update_password" role="form" method="post">
                    <div class="form-group mt-4 d-inline-block w-100">
                        <label class="control-label col-sm-12" for="wallet_password">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="wallet_password" id="wallet_password" value="" placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group mt-4 d-inline-block w-100">
                        <label class="control-label col-sm-12" for="wallet_password">Confirm Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Password" />
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="<?php echo @$user_id;?>" name="user_id" id="user_id"/>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="wallet_login" class="btn btn-sign_in">Change Password</button>
                        </div>
                    </div>
                 </form>
</div>










