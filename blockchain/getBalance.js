var Web3 = require('web3');
var web3 = new Web3();
web3.setProvider(new web3.providers.HttpProvider("https://ropsten.infura.io/v3/c124d1746bbc40ee8b1b280a59399059"));
// var web3 = new Web3('https://ropsten.infura.io');

function getBalance(address,callback) {


  web3.eth.getBalance(address, function (error, wei) {
              if (!error) {
                  //balance_customer = wei;
                  // balance_customer = web3.fromWei(wei, 'ether');
                  callback(undefined,web3.utils.fromWei(wei, 'ether'))
              }else {
                console.log(error);
                callback('error');
              }
          });

}

module.exports={
  getBalance
};
