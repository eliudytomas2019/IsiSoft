<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                ProSmart
            </div>
            <h2 class="page-title">
                Websites Home
            </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="Admin.php?exe=websites/index_about" class="btn btn-warning d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
                    Voltar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="modal-title">Adicionar Item</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="post" action="" name="SendPostFormL"  enctype="multipart/form-data">
                <div class="card-body">
                    <div id="getResult">
                        <?php
                        $ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                        $userId = filter_input(INPUT_GET, 'postid', FILTER_VALIDATE_INT);
                        if ($ClienteData && $ClienteData['SendPostFormL']):

                            $logoty['logotype'] = ($_FILES['logotype']['tmp_name'] ? $_FILES['logotype'] : null);
                            $Count = new Websites();
                            $Count->ExeAbout($logoty, $ClienteData);

                            WSError($Count->getError()[0], $Count->getError()[1]);
                        endif;
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Titulo</label>
                                <input type="text" name="titulo" id="titulo" value="<?php if (!empty($ClienteData['titulo'])) echo $ClienteData['titulo']; ?>" class="form-control"  placeholder="Titulo"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Subtitulo</label>
                                <input type="text" name="subtitulo" id="subtitulo" value="<?php if (!empty($ClienteData['subtitulo'])) echo $ClienteData['subtitulo']; ?>" class="form-control"  placeholder="Subtitulo">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Imagem (.jpg ou .png)</label>
                                <input type="file" name="logotype" class="form-control" placeholder="" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números 1</label>
                                <input type="text" name="numeros_1" id="numeros_1" value="<?php if (!empty($ClienteData['numeros_1'])) echo $ClienteData['numeros_1']; ?>" class="form-control"  placeholder="Números 1">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números 2</label>
                                <input type="text" name="numeros_2" id="numeros_2" value="<?php if (!empty($ClienteData['numeros_2'])) echo $ClienteData['numeros_2']; ?>" class="form-control"  placeholder="Números 2">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números 3</label>
                                <input type="text" name="numeros_3" id="numeros_3" value="<?php if (!empty($ClienteData['numeros_3'])) echo $ClienteData['numeros_3']; ?>" class="form-control"  placeholder="Números 3">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números 4</label>
                                <input type="text" name="numeros_4" id="numeros_4" value="<?php if (!empty($ClienteData['numeros_4'])) echo $ClienteData['numeros_4']; ?>" class="form-control"  placeholder="Números 4">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números descriçāo 1</label>
                                <input type="text" name="numeros_descricao_1" id="numeros_descricao_1" value="<?php if (!empty($ClienteData['numeros_descricao_1'])) echo $ClienteData['numeros_descricao_1']; ?>" class="form-control"  placeholder="Números descriçāo 1">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números descriçāo 2</label>
                                <input type="text" name="numeros_descricao_2" id="numeros_descricao_2" value="<?php if (!empty($ClienteData['numeros_descricao_2'])) echo $ClienteData['numeros_descricao_2']; ?>" class="form-control"  placeholder="Números descriçāo 2">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números descriçāo 3</label>
                                <input type="text" name="numeros_descricao_3" id="numeros_descricao_3" value="<?php if (!empty($ClienteData['numeros_descricao_3'])) echo $ClienteData['numeros_descricao_3']; ?>" class="form-control"  placeholder="Números descriçāo 3">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Números descriçāo 4</label>
                                <input type="text" name="numeros_descricao_4" id="numeros_descricao_4" value="<?php if (!empty($ClienteData['numeros_descricao_4'])) echo $ClienteData['numeros_descricao_4']; ?>" class="form-control"  placeholder="Números descriçāo 4">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <textarea placeholder="Descrição" class="form-control" name="content" id="content"><?php if (!empty($ClienteData['content'])) echo htmlspecialchars($ClienteData['content']); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="SendPostFormL" class="btn btn-primary ms-auto" value="Salvar"/>
                </div>
            </form>
        </div>
    </div>
</div>