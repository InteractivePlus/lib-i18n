<?php
namespace LibI18N;
class Comparison{
    public static function bothEqualOrEmpty(string $left, string $right) : bool{
        if($left === $right || empty($left) || empty($right)){
            return true;
        }else{
            return false;
        }
    }
    public static function leftEqualOrEmpty(string $left, string $right) : bool{
        if($left === $right || empty($left)){
            return true;
        }else{
            return false;
        }
    }
    public static function rightEqualOrEmpty(string $left, string $right) : bool{
        if($left === $right || empty($right)){
            return true;
        }else{
            return false;
        }
    }
}