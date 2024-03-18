<?php
if(!class_exists('login')):
    header("index.php");
    die();
endif;

if($level >= 4): $n =  '&id_db_settings='.$id_db_settings; else: $n = null; endif;

if($userlogin['level'] < 3):
    header("location: painel.php?exe=default/index".$n);
endif;

?>
<div class="row gx-lg-4">
    <?php require_once("_disk/IncludesApp/MenuSettings.inc.php"); ?>
    <div class="col-lg-9">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Configurações
                    </h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="modal-title">Dados bancários</h5>
            </div>
            <div class="card-body">
                <div id="getResult"></div>
                <form method="post" action="#getResult" name="FormValidateNib">
                    <?php
                    $read->ExeRead("db_settings", "WHERE id=:i AND id_db_kwanzar=:ip", "i={$id_db_settings}&ip={$id_db_kwanzar}");

                    if($read->getResult()):
                        $Data = $read->getResult()[0];
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>BANCO</th>
                                    <th>NIB</th>
                                    <th>IBAN</th>
                                    <th>SWIFT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="banco" id="banco" class="form-control" value="<?= $Data['banco'] ?>" placeholder="Banco"></td>
                                    <td><input type="text" name="nib" id="nib" class="form-control" value="<?= $Data['nib'] ?>" placeholder="NIB"></td>
                                    <td><input type="text" name="iban" id="iban" class="form-control" value="<?= $Data['iban'] ?>" placeholder="IBAN"></td>
                                    <td><input type="text" name="swift" id="swift" class="form-control" value="<?= $Data['swift'] ?>" placeholder="SWIFT"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="banco1" id="banco1" class="form-control" value="<?= $Data['banco1'] ?>" placeholder="Banco"></td>
                                    <td> <input type="text" name="nib1" id="nib1" class="form-control" value="<?= $Data['nib1'] ?>" placeholder="NIB"></td>
                                    <td>  <input type="text" name="iban1" id="iban1" class="form-control" value="<?= $Data['iban1'] ?>" placeholder="IBAN"></td>
                                    <td> <input type="text" name="swift1" id="swift1" class="form-control" value="<?= $Data['swift1'] ?>" placeholder="SWIFT"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="banco2" id="banco2" class="form-control" value="<?= $Data['banco2'] ?>" placeholder="Banco"></td>
                                    <td><input type="text" name="nib2" id="nib2" class="form-control" value="<?= $Data['nib2'] ?>" placeholder="NIB"></td>
                                    <td><input type="text" name="iban2" id="iban2" class="form-control" value="<?= $Data['iban2'] ?>" placeholder="IBAN"></td>
                                    <td><input type="text" name="swift2" id="swift2" class="form-control" value="<?= $Data['swift2'] ?>" placeholder="SWIFT"></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    endif;
                    ?>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>