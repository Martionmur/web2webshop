function searchProd(text){
    //gibt array von img-thumbnails zurück
    var liste = document.getElementsByClassName("img-thumbnail");
    for(i=0, len=liste.length;i<len;i++){
        element = liste[i];
        //indexOf returns -1 if text never occurs in "alt" of Thubmnail
        if((element.getAttribute("alt").indexOf(text))==-1){
            id=element.getAttribute("value");
            document.getElementById("prod"+id).style.display='none';
        }
        else{
            id=element.getAttribute("value");
            document.getElementById("prod"+id).style.display="";
        }
    }
}