<!DOCTYPE html>
<html lang="pt-br">
    <?php
        require 'includes/head.php';
        require 'App/autoload.php';

        use App\core\App;
        use App\core\Controller;
    ?>

    <body>
        <div id="fb-root"></div>
        <div class="fixed-action-btn">
            <a id="back-to-top" class="btn-floating">
                <i class="material-icons">keyboard_arrow_up</i>
            </a>
        </div>
        <?php
            require 'includes/header.php';
            $app = new App();
            require 'includes/scripts.php';
        ?>
    </body>

</html>
