<style>
    input[name=media_upload] {
        visibility: hidden;
        max-width: 0;
        min-height: 0;
    }
</style>
<div class="col-12 p-3">
    <div class="d-flex justify-content-between">
        <div class="left-menu">
            <input type="file" name="media_upload" accept="image/*">
            <button class="btn btn-success" onclick="uploadFile()"><i class="fas fa-image"></i> Upload</button>
        </div>
        <div class="right-menu">
            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </div>
    </div>

</div>

<script>
    document.querySelector("input[name='media_upload']").addEventListener("input", (e) => {
        const image = e.target.files[0]
        const formData = new FormData();
        formData.append('media_upload', image);
        fetch("/api/media-upload", {
            method: "POST",
            // headers: {"Content-Type": "multipart/form-data; boundary=something" },
            body: formData
        }).then(
            response => response.json() // if the response is a JSON object
        ).then(
            success => {
                showGallery()
            } // Handle the success response object
        ).catch(
            error => console.log(error) // Handle the error response object
        );
    })
    const uploadFile = () => {
        document.querySelector("input[name='media_upload']").click()
    }
</script>