<?php
function show_query($query){
    global $conn;
    $sql = mysqli_query($conn, $query)or die("Error: " . mysqli_error($conn));

    $data = mysqli_fetch_assoc($sql);

    return $data;
}

function list_query($query){
    global $conn;

    $result = mysqli_query($conn, $query)or die("Error: " . $conn);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function delete_query($query){
    global $conn;
    $sql = mysqli_query($conn, $query)or die("error: " . mysqli_error($conn));

    return $sql;
}