var cariPesanan = document.getElementById('cari-pesanan');
var container = document.getElementById('container');

cariPesanan.addEventListener('keyup', function(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'adminView/searchOrder.php?cariPesanan='+ cariPesanan.value, true);
    xhr.send();
});