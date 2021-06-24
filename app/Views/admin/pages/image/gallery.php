<style>
    .img-gallery {
        height: 200px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
<?php foreach ($list_image as $image) : ?>
    <div class="col-lg-3 col-6 mb-2">
        <div class="img-gallery rounded" style="background-image: url('<?= base_url() . $image->path ?>')"></div>
        <div class="d-flex justify-content-center">
            <label class="text-small"><?= $image->filename ?></label>
        </div>
    </div>
<?php endforeach; ?>