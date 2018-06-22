<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">

        <p class="lead">List Authors with books</p>

    <div class="body-content">
	

        <div class="row">
           
            <table class="table">
              <thead>	  
                <tr>
                  <th>Number</th>
                  <th>Book's name</th>
                  <th>Book's author</th>
                </tr>
              </thead>
              <tbody>
			  
	<?php 
	$number = 1;
	foreach ($dataBooks as $item): ?>				  
                <tr>
                  <td><?php echo $number ?></td>
                  <td><?php echo htmlspecialchars($item->name) ?></td>
				  
				  <?php foreach ($dataAuthors as $itemAuthor): 
					if($itemAuthor->id == $item->author_id): ?>
					
					<td><?php echo htmlspecialchars($itemAuthor->name) ?></td>
					 
					<?php endif ?>
					
					
	<?php endforeach ?>
	
	<?php $number++; ?>
		
    <?php endforeach ?>
				  </tr>
              </tbody>
            </table>
        </div>

    </div>
</div>
