var cariSize = document.getElementById('cari-size');
var container = document.getElementById('container'); 

cariSize.addEventListener('keyup', function(){

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'adminView/searchSize.php?cariSize='+ cariSize.value, true);
    xhr.send();
});