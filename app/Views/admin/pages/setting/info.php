<div class="col-lg-6 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="<?= base_url("setting/update-info")?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">CEO</label>
                <input class="form-control form-control-sm" type="text" name="ceo">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control form-control-sm" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="">Address 1</label>
                <textarea class="form-control" name="address1" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Address 2</label>
                <textarea class="form-control" name="address2" cols="30" rows="5"></textarea>
            </div>
        </form>
    </div>
</div>