<?php
$dataText = [];
$viewText = [];

$Read = new Read();
$Read->ExeRead("website_home", "ORDER BY id ASC");

if($Read->getResult()):
    $key = $Read->getResult()[0];
    foreach ($Read->getResult() as $item):
        $dataText[] = $item['titulo'];
    endforeach;

    $viewText = $dataText;
    ?>
    <section id="home" data-parallax="scroll" data-image-src="uploads/background.jpg" data-natural-width=3000 data-natural-height=2000>

        <div class="overlay"></div>
        <div class="home-content">

            <div class="row contents">
                <div class="home-content-left">

                    <h3 data-aos="fade-up">Bem-vindo à <?= $Index['name']; ?></h3>

                    <h1 data-aos="fade-up">
                        Software de
                        Facturação Validado para
                        <span id="xXx"></span>
                    </h1>

                    <div class="buttons" data-aos="fade-up">
                        <a href="_login.php" class="button ">
                            <span class="icon-circle-down" aria-hidden="true"></span>
                            Entrar
                        </a>
                        <a href="_register.php" class="button ">
                            <span class="icon-play" aria-hidden="true"></span>
                            Experimentar grátis
                        </a>
                    </div>

                </div>

                <div class="home-image-right">
                    <img src="uploads/<?= $Read->getResult()[0]['logotype']; ?>" data-aos="fade-up">
                </div>
            </div>

        </div> <!-- end home-content -->

        <ul class="home-social-list">
            <li>
                <a href="<?= $Index['facebook']; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="<?= $Index['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="<?= $Index['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="<?= $Index['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            </li>
            <li>
                <a href="<?= $Index['youtube']; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
            </li>
        </ul>
        <!-- end home-social-list -->

        <div class="home-scrolldown">
            <a href="#about" class="scroll-icon smoothscroll">
                <span>Scroll Down</span>
                <i class="icon-arrow-right" aria-hidden="true"></i>
            </a>
        </div>

    </section>
<?php
endif;