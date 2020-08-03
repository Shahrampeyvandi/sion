<section class="slider d-none d-md-block">
    <div class="swiper-container header-slider">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
                <div class="slider-box">
                    <div class="shadow-bottom-slider"></div>
                    <img class="slider-back-img" src="<?php echo e(asset($slider->image)); ?>" alt="">
                    <div class="movie-details-box-slider">
                        <a href="#">
                            <img src="#" alt="">
                        </a>
                        <h4>
                            <?php echo e($slider->post->title); ?>

                        </h4>
                        <h5>
                            <?php echo $slider->post->description; ?>

                        </h5>
                        <a href="#" class="page-movie-play btn--ripple">
                            <i class="fa fa-play"></i>
                            پخش فیلم
                        </a>
                        
                         <a href="#" class="more-detail-movie btn--ripple">
                            <i class="fa fa-star"></i>
                            خرید اشتراک
                        </a>
                    <a href="<?php echo e($slider->post->path()); ?>" class="more-detail-movie btn--ripple">
                            <i class="fa fa-exclamation"></i>
                            جزئیات بیشتر
                        </a>
                        <h6>
                            ستارگان:
                            <?php
                            $countactors = count($slider->post->actors);
                            ?>
                            <?php $__currentLoopData = $slider->post->actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#">

                                <?php echo e($item->name); ?>

                                <?php echo e($countactors -1  == $key ? ' ' : ' - '); ?>

                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </h6>
                        <h6>
                            کارگران:
                            <?php
                            $countdirectors = count($slider->post->directors);
                            ?>
                            <?php $__currentLoopData = $slider->post->directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#">

                                <?php echo e($item->name); ?>

                                <?php echo e($countdirectors -1  == $key ? ' ' : ' - '); ?>

                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </h6>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="next-header-slide">
            <i class="fa fa-angle-right"></i>
        </div>
        <div class="prev-header-slide">
            <i class="fa fa-angle-left"></i>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\tm\resources\views/Includes/Front/DesktopSlider.blade.php ENDPATH**/ ?>