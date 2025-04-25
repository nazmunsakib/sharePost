<?php 

/**
 * Page rediract helper function
 * @param mixed $page
 * @return void
 */
function redirect($page){
    header('location: ' . URLROOT . '/' .$page );
}