    <script type="text/javascript">
    
    var result='';
    $('#bet_charge_half_x').click(function(){
    var selfvalue = $('#bet_charge_half_x').val();
    if(selfvalue==1){  
    var betcharge = $('#bet_charge').val();
    var bet_charge_value = parseFloat(betcharge); 
    
    result = parseFloat(bet_charge_value)/2;
    if(result<=0.005){
        result = 0.005;
    }
    
    $('#bet_charge').attr( 'value',result);
    var count = $('#count').text();
    $('#total').empty();
    $('#total').append(result*count);
    }
  });
   

   $('#bet_charge_2x').click(function(){
    var selfvalue = $('#bet_charge_2x').val();
    if(selfvalue==1){   
    var betcharge = $('#bet_charge').val();
    var bet_charge_value = parseFloat(betcharge); 
    var result = parseFloat(bet_charge_value)*2;
    if(result >= 0.25){
        result = 0.25;
    }
    $('#bet_charge').attr( 'value',result);
    var count = $('#count').text();
    $('#total').empty();
    $('#total').append(result*count);
   }
 });

$('#bet_charge_max').click(function(){
    var selfvalue = $('#bet_charge_max').val();
    if(selfvalue==1){  
     $('#bet_charge').attr( 'value', '0.25');
     $('#total').empty();
     var count = $('#count').text();
     $('#total').append(0.25*count);
   }
});



        $(document).ready(function(){
            /* toggal button active inactive functionallity script start */
            $('.advanced').click(function(){
               if($(".bid_method_big1").prop('checked') == true){
                 var count = $('#count').text();
                 if(count>0){
                     var newcount =count-1;
                     $('#count').empty();
                     $('#count').append(newcount);
                     $(".bid_method_big1").prop('checked', false);
                   }
               }
               if($(".bid_method_small1").prop('checked') == true){
                 var count = $('#count').text();
                 if(count>0){
                     var newcount =count-1;
                     $('#count').empty();
                     $('#count').append(newcount);
                     $(".bid_method_small1").prop('checked', false);
                   }
               }
               if($('#bid_seqence_odd').prop("checked") == true){
                 var ccount = $('#count').text();
                 if(ccount>0){
                     var nnewcount =ccount-1;
                     $('#count').empty();
                     $('#count').append(nnewcount);
                     $("#bid_seqence_odd").prop('checked', false);
                  }
               }
               if($('#bid_seqence_even').prop("checked") == true){
                 var ccount = $('#count').text();
                 if(ccount>0){
                     var nnewcount =ccount-1;
                     $('#count').empty();
                     $('#count').append(nnewcount);
                     $("#bid_seqence_even").prop('checked', false);
                  }
               }
               if($('.advanced').prop("checked") == true){
                    $('.showbet_1').show();
                    $('.showbet_2').show();
                    $('.showbet_3').show();
                    $('.showbet_4').show();
                    $('.comman-div').hide();
                    $("#bid_method_result").empty();
                }else if($('.advanced').prop("checked") == false){
                    $('.showbet_1').hide();
                    $('.showbet_2').hide();
                    $('.showbet_3').hide();
                    $('.showbet_4').hide();
                    $('.comman-div').show();         
                    $('#firstelem').show();     
                }else{
                    console.log('Not found');
                }
            });
            /* toggal button active inactive functionallity script End */       


            /* select the method of BIG and Small and append the value in result id $ start */
            $('#bid_method_big1').click(function(){
            var value = $(this).val();
            if($(this).is(':checked'))
                {
                $('#bid_method_small1').prop('checked', false);
                $('#bid_methodSMALL').remove(); 
                $("#bid_method_result").append('<span id="bid_method'+value+'">'+$(this).attr('value')+'</span>'+" ");
                }else{
                    $('#bid_method'+value).remove();

                }
            });
        
        $('#bid_method_small1').click(function(){
           var value = $(this).val();
            if($(this).is(':checked'))
                {
                $('#bid_method_big1').prop('checked', false);
                $('#bid_methodBIG').remove();    
                $("#bid_method_result").append('<span id="bid_method'+value+'">'+$(this).attr('value')+'</span>'+" ");
                }else{
                    $('#bid_method'+value).remove();
                }
            });    

            /* select the method of BIG and Small and append the value in result id $ END */



         /* select the Number sequence of EVEN OR ODD and append the value in result id $ start */
         $('#bid_seqence_odd').click(function(){
           var value = $(this).val();
            if($(this).is(':checked'))
                {
                $('#bid_seqence_even').prop('checked', false);
                $('#bid_sequenceEVEN').remove(); 
                $("#bid_method_result").append('<span id="bid_sequence'+value+'">'+$(this).attr('value')+'</span>'+" ");
                }else{
                    $('#bid_sequence'+value).remove();
                }
            });
        
        $('#bid_seqence_even').click(function(){
           var value = $(this).val();
            if($(this).is(':checked'))
                {
                $('#bid_seqence_odd').prop('checked', false);
                $('#bid_sequenceODD').remove();    
                $("#bid_method_result").append('<span id="bid_sequence'+value+'">'+$(this).attr('value')+'</span>'+" ");
                }else{
                    $('#bid_sequence'+value).remove();
                }
            });    
          /* select the Number sequence of EVEN OR ODD and append the value in result id $ end */
         $('.count_value0').click(function() {
         if($(".advanced").prop("checked") == false){    
            var selected = new Array();
            if($(this).val()==$('#all-btn0').val())
            {
                $('.checkBoxClass0').prop('checked', true);  
            }
             $(".checkBoxClass0:checked").each(function(){
                selected.push($(this).val());
             });
             $(".nature:checked").each(function(){
                selected.push($(this).val());
             });
             $(".bat_type:checked").each(function(){
                selected.push($(this).val());
             });
             var numbervalue = selected.length;
             var betcharge = $('#bet_charge').val();
             var count = numbervalue;
             var total = numbervalue*betcharge;
             $('#count').empty();
             $('#total').empty();
             $('#count').append(count);
             $('#total').append(parseFloat(Number(total).toFixed(4)));
           }
         }); 
          
        $('.count_value0').click(function() {
         if($(".advanced").prop("checked") == true && $("#bits_1").prop("checked") == true){    
            var selected = new Array();
            if($(this).val()==$('#all-btn0').val())
            {
                $('.checkBoxClass0').prop('checked', true);  
            }
             $(".checkBoxClass0:checked").each(function(){
                selected.push($(this).val());
             });
             var numbervalue = selected.length;
             var betcharge = $('#bet_charge').val();
             var count = numbervalue;
             var total = numbervalue*betcharge;
             $('#count').empty();
             $('#total').empty();
             $('#count').append(count);
             $('#total').append(parseFloat(Number(total).toFixed(4)));
           }
         });
          
         
         $("#bits_2").click(function() {
          if($("#bits_2").prop("checked")){
           $('.count_value1 , .checkBoxClass0 , #all-btn0, #all-btn1').click(function() {
            var selected_bat1 = new Array();
            var selected_bat2 = new Array();
            if($(this).val()==$('#all-btn1').val())
            {
                $('.checkBoxClass1').prop('checked', true);  
            }
            $(".checkBoxClass0:checked").each(function(){
                selected_bat1.push($(this).val());
             });
            $(".checkBoxClass1:checked").each(function(){
                selected_bat2.push($(this).val());
             });
             var numbervalue = selected_bat1.length*selected_bat2.length;
             var betcharge = $('#bet_charge').val();
             var count = numbervalue;
             var total = numbervalue*betcharge;
             $('#count').empty();
             $('#total').empty();
             $('#count').append(count);
             $('#total').append(parseFloat(Number(total).toFixed(4)));
           });
          }
         });

         $("#bits_3").click(function() {
          if($("#bits_3").prop("checked")){
           $('.checkBoxClass0 , .count_value1 , .count_value2 , #all-btn0 , #all-btn1 , #all-btn2').click(function() {
            var selected_bat1 = new Array();
            var selected_bat2 = new Array();
            var selected_bat3 = new Array();
            if($(this).val()==$('#all-btn2').val())
            {
                $('.checkBoxClass2').prop('checked', true);  
            }
            $(".checkBoxClass0:checked").each(function(){
                selected_bat1.push($(this).val());
             });
            $(".checkBoxClass1:checked").each(function(){
                selected_bat2.push($(this).val());
             });
            
            $(".checkBoxClass2:checked").each(function(){
                selected_bat3.push($(this).val());
             }); 
             var numbervalue = selected_bat1.length*selected_bat2.length*selected_bat3.length;
             var betcharge = $('#bet_charge').val();
             var count = numbervalue;
             var total = numbervalue*betcharge;
             $('#count').empty();
             $('#total').empty();
             $('#count').append(count);
             $('#total').append(parseFloat(Number(total).toFixed(4)));
           });
          }
         });

         $("#bits_4").click(function() {
          if($("#bits_4").prop("checked")){
           $('.checkBoxClass0 , .count_value1 , .count_value2 , .count_value3 , #all-btn0 , #all-btn1 , #all-btn2 , #all-btn3').click(function() {
            var selected_bat1 = new Array();
            var selected_bat2 = new Array();
            var selected_bat3 = new Array();
            var selected_bat4 = new Array();
            if($(this).val()==$('#all-btn3').val())
            {
                $('.checkBoxClass3').prop('checked', true);  
            }
            $(".checkBoxClass0:checked").each(function(){
                selected_bat1.push($(this).val());
             });
            $(".checkBoxClass1:checked").each(function(){
                selected_bat2.push($(this).val());
             });
            
            $(".checkBoxClass2:checked").each(function(){
                selected_bat3.push($(this).val());
             });
            $(".checkBoxClass3:checked").each(function(){
                selected_bat4.push($(this).val());
             }); 
             var numbervalue = selected_bat1.length*selected_bat2.length*selected_bat3.length*selected_bat4.length;
             var betcharge = $('#bet_charge').val();
             var count = numbervalue;
             var total = numbervalue*betcharge;
             $('#count').empty();
             $('#total').empty();
             $('#count').append(count);
             $('#total').append(parseFloat(Number(total).toFixed(4)));
           });
          }
         });


       
       

          

            
            /* Reset the value of sequence and bid method result $ start */
            $("#reset_button1").click(function() {

             if($('#bid_method_result').text()!=''){ 
                $("#bid_method_result").empty();
                var amount = $("#bet_charge").val();
                var minusvalue='';
                 
                if($('#bid_method_big1').is(":checked") || $('#bid_method_small1').is(":checked")){
                   var count = $("#count").text();
                   var minusvalue = count-1;
                   var total = parseFloat(amount)*minusvalue;
                   $('#count').empty();
                   $('#count').append(minusvalue);
                   $('#total').empty();
                   $('#total').append(total);
                   $('#bid_method_big1').prop('checked',false);
                   $('#bid_method_small1').prop('checked',false);
                }
                if($('#bid_seqence_odd').is(":checked") || $('#bid_seqence_even').is(":checked")){
                   var count = $("#count").text(); 
                   var minusvalue = count-1;
                   $('#count').empty();
                   $('#count').append(minusvalue);
                   var total = amount*minusvalue;
                   $('#total').empty();
                   $('#total').append(total);
                   $('#bid_seqence_odd').prop('checked',false);
                   $('#bid_seqence_even').prop('checked',false);
                 }
                   $('#bid_method_big1').prop('checked',false);
                   $('#bid_method_small1').prop('checked',false);
                   $('#bid_seqence_odd').prop('checked',false);
                   $('#bid_seqence_even').prop('checked',false);
               
               }
            });     
            /* Reset the value of sequence and bid method result $ End */



            /* row1 all select number and reset the value button $ start */
            $('#all-btn0').click(function () {
                $('.checkBoxClass0').prop('checked', true);
                $('#all-btn0').prop('checked', true);
                var result_length = $('#bid_number_result0').html().length;
                if(result_length<10){
                    for(i=0;i<=9;i++){  
                        var first_bid_value = $('#'+i+'0').val();
                        var str = first_bid_value+' ';
                        $("#bid_number_result0").append('<span id="all_bat_num0'+i+'">'+ str +'</span>'+" ");
                    }
                }
                
            });
            
            $("#reset-btn0").click(function () {
                var amount = $("#bet_charge").val(); 
                var countCheckedCheckboxes = $('.checkBoxClass0').filter(':checked').length;
                var count = $("#count").text();
                if(count>0){
                    var minusvalue = count-countCheckedCheckboxes;
                }
                else{
                    minusvalue=0;
                } 
                 
                $('#count').empty();
                $('#count').append(minusvalue);
                $('.checkBoxClass0').prop('checked',false);
                $('#all-btn0').prop('checked',false);
                $('#bid_number_result0').empty();
                var total = amount*minusvalue;
                $('#total').empty();
                $('#total').append(total);
           });
            /* row1 all select number and reset the value button $ END*/

            /* row2 all select number and reset the value button $ start*/
            $('#all-btn1').click(function () {
                $('.checkBoxClass1').prop('checked', true);
                $('#all-btn1').prop('checked', true);
                var result_length = $('#bid_number_result1').html().length;
                if(result_length<10){  
                    for(i=0;i<=9;i++){
                     var first_bid_value = $('#'+i+'1').val();
                     $("#bid_number_result1").append('<span id="all_bat_num1'+i+'">'+ first_bid_value +'</span>'+" ");
                 }
             }
             
        });
            $("#reset-btn1").click(function () {
               $('.checkBoxClass1').prop('checked',false);
               $('#all-btn1').prop('checked',false);
               $('#bid_number_result1').empty();
           });
            /* row2 all select number and reset the value button $ End*/        


            /* row3 all select number and reset the value button $ start*/
            $('#all-btn2').click(function () {
                $('.checkBoxClass2').prop('checked', true);
                $('#all-btn2').prop('checked', true);
                var result_length = $('#bid_number_result2').html().length;
                if(result_length<10){  
                    for(i=0;i<=9;i++){
                     var first_bid_value = $('#'+i+'2').val();
                     $("#bid_number_result2").append('<span id="all_bat_num2'+i+'">'+ first_bid_value +'</span>'+" ");
                 }
             }
           });
            $("#reset-btn2").click(function () {
               $('.checkBoxClass2').prop('checked',false);
               $('#all-btn2').prop('checked',false);
               $('#bid_number_result2').empty();
           });
            /* row3 all select number and reset the value button $ END*/


            /* row4 all select number and reset the value button $ start*/        

            $('#all-btn3').click(function () {
                $('.checkBoxClass3').prop('checked', true);
                $('#all-btn3').prop('checked', true);
                var result_length = $('#bid_number_result3').html().length;
                if(result_length<10){ 
                   for(i=0;i<=9;i++){
                     var first_bid_value = $('#'+i+'3').val();
                     $("#bid_number_result3").append('<span id="all_bat_num3'+i+'">'+ first_bid_value +'</span>'+" ");
                 }
             }
         });
            $("#reset-btn3").click(function () {
               $('.checkBoxClass3').prop('checked',false);
               $('#all-btn3').prop('checked',false);
               $('#bid_number_result3').empty();
           });

            /* row4 all select number and reset the value button $ End*/


            /* row5 all select number and reset the value button $ Start*/

            $('#all-btn4').click(function () {
                $('.checkBoxClass4').prop('checked', true);
                $('#all-btn4').prop('checked', true);
                var result_length = $('#bid_number_result4').html().length;
                if(result_length<10){ 
                    for(i=0;i<=9;i++){
                     var first_bid_value = $('#'+i+'4').val();
                     $("#bid_number_result4").append('<span id="all_bat_num4'+i+'">'+ first_bid_value +'</span>'+" ");
                 }
             }
         });
            $("#reset-btn4").click(function () {
                $('.checkBoxClass4').prop('checked',false);
                $('#all-btn4').prop('checked',false);
                $('#bid_number_result4').empty();
            });
            /* row5 all select number and reset the value button $ END*/

        });

    /* small toggal show the on advance click button $ start*/
    $(".advanced").click(function(){
      $(".small-pager-block").toggle();
  });
    /* small toggal show the on advance click button $ End*/    


    /* bits number select $ start */
    $('#bits_1').click(function(){
        if($(this).prop("checked") == true){
            $('.showbet_0').show();
            $('.showbet_1').hide();
            $('.showbet_2').hide();
            $('.showbet_3').hide();
            $('.showbet_4').hide();
        }
    });

    $('#bits_2').click(function(){
        if($(this).prop("checked") == true){
            $('.showbet_0').show();
            $('.showbet_1').show();
            $('.showbet_2').hide();
            $('.showbet_3').hide();
            $('.showbet_4').hide();
        }
    });
    $('#bits_3').click(function(){
        if($(this).prop("checked") == true){
            $('.showbet_0').show();
            $('.showbet_1').show();
            $('.showbet_2').show();
            $('.showbet_3').hide();
            $('.showbet_4').hide();
        }
    });
    $('#bits_4').click(function(){
        if($(this).prop("checked") == true){
            $('.showbet_0').show();
            $('.showbet_1').show();
            $('.showbet_2').show();
            $('.showbet_3').show();
            $('.showbet_4').hide();
        }
    });

    $('#bits_5').click(function(){
        if($(this).prop("checked") == true){
            $('.showbet_0').show();
            $('.showbet_1').show();
            $('.showbet_2').show();
            $('.showbet_3').show();
            $('.showbet_4').show();
        }
    });
    /* bits number select $ END */     
 
     $('.checkBoxClass0').click(function(){
     var value = $(this).val();
     
     if($('#all-btn0').prop('checked',true)){
        $('#all-btn0').prop('checked',false);
     }
     if($("#all_bat_num0"+value).length > 0){
        $("#all_bat_num0"+value).remove();
     }
     var checkbox0_array = new Array();
     $(".checkBoxClass0:checked").each(function(){
        checkbox0_array.push($(this).val());
     });
     var lengthofcheckbox = checkbox0_array.length;
     if(lengthofcheckbox==10){
        $('#all-btn0').prop('checked',true);
     }
     if($(this).is(':checked'))
        {
         $("#bid_number_result0").append('<span id="something0'+value+'">'+$(this).attr('value')+'</span>'+" ");
        }else{
              $('#something0'+value).remove();
         }
     });

    $('.checkBoxClass1').click(function(){
      var value = $(this).val();
     if($('#all-btn1').prop('checked',true)){
        $('#all-btn1').prop('checked',false);
     }
     if($("#all_bat_num1"+value).length > 0){
        $("#all_bat_num1"+value).remove();
     }
     var checkbox1_array = new Array();
     $(".checkBoxClass1:checked").each(function(){
        checkbox1_array.push($(this).val());
     });
     var lengthofcheckbox = checkbox1_array.length;
     if(lengthofcheckbox==10){
        $('#all-btn1').prop('checked',true);
     } 
     if($(this).is(':checked'))
        {
         $("#bid_number_result1").append('<span id="something1'+value+'">'+$(this).attr('value')+'</span>'+" ");
        }else{
              $('#something1'+value).remove();
         }
     });

    $('.checkBoxClass2').click(function(){
        var value = $(this).val();  
     if($('#all-btn2').prop('checked',true)){
        $('#all-btn2').prop('checked',false);
     }
     if($("#all_bat_num2"+value).length > 0){
        $("#all_bat_num2"+value).remove();
     }
     var checkbox2_array = new Array();
     $(".checkBoxClass2:checked").each(function(){
        checkbox2_array.push($(this).val());
     });
     var lengthofcheckbox = checkbox2_array.length;
     if(lengthofcheckbox==10){
        $('#all-btn2').prop('checked',true);
     }   
      var value = $(this).val()
     if($(this).is(':checked'))
        {
         $("#bid_number_result2").append('<span id="something2'+value+'">'+$(this).attr('value')+'</span>'+" ");
        }else{
              $('#something2'+value).remove();
         }
     });

    $('.checkBoxClass3').click(function(){
        var value = $(this).val();  
    if($('#all-btn3').prop('checked',true)){
        $('#all-btn3').prop('checked',false);
     }
     if($("#all_bat_num3"+value).length > 0){
        $("#all_bat_num3"+value).remove();
     }
     var checkbox3_array = new Array();
     $(".checkBoxClass3:checked").each(function(){
        checkbox3_array.push($(this).val());
     });
     var lengthofcheckbox = checkbox3_array.length;
     if(lengthofcheckbox==10){
        $('#all-btn3').prop('checked',true);
     }      
      var value = $(this).val()
     if($(this).is(':checked'))
        {
         $("#bid_number_result3").append('<span id="something3'+value+'">'+$(this).attr('value')+'</span>'+" ");
        }else{
              $('#something3'+value).remove();
         }
     });

    $('.checkBoxClass4').click(function(){
        var value = $(this).val();
    if($('#all-btn4').prop('checked',true)){
        $('#all-btn4').prop('checked',false);
     }
     if($("#all_bat_num4"+value).length > 0){
        $("#all_bat_num4"+value).remove();
     }
     var checkbox4_array = new Array();
     $(".checkBoxClass4:checked").each(function(){
        checkbox4_array.push($(this).val());
     });
     var lengthofcheckbox = checkbox4_array.length;
     if(lengthofcheckbox==10){
        $('#all-btn4').prop('checked',true);
     }    
    var value = $(this).val()
     if($(this).is(':checked'))
        {
         $("#bid_number_result4").append('<span id="something4'+value+'">'+$(this).attr('value')+'</span>'+" ");
        }else{
              $('#something4'+value).remove();
         }
     });

    
    //  $(".checkBoxClass0").click(function(){
    //       var bid_method_result  = $("#bid_method_result").text();
    //       var bid_method_words = $.trim(bid_method_result).split(" ");
    //       var bid_method_length = bid_method_words.length;
          
         
    //       var result_0_text = $("#bid_number_result0").text();
    //       var result_0_words = $.trim(result_0_text).split(" ");
    //       var result_0_length = result_0_words.length;
    //       var total_length = '';
          
    //       if(bid_method_length>0){
    //         total_length = parseInt(result_0_length)+parseInt(bid_method_length);  
    //       }
    //       else{
    //         total_length = result_0_length;
    //       }
    //       var count_value = $("#count").text();
    //       var total_amount = $("#total").text();
    //       if(count_value>=0 && total_amount>=0){
    //         $("#count").empty();
    //         $("#total").empty();
    //         $("#count").append(total_length);
            
    //         $("#total").append(total_length);
    //       }

          

          
          
    //     });

        // $("#all-btn0").click(function(){
        //     var text = $("#bid_number_result0").text();
        // var words = $.trim(text).split(" ");
        //    alert(words.length);
        //   // alert(text);
        // });
     
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".page-item").click(function () {
            $(".page-item").toggleClass("active");

        });
        $(".checkmark").click(function () {
            $(".checkBoxClass").addClass("new");

        });
        $(".all-btn").click(function () {
            $(".all-btn").addClass("active-new");

        });

        
        $('.checkBoxClass0, .checkBoxClass1, .checkBoxClass2, .checkBoxClass3, .checkBoxClass4, #all-btn0, #all-btn1, #all-btn2, #all-btn3, #all-btn4').click(function() {
            if($("#bits_5").prop("checked")==true && $(".advanced").prop("checked")==true){   
            var selected_bat1 = new Array();
            var selected_bat2 = new Array();
            var selected_bat3 = new Array();
            var selected_bat4 = new Array();
            var selected_bat5 = new Array();
            // if($(this).val()==$('#all-btn1').val())
            // {
            //     $('.checkBoxClass1').prop('checked', true);  
            // }
            $(".checkBoxClass0:checked").each(function(){
                selected_bat1.push($(this).val());
             });
            $(".checkBoxClass1:checked").each(function(){
                selected_bat2.push($(this).val());
             });
            
            $(".checkBoxClass2:checked").each(function(){
                selected_bat3.push($(this).val());
             });
            $(".checkBoxClass3:checked").each(function(){
                selected_bat4.push($(this).val());
             });
            $(".checkBoxClass4:checked").each(function(){
                selected_bat5.push($(this).val());
             });  
             var numbervalue = selected_bat1.length*selected_bat2.length*selected_bat3.length*selected_bat4.length*selected_bat5.length;
             var betcharge = $('#bet_charge').val();
             var count = numbervalue;
             var total = numbervalue*betcharge;
             $('#count').empty();
             $('#total').empty();
             $('#count').append(count);
             $('#total').append(parseFloat(Number(total).toFixed(4)));
         }
       });

      });
</script>

</body>
</html>