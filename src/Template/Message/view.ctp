<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CvCandidate $cvCandidate
 */
?>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    <a href="<?=$this->Url->build('/admin/')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    <a href="<?php echo $this->Url->build('/message', true);?>"  > Message</a>
    <a href="" class="current">Xem message</a>
    </div>
  </div>
  
<!--End-breadcrumbs-->
  
<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
    </div>
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Xem message</h5>
        </div>
        <div class="widget-content nopadding ">
        <section class="well well__offset-3">
            <div class="container">
                <?php
                    if($message != null)
                    {
                ?>
                <div class="row row__offset-2">
                    <div class="grid_7">
                        <div style="font-size: 20px; font-weight: bold;"><?php echo $message->subject ?></div>
                        <br>
                        <?php echo 'Tên: '.$message->name.'<br> Email: '. $message->email;  ?>
                        <br>
                        <br>
                    </div>
                    <div class="grid_2">
                    </div>
                    <div style="font-size: 20px" class="grid_3 center">
                    </div>
                </div>
                <div class="row row__offset-2" style="font-size: 18px">
                    <div class="grid_7 news_content">
                        <?php
                             echo $message->message;
                        ?>
                    </div>
                    <div class="grid_2">
                    </div>
                    <div class="grid_3">
                        
                    </div>
                </div>
                <?php
                    }
                    else{
                       ?> 
                       <div class="row row__offset-2">
                        <div class="grid_7 center" style="font-size: 40px">
                            News not exist!
                        </div>
                        <div class="grid_2">
                        </div>
                        <div style="font-size: 20px" class="grid_3 center">
                        </div>
                    </div>
                       <?php
                    }
                ?>
            </div>
        </section>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->
