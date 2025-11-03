var Web3 = require('web3');
var web3 = new Web3();

// var web3 = new Web3('https://mainnet.infura.io');
web3.setProvider(new web3.providers.HttpProvider("https://ropsten.infura.io/v3/c124d1746bbc40ee8b1b280a59399059"));


function getLatestTxnByBlock(blocknumber, callback) {

  // web3.eth.getBlockNumber(function(error, result) {
  //   console.log('result', result);
  //   if (!error) {
      web3.eth.getBlock(blocknumber, false, function(err, res) {
        //console.log(res);
        if (!err && res != null) {
          var date = new Date(res.timestamp*1000);
          var obj = {
            blockNumber: blocknumber,
            txHash: res.transactions[(res.transactions.length) - 1],
            timestamp:date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds()
          };
          callback(undefined, obj);
        }
        else
        {
           callback('error', 'not found');
        }
      });
  //   } else {
  //     console.log('error', error);
  //   }
  // });

}


module.exports = {
  getLatestTxnByBlock
};
