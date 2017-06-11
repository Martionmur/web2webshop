function searchProd(text){
    //gibt array von img-thumbnails zurück
    var liste = document.getElementsByClassName("img-thumbnail");
    for(i=0, len=liste.length;i<len;i++){
        element = liste[i];
        if(element.getAttribute("alt").indexOf(text)>-1){
            element.parentNode.parentNode.setAttribute("display", "");
        }
        else{
            element.parentNode.parentNode.style("display", "none");
        }
    }
}