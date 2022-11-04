<!--=====================================
Customers
======================================-->

<div class="box box-success">
	
	<div class="box-header with-border">
    
    	<h3 class="box-title">Customers</h3>
  
  	</div>

  	<div class="box-body">
  		
		<div class="chart-responsive">
			
			<div class="chart" id="bar-chart2" style="height: 300px;"></div>

		</div>

  	</div>

</div>

<script>
	
//BAR CHART
var bar = new Morris.Bar({
  element: 'bar-chart2',
  resize: true,
  data: [
        {y: 'Acer', a: 54, b: 25},
        {y: 'Boces', a: 31, b: 4},
        {y: 'Safeware', a: 117, b: 105},
        {y: 'Inhouse', a: 310, b: 39}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['fixed', 'in repair'],
      hideHover: 'auto'
    });
</script>