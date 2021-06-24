<?php foreach ($products as $product): ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->name ?></h5>
                    <p class="card-text"><?php echo $product->price ?></p>
                    <a href="index.php?page=product&action=update&id=<?php echo $product->id ?>"
                       class="btn btn-warning">Update</a>
                    <a href="index.php?page=product&action=delete&id=<?php echo $product->id ?>" class="btn btn-danger" onclick="return confirm('Do you really want to do delete that')">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>