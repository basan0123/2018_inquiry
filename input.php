<?php

ob_start();
session_start();
require_once(__DIR__.'/../config.php');



/*
$name = (string)@$_POST['name'];
$name = @$_POST['name'] ?? '';
$name = (string)filter_input(INPUT_POST), 'name';
if (true === isset($_POST['name'])){
	$name = $_POST['name'];
} else {
	$name = '';
}
*/
/*
$name = @$_POST['name'] ?? '';
$address = @$_POST['address'] ?? '';
$body = @$_POST['body'] ?? '';
*/

$params = ['name','address','body'];
$input_data = [];
foreach($params as $p){
	$input_data[$p] = @$_POST[$p] ?? '';
}
//var_dump($input_data);

$error_flg = [];

if ('' === $input_data['address']){
	$error_flg ['address_empty']= 1;
}
if ('' === $input_data['body']){
	$error_flg ['body_empty'] =1;
}
if ([] !== $error_flg) {
     $_SESSION['input']=$input_data;
     $_SESSION['error']=$input_flg;
     
     
	

	header('Location: ./form.php');
	exit;
}





//DB‚Ì
$dsn = sprintf("mysql:dbname=%s;host=%s;charset=%s" ,$config['db']['dbname'] ,$config['db']['host'] ,$config['db']['charset']);
$user =$config['db']['user'];
$pass =$config['db']['pass'];
//mysql
$opt = [
   PDO::ATTR_EMULATE_PREPARES=> false,
    PDO::MYSQL_ATTR_MULTI_STATEMENTS=>false,
];

try{
$dbh = new PDO ($dsn, $user, $pass,$opt);
}catch (PDOException $e) {
echo 'DB Connect error:',$e->getMessage();
exit;
}

var_dump($dbh);
exit;
//DB ‚¦‚ÌINSERT
$sql='INSERT INTO inquiry(name,adress, body, created_at)
              VALUES (:name, : adress, :body, now());';
$pre = $dbh-> prepare($sql);
//var_dump($pre); exit;
$pre->bindValue(';name',$input_data['name'],PDO::PARAM_STR);//³‚µ
$pre->bindValue(':adress',$input_data['adress']);
$pre->bindValue(':body',$input_data ['body']);

//sql‚ÌŽÀs
$r = $pre->excute();
var_dump($dbh->errorInfo());
var_dump ($r); exit;

header('Location: fin.html');

