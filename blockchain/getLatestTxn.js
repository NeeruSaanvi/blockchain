var Web3 = require('web3');
var web3 = new Web3();
web3.setProvider(new Web3.providers.HttpProvider("https://ropsten.infura.io/v3/{key}"));
// var web3 = new Web3('https://mainnet.infura.io');

function getLatestTxn(callback) {

  web3.eth.getBlockNumber(function(error, result) {
    if (!error) {
      web3.eth.getBlock(result, false, function(err, res) {
        if (!err) {
          var date;
          if(res.timestamp != null)
          {
             date = new Date(res.timestamp*1000);
          }
          else
          {
              date = new Date();
          }
          
          var obj = {
            blockNumber: result,
            txHash: res.transactions[(res.transactions.length) - 1],
            timestamp:date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds()
          };
          callback(undefined, obj);
        }
        else
        {
          callback( "error in getblock " + err, 'error');
        }
      });
    } else {
      callback("error in blockNumber "+error, 'not found');
      // callback(obj, undefined);
      console.log('error', error);
    }
  });

}

module.exports = {
  getLatestTxn
};
