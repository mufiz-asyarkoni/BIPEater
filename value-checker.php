<?php

//cek nilai dari sebuah kueri
public function cekValue(String $value){
  $data = new DataMasyarakat;
  
  //cek apakah data adalah NIK atau bukan
  //melalui panjang string
  if(strlen($value) == 16){
    //melalui apakah string adalah numerik/angka
    if(is_numeric($value)){
      $data->nik = $value
    }
  }
  
  //cek apakah data adalah jenis kelamin atau bukan
  //melalui pola kecocokan yang biasanya ada di dokumen
  //BIP mengenai tanda jenis kelamin sebuah data warga
  if($value == "LAKI-LAKI" || "L" || "LK" || "PEREMPUAN"){
    if ($value == "LAKI-LAKI" || "L" || "LK"){
      $data->js_kelamin = "LAKI-LAKI"
    }
    if ($value == "PEREMPUAN" || "P" || "PR"){
      $data->js_kelamin = "PEREMPUAN"
    }
  }
  
  //cek apakah data adalah status perkawinan atau bukan
  //melalui pola kecocokan yang biasanya ada di dokumen BIP
  if($value == "KAWIN" || "BELUM KAWIN"){
  
  }
}

?>
