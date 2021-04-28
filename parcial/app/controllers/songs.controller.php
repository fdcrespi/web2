<?php

include_once 'app/models/song.model.php';
include_once 'app/models/album.model.php';
include_once 'app/models/artist.model.php';
include_once 'app/helpers/auth.helper.php';

class SongsController{
    
    private $modelSong;
    private $modelAlbum;
    private $view;
    private $authHelper;
    private $modelArtist;

    function __construct(){
        $this->modelSong = new SongModel();
        $this->modelAlbum = new AlbumModel();
        $this->modelArtist = new ArtistModel();
        $this->view = new SongsView();
        $this->authHelper = new AuthHelper();
    }

    /** obtiene las canciones de un album pasado por parametro */
    function getSongsByAlbum($idalbum){
        $album = $this->modelAlbum->get($idalbum);
        if (empty($album)){
            $this->view->response("No existen albunes con ese id");
            die();
        }
        $songs = $this->modelSong->getSongsByAlbum($idalbum);
        $totalReproductions = $this->modelSong->totalReproductions($idalbum);
        if ($songs){
            $this->view->showSongsByAlbum($songs, $album, $totalReproductions);
        } else {
            $this->view->response("No existen canciones con ese album");  
        }

    }

    /** Elimina una cancion */
    function deleteSong($idSong){
        $success = $this->modelSong->remove($idSong);
        if ($success){
            $this->view->response("Cancion eliminada Eliminada");
        } else {
            $this->view->response("La Cancion no se pudo eliminar");
        }
    }

    /** Agrega un artista */
    function addArtist(){
        if ($this->authHelper->checkLogin()){
            // Me quedo con los campos que vienen del formulario
            $nombre = $_POST['nombre'];
            $destacado = $_POST['destacado'];
            $campos = array($nombre, $destacado);
            if (!($this->comprobarCampos($campos))){
                $this->view->response('Debe completar todos los campos');
                die();
            }
            if ($nombre == $this->modelArtist->getByName($nombre)->nombre){
                $this->view->response('Ya existe un Artista con ese Nombre');
                die();
            }
            $sucess = $this->modelArtist->insert($nombre, $$destacado);
            if ($sucess){
                $this->view->response("Artista insertado con existo");
            } else {
                $this->view->response("El artista no puede insertarse");
            }
        }else{
            $this->view->response("Debe estar registrado para realizar esta acción");
        }
    }

    /** comprueba que todos los campos del arreglo $campos esten completos */
    function comprobarCampos($campos){
        foreach($campos as $campo){
            if (empty($campo)){
                return false;
                die();
            }
        }
        return true;
    }

}