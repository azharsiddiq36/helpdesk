<?php

/* @var $this yii\web\View */

$this->title = 'HelpDesk';
?>


<div class="uk-container uk-text-center">

    <p data-uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay: 150" class="uk-margin-remove-bottom tm-overtitle uk-margin-medium-top uk-text-uppercase letter-spacing-l">
        Welcome to HelpDesk UIN Suska Riau
    </p>
    <h1 class="uk-h1 uk-margin-small-top uk-margin-medium-bottom uk-heading-line"
        style="font-family: 'DejaVu Sans Light'" data-uk-scrollspy="cls: uk-animation-slide-right; repeat: true; delay: 150">How can we
        help?</h1>

    <div class="uk-light uk-grid-medium uk-child-width-1-3@m uk-grid-small uk-grid-match tm-margin-large-top uk-text-center"
         data-uk-grid>
        <div data-uk-scrollspy="cls: uk-animation-slide-bottom; repeat: true; delay: 100">
            <a href="?r=site/pengaduan" class="uk-card uk-card-box uk-card-body uk-border-rounded">
                    <span class="uk-icon-forder uk-border-rounded">
                        <span data-uk-icon="icon: mail; ratio: 2"></span></span>
                <p>Pengaduan</p>
            </a>
        </div>
        <div data-uk-scrollspy="cls: uk-animation-slide-bottom; repeat: true; delay: 150">
            <a href="#search" data-uk-toggle class="uk-card uk-card-box uk-card-body uk-border-rounded">
                    <span class="uk-icon-forder uk-border-rounded">
                        <span data-uk-icon="icon: check; ratio: 2"></span></span>
                <p>Cek Pengaduan</p>
            </a>
        </div>
        <div data-uk-scrollspy="cls: uk-animation-slide-bottom; repeat: true; delay: 200">
            <a href="?r=site/lihat" class="uk-card uk-card-box uk-card-body uk-border-rounded">
                    <span class="uk-icon-forder uk-border-rounded">
                        <span data-uk-icon="icon: list; ratio: 2"></span></span>
                <p>Lihat Pengaduan</p>
            </a>
        </div>
    </div>
</div>
