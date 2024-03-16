<section id="about">

    <div class="row about-intro">
        <?php
        $Read = new Read();
        $Read->ExeRead("website_about", "ORDER BY id ASC LIMIT 1");

        if($Read->getResult()):
            foreach ($Read->getResult() as $key):
                ?>
                <div class="col-four">
                    <h1 class="intro-header" data-aos="fade-up"><?= $key['titulo']; ?></h1>
                </div>
                <div class="col-eight">
                    <p class="lead" data-aos="fade-up">
                        <?= $key['content']; ?>
                    </p>
                </div>
            <?php
            endforeach;
        endif;
        ?>
    </div>

    <div class="row about-features">
        <div class="features-list block-1-3 block-m-1-2 block-mob-full group">
            <?php
            $Read = new Read();
            $Read->ExeRead("website_services", "ORDER BY id ASC LIMIT 6");

            if($Read->getResult()):
                foreach ($Read->getResult() as $key):
                    ?>
                    <div class="bgrid feature" data-aos="fade-up">

                        <span class="icon"><i class="icon-file"></i></span>

                        <div class="service-content">
                            <h3><?= $key['titulo']; ?></h3>

                            <?= $key['content']; ?>
                        </div>
                    </div>
                <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>

    <div class="row about-how">

        <h6 class="intro-header" data-aos="fade-up" style="width: 60%!important;text-align: center!important;margin: 10px auto!important;">Software de facturação online, facture em segundos e sem complicações. Use quando precisar de emitir e escolha o melhor plano para o seu negócio. Experimente!</h6>

        <div class="about-how-content" data-aos="fade-up">
            <div class="about-how-steps block-1-2 block-tab-full group">

                <?php
                $n = null;
                $Read = new Read();
                $Read->ExeRead("website_category", "ORDER BY id ASC LIMIT 4");

                if($Read->getResult()):
                    foreach ($Read->getResult() as $key):
                        $n += 1;
                        ?>
                        <div class="bgrid step" data-item="<?= $n; ?>">
                            <h3><?= $key['name']; ?></h3>
                            <?= $key['content']; ?>
                        </div>
                    <?php
                    endforeach;
                endif;
                ?>

            </div>
        </div>
    </div>
</section>