
<?php
    //funccoes auxiliares

    ///funcao que filtra o array itens usando filtros e retorna um bool
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

    //funcao que busca um item pela chave primaria id, só uma verificao simples
    function buscarItemPorId($id, $itens) {
        foreach ($itens as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

?>