<?php

use App\core\Controller;

/**
 * instância de toda ação que o usuario visitante executará na página
 */
class Home extends Controller
{
    /**
     * Chama a view index.php do /home ou somente /
     *
     * @return void
     */
    public function index()
    {
        $this->view('home/index');
    }

    /**
     * Controller de envio do email, pegará os dados via POST e enviará para o model do User
     *
     * @return void
     */
    public function mail()
    {
        $name    = $_POST['nome'];
        $email   = $_POST['email'];
        $tel     = $_POST['tel'];
        $subject = $_POST['subject'];
        $user = $this->model('User');
        if ($user->form_validate($name, $email, $tel, $subject)) {
            $user->send_email($name, $email, $tel, $subject);
        } else {
            echo '<script>alert("Verifique os campos de contato!");</script>';
        }
    }
}
