<?php
$time = 2;
    if(isset($_SESSION['success'])) :
?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['success']; ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>

<?php 
    unset($_SESSION['success']);
    endif;
?>
<?php
    if(isset($_SESSION['info'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['info']; ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>

<?php 
    unset($_SESSION['info']);
    endif;
?>
<?php
    if(isset($_SESSION['error'])) :
?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['error']; ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>

<?php 
    unset($_SESSION['error']);
    endif;
?>