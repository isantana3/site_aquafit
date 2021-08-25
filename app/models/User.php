<?php

namespace App\models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

class User
{

    private $name;
    private $email;
    private $tel;
    private $subject;

    /**
     * Valida o numero de celular para contato
     *
     * @param string $tel telefone de contato
     * @return bool true caso esteja tudo certo com o número, false caso contrario
     */
    function tel_validate($tel)
    {
        // limpar caracteres desnecessarios
        $tel = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $tel))))));
        // regex pra validar telefone
        $rgx_tel = '/^[0-9]{11}$/';
        // regex para validar somente celular
        // $rgx_cell = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/';
        if (preg_match($rgx_tel, $tel)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Valida o email da pessoa
     *
     * @param string $email remetente
     * @return bool true caso esteja tudo certo com o email, false caso contrario
     */
    function email_validate($email)
    {
        // regex do email
        $rgx_email = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        if (preg_match($rgx_email, $email)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Função para realizar a validação dos dados do formulário
     *
     * @param string $name Nome do rementente
     * @param string $email Email do remetente
     * @param string $tel Telefone do remetente
     * @param string $subject Assunto a ser tratado no email
     * @return bool true caso os dados sejam validos, false caso contrario
     */
    public function form_validate($name, $email, $tel, $subject)
    {
        $this->name    = $name;
        $this->email   = $email;
        $this->tel     = $tel;
        $this->subject = $subject;

        if (!$this->tel_validate($this->tel) || !$this->email_validate($this->email)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Função que realiza o envio do email utilizando a biblioteca PHPMailer
     *
     * @param string $name Nome do remetente
     * @param string $email Email do remetente
     * @param string $tel Telefone do remetente
     * @param string $subject Assunto a ser tratado
     * @return response Caso não tenha ocorrido erro ao enviar o email, retornara uma resposta de envio correto e o email será enviado
     */
    public function send_email($name, $email, $tel, $subject)
    {
        $mail = new PHPMailer;
        try {
            // autenticação
            // $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'teste.desenvolvedor1@gmail.com';
            $mail->Password = 'teste_dev';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            // remetente
            $mail->setFrom('adrielfabricios@gmail.com', 'Clínica Harmonia');
            // destinatario
            $mail->addAddress($email, $name);
            // habilitar html para envio de email
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Clínica Harmonia - Contato';
            $mail->Body    = '<b>Assunto: </b>' . $subject . '<br><br><b>Tel.: </b>' . $tel;
            if ($mail->send()) {
                echo '<script>alert("Email enviado com sucesso");</script>';
            }
        } catch (Exception $e) {
            echo '<script>alert("' . $e . '");</script>';
        }
    }
}
