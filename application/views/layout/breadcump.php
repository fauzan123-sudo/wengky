

<nav aria-label="breadcrumb bg-transparent" style="display: inline-block;">
  <ol class="breadcrumb bg-transparent">
  	<?php $cek_total = count($bc); for ($i=0; $i < $cek_total  ; $i++) { 
  		# code...
  	
  		
  	?>

    <li class="breadcrumb-item  pb <?php if($i == $cek_total-1){ echo 'active';} ?>" aria-current="page">
    	<?php if ($i != $cek_total-1) {
    		echo "<a href='#'>".$bc[$i]."</a>";
    	}else{
    		echo $bc[$i];
    	} ?>
    </li>

<?php } ?>
  </ol>
</nav>