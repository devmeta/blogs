<?php if(count($pages)>1):?>
  <nav class="text-center">
  <ul class="pagination">
<?php if(count($pages)>1):?>
    <li class="<?php echo $current < 2 ? 'disabled' : '';?>">
      <a href="<?php echo ($current < 2 ? '#' : PATH . '?page=' . ($current-1));?>" aria-label="<?php locale('prev');?>" data-avoidscroll="1">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php endif;?>
<?php foreach($pages as $p):?>
	<li class="<?php echo $current == $p ? 'active' : '';?>"><a href="<?php print PATH;?>?page=<?php echo $p;?>" data-avoidscroll="1"><?php print $p;?></a></li>
<?php endforeach;?>
<?php if(count($pages)>1):?>
    <li class="<?php echo $current > count($pages)-1 ? 'disabled' : '';?>">
      <a href="<?php echo ($current > count($pages)-1 ? '#' : PATH . '?page=' . ($current+1));?>" aria-label="<?php locale('next');?>" data-avoidscroll="1">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
<?php endif;?>    
  </ul>
</nav>
<?php endif;?>