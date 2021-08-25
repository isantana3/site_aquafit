<?php
if (isset($_POST['submit'])) {
    $request = md5(implode($_POST));
    if (isset($_SESSION['last_request']) && $_SESSION['last_request'] !== $request) {
        unset($data);
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        if (isset($_POST['nome'], $_POST['email'], $_POST['tel'], $_POST['subject'])) {
            session_start();
            $user = new Home();
            $user->mail();
        }
    }
}
?>
<section id="contato">
    <footer class="page-footer">
        <div class="row container">
            <div class="row">
                <h4 class="contact title-section-footer">Contate-nos</h4>
                <p class="col s12 m7">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque voluptatibus quis maiores laudantium esse quidem, id fugit temporibus similique architecto officia rem, blanditiis, minus soluta atque sint consectetur asperiores eum.</p>
            </div>
            <div class="row">
                <div class="col s12 m5">
                    <h6 class="header-footer">Nosso trabalho</h6>
                    <p class="grey-text text-lighten-4">
                        <i class="tiny material-icons left">call</i> +55 73 9 9999-9999 <br>
                        <i class="tiny material-icons left">email</i> example@gmail.com <br>
                    </p>
                    <div class="map-responsive center-align">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15882.511280369908!2d-39.272066177505145!3d-14.792008732277727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd68853bac33b6c71!2sShopping+Jequitib%C3%A1+-+Itabuna!5e0!3m2!1spt-BR!2sbr!4v1565464435854!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col s12 m7">
                    <h6 class="header-footer">Diga Olá!</h6>
                    <form id="form-contato" method="POST">
                        <div class="row row-form">
                            <div class="input-field col s12">
                                <input id="nome" name="nome" type="text" class="validate">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
                        <div class="row row-form">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row row-form">
                            <div class="input-field col s12">
                                <input id="tel" name="tel" type="tel" class="validate">
                                <label for="tel">Telefone</label>
                            </div>
                        </div>
                        <div class="row row-form">
                            <div class="input-field col s12">
                                <textarea id="textarea" name="subject" class="materialize-textarea" data-length="120"></textarea>
                                <label for="textarea">Assunto</label>
                            </div>
                        </div>
                        <div class="row row-form">
                            <button class="right btn waves-effect waves-light" type="submit" name="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <?php
                if (date('Y') === '2021') {
                    echo '© 2021 Todos direitos reservados';
                } else {
                    echo '© 2021 - ' . date('Y') . ' Todos direitos reservados';
                }
                ?>
                <a class="grey-text text-lighten-4 right" href="#!"> <img src="assets/img/onlyHISA2.svg" id="logo-hisa" alt="&lsaquo;Isantana3&rsaquo;"></a>
            </div>
        </div>
    </footer>
</section>
