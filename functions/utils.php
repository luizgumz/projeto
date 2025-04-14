<?php
    //funccoes auxiliares

    ///funcao que recebe os itens de data/itens.json e percorre esse vetor passando pela condição(if) de acordo com as preferências do usuário
    function filtrarItens($itens, $filtros) {
        return array_filter($itens, function ($item) use ($filtros) {
            foreach ($filtros as $chave => $valor) {
                if (!empty($valor) && stripos(strtolower($item[$chave]) , strtolower($valor)) === false) {
                    return false;
                }
            }
            return true;
        });
    }

    //funcao que percorre o vetor de itens e busca um item pela chave primaria id, só uma verificao simples
    function buscarItemPorId($id, $itens) {
        foreach ($itens as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }
?>