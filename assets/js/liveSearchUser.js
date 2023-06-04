var cariUser = document.getElementById('cari-user');
var container = document.getElementById('container'); 

cariUser.addEventListener('keyup', function(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'adminView/searchUser.php?cariUser='+ cariUser.value, true);
    xhr.send();
});