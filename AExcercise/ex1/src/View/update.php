<div class="col-12 col-md-12 mt2">
    <div class="card">
        <div class="card-header"> Add product</div>
        <form method="post">
            <input type="hidden" value="<?php echo $product->id ?>" name="id">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name"
                       value="<?php echo $product->name ?>" required>
                <?php if (isset($errors['name'])): ?>
                    <p class="error"><?php echo $errors['name'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Price"
                       value="<?php echo $product->price ?>" required>
                <?php if (isset($errors['price'])): ?>
                    <p class="error"><?php echo $errors['price'] ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?page=product&action=list" type="button" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
<?php
