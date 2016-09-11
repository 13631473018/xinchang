function iResultAlter (msg,url) {
    alert(msg);
    if(url){
        window.location.href = 'url';
        return false;
    }
    window.location.reload();
    return false;
}

function dele(t){
    return confirm("您真的要删除"+t+"吗？");
}