<?php 
	$namehost = 'localhost';
	$userhost = 'root';
	$passhost = '';
	$database = 'lvtn_pizza';
	session_start();
	$cn = mysqli_connect($namehost, $userhost, $passhost, $database);
	$query = mysqli_query($cn, "SELECT * FROM donhang");
	$count=mysqli_num_rows($query);
	if(isset($_SESSION['Countdonhang']))
    {
    	$old_count = $_SESSION['Countdonhang'];
    	if($count != $old_count)
    	{
    		?>
    			<script type="text/javascript"> alert('Có đơn hàng mới!'); </script>
    		<?php
    		$_SESSION['Countdonhang'] = $count;
    	}
    }
    else
    {
    	$_SESSION['Countdonhang'] = $count;
    }
?>
