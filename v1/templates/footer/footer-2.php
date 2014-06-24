    <!-- FOOTER -->
    <div class="footer">
      <div class='container-fluid'>
          <?php
          echo '<div class="row">';
          $theme_option = get_option('savage-tw-bt-theme');
          $footer_widget_count = $theme_option['widgets-footer-count-row-1'];
          for($i = 1; $i<= $footer_widget_count; $i++)
          {
            if (is_active_sidebar('footer1-'.$i)) {
              echo '<div class="widget_'.$footer_widget_count.' col-lg-'.(12/$footer_widget_count).'">';
              dynamic_sidebar('footer1-'.$i);
              echo '</div>';
            }
          }
          echo '</div>';
          echo '<div class="row"><hr></div>';
          echo '<div class="row">';
          $footer_widget_count = $theme_option['widgets-footer-count-row-2'];
          for($i = 1; $i<= $footer_widget_count; $i++)
          {
            if (is_active_sidebar('footer2-'.$i)) {
              echo '<div class="widget_'.$footer_widget_count.' col-lg-'.(12/$footer_widget_count).'">';
              dynamic_sidebar('footer2-'.$i);
              echo '</div>';
            }
          }
          echo '</div>';
          ?>

        
      </div>
    </div>
  </section>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include inDIVidual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <?php wp_footer(); ?>

  <?php
  echo $theme_option['add-footer'];

  ?>

</body>
</html>