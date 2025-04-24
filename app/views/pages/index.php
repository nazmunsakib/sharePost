<?php require APPROOT .'/views/inc/header.php'; ?>
    <div class="bg-body-tertiary p-5 rounded mt-3">
        <h1><?php echo  $data['title']; ?></h1>
        <p class="lead"><?php echo $data['description']; ?></p>
        <a class="btn btn-lg btn-primary" href="" role="button">View docs »</a>
    </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>