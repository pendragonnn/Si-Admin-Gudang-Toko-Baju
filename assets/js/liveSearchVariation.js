var cariVariasi = document.getElementById('cari-variasi');
var container = document.getElementById('container');

cariVariasi.addEventListener('keyup', function(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'adminView/searchVariation.php?cariVariasi='+ cariVariasi.value, true);
    xhr.send();
});