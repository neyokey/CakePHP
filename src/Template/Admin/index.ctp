<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<?php
  $val = array();
  if(isset($data))
  {
    $a = '';
    $b = '';
    $c = '';
    foreach ($data[0] as $datetime => $price) 
    {
        $a = $a.'"'.$datetime.'",';
        $b = $b.$price.',';
    }
    foreach ($data[1] as $datetime => $count) 
    {
        $c = $c.$count.',';
    }
    $val['labels'] = '['.rtrim($a,',').']';
    $val['data'] = '['.rtrim($b,',').']';
    $val['count'] = '['.rtrim($c,',').']';
  }
  else
  {
    $val['labels'] = '[]';
    $val['data'] = '[]';
    $val['count'] = '[]';
  }
?>
<script type="text/javascript">
$(function () {
  //Date range picker
  $('#reservation').daterangepicker({
    showDropdowns: false,
    opens: 'center',
    locale: {
      format: 'YYYY/MM/DD',
      applyLabel: 'Chọn',
      cancelLabel: 'Hủy',
      fromLabel: 'Từ',
      toLabel: 'Đến',
      weekLabel: 'W',
      customRangeLabel: '',
      daysOfWeek: moment.weekdaysMin(),
      monthNames: moment.monthsShort(),
      firstDay: moment.localeData()._week.dow
    }
  });
  // This will get the first returned node in the jQuery collection.
  // var areaChart = new Chart(areaChartCanvas);

  var ctx = document.getElementById('myAreaChart').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
          labels: <?php echo $val['labels']; ?>,
          datasets: [
          {
              label: "Doanh thu theo ngày",
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: <?php echo $val['data']; ?>,
              fill: false,
              yAxisID: 'A',
          },
          {
            label: "Số đơn hàng",
            backgroundColor: "#8e5ea2",
            borderColor: "#8e5ea2",
            data: <?php echo $val['count']; ?>,
            fill: false,
            yAxisID: 'B',
          }
        ]
      },

      // Configuration options go here
      options: {
        showLines: true,
        showScale: false,
        scaleShowGridLines: false,
        scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true
                            }
                        }],
                    yAxes: [{
                            id: 'A',
                            display: true,
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                beginAtZero: true,
                            }
                        },
                        {
                            id: 'B',
                            display: true,
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                beginAtZero: true,
                            }
                        }]
                },
    }
  });
});

</script>

<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo $this->Url->build('/admin/', true);?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-content nopadding">
          <div class="quick-actions_homepage">
            <ul class="quick-actions">
              <li class="bg_lg"> <a href="<?php echo $this->URL->build('/donhang'); ?>">
              <i class="icon-shopping-cart"></i>Bạn có <?php echo $donhang; ?> đơn hàng chưa xác nhận</a> </li> 
              <?php
              if ($type <= 2) 
              {
              ?>
                <li class="bg_dy"> <a href="<?php echo $this->URL->build('/message'); ?>">
                <i class="icon-comment"></i>Bạn có <?php echo $message; ?> message chưa xem</a> </li>
              <?php
              }
              ?>
            </ul>
          </div>
      </div>
    </div>
  </div> 
  <div class="row-fluid">
    <?php echo $this->Form->create('Time'); ?>
      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-body">
            <div class="form-group">
                <div class="input-group">
                    <?php echo $this->Form->input('reservation', array('id' => 'reservation', 'type' => 'text', 'class' => 'form-control pull-right', 'div' => false, 'label' => false, 'readonly' => true)); ?>
                    <div class="input-group-btn">
                      <?php echo $this->Form->submit('Đặt lại', array('class' => 'btn btn-info pull-right', 'div' => false)); ?>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $this->Form->end(); ?>
      <canvas id="myAreaChart" width="100%" height="30"></canvas>
  </div>      
</div>
    <!--End-Action boxes-->    
  </div>
</div>
