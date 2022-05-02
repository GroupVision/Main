var add_mais = document.getElementById('add_mais');
var col_mais = document.getElementById('col_mais');
var col_mais2 = document.getElementById('col_mais2');
var col_mais3 = document.getElementById('col_mais3');

add_mais.onclick = function(){
    var novoCampo = document.createElement('input');
    novoCampo.setAttribute('type', 'email');
    novoCampo.setAttribute('id', 'email_colaborador');
    novoCampo.setAttribute('class', 'form-control');
    novoCampo.setAttribute('name', 'ckColaboradores[]');
    novoCampo.setAttribute('placeholder', 'example@gmail.com');
    novoCampo.setAttribute('style', "display: block");
    col_mais.appendChild(novoCampo);
}

function text(x){
    if(x == 0){
        document.getElementById('email_colaborador').style.display = "block";
        add_mais.style.display = "block";
        col_mais.style.display = "block";
     } else {
        document.getElementById('email_colaborador').style.display = "none";
        add_mais.style.display = "none";
        col_mais.style.display = "none";
    } 
    return;
}

function text2(x){
    if(x == 0) document.getElementById('select_parceria').style.display = "block";
    else document.getElementById('select_parceria').style.display = "none";
    return;
}

add_mais2.onclick = function(){
    var novoCampo = document.createElement('input');
    novoCampo.setAttribute('type', 'file');
    novoCampo.setAttribute('class', 'form-control');
    novoCampo.setAttribute('style', 'line-height: normal;');
    novoCampo.setAttribute('name', 'ckArquivos[]');
    col_mais2.appendChild(novoCampo);
}

add_mais3.onclick = function(){
    var novoCampo = document.createElement('input');
    novoCampo.setAttribute('type', 'text');
    novoCampo.setAttribute('class', 'form-control');
    novoCampo.setAttribute('name', 'ckLinks[]');
    col_mais3.appendChild(novoCampo);
}