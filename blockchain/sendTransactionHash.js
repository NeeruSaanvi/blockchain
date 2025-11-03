var Web3 = require('web3');
var util = require('ethereumjs-util');
var tx = require('ethereumjs-tx');
var web3 = new Web3(new Web3.providers.HttpProvider('https://ropsten.infura.io/v3/{key}'));

function sendTransactionHash(address,key,to,value,pending_txn_hash,input,callback) {
// console.log(address);
// console.log(key);
// console.log(to);
// console.log(value);
// console.log(pending_txn_hash);
var gasPrice = web3.toHex(10000000000);
var replacement_price = gasPrice;
if(pending_txn_hash != null && pending_txn_hash != "")
{
  var hash = new Buffer(pending_txn_hash.substr(2,pending_txn_hash.length), 'hex');
   replacement_price = web3.eth.getTransaction(hash).gasPrice * 1.101
}

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
            console.log(result);
              callback(undefined,result);

        }
      });
  }
let data = web3.toHex(input);

  const rawTx = {
    nonce:web3.toHex(web3.eth.getTransactionCount(address)),
    gasLimit: web3.toHex('500000'),
    to: web3.toHex(to),
    value: web3.toHex(web3.toWei(value, 'ether')),
    gasPrice:replacement_price,
    input:data
  }

console.log(web3.toWei(value, 'ether'));
   sendRaw(rawTx);

}

module.exports={
  sendTransactionHash
};
