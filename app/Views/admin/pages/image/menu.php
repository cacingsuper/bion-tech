<style>
    input[name=media_upload] {
        visibility: hidden;
        max-width: 0;
        min-height: 0;
    }
</style>
<div class="col-12 p-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex left-menu">
            <div>
                <!-- <button type="button" class="btn btn-primary"><i class="fas fa-image"></i> Url</button> -->
                <button type="button" class="btn btn-info mb-2 mr-2" data-toggle="modal" data-target="#tabsModal">
                    <i class="fas fa-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-sm" id="tabsModal" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tabsModalLabel">Media</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="upload-tab" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="true">Upload</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="url-tab" data-toggle="tab" href="#url" role="tab" aria-controls="url" aria-selected="false">Url</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                                        <img id="prevImage" class="img-fluid" src="/img/default.png">
                                        <div class="mt-2">
                                            <button class="btn btn-success" onclick="uploadFile()"><i class="fas fa-image"></i> Upload</button>
                                            <input type="file" name="media_upload" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="url" role="tabpanel" aria-labelledby="url-tab">
                                        <input name="image_url" type="url" class="form-control form-control-sm" placeholder="image url (*https://)">
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <p class="modal-text">Pellentesque semper tortor id ligula ultrices suscipit. Donec viverra vulputate lectus non consectetur. Donec ac interdum lacus. Donec euismod nisi at justo molestie elementum. Vivamus vitae hendrerit neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                <button id="submit_media" type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-menu">
            <button onclick="deleteMedia()" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </div>
    </div>
</div>

<script>
    const reader = new FileReader();
    const img = document.getElementById("prevImage");
    reader.onload = e => {
        img.src = e.target.result;
    }
    const media = document.querySelector("input[name='media_upload']")
    media.addEventListener('change', e => {
        const f = e.target.files[0];
        reader.readAsDataURL(f);
    })
    document.querySelector("#submit_media").addEventListener("click", (e) => {
        document.querySelector("#submit_media").disabled = true
        const link = document.querySelector("input[name='image_url']").value
        if (link) {
            fetch("/api/url-upload", {
                method: "POST",
                body: link
            }).then(
                response => response.json() // if the response is a JSON object
            ).then(
                success => {
                    document.querySelector("#submit_media").disabled = false
                    showGallery()
                }
            ).catch(
                error => console.log(error) // Handle the error response object
            );
        } else {
            const image = media.files[0]
            const formData = new FormData();
            formData.append('media_upload', image);
            fetch("/api/media-upload", {
                method: "POST",
                body: formData
            }).then(
                response => response.json() // if the response is a JSON object
            ).then(
                success => {
                    document.querySelector("#submit_media").disabled = false
                    showGallery()
                }
            ).catch(
                error => console.log(error) // Handle the error response object
            );
        }
    })
</script>
<script>
    const uploadFile = () => {
        document.querySelector("input[name='media_upload']").click()
    }
</script>