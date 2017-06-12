function searchProd(text){
    //gibt array von img-thumbnails zurück
    var liste = document.getElementsByClassName("img-thumbnail");
    for(i=0, len=liste.length;i<len;i++){
        element = liste[i];
        //indexOf gibt -1 zurück, wenn text nicht in Beschreibung ('alt') enthalten ist -> Case sensitive
        //wird anschließend per $.hide() entfernt.
        if((element.getAttribute("alt").indexOf(text))==-1){
            id=element.getAttribute("value");
            $( "#prod"+id).hide(200);
        }
        else{
            //wird der Text doch gefunden, wird das Element wieder sichtbar per $.show();
            id=element.getAttribute("value");
            $("#prod"+id).show(200);
        }
    }
}