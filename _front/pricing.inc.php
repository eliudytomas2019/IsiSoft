<section id="pricing">
    <div class="row pricing-content">

        <div class="col-four pricing-intro">
            <h1 class="intro-header" data-aos="fade-up">Planos e Preços para Software de Faturação</h1>

            <p data-aos="fade-up">Escolha o plano que melhor se adapta às suas actuais necessidades.
                Com o tempo poderá mudar de plano, pois o Kwanzar adapta-se ao ritmo do seu negócio.
            </p>
        </div>

        <div class="col-eight pricing-table">
            <div class="row">
                <?php
                $n1 = null;
                $Gold = ["", "", "primary"];
                $Read = new Read();
                $Read->ExeRead("website_pricing", "ORDER BY id ASC LIMIT 2");

                if($Read->getResult()):
                    foreach ($Read->getResult() as $key):
                        $n1 += 1;
                        $value = $key['preco'] * 12;
                        ?>
                        <div class="col-six plan-wrap">
                            <div class="plan-block <?= $Gold[$n1]; ?>" data-aos="fade-up">

                                <div class="plan-top-part">
                                    <h3 class="plan-block-title"><?= $key['pacote']; ?></h3>
                                    <p class="plan-block-price"><sup>Kz</sup><?= $key['preco']; ?></p>
                                    <p class="plan-block-per">por mês</p>
                                </div>

                                <div class="plan-bottom-part">
                                    <?= $key['content']; ?><br/>

                                    <p style="text-align: center!important;">Ao subscrever anualmente por Kz <?= str_replace(",", ".", number_format($value, 2)); ?>.
                                        Sem fidelização</p>

                                    <br/><a class="button button-primary large" href="_register.php">Experimentar Grátis</a>
                                </div>

                            </div>
                        </div>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>