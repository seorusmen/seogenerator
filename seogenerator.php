<?php
### Examples ###
/*
$seo = new seogenerator();
$syn = $seo->text('тест')->get();
var_dump($syn);
*/

class seogenerator {
  ### Properties ###
  private $text   = 'текст для синонимайзера';
  private $base   = 'sm1';
  private $type   = 'random';
  private $count  = 1;
  private $format = 'json';
  public function text($dat){
    $this->text = $dat;
    return $this;
  }
  public function base($dat){
    $this->base = $dat;
    return $this;
  }
  public function type($dat){
    $this->type = $dat;
    return $this;
  }
  public function count($dat){
    $this->count = $dat;
    return $this;
  }
  public function format($dat){
    $this->format = $dat;
    return $this;
  }

  ### Methods ###
  function get(){
    $dat = array('text'=>$this->text,'base'=>$this->base,'type'=>$this->type,'count'=>$this->count,'format'=>$this->format);
    $url = 'http://seogenerator.ru/api/synonym/';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dat);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $dat = curl_exec($ch);
    curl_close($ch);
    return json_decode($dat);
  }
}
?>
