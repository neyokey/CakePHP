<div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<?= $this->Html->link('Admin',['controller' => 'Admin','action' => 'index']) ?>
            </li>
            <li class="nav-item">
			<?= $this->Html->link('Home',['action' => 'index']) ?>
            </li>
            <li class="nav-item">
			<?= $this->Html->link('About',['action' => 'about']) ?>
             
            </li>
            <li class="nav-item">
						<?= $this->Html->link('Sample Post',['action' => 'sample']) ?>

            </li>
            <li class="nav-item">
						<?= $this->Html->link('Contact',['action' => 'contact']) ?>
            </li>
          </ul>
        </div>
      </div>