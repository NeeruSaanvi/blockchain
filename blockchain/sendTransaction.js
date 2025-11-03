var Web3 = require('web3');
var util = require('ethereumjs-util');
var tx = require('ethereumjs-tx');
var web3 = new Web3(new Web3.providers.HttpProvider('https://ropsten.infura.io/v3/c124d1746bbc40ee8b1b280a59399059'));

function sendTransaction(address,key,to,value,input,callback) {
// console.log(address);
// console.log(key);
// console.log(to);
console.log(input);
  function sendRaw(rawTx) {
      var privateKey = new Buffer(key.substr(2,key.length), 'hex');
      var transaction = new tx(rawTx);

      transaction.sign(privateKey);
      var serializedTx = transaction.serialize().toString('hex');
      web3.eth.sendRawTransaction('0x' + serializedTx, function(err, result) {
          if(err) {
              console.log(err);
              callback(err,undefined);
          } else {
              callback(undefined,result);

        }
      });
  }
  console.log(input);
let data = web3.utils.toHex(input);

  const rawTx = {
    nonce:web3.utils.toHex(web3.eth.getTransactionCount(address)),
    gasLimit: web3.utils.toHex('500000'),
    to: web3.utils.toHex(to),
    value: web3.utils.toHex(web3.utils.toWei(value, 'ether')),
    gasPrice:web3.utils.toHex(10000000000),
    input: data
  }

console.log(web3.utils.toWei(value, 'ether'));
   sendRaw(rawTx);

}

module.exports={
  sendTransaction
};
