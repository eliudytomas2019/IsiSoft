<?php
$Read = new Read();
$Read->ExeRead("db_config", "WHERE id_db_settings=:i ", "i={$id_db_settings}");
if(!$Read->getResult() || !$Read->getRowCount()):
    header("Location: panel.php?exe=settings/System_Settings{$n}");
endif;
?>
<div class="row" style="display: flex!important;flex-direction: row!important;justify-content: space-between!important;">
    <div class="col-lg-1" style="display: flex!important;flex-direction: column!important;">
        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
            Novo Cliente
        </a>

        <br/><a class="btn btn-primary btn-sm" <?php $Read->ExeRead("db_users_settings", "WHERE id_db_settings=:i ", "i={$id_db_settings}"); if(!$Read->getResult() || !$Read->getRowCount()): ?> href="panel.php?exe=settings/account_configurations<?= $n; ?>" <?php else:?> href="javascript:void" data-bs-toggle="modal" data-bs-target="#ModalsCarregarDocumentos" <?php endif; ?>>
            Imprimir
        </a>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="modal-title">Emissão de documentos comercial</h5>
            </div>
            <div class="card-body" id="RealNigga">
                <div id="OnCheckBox"></div>
                <div id="AnaJulia"></div>
                <?php
                require_once("_disk/Helps/table-product-pos-settings.inc.php"); ?>
            </div>
        </div>

        <br/><div class="card">
            <div class="card-header">
                <h5 class="modal-title">Dados da factura</h5>
            </div>
            <div class="card-body" id="sd_billing">
                <?php if($Beautiful["documentos"] > $Beautiful['documentos_feito']): ?>
                    <?php require_once("_disk/Helps/right-pos-settings.inc.php"); ?>
                <?php else: ?>
                    <label class="form-label col-form-label">Documentos: <p><?= $Beautiful['documentos_feito']." / ".$Beautiful['documentos']; ?></p></label>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h5 class="modal-title">Pesquisar Productos/Serviços</h5>
            </div>
            <div class="card-body">
                <form method="post" action="" name = "FormCreateCustomer"  enctype="multipart/form-data">
                    <div class="search-content-modal" style="display:flex!important;flex-direction: row!important;justify-content: space-between!important;">
                        <input type="search" class="form-control" id="SearchProduct01" style="width: 30%!important;" placeholder="Buscar por código, código de barras."/>
                        <input type="search" class="form-control" id="SearchProduct" style="width: 69%!important;" placeholder="Buscar por designação"/>
                    </div><br/>
                    <table class="table-responsive" style="font-size: 10pt!important;border: 1px solid #000!important;border-radius: 4px!important;">
                        <thead>
                        <tr style="border-bottom: 1px solid #000!important;">
                            <th>Item</th>
                            <th>Desconto(%)</th>
                            <th>Taxa(%)</th>
                            <th>Preço Uni.</th>
                            <th>Qtd</th>
                            <th>-</th>
                        </tr>
                        </thead>
                        <tbody id="POSET">

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>