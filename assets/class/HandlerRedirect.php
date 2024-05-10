<?php

class HandlerRedirect
{
    public function redirect($address)
    {
        header("Location: " . $address);
    }

    public function setError(string $message)
    {
        $_SESSION['error'] = $message;
    }

    public function error()
    {
        if (isset($_SESSION['error'])) {
            echo "swal.fire('', '" . $_SESSION['error'] . "', 'error')";
            unset($_SESSION['error']);
        }
    }
    public function setAlert(string $message)
    {
        $_SESSION['alert'] = $message;
    }

    public function alert()
    {
        if (isset($_SESSION['alert'])) {
            echo "swal.fire('', '" . $_SESSION['alert'] . "', 'success')";
            unset($_SESSION['alert']);
        }
    }
}

$fn = new HandlerRedirect();
