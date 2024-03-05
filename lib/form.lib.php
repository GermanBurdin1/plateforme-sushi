<?php

/**
 * Permet de vérifier tous les champs obligatoire d'un formulaire
 */
function checkFormRequiredsFields($data)
{
    $errors = [];
    foreach($data as $fields){

        if(isset($fields['requireds']))
        {
            foreach($fields['requireds'] as $requiredFieldName => $requiredFieldValue){
                if(empty($requiredFieldValue))
                {
                    $errors[$requiredFieldName] = "Ce champs est obligatoire.";
                }
            }
        }
    }

    return $errors;
}