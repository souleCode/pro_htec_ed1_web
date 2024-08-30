<?php
function securisation($data)
{
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    $data = trim($data);
    return $data;
}
