var cariKategori = document.getElementById('cari-kategori');
var container = document.getElementById('container'); 

cariKategori.addEventListener('keyup', function(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'adminView/searchCategory.php?cariKategori='+ cariKategori.value, true);
    xhr.send();
});