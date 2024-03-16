<?php
/**
 * Created by PhpStorm.
 * User: Kwanzar Soft
 * Date: 23/06/2020
 * Time: 16:55
 */


if(!class_exists('login')):
    header("index.php");
    die();
endif;

$System = new Read();
?>

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Área do Desenvolvidor</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= HOME; ?>panel.php?exe=4c85378ea8b676a0d1b3dfba0c30ef5e/03b8e389068f06106a1fc841a8d4b545">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= HOME; ?>panel.php?exe=4c85378ea8b676a0d1b3dfba0c30ef5e/49bfa7d6814d33f4280f09e985324321">Vídeos</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= HOME; ?>panel.php?exe=default/home">cPanel</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form  method="post" action="" name = "SendPostForm"  enctype="multipart/form-data" class="card">
                <div class="card-header">
                    <div class="card-title">Vídeos</div>
                </div>

                <div class="card-body">
                    <?php
                    $ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if ($ClienteData && $ClienteData['SendPostForm']):

                        $logoty['cover'] = ($_FILES['cover']['tmp_name'] ? $_FILES['cover'] : null);
                        $Count = new WSInfo();
                        $Count->ExeStreaming($ClienteData, $logoty);

                        if($Count->getResult()):
                            WSError($Count->getError()[0], $Count->getError()[1]);
                        else:
                            WSError($Count->getError()[0], $Count->getError()[1]);
                        endif;
                    endif;
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" class="form-control" name="title"  value="<?php if (!empty($ClienteData['title'])) echo $ClienteData['title']; ?>" placeholder="Titulo">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Vídeo</label>
                                <input type="file" class="form-control-file" name="cover">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <input type="submit" name="SendPostForm" class="btn btn-success btn-sm" value="Salvar"/>
                </div>
            </form>
        </div>
    </div>
