<style>
    .img-gallery {
        height: 200px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;

    }

    input[type="checkbox"].styled:checked+label:after,
    input[type="radio"].styled:checked+label:after,
    .checkbox input[type=checkbox]:checked+label:after {
        font-family: 'Glyphicons Halflings';
        content: "\e013";
    }

    input[type="checkbox"].styled:checked label:after,
    input[type="radio"].styled:checked label:after,
    .checkbox label:after {
        padding-left: 4px;
        padding-top: 2px;
        font-size: 9px;
    }

    .btn-check {
        position: absolute;
        top: 0;
        left: 0;
        margin: 2px;

    }
</style>
<?php foreach ($list_image as $image) : ?>
    <div class="col-lg-3 col-6 mb-2">
        <div class="img-gallery rounded" style="background-image: url('<?= base_url() . $image->path ?>')">
            <div class="btn-check">
                <div class="n-chk m-2">
                    <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                        <input type="checkbox" class="new-control-input" name="image">
                        <span class="new-control-indicator"></span> .
                    </label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <label class="text-small"><?= $image->filename ?></label>
        </div>
    </div>
<?php endforeach; ?>