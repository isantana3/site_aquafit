<?php

namespace App\core;

/**
 * Esta classe é responsável por instanciar um model e chamar a view correta
 * passando os dados que serão usados.
 */
class Controller
{
    /**
     * Este método é responsável por chamar um determinado model
     *
     * @param  string  $model   É o model que será instanciado para usar em uma view, seja seus métodos ou atributos
     */
    public function model($model)
    {
        require 'App/models/' . $model . '.php';
        $classe = 'App\\models\\' . $model;
        return new $classe();
    }
    /**
     * Este método é responsável por chamar uma determinada view (página).
     *
     * @param  string  $view   A view que será chamada (ou requerida)
     * @param  array   $data   São os dados que serão exibido na view
     */
    public function view(string $view, $data = [])
    {
        // header('location: ../App/views/ ' . $view . '.php');
        require 'App/views/' . $view . '.php';
    }
    /**
     * Este método é herdado para todas as classes filhas que o chamaram quando
     * o método ou classe informada pelo usuário não forem encontrados.
     */
    public function page_not_found()
    {
        $this->view('error404');
    }
}
