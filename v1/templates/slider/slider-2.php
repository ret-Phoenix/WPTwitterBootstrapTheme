
<?php
$query = get_posts(array(
  'numberposts'     => -1,
  'offset'          => 0,
  'category'        => '',
  'orderby'         => 'post_date',
  'order'           => 'DESC',
  'include'         => '',
  'exclude'         => '',
  'meta_key'        => '',
  'meta_value'      => '',
  'post_type'       => 'Savage-slider',
  'post_mime_type'  => '',
  'post_parent'     => '',
  'post_status'     => 'publish'
  ));

// print_r($query);
  ?>

  <div class="container">
    <DIV class='row'>
      <DIV>


        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php
            $is_active = true;
            $i = 0;
            foreach ($query as $row) {
              echo '
              <li data-target="#myCarousel" data-slide-to="'.$i.'" '.(($is_active) ? 'class="active"' : '').'></li>
              ';
              $is_active = false;
              $i++;
            }
            ?>
          </ol>
          <div class="carousel-inner">
            <?php
            $is_active = true;
            foreach ($query as $row) {
              ?>
              <div class="item<?php echo (($is_active) ? ' active' : ''); ?>">
                <?php
                if ($row->post_excerpt) {
                  echo '<img src="'.$row->post_excerpt.'" alt="">';
                }
                ?>
                <div class="container">
                  <div class="carousel-caption">
                    <h1><?php echo $row->post_title; ?></h1>
                    <p><?php echo $row->post_content; ?></p>
                  </div>
                </div>
              </div>
              <?php
              $is_active = false;
            }
            ?>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

        </div><!-- /.carousel -->      


    </DIV>
  </DIV>
  </DIV>