<?php

$to = 'kamalamaa@yandex.ru'; // Email для получения письма
$headers = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "MIME-Version: 1.0 \r\n";
$headers .= "From: info@2touch.ru"; // Откуда отправить. Для проверки оставь этот
$subject = 'Сообщение с сайта Turgoyak'; // Тема письма


define('DICTIONARY', [
	'name' => 'Имя',
	'phone' => 'Телефон',
	'mail' => 'Электронная почта',
]);

$title = '<h3>Тема письма: Обратный звонок</h3>'; // Заголовок в теле письма
$message = $title; // Тело письма


foreach ($_POST as $key => $value) {
	if ($value)
		$message .= '<p><b>' . DICTIONARY[$key] . '</b>: ' . htmlspecialchars($value, ENT_QUOTES) . '</p>';
}



 //Если письмо отправлено, то возвращаем ответ на клиент со статусом "success"
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(['status' => 'success']);
    exit;
}

echo json_encode(['status' => 'fail']);
exit;
