<?php

require '../processos/biblioteca/PHPMailer/Exception.php';
require '../processos/biblioteca/PHPMailer/OAuth.php';
require '../processos/biblioteca/PHPMailer/PHPMailer.php';
require '../processos/biblioteca/PHPMailer/POP3.php';
require '../processos/biblioteca/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//print_r($_POST);
class Mensagem
{
    private $nome = null;
    private $email = null;
    private $msg = null;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function MensagemValida(){
        if (empty($this->nome) || empty($this->email) || empty($this->msg)){
            return false;
        }
        return true;
    }
}

$mensagem = new Mensagem();

$mensagem->__set('nome', $_POST['nome']);
$mensagem->__set('email', $_POST['email']);
$mensagem->__set('msg', $_POST['txtmsg']);

//print_r($mensagem)
if ($mensagem->MensagemValida()){
    // echo 'mensagem invalida';
    // ;
    $mail = new PHPMailer(true);
    try{

        //Server settings
        $mail->SMTPDebug = false;
        $mail->isSMTP();                                // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                         // Enable SMTP authentication
        $mail->Username = 'isabela10014@gmail.com';     // SMTP username
        $mail->Password = '';                   // SMTP password
        $mail->SMTPSecure = 'tls';                      // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                              // TCP port to connect to
    
        //Recipients
        $mail->setFrom('isabela10014@gmail.com', "Isabela Maria");      // envia para minha caixa de mensagem
        $mail->addAddress('isabela10014@gmail.com', "Isabela Maria"); // E-mail que ira receber o que é digitado
        // $mail->addCC('matheus5825@gmail.com', "Matheus Romantini");
        // $mail->addCC('michael.masanet@hotmail.com', "Michael");
        
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Entrada de contato';
        $mail->Body = '<div>Nome: ' . $mensagem->__get('nome') . '</div>' . 
                      '<div> E-mail: ' . $mensagem->__get('email') . '</div>' . 
                      '<div>' . $mensagem->__get('msg') . '</div>';

        $mail->AltBody = 'É necessario utilizar um client que suporte html para ter acesso total ao conteudo dessa  mensagem.';

        $mail->send();
        //echo 'msg1';
        
    }
    catch(Exception $e){
       echo 'Erro:'. $mail->ErrorInfo;
        //alguma lógica que armazene o erro para posterior análise por parte do programador  
    }
}

?>
