<?php
  if(isset($_SESSION['flash_message'])){
    $sessionMessage= $_SESSION['flash_message'];
    $sessionMessageText=
        "<div class='flash alert alert-".$sessionMessage['category']." alert-dismissible fade show col-md-4 offset-md-4' role='alert'>"
            .$sessionMessage['message'].
            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    echo $sessionMessageText;
    unset($_SESSION['flash_message']);
  }
?>