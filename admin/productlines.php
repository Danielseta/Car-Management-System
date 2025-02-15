```php
<?php require_once('header.php'); ?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View Product lines</h1>
    </div>
    <div class="content-header-right">
<a href="productlineadd.php" class="btn btn-primary btn-sm">Add Productline Details</a>
</div>
	
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                            <tr>
                                <th width="10">#</th>
                                <th width="10">productLine</th>
                                <th width="60">textDescription</th>
                                <th width="60">htmlDescription</th>
                                <th width="60">image</th>
                                <th width="80">Action</th>
                            </tr>/
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            $statement = $pdo->prepare('SELECT * FROM `productlines`');
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                               
                                    <td><?php echo $row['productLine']; ?></td>
                                    <td>$<?php echo $row['textDescription']; ?></td>
                                    <td>$<?php echo $row['htmlDescription']; ?></td>
                                    <td>$<?php echo $row['image']; ?></td>
                                   
                                    <td>                                        
                                        <a href="productlines-edit.php?id=<?php echo $row['productLine']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs" data-href="productlinedelete.php?id=<?php echo $row['productLine']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
```