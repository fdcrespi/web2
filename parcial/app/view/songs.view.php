<?php

class SongsView{
    function response($msg){
        echo ($msg);
    }

    function showSongsByAlbum($songs, $album, $totalReproductions){
        echo ("imprime el nombre del album $album->nombre y la cantidad de reproducciones $totalReproductions->total");
        echo ("imprime las concaciones de un album ");
    }
}