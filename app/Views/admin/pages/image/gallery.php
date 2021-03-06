<style>
    .img-gallery {
        height: 100px;
        max-height: 100px;
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
        top: 5px;
        left: 5px;
    }

    small {
        font-size: 5pt;
        align-items: right;
    }

    .titik {
        opacity: 0;
    }
</style>
<div id="list-gallery" class="row mx-2 w-100"></div>

<script>
    function deleteMedia() {
        document.querySelectorAll("input[type='checkbox']").forEach(item => {
            if (item.checked) {
                fetch("/api/media-upload", {
                        method: "DELETE",
                        body: JSON.stringify({
                            id: item.dataset.id
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        },

                    })
                    .then(res => res.json())
                    .then(data => showGallery())
                    .catch(err => console.log(err))
            }
        })
    }

    // window.onload = () => {

    // }
    const showGallery = () => {
        let html = "";
        let state = []
        fetch("/api/media-upload")
            .then(res => res.json())
            .then(data => {
                for (item in data) {
                    html += `<div class="col-lg-2 col-6 mb-2 px-1">`
                    html += `<div class="img-gallery rounded" style="background-image: url('${data[item].path}')">`
                    html += `<div class="btn-check">
            <div class="n-chk">
            <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
            <input data-id="${data[item].id}" type="checkbox" class="new-control-input" name="image">
            <span class="new-control-indicator text-large"></span><span class="titik">.<span>
            </label>
            </div>
            </div></div>`
                    html += ` <div>
            <small>${data[item].filename}</small>
            </div>`
                    html += `</div>`
                }
                document.querySelector("#list-gallery").innerHTML = html
            })
            .catch(error => console.log(error))
    }
    document.addEventListener("DOMContentLoaded", () => {
        showGallery()

    })
</script>