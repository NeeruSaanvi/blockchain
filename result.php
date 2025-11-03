<?php
 include("index.php");
$con = mysqli_connect("localhost","root","ethPlay^&TR21","lottery");
date_default_timezone_set('UTC');

$select_resut_sql = "SELECT * FROM result ORDER BY result_id DESC LIMIT 0,1";
$select_result = mysqli_query($con, $select_resut_sql);
$row_count = mysqli_num_rows($select_result);   
$blockNumber = 100;      
if($row_count > 0 ){
    $row = mysqli_fetch_assoc($select_result); 
    $result_id = $row["result_id"];
    $blockNumber = $row["result_serial_no"];
    $blockNumber= $blockNumber+1;                        
}
else{
	$result_id = 0;
}
	
$insert_sql = "INSERT INTO result (result_serial_no,result_number,created_date_time)VALUES ($blockNumber,'','".date('Y-m-d H:i')."')"; 
$insert_success = mysqli_query($con,$insert_sql); 
$result_id = $result_id+1;
$selectresutsql = "SELECT * FROM result WHERE result_id=$result_id";
$selectresult = mysqli_query($con, $selectresutsql);
$rowchild = mysqli_fetch_assoc($selectresult); 
$currentTimeStamp =  strtotime($rowchild["created_date_time"]);
firstCall($result_id);
function firstCall($result_id){
	
    global $con;
    global $currentTimeStamp;   
    $output = getLatestTxn();
    $jsondata = json_decode($output);
    // print_r($jsondata);
    // die();
    if(count($jsondata)>0 && $output!=null){          
        $status = $jsondata->status;
        $txn = $jsondata->txn;   
        if($status==200 && $txn!=null){
            $block_number = $txn->blockNumber;
            //$block_number = $block_number+1;
            $Hashkey = $txn->txHash;
            $time = $txn->timestamp; 
            if(strtotime($time)>=$currentTimeStamp){ 
                $int = filter_var($Hashkey, FILTER_SANITIZE_NUMBER_INT);
                $lastdigit = substr($int, -1);           
                if(is_numeric($lastdigit)){
                    $lastnumber = $lastdigit;
                    $insert_hash = "insert into result_hash(result_id,hashs_result) values('$result_id','$Hashkey')";
                    $runhash = mysqli_query($con, $insert_hash);   
                    $number_update_sql = "UPDATE result SET result_number = CONCAT(result_number, '$lastnumber'),result_time='$time' WHERE result_id=$result_id";                   
                    mysqli_query($con, $number_update_sql);                    
                    genrateResult($result_id,$block_number);
                }else{
                    genrateResult($result_id,$block_number);
                   // firstCall($result_id);
                }
            }else{
               genrateResult($result_id,$block_number);
               //firstCall($result_id); 
            }                
        }else{                     
            firstCall($result_id);  
        }
    }else{
        firstCall($result_id);  
    }
}
/**** Functions */
function getLatestTxn(){
    $handle = curl_init();
    $url = "http://localhost:4000/getLatestTxn";
    // Set the url
    curl_setopt($handle, CURLOPT_URL, $url);
    // Set the result output to be a string.
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($handle);
    curl_close($handle);    
    return $output;    
}
function getNextTxn($param){
    $status ='';
    $param = (int) trim($param);
    $param =  $param+1;
    $handle = curl_init();
    $url = "http://localhost:4000/getLatesttnxByBlock?blocknumber=".$param;
    // Set the url
    curl_setopt($handle, CURLOPT_URL, $url);
    // Set the result output to be a string.
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($handle);
    curl_close($handle); 
    $jsondata = json_decode($output);   
   // var_dump($jsondata);
   // print_r($jsondata); 
    $status = $jsondata->status;   
    if($status==200){
        return $output; 
    }else{
        $param= $param-1;
        getNextTxn($param);
    }       
}
function updatetResult($resultid,$lastnumber,$time){
    global $con;
    if($lastnumber!=''){
        echo $resultid;
        $select_resut_sql = "SELECT * FROM result WHERE result_id=$resultid";
        $select_result = mysqli_query($con, $select_resut_sql);
        $row_count = mysqli_num_rows($select_result);   
        $row = mysqli_fetch_assoc($select_result);
        $blockNumber = $row["result_serial_no"];
        $digitnumber = trim($row["result_number"]);
        $digitlength = strlen($digitnumber);  
        if($digitlength < 5){
            $newNumber = $digitnumber.$lastnumber;
            $number_update_sql = "UPDATE result SET result_number = CONCAT(result_number, '$lastnumber'),result_time='$time' WHERE result_id=$resultid";
            echo $number_update_sql;
           
            //$insert_success = mysqli_query($con,$insert_sql); 
            if (mysqli_query($con, $number_update_sql)) {  
                if(strlen($newNumber)!=5){                
                    return false;
                }else{
                    return true;
                }
            }    
        }else{
            return true;
        }
    }    
    
}
function genrateResult($result_id=null,$block_num=null){
    global $currentTimeStamp;   
    if($result_id==null) return false;
    //if($block_num==null) return false;
    global $con;
    $output = getNextTxn($block_num);
    //$output = getLatestTxn();
    $jsondata = json_decode($output);
    if(count($jsondata)>0){
        $status = $jsondata->status;
        $txn = $jsondata->txn;        
        if($status==200 && $txn!=null  && $txn->blockNumber > $block_num){
            $block_number = $txn->blockNumber;
            //$block_number = $block_number+1;
            $Hashkey = $txn->txHash;
            $time = $txn->timestamp;
            $int = filter_var($Hashkey, FILTER_SANITIZE_NUMBER_INT);
            $lastdigit = substr($int, -1);
            if(is_numeric($lastdigit)){
                $lastnumber = $lastdigit;
                $select_resut_sql = "SELECT * FROM result WHERE result_id=$result_id";
                $select_result = mysqli_query($con, $select_resut_sql);
                $row_count = mysqli_num_rows($select_result);   
                $row = mysqli_fetch_assoc($select_result);
                $blockNumber = $row["result_serial_no"];
                $digitnumber = trim($row["result_number"]);
                $result_time = trim($row["result_time"]);
                $digitlength = strlen($digitnumber);  
                if($digitlength < 5){
                    if(strtotime($time)>=$currentTimeStamp){  
                        $newNumber = $digitnumber.$lastnumber;
                        if($result_time==null){
                            
                            $number_update_sql = "UPDATE result SET result_number = CONCAT(result_number, '$lastnumber'),result_time='$time' WHERE result_id=$result_id";
                        }else{
                            $number_update_sql = "UPDATE result SET result_number = CONCAT(result_number, '$lastnumber') WHERE result_id=$result_id";
                        } 
                        $insert_hash = "insert into result_hash(result_id,hashs_result) values('$result_id','$Hashkey')";
                        $runhash = mysqli_query($con, $insert_hash);                      
                        if (mysqli_query($con, $number_update_sql)) {  
                            if(strlen($newNumber)==5){  
                                 wining($lastnumber,$blockNumber,$newNumber);              
                                return true;
                            }else{
                                genrateResult($result_id, $block_number);
                                
                            }
                        } 
                    }else{
                        genrateResult($result_id, $block_number);
                    }   
                }else{
                    return true;
                }
            }else{
                genrateResult($result_id, $block_number);
            }
        }else{
            if($status==200 && $txn!=null && $block_num==null){
                $block_number = $txn->blockNumber;
                //$block_number = $block_number+1;
                $Hashkey = $txn->txHash;
                $time = $txn->timestamp;
                $int = filter_var($Hashkey, FILTER_SANITIZE_NUMBER_INT);
                $lastdigit = substr($int, -1);
                if(is_numeric($lastdigit)){
                    $lastnumber = $lastdigit;
                    $select_resut_sql = "SELECT * FROM result WHERE result_id=$result_id";
                    $select_result = mysqli_query($con, $select_resut_sql);
                    $row_count = mysqli_num_rows($select_result);   
                    $row = mysqli_fetch_assoc($select_result);
                    $blockNumber = $row["result_serial_no"];
                    $digitnumber = trim($row["result_number"]);
                    $digitlength = strlen($digitnumber);  
                    if($digitlength < 5){
                        $newNumber = $digitnumber.$lastnumber;
                        $number_update_sql = "UPDATE result SET result_number = CONCAT(result_number, '$lastnumber') WHERE result_id=$result_id";
                        if (mysqli_query($con, $number_update_sql)) {  
                            if(strlen($newNumber)==5){                
                                return true;
                            }else{
                                genrateResult($result_id, $block_number);                                
                            }
                        }    
                    }else{
                        return true;
                    }
                }else{
                    genrateResult($result_id, $block_number);
                }
            }else{
                genrateResult($result_id, $block_num);
            }            
        }
    }else{
        genrateResult($result_id, $block_num);
    }     
}
function cronRun($result_id,$blocknumber){
    global $currentTimeStamp;    
    $output = getNextTxn($blocknumber);
   // var_dump($output);
    //echo $output;
    $jsondata = json_decode($output);
    $status = $jsondata->status;
    $txn = $jsondata->txn;
    $flag = true;
    if($status==200 && $txn!=null){
        $txn = $jsondata->txn;
        $block_number = (int) trim($txn->blockNumber);
        $block_number = $block_number+1;   
        $Hashkey = $txn->txHash;
        $time = $txn->timestamp;  
        if(strtotime($time)>=$currentTimeStamp){ 
            $int = filter_var($Hashkey, FILTER_SANITIZE_NUMBER_INT);
            $lastdigit = substr($int, -1);           
            if(is_numeric($lastdigit)){
                $lastnumber = $lastdigit;
                $flag = updatetResult($result_id,$lastnumber,$time);             
            }else{
                $flag=false;
            }
        }
        if($flag==false){
            cronRun($result_id,$block_number);
        }               
    }else{                    
        cronRun($result_id,$blocknumber);            
    }
  
}
function wining($lastnumber,$blocknumber,$newNumber){
    global $con;
    
    $select_winner = "select bats.*,(SELECT COUNT(*) FROM bat_numbers WHERE bat_numbers.bat_numbers=$lastnumber AND bat_numbers.bat_id = bats.bat_id) AS count from bat_numbers RIGHT JOIN bats ON bat_numbers.bat_id=bats.bat_id WHERE bats.bat_sequence_no=$blocknumber AND  (bat_numbers.bat_numbers=$lastnumber OR bats.bat_nature>0 OR bats.bat_type>0) GROUP BY bat_id";
    $winner_result = mysqli_query($con, $select_winner);
    $winner_row_count = mysqli_num_rows($winner_result);   
    
    if($winner_row_count>0){
    
    $hash = "";
     while($winnerrow = mysqli_fetch_assoc($winner_result)){


      $winner_login_id = $winnerrow["bat_login_id"];
      $bat_id = $winnerrow['bat_id'];
      $batter_wallet_address = $winnerrow['batter_wallet'];
      $winner_nature = $winnerrow["bat_nature"];
      $bat_type = $winnerrow["bat_type"];
      $bat_amount = $winnerrow["bat_amount"];
      $bat_count = $winnerrow["bat_count"];
      $bat_total = $winnerrow["bat_total"];

      
      $reward = $bat_amount*(10*0.95)*$winnerrow["count"];

      $batnature ="";

      if($lastnumber>4 && $winner_nature==2){
        $reward += $bat_amount*(2*0.95);
      }
      else if($lastnumber<5 && $winner_nature==1){
        $reward += $bat_amount*(2*0.95);
      }

      if($lastnumber%2==0 && $bat_type==2){
        $reward += $bat_amount*(2*0.95);
      }
      else if($lastnumber%2==1 && $bat_type==1){
        $reward += $bat_amount*(2*0.95);
      }
      if($reward>0){

// insert into betSummery (betNumber,result,userId,type,amount,orderNumber,betContent) select '8290','80897','test','Win','0.01','100', betContent from betSummery where userId='test' and betNumber='8290' limit 1

        $insert_winner_summery = "insert into betSummery (betNumber,result,userId,betContent,type,amount,orderNumber) select '$blocknumber','$newNumber','$winner_login_id', betContent,'Win','$reward','100' from betSummery where userId='$winner_login_id' and betNumber='$blocknumber' limit 1";
        $winnerresultSummary = mysqli_query($con, $insert_winner_summery);

      $walletfromaddress = '';
      $bankAddress =  "0x6537501c1a3a28f98371d1d112f3b64B5fBF24bE";
      $key = '0xF01C605FC75CCFA690FA5DF8B9EB31509CF6C0DDA0915CB9E42702BF4034583A';
      $bit_row = $winnerrow["bets_type"];
      $insert_winner = "insert into winner (login_id,bat_id,betSQNumber,batter_wallet_address,winner_bat_numbers,win_amount) VALUES ('$winner_login_id','$bat_id','$blocknumber','$batter_wallet_address','$lastnumber','$reward')";
      $winnerresult = mysqli_query($con, $insert_winner);

      if($winnerresult==true){
       /*$curl = curl_init();
       curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://localhost:4000/sendTransaction',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS =>[address=>'0xDcc597f593f327A2c2D99907Db4823b499dBcAa0',key=>$key,to=>'0x452ff18EF8429AC9c2eB42ec0BB1A7D18F36ed50',value=>'1'],
            CURLOPT_HTTPHEADER => [Content-Type=> 'application/x-www-form-urlencoded']
        ]);

       // data: 'address=' + address + '&key=' + key + '&to=' + to + '&value=' + value,
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);*/
        $postfields = array(
            'address' => $bankAddress,
            'key' => $key,
            'to'=>$batter_wallet_address,
            'value'=>$reward,
            'hash'=>$hash,
            'input'=>$blocknumber
        );
        
        $fields_string = http_build_query($postfields); 
        //prepare curl request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://ethplay.io:4000/sendTransactionHash");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, count($postfields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/x-www-form-urlencoded'
        ));
        //needed for https
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //make the request
        $result = curl_exec($ch);
        if($result["status"] == 200)
        {
            $hash = $result["hash"];
        }

        // $hash = $result;
        curl_close($ch);
        $insert_winner1 = "update winner set respons='$result' WHERE bat_id='$bat_id'";
        $winnerresult1 = mysqli_query($con, $insert_winner1);

            sleep(10);
        }
      }
    }
       
 }
}
?>