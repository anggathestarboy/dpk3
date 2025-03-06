
<?php
 
//class manusia
class manusia{
    //menentukan property dengan protected
    protected $nama = "malas ngoding";    
    
    //method protected
    protected function nama(){
        return "Nama saya " .$this->nama;
    }
    
    public function tampilkan_nama(){
        return $this->tampilkan_nama;
    }
    
}
 
//instansiasi class manusia
$manusia = new manusia();
 
//memanggil method public tampilkan_nama dari class manusia
echo $manusia->tampilkan_nama();