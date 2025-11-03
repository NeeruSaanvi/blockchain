const express = require('express');
var app = express();

const bodyParser=require('body-parser');
const createAccount = require('./createAccount');

var urlencodedParser = bodyParser.urlencoded({ extended: false });

app.post('/createAccount',urlencodedParser,function (req,res) {

  res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('content-type', 'text/javascript');

  username=req.body.username;
  password=req.body.password;

  createAccount.createAccount(username,password,function (err,result) {
    if(!err){
      res.send({
        status:200,
        message:'Wallet Created Successfully',
        address:result.address,
        key:result.key
      });
    }else {
      res.send({
        status:400,
        message:'Error Creating wallet'+ err
      });
    }
  });


});



app.listen(4001, function() {
  console.log('APP running on 4001');
});
