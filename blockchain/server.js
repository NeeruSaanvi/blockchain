const express = require('express');
var app = express();

const bodyParser=require('body-parser');
const getLatestTxn = require('./getLatestTxn');
const getLatestTxnByBlock = require('./getLatestTxnByBlock');
// const createAccount = require('./createAccount');
// const createAccount = require('./createAccount');
const getBalance = require('./getBalance');
const getPrivateKey = require('./getPrivateKey');
const sendTransaction = require('./sendTransaction');
const sendTransactionHash = require('./sendTransactionHash');

var urlencodedParser = bodyParser.urlencoded({ extended: false });
// const getLatestSyn = require('./getSyn');

//var urlencodedParser = bodyParser.urlencoded({ extended: false });

app.get('/getLatestTxn', function(req, res) {
  try {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('content-type', 'text/javascript');

    getLatestTxn.getLatestTxn(function(err, result) {
      if (!err) {
        res.send({
          status: 200,
          txn: result
        });
      } else {
        res.send({
          status: 400,
          message: err
        });
      }
    });
  } catch (err) {
    res.send({
      status: 400,
      message: 'Error Getting Txn'
    });
  }
});


app.get('/getLatesttnxByBlock', function(req, res) {
  try {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('content-type', 'text/javascript');

    getLatestTxnByBlock.getLatestTxnByBlock(req.query.blocknumber,function(err, result) {
      if (!err) {
        res.send({
          status: 200,
          txn: result
        });
      } else {
        res.send({
          status: 400,
          message: 'Error Getting Txn'
        });
      }
    });
  } catch (err) {
    res.send({
      status: 400,
      message: err.message
    });
  }
});


app.post('/getBalance', urlencodedParser,function(req, res) {

    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('content-type', 'text/javascript');
  try {
    console.log('address=',req.body.address);
    getBalance.getBalance(req.body.address,function(err, result) {
      if (!err) {
        res.send({
          status: 200,
          balance: result
        });
      } else {
        res.send({
          status: 400,
          message: 'Error Getting Balance'
        });
      }
    });
  } catch (err) {
    res.send({
      status: 400,
      message: 'Error Getting Balance'
    });
  }
});

app.post('/getPrivateKey', urlencodedParser,function(req, res) {

    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('content-type', 'text/javascript');
  try {
    console.log('address=',req.body.address);
    getPrivateKey.getPrivateKey(req.body.address,function(err, result) {
      if (!err) {
        res.send({
          status: 200,
          balance: result
        });
      } else {
        res.send({
          status: 400,
          message: 'Error Getting Balance'
        });
      }
    });
  } catch (err) {
    res.send({
      status: 400,
      message: 'Error Getting Balance'
    });
  }
});

// app.post('/createAccount',urlencodedParser,function (req,res) {

//   res.setHeader('Access-Control-Allow-Origin', '*');
//     res.setHeader('content-type', 'text/javascript');

//   username=req.body.username;
//   password=req.body.password;

//   createAccount.createAccount(username,password,function (err,result) {
//     if(!err){
//       res.send({
//         status:200,
//         message:'Wallet Created Successfully',
//         address:result.address,
//         key:result.key
//       });
//     }else {
//       res.send({
//         status:400,
//         message:'Error Creating wallet'+ err
//       });
//     }
//   });


// });


app.post('/sendTransaction',urlencodedParser,function (req,res) {

  res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('content-type', 'text/javascript');
    
  address=req.body.address;
  key=req.body.key;
  to=req.body.to;
  value=req.body.value;
  input=req.body.input;

  console.log(input);

  sendTransaction.sendTransaction(address,key,to,value,input,function (err,result) {
    if(!err){
      res.send({
        status:200,
        message:'Transfer Successfully',
        hash:result
      });
    }else {
      res.send({
        status:400,
        message: err
      });
    }
  });


});


app.post('/sendTransactionHash',urlencodedParser,function (req,res) {

  res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('content-type', 'text/javascript');
    
  address=req.body.address;
  key=req.body.key;
  to=req.body.to;
  value=req.body.value;
  hash=req.body.hash;
  input=req.body.input;

  //console.log(req.body);

  sendTransactionHash.sendTransactionHash(address,key,to,value,hash,input,function (err,result) {
    if(!err){
      res.send({
        status:200,
        message:'Transfer Successfully',
        hash:result
      });
    }else {
      res.send({
        status:400,
        message: err
      });
    }
  });


});



// app.get('/createAccount', function(req, res) {
//   try {
//     res.setHeader('Access-Control-Allow-Origin', '*');
//     res.setHeader('content-type', 'text/javascript');

//     createAccount.createWallet(function(err, result) {
//       if (!err) {
//         res.send({
//           status: 200,
//           txn: result
//         });
//       } else {
//         res.send({
//           status: 400,
//           message: err.message
//         });
//       }
//     });
//   } catch (err) {
//     res.send({
//       status: 401,
//       message: err.message
//     });
//   }
// });

// app.get('/getLatestSyn', function(req, res) {
//   try {
//     res.setHeader('Access-Control-Allow-Origin', '*');
//     // res.setHeader('content-type', 'text/javascript');

//     getLatestSyn.getLatestSyn(function(err, result) {
//       if (!err) {
//         res.send({
//           status: 200,
//           txn: result
//         });
//       } else {
//         res.send({
//           status: 4000,
//           message: 'Error Getting Txn'
//         });
//       }
//     });
//   } catch (err) {
//     res.send({
//       status: 40000,
//       message: err.message
//     });
//   }
// });


app.listen(4000, function() {
  console.log('APP running on 4000');
});
