<?php

class Flasher{
    public static function setFlash($message, $action, $type, $position){
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type,
            'position' => $position
        ];
    }

    public static function flash(){
        if(isset($_SESSION['flash'])){
            echo '
            <div class="col-12 d-flex justify-content-' . $_SESSION['flash']['position'] . '">
                <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show col-6" role="alert">
                ' . $_SESSION['flash']['message'] . ' ' . '<strong>'. $_SESSION['flash']['action'] .'</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            ';
          unset($_SESSION['flash']);
        }
    }
}