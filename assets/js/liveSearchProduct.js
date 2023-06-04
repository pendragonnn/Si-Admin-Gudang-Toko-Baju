var cariProduk = document.getElementById('cari-product');
var container = document.getElementById('container'); 

cariProduk.addEventListener('keyup', function(){
    // buat object ajax
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'adminView/searchProduct.php?cariProduk='+ cariProduk.value, true);
    xhr.send();
});