<?php


function generaCartelFormacion($titulo,$AF,$G){

    //$templateWord = new \vendor\vendor\phpoffice\phpword\src\PhpWord\TemplateProcessor("../plantillas/Cartel Aula.docx");
    $templateWord = new TemplateProcessor("../plantillas/Cartel Aula.docx");

    $TituloDelCurso = $titulo;
    $Accion = $AF;
    $grupo = $G;

    $templateWord->setValue('TituloDelCurso',$TituloDelCurso);
    $templateWord->setValue('AF',$Accion);
    $templateWord->setValue('G',$grupo);

    $templateWord->saveAs('cartel.docx');
}

?>