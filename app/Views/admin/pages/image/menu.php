<style>
    input[name=media_upload] {
        visibility: hidden;
        max-width: 0;
        min-height: 0;
    }
</style>
<div class="col-12 p-3">
    <input type="file" name="media_upload" accept="image/*">
    <button class="btn btn-success" onclick="uploadFile()"><i class="fas fa-image"></i> Upload</button>
</div>
<script>
    document.querySelector("input[name='media_upload']").addEventListener("input", (e) => {
        console.log(e)
    })
    const uploadFile = () => {
        document.querySelector("input[name='media_upload']").click()
    }
</script>