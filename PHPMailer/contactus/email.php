<?php

session_start();
//Report all errors
error_reporting(E_ALL);
date_default_timezone_set("Asia/colombo");

require_once("../src/PHPMailer.php");
require_once("../src/SMTP.php");
require_once("../src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

function redirectToIndex()
{
  header("Location: ../../dashboard.php");
  exit;
}

function sendMail($name, $email, $message, $subject, $date)
{

  include './config.php';

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = $myemail;
  $mail->Password = $mypassword;
  $mail->Port = 587;

  $mail->setFrom($myemail, $name);
  $mail->addReplyTo($email, $name);
  $mail->addAddress($myemail);

  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = "<b>Name:</b> {$name}<br><b>Email:</b> {$email}<br><br><b>Message:</b><br><br>
    {$message}<br><br><b>Date:</b> {$date}";

  if ($mail->send()) {
    $_SESSION["mail_success"] = true;
  } else {
    $_SESSION["mail_error"] = true;
  }

  redirectToIndex();
}

function start()
{
  if (
    isset($_POST["email"]) && !empty(trim($_POST["email"]))
    && isset($_POST["message"]) && !empty(trim($_POST["message"]))
  ) {

    $name = !empty($_POST["name"]) ? $_POST["name"] : "Not informed";
    $email = trim($_POST["email"]);
    $message = trim(str_replace("\n", '<br />', $_POST["message"]));
    $subject = "PetCare Contactus";
    $date = date("d/m/Y H:i");

    sendMail($name, $email, $message, $subject, $date);
  } else {
    $_SESSION["mail_error"] = true;
    redirectToIndex();
  }
}

start();
