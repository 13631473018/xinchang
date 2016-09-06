function iResultAlter (msg,url) {
    alert(msg);
    if(url){

        window.location.href = 'url';
        return false;
    }
    window.location.reload();
    return false;
}