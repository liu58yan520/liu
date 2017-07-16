<?php
class Image_class {
  private $bg;
  private $bg_w;
  private $bg_h;
  private $font="font/f.TTF";

  function __construct($src,$name){
      $this->create_bg();
      $this->load_img($src);
      $this->create_part('img/part1.png');
      $this->create_part('img/part2.png');
      $this->fontMark(array(255,239,2),$name);
      
  }
  public function create_bg(){
      $bg_src='img/bg.jpg';
      list($this->bg_w,$this->bg_h)=getimagesize($bg_src);
      $this->bg = @imagecreatefromjpeg($bg_src);
  }
  public function create_part($part_src){
      $part_info = getimagesize($part_src);
      $part=ImageCreateFromPNG($part_src);
      imagecopyresized($this->bg,$part,0,0,0,0,$this->bg_w,$this->bg_h,$this->bg_w,$this->bg_h);
  }

  public function fontMark($color,$name){
    $fontsize=60;    
    $col = imagecolorallocatealpha($this->bg,$color[0],$color[1],$color[2],0);
    ImageTTFText($this->bg,$fontsize,0,120,$this->bg_h-400,$col,$this->font,$name);  
  }

  public function load_img($src){
      $info = getimagesize($src);
      if($info[0]>$info[1])  exit('请上传 竖屏照片');
      $type = image_type_to_extension($info[2],false);
      $fun = "imagecreatefrom" .$type;
      $img = $fun($src);

      $n_h=700;
      $n_w=($n_h/$this->bg_h)*$this->bg_w;
      $left=($this->bg_w-$n_w)/2;

      $dst_im = imagecreatetruecolor($n_w, $n_h);
      imagecopyresized($dst_im,$img,0,0,0,0,$n_w,$n_h,$info[0],$info[1]);
      imagecopyresized($this->bg,$dst_im,$left,100,0,0,$n_w,$n_h,$n_w,$n_h);
  }
  public function show(){
    $name='upload/'.time().'.jpg';
    //header('content-type:image/jpeg');
    imagejpeg($this->bg,$name);
    return $name;
  }

  function __destruct(){
    imagedestroy($this->bg);
  }
}



