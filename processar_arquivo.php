<style>
    *{
        margin:0;
        padding:0;

    }
    img{
        display: none;
    }
    .ativa{
        display:block; 
        width: 100vw;
        height: 100vh;
    }
</style>
<?php 
$diretorio = __DIR__."\\uploads\\";

$arquivo = $_FILES['arquivos']?? null; 
if (!is_dir($diretorio)) {
    mkdir($diretorio, 0755, true);
    
}


foreach($arquivo['name'] as $nameIndicie => $valor){
    $destino = $diretorio.basename($arquivo['name'][$nameIndicie]);
    move_uploaded_file($arquivo['tmp_name'][$nameIndicie],$destino);
}

foreach($arquivo['name'] as $nameIndicie => $valor){
    echo "<img class='elem' id = '{$nameIndicie}'src='uploads/".basename($arquivo['name'][$nameIndicie])."' alt='' srcset=''>";
}
?>
<script>
    let i = 0;
    let nElem = 0;
    document.addEventListener("DOMContentLoaded", function() {
    nElem = document.querySelectorAll('.elem').length;
    });
    function funcUpdate(){
        console.log(nElem);
        let img = document.getElementById(`${i}`);
       if(i<nElem){
        
        if(i!=0){
          let imgAnterior = document.getElementById(`${i-1}`);  
          imgAnterior.classList.remove("ativa");
        }
        img.classList.toggle("ativa");
        
        i++;
       }else if (i>=nElem){
        let imgLast = document.getElementById(`${i-1}`);
        imgLast.classList.toggle("ativa");
        i = 0;
       
        
       }
    }
    setInterval(funcUpdate, 2000);

</script>



