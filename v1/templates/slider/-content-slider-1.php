<?php
$query = get_posts('meta_key=savage_on_post_slider&meta_value=1&numberposts=-1');
?>
<DIV class='container'>
  <DIV class='row'>
    <DIV class='col-sm-12'>

        <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                foreach ($query as $row) {
                // echo 'Q';
                    ?>
                    <div class="item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"><img src="http://placehold.it/350x250" class="img-responsive"></div>
                                <div class="col-md-9">
                                    <h2><? echo $row->post_title ?></h2>
                                    <p><? echo $row->post_excerpt ?></p>

                                </div>
                            </div>
                        </div>            
                    </div> 
                    <?php
                }

                ?>
            </div>
            <!-- End Carousel Inner -->
            <div class="controls">
                <ul class="nav">
                    <?php
                // $query = query_posts('meta_key=savage_on_post_slider&meta_value=1&numberposts=-1');
                    $i = 0;
                    foreach ($query as $row) {
                        echo '<li data-target="#custom_carousel" data-slide-to="'.$i.'"><a href="#"><img src="http://placehold.it/50x50"></a></li>';
                        $i++;
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End Carousel -->

