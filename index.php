<?php
function strToBin1($input)
{
    if (!is_string($input))
        return false;
    $input = unpack('H*', $input);
    $chunks = str_split($input[1], 2);
    $ret = '';
    $array = [];
    foreach ($chunks as $key => $chunk)
    {
        $temp = base_convert($chunk, 16, 2);
        // $test = substr($temp, 3, 3);
        // $a = ltrim($test, 0);

        // if($key !== 0){
            $repeat = str_repeat("0", 8 - strlen($temp)) . $temp;
            $ret .= $repeat;
        // } else {
        //     $ret .= $temp . ' ';
        // }
    }
    return $ret;
}

echo "Masukan Kata - Kata : ";
$kata2 = trim(fgets(STDIN));
// $kata2 = "HELLO WORLD";
$binary = strToBin1($kata2);
$array_binary = str_split($binary, 4);
// var_dump($array_binary);
$bilangan_dump = 0;
$dump_binary = null;
$hasil = '';
foreach ($array_binary as $key => $value) {
    $angka = bindec($value);
    if($angka > $bilangan_dump || $angka == $bilangan_dump){
        $dump_binary = 1;
    } else {
        $dump_binary = 0;
    }
    $bilangan_dump = $angka;
    $hasil .= $dump_binary;
}

echo $hasil;