<?php

/**
 * Converte o formato da data USA para o formato BR
 * Se o segundo parametro for 'true', retorma também a hora no formato BR
 * 
 * @param [type] $data
 * @param boolean $mostrar_hora
 * @return void
 */
function toDataBR($data, $mostrar_hora = false){
    return $mostrar_hora ? date('d/m/Y H:i:s', strtotime($data)) : date('d/m/Y H:i:s', strtotime($data)); 
}