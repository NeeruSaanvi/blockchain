var Web3 = require('web3');
// var web3 = new Web3();
// web3.setProvider(new Web3.providers.WebsocketProvider("https://mainnet.infura.io"));
var web3 = new Web3('https://ropsten.infura.io');



function createWallet(callback) {

var account = web3.eth.accounts.create();
callback(undefined, account);
}



module.exports = {
  createWallet
};
