//FUNÇÃO PARA MENSAGENS

function mensagem(msg, url){
    alert(msg);
    document.location = url;
}



//FUNÇÃO PARA EXCLUSÃO DE OBJETOS

function excluir(id, tipo, item) {
    switch(tipo){
        case 'usuario':
                var resp = confirm('Deseja realmente excluir o usuário '+ item +'?');
                if(resp){
                    document.location = "admin/control/excluir_usuario.php?id="+id;
                }
            break;
        case 'documento':
                var resp = confirm('Deseja realmente excluir o registro do documento Nº '+ item +'?');
                if(resp){
                    document.location = "admin/control/excluir_documento.php?id="+id;
                }
            break;
    
    }
}