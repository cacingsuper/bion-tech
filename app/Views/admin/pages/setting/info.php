<div class="col-lg-6 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <form action="<?= base_url("setting/update-info")?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Ketua CEO</label>
                <input class="form-control form-control-sm" type="text" name="ketua_ceo">
            </div>
            <div class="form-group">
                <label for="">Wakil CEO</label>
                <input class="form-control form-control-sm" type="text" name="wakil_ceo">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control form-control-sm" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="">Telp1</label>
                <input class="form-control form-control-sm" type="phone" name="telp1">
            </div>
            <div class="form-group">
                <label for="">Telp2</label>
                <input class="form-control form-control-sm" type="phone" name="telp2">
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