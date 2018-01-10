<!DOCTYPE html>
<html lang="en">

  <head>
	<?php echo $this->element('head'); ?> </head>
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <?php echo $this->element('nav1'); ?>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo $this->Url->image('about-bg.jpg')?>')">
		<?php echo $this->element('header_about'); ?> </head>
    </header>

    <!-- Main Content -->
		<?php echo $this->element('contain_about'); ?> </head>

    <hr>

    <!-- Footer -->
    <footer>
      		<?php echo $this->element('foot'); ?>
    </footer>
  </body>

</html>
