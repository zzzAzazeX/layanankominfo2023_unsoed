<div class="container-fluid" id="container-wrapper">
    <h1>Create Form</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/create_form'); ?>
        <div class="form-group">
            <label for="form_name">Form Name</label>
            <input type="text" class="form-control" id="form_name" name="form_name" placeholder="Enter form name">
        </div>
        <div class="form-group">
            <label for="form_description">Form Description</label>
            <textarea class="form-control" id="form_description" name="form_description" rows="3" placeholder="Enter form description"></textarea>
        </div>
        <!-- Tambahkan field lain sesuai kebutuhan -->
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
    <?php echo form_close(); ?>
</div>
