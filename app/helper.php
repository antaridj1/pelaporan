<?php

function badge($status){
    switch ($status) {
        case "terkirim":
            return "bg-secondary";
            break;
        case "ditolak":
            return "bg-danger";
            break;
        case "diterima":
            return "bg-primary";
            break;
        case "diproses":
            return "bg-primary";
            break;
        case "unverified":
            return "bg-primary";
            break;
        case "selesai":
            return "bg-success";
            break;
        default:
            return "bg-secondary";
    }
}



?>