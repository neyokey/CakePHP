<!DOCTYPE html>
<html lang="en">

  <head>
<?php echo $this->element('head'); ?>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <?php echo $this->element('nav1'); ?>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo $this->Url->image('contact-bg.jpg')?>')">
            <?php echo $this->element('header_contact'); ?>

    </header>

    <!-- Main Content -->
    <div class="container">
            <?php echo $this->element('contain_contact'); ?>

    </div>

    <hr>

    <!-- Footer -->
    <footer>
      		<?php echo $this->element('foot'); ?>
    </footer>
  </body>

</html>
