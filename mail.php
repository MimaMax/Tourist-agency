<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$check = $_POST['second_name'];
$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$text = $_POST['user_text'];
$symbolError1 = '/';
$symbolError2 = '.ru';
$symbolError3 = 'www';
$symbolError4 = '.com';
$symbolError5 = 'http';
$symbolError6 = 'https';
$pos = strpos($text, $symbolError1);
$pos2 = strpos($text, $symbolError2);
$pos3 = strpos($text, $symbolError3);
$pos4 = strpos($text, $symbolError4);
$pos5 = strpos($text, $symbolError5);
$pos6 = strpos($text, $symbolError6);
if ($check != "") {
 	exit();
 }
if ($pos == true || $pos2 == true || $pos3 == true || $pos4 == true || $pos5 == true || $pos6 == true) {	      
    header('location:msgerror.html#formyakor');
    exit();
}

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'kucherov_s@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'ksak89058321346'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('kucherov_s@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('kucherov_s@mail.ru');
// Кому будет уходить письмо kucherov_s@mail.ru
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. ', его email ' .$email. ' <br>Текст сообщения: ' .$text;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
	header('location:msgsend.html#formyakor');
}
?>