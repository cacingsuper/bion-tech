    <style>
        .btn-absolute {
            margin: 1rem 0;
            z-index: 100;
            align-items: left;
        }
        .alert{
            opacity:1;
        }
        /* .hidden {
            display: none;
            opacity: 0;
            transition: all 10s ease;
            transition-delay: 5s;

        } */
    </style>
    <?php
    $session = \Config\Services::session();
    if ($session->getFlashdata('success')) : ?>
        <div class="col-lg-12 col-12 py-0">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&#10005;</button>
                <strong>Success!</strong>Data Updated</button>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-lg-6 col-12 layout-spacing">
        <form role="form" action="<?= base_url("admin/setting-info") ?>" method="post" enctype="multipart/form-data">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Setting</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="">Ketua CEO</label>
                                <input class="form-control form-control-sm" type="text" name="ketua_ceo" value="<?= (isset($list_info->ketua_ceo) ? $list_info->ketua_ceo : NULL) ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="">Wakil CEO</label>
                                <input class="form-control form-control-sm" type="text" name="wakil_ceo" value="<?= (isset($list_info->wakil_ceo) ? $list_info->wakil_ceo : NULL) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12 px-4 mb-2">
                            <img id="img_preview" class="img-fluid rounded" src="<?= (isset($list_info->logo) ? $list_info->logo : '/img/default.png') ?>" alt="">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="file" name="upload_logo" accept="image/*" onchange="myChange()">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="">Employees</label>
                                <input class="form-control form-control-sm" type="number" name="employees" min="0" value="<?= (isset($list_info->employees) ? $list_info->employees : NULL) ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="">Berdiri</label>
                                <input class="form-control form-control-sm" type="text" name="since" value="<?= (isset($list_info->since) ? $list_info->since : NULL) ?>">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </div>
    <div class="col-lg-6 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control form-control-sm" type="email" name="email1" value="<?= (isset($email[0]) ? $email[0] : NULL) ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control form-control-sm" type="email" name="email2" value="<?= (isset($email[1]) ? $email[1] : NULL) ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Telp1</label>
                        <input class="form-control form-control-sm" type="phone" name="telp1" value="<?= (isset($phone[0]) ? $phone[0] : NULL) ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Telp2</label>
                        <input class="form-control form-control-sm" type="phone" name="telp2" value="<?= (isset($phone[1]) ? $phone[1] : NULL) ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Address 1</label>
                <textarea class="form-control" name="address1" cols="30" rows="5"><?= (isset($list_info->address1) ? $list_info->address1 : NULL) ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Address 2</label>
                <textarea class="form-control" name="address2" cols="30" rows="5"><?= (isset($list_info->address2) ? $list_info->address2 : NULL) ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-absolute">SIMPAN PERUBAHAN</button>
            </div>
        </div>
        </form>
    </div>

    <script>
        const prev = document.querySelector("#img_preview")
        document.querySelector("[name='upload_logo']").addEventListener("change", (e) => {
            console.log(e)
            var reader = new FileReader();
            reader.onload = function() {
                prev.src = reader.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        })
    </script>
    <script>
        document.querySelectorAll(".alert").forEach(item => {
            // item.classList.add('hidden')
            console.log(item.children[0].click())
        })
    </script>