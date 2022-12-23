<?php
  function sanitizeWord($word) {
    $vocals = [
      [ "accent" => "á", "normal" => "a" ],
      [ "accent" => "é", "normal" => "e" ],
      [ "accent" => "í", "normal" => "i" ],
      [ "accent" => "ó", "normal" => "o" ],
      [ "accent" => "ú", "normal" => "u" ],
    ];
    $res = $word;
    foreach ($vocals as $vocal) {
      $res = str_replace($vocal['accent'], $vocal['normal'], $res);
    }
    return $res;
  }
?>