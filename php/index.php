<?php 
class Config{
   public static $folder = 'https://demareaktor.github.io/Wrong-Mages-site/';
}
class Settings{
    public $page;
    static $inst;
    public static function init(){
        self::$inst = new self();
        return self::$inst;
    }
    public static function get(){
        return self::$inst;
    }

}
class Page{
    public static function content($name){
        switch ($name){
            case 'guide':
            case 'news':
            case 'plans':
            case 'tokenomic':
            case 'feedback':
                return file_get_contents(Config::$folder.'html/'.$name.'.html');
                break;
        }
        return file_get_contents(Config::$folder.'index.html');
    }
}
class Language{
    public static function set_value($language){
        $_COOKIE['language'] = 'ua';
        switch($language){
            case 'ua':
            case 'uk':
                $_COOKIE['language'] = $language;
        }
    }
    public static function get_path(){
        return $_COOKIE['language']??'ua';
    }
}

if($_GET['language'])
    Language::set_value($_GET['language']);
if (Language::get_path() == 'ua')
    echo Page::content($_GET['page']);
else 
    echo 'Site in English is not created, please take another languages';
?>
