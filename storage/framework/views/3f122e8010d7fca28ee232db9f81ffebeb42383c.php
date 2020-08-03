<?php $__env->startSection('Title','فیلم ها'); ?>


<?php $__env->startSection('content'); ?>


<?php echo $__env->make('Includes.Front.DesktopSlider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Includes.Front.MobileSlider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section class="top-slider">
    <div class="swiper-container TopSlider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="top-slider-box">
                    <a href="#">
                        <img src="<?php echo e(asset('frontend/assets/images/section-sliders/p1.jpg')); ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="top-slider-box">
                    <a href="#">
                        <img src="<?php echo e(asset('frontend/assets/images/section-sliders/p1.jpg')); ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="top-slider-box">
                    <a href="#">
                        <img src="<?php echo e(asset('frontend/assets/images/section-sliders/p1.jpg')); ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="top-slider-box">
                    <a href="#">
                        <img src="<?php echo e(asset('frontend/assets/images/section-sliders/p1.jpg')); ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="top-slider-box">
                    <a href="#">
                        <img src="<?php echo e(asset('frontend/assets/images/section-sliders/p1.jpg')); ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="top-slider-box">
                    <a href="#">
                        <img src="<?php echo e(asset('frontend/assets/images/section-sliders/p1.jpg')); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<?php if(count($newmovies)): ?>
<section class="movie-sections">
    <h3>
        تازه ترین ها
        <a href="#">
            مشاهده همه
            <i class="fa fa-angle-left"></i>
        </a>
    </h3>
    <div class="swiper-container IranNews">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $newmovies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
            <?php $__env->startComponent('components.article',['model'=>$movie]); ?>
            <?php echo $__env->renderComponent(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="movie-detail-show_index"
        style=" background: url('../images/آقازاده.jpg') no-repeat;    background-size: contain;">
        <div class="details_movie_index">
            <div class="cover-movie-detail_index"></div>
            <a>
                <h1>
                    دل
                </h1>
                <div class="desc mt-2 w-50">
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                </div>
                <div>
                    <a href="#" class="page-movie-play btn--ripple mr-0 mt-5">
                        <i class="fa fa-play"></i>
                        پخش فیلم
                    </a>
                <a href="" class="more-detail-movie btn--ripple">
                        <i class="fa fa-exclamation"></i>
                        توضیحات بیشتر
                    </a>
                </div>
                <h6>
                    ستارگان:
                    <a href="#">
                        ستاره 1
                    </a>
                </h6>
                <h6>
                    دسته بندی:
                    <a href="#">
                        دسته بندی 1 -
                    </a>
                </h6>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(count($latestdoble)): ?>
<section class="movie-sections">
    <h3>
        دوبله فارسی
        <a href="#">
            مشاهده همه
            <i class="fa fa-angle-left"></i>
        </a>
    </h3>
    <div class="swiper-container IranNews">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $latestdoble; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
                <a href="#" data-id="1" onclick="showDetails(event,'<?php echo e($post->id); ?>','<?php echo e(route('GetMovieDetail')); ?>')">
                    <div class="movie-sections-box">
                        <div class="img-box-movies">
                            <img src="<?php echo e(asset($post->poster)); ?>" alt="<?php echo e($post->name); ?>">
                            <div class="cover-img-movies-details">
                                <span>
                                    <?php echo e($post->name); ?> -
                                    <?php if($post->type == "series"): ?>

                                    <?php echo e(\Morilog\Jalali\Jalalian::forge($post->first_publish_date)->format('%Y')); ?>

                                    <?php else: ?>
                                    <?php echo e(\Morilog\Jalali\Jalalian::forge($post->released)->format('%Y')); ?>

                                    <?php endif; ?>
                                </span>
                                <span>
                                    <i class="fa fa-heart"></i>
                                    89%
                                </span>
                            </div>
                        </div>
                        <h5>
                            <?php echo e($post->title); ?>

                        </h5>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="movie-detail-show_index"
        style=" background: url('../images/آقازاده.jpg') no-repeat;    background-size: contain;">
        <div class="details_movie_index">
            <div class="cover-movie-detail_index"></div>
            <a>
                <h1>
                    دل
                </h1>
                <div class="desc mt-2 w-50">
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                </div>
                <div>
                    <a href="#" class="page-movie-play btn--ripple mr-0 mt-5">
                        <i class="fa fa-play"></i>
                        پخش فیلم
                    </a>
                    <a href="./moviePage.html" class="more-detail-movie btn--ripple">
                        <i class="fa fa-exclamation"></i>
                        توضیحات بیشتر
                    </a>
                </div>
                <h6>
                    ستارگان:
                    <a href="#">
                        ستاره 1
                    </a>
                </h6>
                <h6>
                    دسته بندی:
                    <a href="#">
                        دسته بندی 1 -
                    </a>
                </h6>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>



<?php if(count($newyear)): ?>
<section class="movie-sections">
    <h3>
        جدیدترین فیلم های <?php echo e($year); ?>

        <a href="#">
            مشاهده همه
            <i class="fa fa-angle-left"></i>
        </a>
    </h3>
    <div class="swiper-container IranNews">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $newyear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
                <a href="#" data-id="1" onclick="showDetails(event,'<?php echo e($post->id); ?>','<?php echo e(route('GetMovieDetail')); ?>')">
                    <div class="movie-sections-box">
                        <div class="img-box-movies">
                            <img src="<?php echo e(asset($post->poster)); ?>" alt="<?php echo e($post->name); ?>">
                            <div class="cover-img-movies-details">
                                <span>
                                    <?php echo e($post->name); ?> -
                                    <?php if($post->type == "series"): ?>

                                    <?php echo e(\Morilog\Jalali\Jalalian::forge($post->first_publish_date)->format('%Y')); ?>

                                    <?php else: ?>
                                    <?php echo e(\Morilog\Jalali\Jalalian::forge($post->released)->format('%Y')); ?>

                                    <?php endif; ?>

                                </span>
                                <span>
                                    <i class="fa fa-heart"></i>
                                    89%
                                </span>
                            </div>
                        </div>
                        <h5>
                            <?php echo e($post->title); ?>

                        </h5>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="movie-detail-show_index"
        style=" background: url('../images/آقازاده.jpg') no-repeat;    background-size: contain;">
        <div class="details_movie_index">
            <div class="cover-movie-detail_index"></div>
            <a>
                <h1>
                    دل
                </h1>
                <div class="desc mt-2 w-50">
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                    توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات
                </div>
                <div>
                    <a href="#" class="page-movie-play btn--ripple mr-0 mt-5">
                        <i class="fa fa-play"></i>
                        پخش فیلم
                    </a>
                    <a href="./moviePage.html" class="more-detail-movie btn--ripple">
                        <i class="fa fa-exclamation"></i>
                        توضیحات بیشتر
                    </a>
                </div>
                <h6>
                    ستارگان:
                    <a href="#">
                        ستاره 1
                    </a>
                </h6>
                <h6>
                    دسته بندی:
                    <a href="#">
                        دسته بندی 1 -
                    </a>
                </h6>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tm\resources\views/Front/AllMovies.blade.php ENDPATH**/ ?>