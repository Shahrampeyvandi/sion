<?php $__env->startSection('content'); ?>
<section class="head-film-cover">
    <div class="cover-img-movies_movie-Page"></div>
    <img src="<?php echo e(asset($post->poster)); ?>" alt="">
    <div class="movie-details-header">
        <img src="<?php echo e(asset('front/assets/images/moviePage/movieName.png')); ?>" alt="">
        <h1>
            <?php echo e($post->title); ?>

        </h1>
        <div class="details_details">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <div class="movie-year">
                            <?php echo e($post->year); ?>

                        </div>
                    </div>
                    <?php if($post->imdbRating): ?>
                    <div class="col-3">
                        <div class="IMDb_rank">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <b><strong>IMDb</strong></b>
                                    </div>
                                    <div class="col-6"><?php echo e($post->imdbRating); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-3">
                        <div class="movie-like">
                            <i class="fa fa-heart"></i>
                            93%
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="site-dubbing">
                            <?php if($post->checkDubleFarsi()): ?>
                            <i class="fa fa-microphone"></i>
                            دوبله فارسی
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="movie-description">
            <?php echo e($post->description); ?>

        </p>
        <div class="list_like">
            <a href="#" class="addMovie_list text-white">
                <i class="fa fa-plus"></i>
                افزودن به لیست
            </a>
            <!-- <i class="fas fa-thumbs-up"></i>
            <i class="fas fa-thumbs-down"></i> -->
        </div>

        <?php if(count($post->actors)): ?>
        <div class="movie-stars">
            ستارگان:
            <?php $__currentLoopData = $post->actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <a href="#">
                <?php echo e($actor->name); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>



        <div class="movie-age_rank">
            
            مناسب برای همه سنین
        </div>
    </div>
</section>
<?php if($post->type == "series" && count($post->seasons)): ?>
<section class="movie-Season mt-3">
    <div class="Season-select">
        انتخاب فصل
        <i class="fa fa-angle-down"></i>
    </div>
    <ul class="movie-Season-box">
        <?php $__currentLoopData = $post->seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
        <a href="<?php echo e(route('ShowSerie',['slug'=>$post->slug,'season'=>$item->number])); ?>"> <?php echo e($item->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="Season-movie-box">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-5 col-md-12">
                                <a href="#">
                                    <div class="Season-movie-img-box">
                                        <img src="<?php echo e(asset($section->poster)); ?>" alt="">
                                        <i class="fa fa-play-circle"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-7 col-md-12">
                                <h3>
                                    <?php echo e($section->serie->title); ?> - فصل <?php echo e($section->season); ?> - قسمت <?php echo e($section->section); ?>

                                    <i class="fa fa-cloud-download-alt"></i>
                                </h3>
                                <h4>
                                    <?php echo e($post->duration); ?>

                                </h4>
                            </div>
                            <div class="col-12">
                                <h5>
                                    <?php echo e(str_limit($section->description,100,'....')); ?>

                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="movie-trailer">
    <h1>
        تریلر، تصاویر و جزییات
    </h1>
    <div class="container-fluid">
        <div class="row">
            <?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-3 col-lg-2">
                <img src="<?php echo e(asset($image->url)); ?>" alt="<?php echo e($post->name); ?>">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <h2>
        <?php echo e($post->title); ?>

    </h2>
    <h3>
        درباره سریال <?php echo e($post->title); ?>

    </h3>

    <div class="col-12 movie-description-color">

        <?php echo $post->description; ?>

    </div>
    <h2>
        دسته بندی:
        <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($category->name); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </h2>

    <?php if(count($post->captions)): ?>
    <h2>
        زیرنویس:
        <?php $__currentLoopData = $post->captions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($caption->lang); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </h2>
    <?php endif; ?>
    <?php if(count($post->actors)): ?>
    <div class="container-fluid">
        <div class="row">
            <?php $__currentLoopData = $post->actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-3 col-lg-2 d-flex justify-content-center">
                <div class="star-img-box w-p-80">
                    <a href="#">
                        <?php if($actor->image): ?>
                        <img src="<?php echo e(asset($actor->image)); ?>" alt="<?php echo e($actor->name); ?>">
                        <?php else: ?>
                        <img src="<?php echo e(asset('assets/images/avatar.png')); ?>" alt="<?php echo e($actor->name); ?>">
                        <?php endif; ?>
                        <h4>
                            <?php echo e($actor->name); ?>

                        </h4>
                        <h5>
                            بازیگر
                        </h5>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <?php endif; ?>
    <h3>
        تیم دوبلاژ
    </h3>
    
</section>
<?php if(count($relatedPosts)): ?>
<section class="movie-related">
    <h1>
        همچنین تماشا کنید
    </h1>
    <div class="container-fluid">
        <div class="row">
            <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-3 col-lg-2">
                <?php $__env->startComponent('components.article',['serie'=>$item]); ?>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>
</section>
<?php endif; ?>

<?php echo $__env->make('Includes.Front.Comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tm\resources\views/Front/ShowSerie.blade.php ENDPATH**/ ?>