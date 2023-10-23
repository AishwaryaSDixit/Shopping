<?php
$msg="";

if(isset($_POST['fname']) && isset($_POST['mail']) && isset($_POST['age'])){
    $name=$_POST['fname'];
    $mail=$_POST['mail'];
    $age=$_POST['age'];


    $html="<table border cellpadding='10'>
    <tr><th>Name</th><td>$name</td></tr>
    <tr><th>Email</th><td>$mail</td></tr>
    <tr><th>Mobile</th><td>$age</td></tr>
    <tr><th>Project Name</th><td></td></tr>
    </table>";

    include('smtp/PHPMailerAutoload.php');
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="aishwaryasdixit@gmail.com";
    $mail->Password="jqxjxeuerhnghxpo";
    $mail->SetFrom("aishwaryasdixit@gmail.com");
    $mail->addAddress("vedukulaye2001@gmail.com");
    $mail->IsHTML(true);
    $mail->Subject="New Contact Us";
    $mail->Body=$html;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if($mail->send()){
        echo "Mail send";
    }else{
        echo "Error occur";
    }
    echo $msg; 
}
?>