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
        transition: all 0.8s ease;
        background-blend-mode: lighten;
    }

    .statbox .front h1,
    h5 {
        top: 0;
    }

    .statbox .front img {
        position: absolute;
        left: 20%;
        object-fit: cover;
        object-position: center;
        opacity: 0.05;
        cursor: pointer;
        max-height: 200;
        transition: all 1s ease-in;
        -webkit-transition: opacity 1s;
        backface-visibility: hidden ;
        filter: brightness(10%);
    }

    .statbox .front:hover img {
        opacity: 1;
        transition: opacity 1s ease-in-out;
        filter: brightness(100%);
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
        padding: 2rem;
    }
</style>
<?php foreach ($list_persons as $person) : ?>
    <div class="col-lg-4 col-12">
        <div class="statbox widget box box-shadow">
            <div class="front">
                <img src="<?= $person->img ?>" alt="<?= $person->nama ?>">
                <h1 class="font-weight-bold p-4"><?= $person->nama ?></h1>
                <h5 class="px-4 text-danger"><?= $person->jabatan ?></h5>
            </div>
            <div class="back">
                <h1 class="font-weight-bold p-4"><?= $person->nama ?></h1>
                <h5 class="px-4 text-danger"><?= $person->jabatan ?></h5>
                <h6 class="detail"><?= $person->detail ?></h6>
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