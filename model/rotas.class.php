<?php

Class Rotas{

  public static $pag;
  private static $pasta_controller = 'controller';
  private static $pasta_view = 'view';

  static function Home(){
    return Config::SITE_URL.'/'.Config::SITE_PASTA;
  }

  static function Raiz(){
    return $_SERVER['DOCUMENT_ROOT'].'/'.Config::SITE_PASTA;
  }

  static function Template(){
    return self::Home().'/'.self::$pasta_view;
  }

  static function Carrinho(){
    return self::Home().'/carrinho';
  }

  static function Shop(){
    return self::Home().'/shop';
  }

  static function Pagina(){

    if(isset($_GET['pag'])){
      //tratando mais que um parametro na URl, pois o htaccess trata apenas um.
      $pagina = $_GET['pag'];
      self::$pag = explode('/', $pagina);
      $pagina = 'controller/'.self::$pag[0].'.php';

      if(file_exists($pagina)){
        include $pagina;
      }else{
        include 'error.php';
      }

    }
  }
}

 ?>
