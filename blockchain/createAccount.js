const fs=require('fs');
var Web3 = require('web3');
// var web3 = new Web3();
// web3.setProvider(new web3.providers.HttpProvider("https://ropsten.infura.io/"));
//var accounts = new Web3EthAccounts('https://ropsten.infura.io/');
var web3 = new Web3('https://ropsten.infura.io');

function createAccount(username,password,callback) {
  try{
    console.log('username',username,'password',password);
    //var data=JSON.parse(fs.readFileSync('accounts.txt'));
    var account = web3.eth.accounts.create();
    var obj={
      username:username,
      password:password,
      account:account
    };
    fs.writeFileSync(`${account.address}.txt`,JSON.stringify(obj),'utf-8');
    callback(undefined,{
      address:account.address,
      key:account.privateKey
    });
  }catch(error){
    callback(error);
  }
}

module.exports={
  createAccount
};
