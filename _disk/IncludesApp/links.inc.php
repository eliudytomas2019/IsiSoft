<li class="nav-item li<?php if (in_array('default', $linkto)) echo ' active';  ?>"><a class="nav-link" style="color: <?= $Index['color_41']; ?>!important;font-weight: bold!important;" href="panel.php?exe=default/home<?= $n; ?>" ><span class="nav-link-title">
	Painel</a></li>


<li class="nav-item dropdown li">
    <a class="nav-link dropdown-toggle" style="color: <?= $Index['color_41']; ?>!important;font-weight: bold!important;" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
        Cadastramento
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=customer/index<?= $n; ?>" ><span class="nav-link-title">Clientes</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=cadastro/fornecedores/index<?= $n; ?>" ><span class="nav-link-title">Fornecedores</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=category/index<?= $n; ?>" ><span class="nav-link-title">Categoria</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=cadastro/unidades/index<?= $n; ?>" ><span class="nav-link-title">Unidade/Medidas</span></a>
            </div>
        </div>
    </div>
</li>

<li class="nav-item dropdown li">
    <a class="nav-link dropdown-toggle" style="color: <?= $Index['color_41']; ?>!important;font-weight: bold!important;" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
        Gestão Venda
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=POS/invoice<?= $n; ?>" ><span class="nav-link-title">POS</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=proforma/proforma<?= $n; ?>" ><span class="nav-link-title">Proforma</span></a>
            </div>
        </div>
    </div>
</li>

<li class="nav-item dropdown li">
    <a class="nav-link dropdown-toggle" style="color: <?= $Index['color_41']; ?>!important;font-weight: bold!important;" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
        Gestão de Stock
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=product/index<?= $n; ?>" ><span class="nav-link-title">Produtos</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=product/stock<?= $n; ?>" ><span class="nav-link-title">Movimento de Stock</span></a>
            </div>
        </div>
    </div>
</li>

<li class="nav-item dropdown li">
    <a class="nav-link dropdown-toggle" style="color: <?= $Index['color_41']; ?>!important;font-weight: bold!important;" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
        Tesouraria
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=entrada_e_saida/index<?= $n; ?>" ><span class="nav-link-title">Recido de Pagamento</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=sangrar/index<?= $n; ?>" ><span class="nav-link-title">Caixa</span></a>
            </div>
        </div>
    </div>
</li>

<li class="nav-item dropdown li">
    <a class="nav-link dropdown-toggle" style="color: <?= $Index['color_41']; ?>!important;font-weight: bold!important;" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
        Relatórios
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=reports/sales<?= $n; ?>" ><span class="nav-link-title">Movimentos de Caixa</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=reports/stock<?= $n; ?>" ><span class="nav-link-title">Mapa de Stock</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=reports/stock-in<?= $n; ?>" ><span class="nav-link-title">Movimentos de Stock</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=reports/itens<?= $n; ?>" ><span class="nav-link-title">Itens Vendidos</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=reports/extract<?= $n; ?>" ><span class="nav-link-title">Extrato de Clientes</span></a>
                <a class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;" href="panel.php?exe=reports/EntradaESaida<?= $n; ?>" ><span class="nav-link-title">Entrada e Saide de Valores</span></a>
            </div>
        </div>
    </div>
</li>

<li class="nav-item dropdown li<?php if (in_array('settings', $linkto)) echo ' active';  ?>">
    <a class="nav-link dropdown-toggle" style="color: <?= $Index['color_41']; ?>!important;font-weight: bold!important;" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
        <span class="nav-link-title">
            Configurações
        </span>
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <?php
                if($DB->CheckCpanelAndSettings($id_db_settings, $id_db_kwanzar)['atividade'] == 1  || $DB->CheckCpanelAndSettings($id_db_settings, $id_db_kwanzar)['atividade'] == 2 || $DB->CheckCpanelAndSettings($id_db_settings, $id_db_kwanzar)['atividade'] == 3):
                    $xLevel = $level >= 3;
                endif;

                if($DB->CheckCpanelAndSettings($id_db_settings, $id_db_kwanzar)['atividade'] == 19):
                    $xLevel = $level >= 4;
                endif;

                if($xLevel): ?>
                    <a href="panel.php?exe=settings/System_Settings<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Definições do sistema</a>
                    <a href="panel.php?exe=settings/company<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Dados da empresa</a>
                    <a href="panel.php?exe=settings/BankData<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Dados bancário</a>
                    <a href="panel.php?exe=settings/logotype<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Logotipo</a>
                    <?php if($DB->CheckCpanelAndSettings($id_db_settings, $id_db_kwanzar)['atividade'] == 1 || $DB->CheckCpanelAndSettings($id_db_settings, $id_db_kwanzar)['atividade'] == 3): ?>
                        <a href="panel.php?exe=settings/gallery<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                            Galeria</a>
                    <?php endif; ?>
                    <a href="panel.php?exe=settings/taxtable<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Impostos</a>
                    <?php if($Beautiful["ps3"] != 0): ?>
                        <a href="panel.php?exe=settings/import<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                            Importaçāo & Exportaçāo de dados</a>
                        <a href="panel.php?exe=settings/export_saft<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                            Exportação de SAFT</a>
                    <?php endif; ?>
                    <a href="panel.php?exe=settings/notifications<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Notificações</a>
                    <a href="panel.php?exe=settings/activity<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Registro de atividade</a>
                    <a href="panel.php?exe=settings/licence<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                        Licença
                    </a>
                    <?php if($Beautiful["ps3"] != 0 || $level == 5): ?>
                        <a href="panel.php?exe=settings/users<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                            Utilizadores</a>
                    <?php endif; ?>
                <?php endif; ?>
                <a href="panel.php?exe=settings/account_configurations<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                    Preferências do usuário</a>
                <a href="panel.php?exe=settings/profile<?= $n; ?>" class="dropdown-item" style="color: <?= $Index['color_42']; ?>!important;">
                    Meu perfil</a>
            </div>
        </div>
    </div>
</li>