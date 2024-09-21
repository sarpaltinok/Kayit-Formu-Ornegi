<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    }else {die("Kullanıcı adı veya şifre eksik. Lütfen tüm alanları doldurun.");
    }
}
if(empty($username) || empty($password)) {
    die("Kullanıcı adı veya şifre eksik. Lütfen tüm alanları doldurun.");
}
    // Şifre en az 8 en fazla 20 karakterden oluşmalıdır.
    if (strlen($password) < 8 || strlen($password) > 20) {
    die("Şifre en az 8 en fazla 20 karakterden oluşmalıdır.") ;
    }
// Şifre en az 2 adet özel karakter içermelidir.
$ozelKarakterler = array('+', '%', '!', '?', '*');
$ozelKarakterSayisi = 0;
foreach ($ozelKarakterler as $karakter) {
    if (strpos($password, $karakter) !== false) {
        $ozelKarakterSayisi++;
    }
}
if ($ozelKarakterSayisi < 2) {
    die("Şifre en az 2 adet özel karakter içermelidir. Özel karakterler: +%!?*") ;
}
// Şifre en az 3 adet rakam içermelidir.
    $rakamSayisi = preg_match_all("/[0-9]/", $password);
    if ($rakamSayisi < 3) {
        die ("Şifre en az 3 adet rakam içermelidir.") ;
    }
// Şifre en az 1 küçük harf içermelidir.
if (!preg_match("/[a-z]/", $password)) {
    die("Şifre en az 1 küçük harf içermelidir.");
}

// Şifre en az 1 büyük harf içermelidir.
if (!preg_match("/[A-Z]/", $password)) {
    die("Şifre en az 1 büyük harf içermelidir."); 
}
// Şifre doğru.
echo "Şifre doğru. Giriş yapıldı.";
?>
   