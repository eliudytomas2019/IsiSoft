<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title" style="color: <?= $Index['color_41']; ?>!important;">
                Definições
            </h2>
        </div>
    </div>
</div>

<div class="d-lg-block col-lg-3">
    <ul class="nav nav-pills nav-vertical">
        <li class="nav-item"><a href="Admin.php?exe=admin/config" class="nav-link" style="color: <?= $Index['color_41']; ?>!important;">Aspecto</a></li>
        <li class="nav-item"><a href="Admin.php?exe=admin/security" class="nav-link" style="color: <?= $Index['color_41']; ?>!important;">Planos e Pacotes</a></li>
        <li class="nav-item"><a href="Admin.php?exe=admin/empresa" class="nav-link" style="color: <?= $Index['color_41']; ?>!important;">Operações Avançadas</a></li>
        <li class="nav-item"><a href="Admin.php?exe=admin/eliudy" class="nav-link" style="color: <?= $Index['color_41']; ?>!important;">Painel Estatistico</a></li>
        <li class="nav-item"><a href="Admin.php?exe=statistic/company" class="nav-link" style="color: <?= $Index['color_41']; ?>!important;">Registro de Todas Empresas (<?php
                $read = new Read();
                $read->ExeRead("db_settings");
                echo $result = $read->getRowCount();
                ?>)</a></li>
        <li class="nav-item">
            <a href="?logoff=true" class="nav-link active">
                Terminar sessão
            </a>
        </li>
    </ul>
</div>