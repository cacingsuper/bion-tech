<style>
    .back-image {
        min-height: 600px;
        width: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.1;
        position: absolute;
        top: 0;
    }


    .statbox {
        position: relative;
        height: 100%;
        min-height: 500px;
        width: 100%;
        cursor: pointer;
        transform-style: preserve-3d;
        transition: all linear 0.6s;
        background-blend-mode: lighten;
        overflow: initial;
    }

    .statbox .front h1,
    h5 {
        top: 0;
    }

    .statbox .front img {
        position: absolute;
        left: 20%;
        /* object-fit: cover; */
        object-position: center;
        object-fit: contain;
        opacity: 0.05;
        cursor: pointer;
        max-height: 200;
        transition: all 0.8s ease-in;
        -webkit-transition: opacity 1s;
        backface-visibility: hidden;
        filter: brightness(10%);
    }


    .flip {
        transform: rotateY(180deg);
    }

    .statbox .front {
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
    }

    .statbox .back {
        width: 100%;
        height: 100%;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden !important;
    }

    .widget {
        padding: 0;
    }

    .detail {
        text-align: justify;
    }

    .front .img-container {
        position: absolute;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        backface-visibility: hidden;
        z-index: -1;
        opacity: 0.5;
        transition: all 0.8s ease;
    }



    .flip .front .img-container {
        filter: brightness(300%);
        z-index: -1;
        -webkit-transition: all 0.8s;
    }

    .flip-container {
        perspective: 800px;
        color: black;
        position: relative;
    }

    .statbox .front:hover .img-container {
        transition: all 0.8s ease-in-out;
        opacity: 1;
        z-index: 1;
    }

    .detail-wrapper {
        max-height: 400px;
        overflow-y: scroll;
        text-overflow: ellipsis;
    }

    .detail-wrapper::-webkit-scrollbar {
        width: 1px;
    }
</style>
<?php foreach ($list_persons as $person) : ?>
    <div class="col-lg-4 col-12 mb-4">
        <div class="statbox widget box box-shadow">
            <div class="front">
                <div class="img-container" style="background-image:url('<?= $person->img ?>') !important;">
                </div>
                <h3 class="font-weight-bold p-4"><?= $person->nama ?></h3>
                <h5 class="px-4 text-danger"><?= $person->jabatan ?></h5>
            </div>
            <div class="back">
                <h5 class="my-4 px-4 text-danger"><?= $person->jabatan ?></h5>
                <div class="px-4 detail-wrapper">
                    <small class="detail text-black"><?= $person->detail ?></small>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    document.querySelectorAll(".statbox").forEach(item => {
        item.addEventListener("click", (elem) => {
            item.classList.toggle("flip")
        })
    })
</script>
<!-- <script src="//static.filestackapi.com/filestack-js/3.x.x/filestack.min.js"></script>
<script>
    const client = filestack.init("AyYz7ImFREaQxuETHlOcoz");
    client.picker().open();
</script> -->