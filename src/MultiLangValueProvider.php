<?php
namespace InteractivePlus\LibI18N;
class MultiLangValueProvider{
    public array $valueMapper;
    public $defaultValue;
    public function __construct($defaultValue, array $valueMapper)
    {
        $this->defaultValue = $defaultValue;
        $this->valueMapper = $valueMapper;
    }
    public function getValueFor(string $locale){
        return isset($this->valueMapper[$locale]) ? $this->valueMapper[$locale] : null;
    }
    public function getBestFitValueFor(string $locale){
        $bestFitLocale = Locale::getBestFitLocaleInLocaleArr($locale,'default',array_keys($this->valueMapper));
        if($bestFitLocale === 'default'){
            return $this->defaultValue;
        }else{
            return $this->valueMapper[$bestFitLocale];
        }
    }
    public function setValueFor(string $locale, $value){
        if($value === null){
            if(isset($this->valueMapper[$locale])){
                unset($this->valueMapper[$locale]);
            }
            return;
        }
        $this->valueMapper[$locale] = $value;
    }
}