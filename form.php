<?php
ob_start();
session_start();

//var_dump($_SESSION);

if (isset($_SESSION['input'])) {
	$input_data = $_SESSION['input'];
	unset($_SESSION['input']);
}

if (isset($_SESSION['error'])) {
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}
//var_dump($input_data, $error);

function h($s){
	return htmlspecialchars($s, ENT_QUOTES);
}

?>
<h1>お問い合わせフォーム</h1>
<?php
if(true == in_array('address_empty', $error)){
	echo '連絡先は必須入力です。<br>';
}
?>

<form action="./input.php" method="post">
お名前:<br>
<input name="name" 
	value="<?php echo h(@$input_data['name']); ?>"><br />
連絡先(email):<br>
<input name="address"
	value="<?php echo h(@$input_data['address']); ?>"><br />
問い合わせ内容<br>
<textarea name="body"><?php echo h(@$input_data['body']); ?></textarea><br />
<button type="submit">問い合わせる</button>
</form>
