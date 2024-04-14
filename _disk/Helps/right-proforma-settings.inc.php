<?php
$stp = 1;

$ReadLn = new Read();
$ReadLn->ExeRead("sd_billing", "WHERE id_db_settings=:i AND session_id=:ip AND page_found=:ppY AND status=:stp", "i={$id_db_settings}&ip={$id_user}&ppY={$page_found}&stp={$stp}");

$DataSupplier = filter_input(INPUT_POST, FILTER_DEFAULT);

if($ReadLn->getResult()):
    $DataSupplier = $ReadLn->getResult()[0];
endif;
?>
<input type="hidden" id="TaxPointDate" value="<?= date('Y-m-d'); ?>" class="form-kwanzar">
<input type="hidden" name="id_obs" id="id_obs" value="0" class="form-control"/>
<input type="hidden" name="id_fabricante" id="id_fabricante" value="0"/>
<input type="hidden" name="id_veiculos" id="id_veiculos" value="0"/>
<input type="hidden" name="matriculas" id="matriculas" value="0"/>
<input type="text" hidden="hidden" id="referencia" name="referencia" value="0" placeholder="Referência" class="form-control">
<input hidden="hidden" type="number" min="0" max="100" id="settings_desc_financ" value="0" placeholder="0" class="form-control">
<select class="form-control" id="SourceBilling" style="display: none!important;">
    <option value="P" <?php if(isset($DataSupplier['SourceBilling']) && $DataSupplier['SourceBilling'] == "P") echo 'selected="selected"'; ?>>Documento produzido na aplicação;</option>
</select>

<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalsCarregarDocumentos">Imprimir</a>
<?php
$suspenso = 0;
$status = 1;

$read = new Read();
$read->ExeRead("sd_billing", "WHERE id_db_settings=:i AND session_id=:ses AND page_found=:ppY AND suspenso=:s AND status=:st", "i={$id_db_settings}&ses={$id_user}&ppY={$page_found}&s={$suspenso}&st={$status}");

if($read->getResult()):
    ?>
    <a href="javascript:void" class="btn btn-primary" onclick="FinalizarProforma()">Finalizar Proforma</a>
<?php
else:
    ?>
    <a href="javascript:void()" onclick="DadosDaFactura01()" class="btn btn-default">Processar</a>
<?php
endif;
?>