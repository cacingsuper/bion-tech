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
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        cursor: pointer;
        transform-style: preserve-3d;
        transition: all 1s ease;
    }

    .statbox .front h1,
    h5 {
        top: 0;
        color: red;
    }

    .statbox .front img {
        position: absolute;
        left: 20%;
        object-fit: cover;
        object-position: center;
        opacity: 0;
        cursor: pointer;
        max-height: 200;
        transition: opacity 1s ease-in;
        filter: brightness(120%);
        -webkit-transition: opacity 1s;
    }

    .statbox .front:hover img {
        opacity: 1;
        transition: opacity 1s ease-in-out;
    }

    .flip {
        transform: rotateY(180deg);
    }

    .statbox .front {
        width: 100%;
        height: 100%;
        position: absolute;
        /* backface-visibility: hidden; */
        background-color: black;
    }

    .statbox .back {
        width: 100%;
        height: 100%;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        background-color: red;
    }
    .widget{
        padding: 0;
    }    
</style>
<?php foreach ($list_persons as $person) : ?>
    <div class="col-lg-4 col-12">
        <div class="statbox widget box box-shadow">
            <div class="kartu front">
                <div class="back-image" style="background-image: url('<?= $person->img ?>');">
                </div>
                <img src="<?= $person->img ?>" alt="<?= $person->nama ?>">
                <h1 class="font-weight-bold p-4"><?= $person->nama ?></h1>
                <h5 class="p-4"><?= $person->jabatan ?></h5>
            </div>
            <div class="kartu back">
                <h1 class="font-weight-bold">Toro</h1>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    document.querySelectorAll(".statbox").forEach(item => {
        item.addEventListener("click", (elem) => {
            item.classList.toggle("flip")
            console.log(item)
        })
    })
</script>