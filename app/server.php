<?php

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $street = $_POST['street'];
  $house = $_POST['house'];
  $houseEntr = $_POST['houseEntr'];
  $entrance = $_POST['entrance'];
  $floor = $_POST['floor'];
  $apartment = $_POST['apartment'];
  $comment = $_POST['comment'];
  $order = $_POST['order'];
  $nocall = $_POST['nocall']; //1 or null
  $nocall = isset($nocall) ? 'Нет' : 'Звонить';
  $needcash = $_POST['needcash'];
  $needcash = isset($needcash) ? 'нужна сдача' : 'не нужна сдача';

  
  $mail_message = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
    </head>
    <body>
      <h2>ЗАКАЗ</h2>
      <ul>
        <li>Имя: ' .$name. '</li>
        <li>Телефон: ' .$phone. '</li>
        <li>Улица: ' .$street. '</li>
        <li>Дом: ' .$house. '</li>
        <li>Корпус: ' .$houseEntr. '</li>
        <li>Подъезд: ' .$entrance. '</li>
        <li>Этаж: ' .$floor. '</li>
        <li>Квартира: ' .$apartment. '</li>
        <li>Комментарий к заказу: ' .$comment. '</li>
        <li>Оплата: ' .$order. '</li>
        <li>Перезванивать: ' .$nocall. '</li>
        <li>Нужна сдача: ' .$needcash. '</li>
      </ul>
    </body>
    </html>';
    
    $headers = "From: Mr.Burgers <egorov-by-egorov@mail.ru>\r\n".
    "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=UTF-8" . "\r\n";

    $mail = mail('egorov-family@mail.ru', 'Заказ', $mail_message, $headers);
    $data = [];
    if ($mail) {
      $data['status'] = "OK";
      $data['mes'] = "Заказ успешно отправлен";
    } else {
      $data['status'] = "NO";
      $data['mes'] = "На сервере произошла ошибка";
    }
    echo json_encode($data);
    
?>