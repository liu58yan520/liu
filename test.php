<?php

class Image_class {
  private $bg;
  private $bg_w=720;
  private $bg_h=1040;

  private $img;
  private $info;
  private $font="font/f.TTF";
 
  /**
   * @param $src:图片路径
   * 加载图片到内存中
   */
  function __construct($src){
    $this->bg=imagecreatefromjpeg("img/bg.jpg");
    $info = getimagesize($src);
    $type = image_type_to_extension($info[2],false);
    $this ->info =$info;
    $this->info['type'] = $type;
    $fun = "imagecreatefrom" .$type;
    $this->img = $fun($src);
    $this->load_img();
  }
 
  // /**
  //  * @param $fontsize: 字体大小
  //  * @param $x: 字体在图片中的x位置
  //  * @param $y: 字体在图片中的y位置
  //  * @param $color: 字体的颜色是一个包含rgba的数组
  //  * @param $text: 想要添加的内容
  //  */
  // public function fontMark($color,$text){
  //   $fontsize=$this->info[0]/29;
  //   $x=$this->info[0]*0.1;
  //   $y=$this->info[1]*0.8;
    
  //   $col = imagecolorallocatealpha($this->img,$color[0],$color[1],$color[2],$color[3]);
  //   ImageTTFText($this->img,$fontsize,0,$x,$y,$col,$this->font,$text);  
  // }



  public function load_img(){
      $n_h=700;
      $n_w=($n_h/$this->bg_h)*$this->bg_w;
      
      $left=($this->bg_w-$n_w)/2;
      imagecopyresized($this->bg,$this->img,$left,113,0,0,$n_w,$n_h,$this->bg_w,$this->bg_h);
      $this->show();

  }

  public function show($jub){
    header('content-type:' . $this ->info['mime']);
    $fun='image' . $this->info['type'];
    $fun($jub);
  }

 

  function __destruct(){
    imagedestroy($this->img);
  }
}



