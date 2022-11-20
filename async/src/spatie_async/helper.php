<?php

function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}

function create_sample_files(int $total = 5): array {
    // force clean dir data
    if (file_exists('tmp')) {
        rmdir_recursive('tmp');
    };
    mkdir('tmp');

    $files = [];
    for($i = 0; $i < $total; $i++) {
        $filename = "tmp/test$i.txt";
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        fwrite($myfile, "Quan Vu \n");
        fclose($myfile);
        $files[] = $filename;
    }
    return $files;
}

function delete_file($file) {
    sleep(10);
    return unlink($file);
}
