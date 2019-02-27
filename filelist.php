<?php 
function dirToArray($dir) { 
    $result = array(); 

    $cdir = scandir($dir); 
    foreach ($cdir as $key => $value) 
    {
        if ($value === '.git' || 
            $value === 'filelist.php' || 
            $value === 'files.json' || 
            $value === '.gitignore' || 
            $value === 'CNAME' ||
            $value === 'wget' ||
            $value === 'index.html') {
            continue;
        }

        if (!in_array($value,array('.','..'))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
            }
            else { 
                $result[] = $value; 
            }
        }
    }

    return $result; 
}

echo json_encode(dirToArray('./'));
?> 

