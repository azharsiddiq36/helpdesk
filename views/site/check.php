<?php

/* @var $this yii\web\View */

$this->title = 'HelpDesk';
?>

<div class="uk-container ">
    <div class=" uk-text-center">
        <p data-uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay: 150"
           class="uk-margin-remove-bottom tm-overtitle uk-margin-medium-top uk-text-capitalize letter-spacing-l">
            Welcome to HelpDesk UIN Suska Riau
        </p>
        <h1 class="uk-h1 uk-margin-small-top uk-margin-medium-bottom uk-heading-line"
            style="font-family: 'DejaVu Sans Light'"
            data-uk-scrollspy="cls: uk-animation-slide-right; repeat: true; delay: 150">Informasi</h1>

        <?php switch ($model->status_keluhan) {
            case 'open': ?>
                    <p>Pengaduan yang anda ajukan sedang dalam proses pemeriksaan</p>
                <?php
                break;
            case 'on progress':
                ?>
                    <p>Pengaduan yang anda ajukan sedang dalam proses menunggu balasan</p>
                <?php
                break;
            case 'done':
                ?>
                    <p>Pengaduan yang anda ajukan telah mendapat balasan
                        <a href="?r=pengaduan/view-balasan&id=<?= $model->id_pengaduan; ?>">Lihat sekarang</a>
                    </p>
                <?php
                break;
        }
        ?>
    </div>
</div>
