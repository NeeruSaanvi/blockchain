const express = require('express');
var app = express();
const getLatestTxn = require('./getLatestTxn');

//var urlencodedParser = bodyParser.urlencoded({ extended: false });

app.get('/getLatestTxn', function(req, res) {
  try {

    getLatestTxn.getLatestTxn(function(err, result) {
      res.setHeader('Access-Control-Allow-Origin', '*');
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
      message: 'Error Getting Txn'
    });
  }
});

app.listen(4000, function() {
  console.log('APP running on 4000');
});
