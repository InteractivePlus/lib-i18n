<?php
namespace InteractivePlus\LibI18N;
class Comparison{
    public static function bothEqualOrEmpty($left, $right) : bool{
        if($left === $right || empty($left) || empty($right)){
            return true;
        }else{
            return false;
        }
    }
    public static function leftEqualOrEmpty($left, $right) : bool{
        if($left === $right || empty($left)){
            return true;
        }else{
            return false;
        }
    }
    public static function rightEqualOrEmpty($left, $right) : bool{
        if($left === $right || empty($right)){
            return true;
        }else{
            return false;
        }
    }
}