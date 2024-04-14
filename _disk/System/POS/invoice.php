<?php
    $Read = new Read();
    $Read->ExeRead("db_config", "WHERE id_db_settings=:i ", "i={$id_db_settings}");
    if(!$Read->getResult() || !$Read->getRowCount()):
        header("Location: panel.php?exe=settings/System_Settings{$n}");
    endif;
?>

<div id="content">
    <div id="content-one">
        <div class="Read-customer">
            <label>Nome do Cliente:</label>
            <?php
            $stp = 1;

            $ReadLn = new Read();
            $ReadLn->ExeRead("sd_billing", "WHERE id_db_settings=:i AND session_id=:ip AND page_found=:ppY AND status=:stp", "i={$id_db_settings}&ip={$id_user}&ppY={$page_found}&stp={$stp}");

            $DataSupplier = filter_input(INPUT_POST, FILTER_DEFAULT);

            if($ReadLn->getResult()):
                $DataSupplier = $ReadLn->getResult()[0];
            endif;
            ?>
            <select id="customer" onclick="SelectVeiculoII()" onselect="SelectVeiculoII()" onchange="SelectVeiculoII()" class="form-control">
                <?php
                $read = new Read();
                $read->ExeRead("cv_customer", "WHERE id_db_settings=:i ORDER BY id ASC", "i={$id_db_settings}");
                if($read->getResult()):
                    foreach ($read->getResult() as $Supplier):
                        extract($Supplier);
                        ?>
                        <option value="<?= $Supplier['id']; ?>" <?php if(isset($DataSupplier['id_customer']) && $DataSupplier['id_customer'] == $Supplier['id']) echo 'selected="selected"'; ?>><?= $Supplier['nome']; ?></option>
                    <?php
                    endforeach;
                else:
                    WSError("Oppsss! Não encontramos nenhum Cliente, cadastre um para prosseguir!", WS_ALERT);
                endif;
                ?>
            </select>
            <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal">Novo cliente</a>
        </div>

        <div class="content-space-itens" id="RealNigga">
            <div id="OnCheckBox"></div>
            <div id="AnaJulia"></div>
            <?php
                require_once("_disk/Helps/table-product-pos-settings.inc.php");
            ?>
        </div>

        <div class="content-wave">
            <div class="content-wave-one">
                <div class="Read-wave">
                    <label>Forma de Pagamento: </label>
                    <select class="form-control" id="method">
                        <option value="CD" <?php if(isset($DataSupplier['method']) && $DataSupplier['method'] == "CD"): echo 'selected="selected"'; elseif(DBKwanzar::CheckConfig($id_db_settings)['MethodDefault'] == null || isset(DBKwanzar::CheckConfig($id_db_settings)['MethodDefault']) && DBKwanzar::CheckConfig($id_db_settings)['MethodDefault'] == 2): echo "selected"; endif; ?>>Cartão de Debito</option>
                        <option value="NU" <?php if(isset($DataSupplier['method']) && $DataSupplier['method'] == "NU"): echo 'selected="selected"'; elseif(DBKwanzar::CheckConfig($id_db_settings)['MethodDefault'] == null || isset(DBKwanzar::CheckConfig($id_db_settings)['MethodDefault']) && DBKwanzar::CheckConfig($id_db_settings)['MethodDefault'] == 1): echo "selected"; endif; ?>>Numerário</option>
                        <option value="TB" <?php if(isset($DataSupplier['method']) && $DataSupplier['method'] == "TB") echo 'selected="selected"'; ?>>Transferência Bancária</option>
                        <option value="MB" <?php if(isset($DataSupplier['method']) && $DataSupplier['method'] == "MB") echo 'selected="selected"'; ?>>Referência de pagamentos para Multicaixa</option>
                        <option value="OU" <?php if(isset($DataSupplier['method']) && $DataSupplier['method'] == "OU") echo 'selected="selected"'; ?>>Outros Meios Aqui não Assinalados</option>
                    </select>
                </div>
                <div class="Read-wave">
                    <label>Documento Comercial: </label>
                    <select class="form-control" id="InvoiceType">
                        <option value="FR" <?php if(isset($DataSupplier['InvoiceType']) && $DataSupplier['InvoiceType'] == "FR") echo 'selected="selected"'; ?>>FACTURA/RECIBO</option>
                        <option value="FT" <?php if(isset($DataSupplier['InvoiceType']) && $DataSupplier['InvoiceType'] == "FT") echo 'selected="selected"'; ?>>FACTURA</option>
                    </select>
                </div>
                <div class="Read-btns" id="sd_billing">
                    <?php
                        require_once("_disk/Helps/right-pos-settings.inc.php");
                    ?>
                </div>
            </div>
            <div class="content-wave-two">
                <div class="MeuNiver" id="Niver">
                    <?php require_once("_disk/Helps/Niver.inc.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <div id="content-two">
        <div class="Read-wave">
            <label>Pesquisar Produto/serviço</label>
            <a href="?exe=product/create<?= $n ?>" target="_blank" class="btn btn-danger btn-sm">Novo Produto/serviço</a>
        </div>
        <div class="Read-culpado">
            <input type="search" class="form-control" id="SearchProduct01" hidden="hidden" style="width: 30%!important;" placeholder="Buscar por código, código de barras."/>
            <input type="search" class="form-control" id="SearchProduct" style="width: 100%!important;" placeholder="Nome ou Código"/>
        </div>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Descrição do Produto/serviço</th>
                <th>Qtd</th>
                <th>-</th>
            </tr>
            </thead>
        </table>

        <ul class="ItensIsiSoft" id="POSET">

        </ul>
    </div>
</div>