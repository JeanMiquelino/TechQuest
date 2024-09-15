<div id="carousel-example-generic" class="carousel slide margin-bottom" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo e(asset('./images/Banner1.jpeg')); ?>"
                 alt="First slide">

            <div class="carousel-caption">
                Aprenda
            </div>
        </div>
        <div class="item">
            <img src="<?php echo e(asset('./images/Banner2.jpeg')); ?>"
                 alt="Second slide">

            <div class="carousel-caption">
                Jogue
            </div>
        </div>
        <div class="item">
            <img src="<?php echo e(asset('./images/Banner3.jpeg')); ?>"
                 alt="Third slide">

            <div class="carousel-caption">
                Divirta-se
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="fa fa-angle-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="fa fa-angle-right"></span>
    </a>
</div>
<?php /**PATH C:\Users\Jean\Desktop\TechQuest\resources\views/home/_carousel.blade.php ENDPATH**/ ?>