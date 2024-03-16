<footer>
    <div class="footer-main">
        <div class="row">

            <div class="col-three md-1-3 tab-full footer-info">

                <img src="uploads/<?= $Index['logotype']; ?>">

                <?= $Index['content']; ?>

                <ul class="footer-social-list">
                    <li>
                        <a href="<?= $Index['facebook']; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href="<?= $Index['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="<?= $Index['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="<?= $Index['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="<?= $Index['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>


            </div>

            <div class="col-three md-1-3 tab-1-2 mob-full footer-contact">
                <h4>Contato</h4>
                <p>
                    <?= $Index['endereco']; ?>
                </p>
                <p>
                    <?= $Index['email']; ?> <br>
                    Telefone: <?= $Index['telefone']; ?>
                </p>
            </div>

            <div class="col-two md-1-3 tab-1-2 mob-full footer-site-links">

                <h4>Outros Serviços</h4>

                <ul class="list-links">
                    <li><a href="https://galeranerd.ao" target="_blank">Galera Nerd</a></li>
                    <li><a href="https://ogeniodigital.ao" target="_blank">O Gênio Digital</a></li>
                </ul>

            </div>

            <div class="col-four md-1-2 tab-full footer-subscribe">
                <h4>Newsletter</h4>
                <div class="subscribe-form">
                    <div id="getResult">
                        <?php
                        $SendForm = filter_input(INPUT_POST, "SendForm");
                        if(isset($SendForm)):
                            $ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                            if (isset($ClienteData) && $ClienteData['SendForm']):

                                $response = file_get_contents(API."newsletter?postId={$ClienteData['email']}");
                                $data = json_decode($response, true);

                                WSError($data, WS_INFOR);
                            endif;
                        endif;
                        ?>
                    </div>
                    <form name="FormUsersLogin" class="group" id="mc-form" method="post" action="">
                        <input type="email" name="email" id="mc-email" class="email" value="<?php if (!empty($ClienteData['email'])) echo $ClienteData['email']; ?>" placeholder="Endereço de e-mail">
                        <input type="submit" name="SendForm" id="SendForm" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="row">
            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright <?= $Index['name']; ?> 2019-<?= date('Y'); ?> | <a href="_terms-of-service.php" target="_blank" class="link-secondary">Termos e Condições</a></span>
                    <span>Powered by <a href="https://www.ogeniodigital.ao/">O Gênio Digital</a></span>
                </div>

                <!---div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up"></i></a>
                </div--->
            </div>
        </div>
    </div>
</footer>