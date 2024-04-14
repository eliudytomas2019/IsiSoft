<?php
    $Total_sI = 0;
    $Total_I  = 0;

    $n = 0;
    $g;
    $iva_i = 0;
    $Aiko = "";
    $totol_iva = 0;
    $total_desconto = 0;
    $total_valor = 0;
    $total_preco = 0;
    $total_geral = 0;
    $total_service = 0;
    $Si          = 0;
    $So          = 0;
    $p = array();

    if(DBKwanzar::CheckConfig($id_db_settings)['JanuarioSakalumbu'] == null): $ttt = 2; else: $ttt = DBKwanzar::CheckConfig($id_db_settings)['JanuarioSakalumbu']; endif;
    $suspenso = 0;

    if($year <= "2020" && $mondy <= "07"):
        $InBody = '';
        $InHead = '';
    else:
        $InHead = "AND sd_billing.InvoiceType=:In AND sd_billing_pmp.InvoiceType=:In";
        $InBody = "&In={$InvoiceType}";
    endif;

    $read->ExeRead("sd_billing, sd_billing_pmp", "WHERE sd_billing.id_db_settings=:i AND sd_billing.suspenso=:s AND sd_billing.status=:st AND  sd_billing.numero=:n AND sd_billing_pmp.numero=:n AND sd_billing_pmp.status=:st AND sd_billing_pmp.id_db_settings=:i {$InHead} ORDER BY sd_billing.id DESC", "i={$id_db_settings}&s={$suspenso}&st={$ttt}&n={$Number}{$InBody}");

    if($read->getResult()):
        $k = $read->getResult()[0];
        //POS::Timer($k['numero'], $InvoiceType);
        ?>
        <div class="header">
            <img src="./uploads/<?php if($k['settings_logotype'] == null || $k['settings_logotype'] == null): echo $Index['logotype']; else: echo $k['settings_logotype']; endif;  ?>" class="img-silvio"/>
            <div class="header-silvio">
                <div class="header-silvio-a">
                    <div class="A4-left">
                        <h2><?= $k['settings_empresa']; ?></h2>
                        <p><span>NIF:</span> <?= $k['settings_nif']; ?></p>
                        <p class="website"><span>Website:</span> <?= $k['settings_website']; ?></p>
                        <p><span>E-MAIL:</span> <?= $k['settings_email']; ?></p>
                        <p><span>Endereço:</span> <?= $k['settings_endereco']; ?></p>
                        <p><span>Telefone:</span> <?= $k['settings_telefone']; ?></p>
                    </div>
                </div>
                <div class="header-silvio-b">
                    <h4>Exmo.(s) Sr.(s)</h4>
                    <span style="text-transform: uppercase!important;font-weight: bold!important;"><?= $k['customer_name'] ?></span>
                    <span><?= $k['customer_endereco'] ?></span>

                    <br/><span><?php if($k['customer_nif'] == null || $k['customer_nif'] == '' || $k['customer_nif'] == '999999999'): echo "Consumidor final"; else: echo $k['customer_nif']; endif; ?></span>
                </div>
            </div>
            <div class="limpopo-silvio">
                <h1>
                    <?php if($k['InvoiceType'] == 'PP'): echo "Factura Pró-forma "; elseif($k['InvoiceType'] == 'FT'): echo 'Factura '; else: echo 'Factura/Recibo '; endif; ?>
                    <?= $k['InvoiceType']." ".$k['mes'].$k['Code'].$k['ano']."/".$k['numero']; if(Strong::Config($id_db_settings)['JanuarioSakalumbu'] == 2 || DBKwanzar::CheckConfig($id_db_settings)['JanuarioSakalumbu'] == '' || Strong::Config($id_db_settings)['JanuarioSakalumbu'] == null): echo '&nbsp;MODO DE INSTRUÇÃO, ESSE DOCUMENTO NÃO É VÁLIDO'; endif; ?>
                </h1>

                <?php $Data = ["", "Original", "Duplicado", "Triplicado"]; ?>
                <span><?php if($k['timer'] == null || $k['timer'] == '' || $k['timer'] < 3): ?> <?= $Data[$i]; ?><?php else: ?> 2ª via em conformidade com a original<?php endif; ?></span>
            </div>
            <table class="" style="border: 1px solid #000!important;">
                <thead>
                <tr>
                    <th style="border-right: 1px solid #000!important;">Moeda</th>
                    <th style="border-right: 1px solid #000!important;">Data de Emissão</th>
                    <th style="border-right: 1px solid #000!important;">Hora de Emissão</th>
                    <?php if($k['InvoiceType'] == 'FR'): ?>
                        <th style="border-right: 1px solid #000!important;">Metodo de Pagamento</th>
                    <?php endif; ?>
                    <?php if($k['InvoiceType'] == 'PP'): ?>
                        <th style="border-right: 1px solid #000!important;">Válida Até</th>
                    <?php endif; ?>
                    <th style="border-right: 1px solid #000!important;">Operador</th>
                    <th style="border-right: 1px solid #000!important;">Referência</th>
                    <th>Página</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="border-right: 1px solid #000!important;"><?= $k['settings_moeda']; ?></td>
                    <td style="border-right: 1px solid #000!important;"><?= $k['dia']."-".$k['mes']."-".$k['ano'] ?></td>
                    <td style="border-right: 1px solid #000!important;"><?= $k['hora'] ?></td>
                    <?php
                    $dp = explode("-", $k['date_expiration']);
                    if($k['InvoiceType'] == 'FR'): ?>
                        <td style="border-right: 1px solid #000!important;"><?php if($k['method'] == 'CC'): echo 'Cartão de Credito'; elseif($k['method'] == 'MB'): echo 'Referência de pagamentos para Multicaixa'; elseif($k['method'] == 'CD'): echo 'Cartão de Debito'; elseif($k['method'] == 'CH'): echo 'Cheque Bancário'; elseif($k['method'] == 'NU'): echo 'Numerário'; elseif ($k['method'] == 'TB'): echo 'Transferência Bancária'; elseif($k['method'] == 'OU'): echo 'Outros Meios Aqui não Assinalados'; elseif($k['method'] == 'ALL'): echo 'Diversificado'; endif; ?>
                        </td>
                    <?php endif; ?>
                    <?php if($k['InvoiceType'] == 'PP'): ?>
                        <td style="border-right: 1px solid #000!important;"><?= $dp[2]."-".$dp[1]."-".$dp[0]; ?></td>
                    <?php endif; ?>
                    <td style="border-right: 1px solid #000!important;"><?= $k['username'] ?></td>
                    <td style="border-right: 1px solid #000!important;"><?= $k['referencia'] ?></td>
                    <td><span class="page"></span></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="table-silvio">
            <table>
                <thead class="punheta" style="border: 1px solid #000!important;">
                <tr>
                    <th>Código</th>
                    <th>Descriminação</th>
                    <th>Qtd</th>
                    <th>Preço uni.</th>
                    <th>Desc%</th>
                    <th>Taxa%</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require("./_SystemWoW/Arrays_calc.inc.php");

                foreach($read->getResult() as $key):
                    extract($key);
                    $p = $key;

                    $value = ($key['quantidade_pmp'] * $key['preco_pmp']);
                    $iva = ($value * $key['taxa']) / 100;

                    if($key['desconto_pmp'] >= 100):
                        $desconto = $key['desconto_pmp'];
                    else:
                        $desconto = ($value * $key['desconto_pmp']) / 100;
                    endif;

                    //$desconto = ($value * $key['desconto_pmp']) / 100;
                    $valor = ($value);

                    $totol_iva += $iva;
                    $total_desconto += $desconto;
                    $total_valor += $valor;
                    $total_preco += $value;

                    require("./_SystemWoW/Calc_Impostos.inc.php");

                    $value_01 = $value + $iva;

                    if($key['product_type'] == "S"):
                        $total_service += $value;
                    endif;
                    ?>
                    <tr style="border-bottom: 1px solid #000!important;">
                        <td style="border-bottom: 1px solid #000!important;"><?= $key['product_code']; ?></td>
                        <td style="border-bottom: 1px solid #000!important;">
                            <?= $key['product_name'] ?>
                            <?php if(DBKwanzar::CheckConfig($id_db_settings) == false || DBKwanzar::CheckConfig($id_db_settings)['PadraoAGT'] == null || DBKwanzar::CheckConfig($id_db_settings)['PadraoAGT'] == 2): ?><?php if($key['taxa'] == 0): echo ' <small>('.$n.')</small>'; endif; ?><?php endif; ?><br/>
                            <?php if($key['taxa'] == 0): ?><small style="font-size: 7pt!important;"><?= $key['TaxExemptionReason']; ?></small><br/><?php endif; ?>
                            <small><?= $key['product_list']; ?></small>
                        </td>
                        <td style="border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($key['quantidade_pmp'], 2)) ?></td>
                        <td style="border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($key['preco_pmp'], 2));  ?></td>
                        <td style="border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($key['desconto_pmp'], 2));  ?></td>
                        <td style="border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($key['taxa'], 2));  ?> <?php if(DBKwanzar::CheckConfig($id_db_settings) == false || DBKwanzar::CheckConfig($id_db_settings)['PadraoAGT'] == null || DBKwanzar::CheckConfig($id_db_settings)['PadraoAGT'] == 2): ?><?php if($key['taxa'] == 0): echo "(".$key['TaxExemptionCode'].")"; endif; ?><?php endif; ?></td>
                        <td style="border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($value_01, 2));  ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
            <div class="limpopo-silvio-2">
                <span><?php
                    if(DBKwanzar::CheckConfig($id_db_settings) == false || DBKwanzar::CheckConfig($id_db_settings)['PadraoAGT'] == null || DBKwanzar::CheckConfig($id_db_settings)['PadraoAGT'] == 2):
                        require("./_SystemWoW/footer-invoice-geral-w.inc.php");
                    endif;
                    ?></span>
            </div>
        </div>
        <?php
            if($k['IncluirNaFactura'] == 2):
                $Retencao = ($total_service * $k['RetencaoDeFonte']) / 100;
            else:
                $Retencao = 0;
            endif;

            $descont_f = ($total_preco * $k['settings_desc_financ']) / 100;
            $total_geral = ($total_valor - ($descont_f + $total_desconto + $Retencao)) + $totol_iva;
        ?>
        <div class="footer-small">
            <div class="cripton-silvio">
                <div class="cripton-silvio-a">
                    <?php  require("./_SystemWoW/Table_Impostos.inc.php"); ?>

                    <table style="font-size: 7pt!important;border: 1px solid #000!important;border-right: none!important;border-bottom: none!important;">
                        <thead>
                            <tr style="font-size: 7pt!important;">
                                <th style="border-right: 1px solid #000!important;">BANCO</th>
                                <th style="border-right: 1px solid #000!important;">CONTA</th>
                                <th style="border-right: 1px solid #000!important;">IBAN</th>
                                <th style="border-right: 1px solid #000!important;">SWIFT/BIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="font-size: 7pt!important;">
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_banco'] ?></td>
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_nib'] ?></td>
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_iban'] ?></td>
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_swift'] ?></td>
                            </tr>
                            <tr style="font-size: 8pt!important;">
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_banco1'] ?></td>
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_nib1'] ?></td>
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_iban1'] ?></td>
                                <td style="border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;"><?= $k['settings_swift1'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="nota-silvio">
                        <?php
                        require("./_SystemWoW/Obs.invoice.inc.php");
                        ?>
                    </div>
                </div>

                <div class="cripton-silvio-b">
                    <table class="spec">
                        <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-left: 1px solid #000!important;border-top: 1px solid #000!important;border-bottom: 1px solid #000!important;border-right: 1px solid #000!important;">Total Ilíquido</td> <td style="border-right: 1px solid #000!important;border-top: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?php echo str_replace(",", ".", number_format($total_preco, 2)); ?></td></tr>
                        <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Desconto Comercial</td> <td style="border-right: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?php echo str_replace(",", ".", number_format($total_desconto, 2));  ?></td></tr>
                        <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Desconto Financeiro</td> <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?= str_replace(",", ".",number_format($descont_f, 2)); ?></td></tr>
                        <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Total de Imposto</td> <td style="border-right: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?php echo str_replace(",", ".", number_format($totol_iva, 2)); ?></td></tr>
                        <?php if($k['method'] == 'NU' && $k['InvoiceType'] != 'PP'): ?>
                            <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-right: 1px solid #000!important;border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Pagou</td> <td style="border-right: 1px solid #000!important;"><?= str_replace(",", ".", number_format($p['pagou'] ,2)); ?></td></tr>
                            <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-right: 1px solid #000!important;border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Troco</td> <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($p['troco'] ,2)); ?></td></tr>
                        <?php endif; ?>
                        <?php if($k['method'] == 'ALL' && $k['InvoiceType'] != 'PP'): ?>
                            <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-right: 1px solid #000!important;border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Númerario</td> <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($p['numerario'] ,2)); ?></td></tr>
                            <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-right: 1px solid #000!important;border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Cartão de Débito</td> <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($p['cartao_de_debito'] ,2)); ?></td></tr>
                            <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-right: 1px solid #000!important;border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Transferência</td> <td style="border-right: 1px solid #000!important;"><?= str_replace(",", ".", number_format($p['transferencia'] ,2)); ?></td></tr>
                        <?php endif; ?>
                        <tr style="border-left: 1px solid #000!important;border-bottom: 1px solid #000!important;"><td style="border-right: 1px solid #000!important;border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Ret. Fonte (<?= str_replace(",", ".", number_format($k['RetencaoDeFonte'], 1)) ?>%)</td> <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?php if($k['IncluirNaFactura'] == 2): ?><?php echo number_format($Retencao, 2);  ?><?php  endif; ?></td></tr>

                        <tr style="border-bottom: 1px solid #000!important;"><td style="border-right: 1px solid #000!important;border-left: 1px solid #000!important;border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;">Total a Pagar (<?= $k['settings_moeda']; ?>): </td> <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;"><?= str_replace(",", ".", number_format($total_geral ,2)); ?></td></tr>
                    </table>
                    <p style="font-size: 10pt!important;font-weight: bold!important;">
                        <?php
                            $fxs = new NumberFormatter("pt_BR", NumberFormatter::SPELLOUT);
                            $word = $fxs->format($total_geral);
                            echo $word." kwanzas ";
                        ?>
                    </p>
                </div>
            </div>
        </div>
    <?php
    endif;

$file = $k['InvoiceType']." ".$k['mes'].$k['Code'].$k['ano']."_".$k['numero'];