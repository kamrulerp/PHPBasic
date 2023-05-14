<?php

function playfairCipher($plaintext, $key) {
  // Generate the key square
  $keySquare = generateKeySquare($key);

  // Divide the plaintext into pairs of letters
  $pairs = createLetterPairs($plaintext);

  // Encrypt each pair of letters
  $ciphertext = implode('', array_map(function($pair) use ($keySquare) {
    return encryptPair($pair, $keySquare);
  }, $pairs));

  return $ciphertext;
}

function generateKeySquare($key) {
  // Remove duplicate letters from the key
  $key = preg_replace('/j/i', 'i', preg_replace('/[^a-z]/i', '', $key));
  $key = implode('', array_unique(str_split(strtolower($key))));

  // Create the key square
  $alphabet = 'abcdefghiklmnopqrstuvwxyz';
  $keySquare = $key . str_replace(str_split($key), '', $alphabet);

  return $keySquare;
}

function createLetterPairs($plaintext) {
  // Divide the plaintext into pairs of letters
  $plaintext = preg_replace('/j/i', 'i', preg_replace('/[^a-z]/i', '', $plaintext));
  if (strlen($plaintext) % 2 != 0) $plaintext .= 'x';
  $pairs = str_split(strtolower($plaintext), 2);

  return $pairs;
}

function encryptPair($pair, $keySquare) {
  // Find the positions of the two letters in the key square
  $pos1 = strpos($keySquare, $pair[0]);
  $pos2 = strpos($keySquare, $pair[1]);

  // Determine the row and column of each letter
  $row1 = (int)floor($pos1 / 5);
  $col1 = (int)$pos1 % 5;
  $row2 = (int)floor($pos2 / 5);
  $col2 = (int)$pos2 % 5;

  // Apply the rules to encrypt the pair
  if ($row1 == $row2) {
    $cipher1 = $keySquare[$row1 * 5 + ($col1 + 1) % 5];
    $cipher2 = $keySquare[$row2 * 5 + ($col2 + 1) % 5];
  } else if ($col1 == $col2) {
    $cipher1 = $keySquare[(($row1 + 1) % 5) * 5 + $col1];
    $cipher2 = $keySquare[(($row2 + 1) % 5) * 5 + $col2];
  } else {
    $cipher1 = $keySquare[$row1 * 5 + $col2];
    $cipher2 = $keySquare[$row2 * 5 + $col1];
  }

  return $cipher1 . $cipher2;
}


$plaintext = 'RSSPNTGNPDKCHMMGQKCHRIGRLGSY';
$key = 'PADMABRIDGE';

$ciphertext = playfairCipher($plaintext, $key);
//echo $ciphertext; // Output: 'rmfzhbxjgm'


/////// Decrypt ===============================================================;;;;;;;;;;;;;;;;;;;;;;;;;

function playfairDecrypt($ciphertext, $key) {
    // Generate the key square from the key
    $keySquare = generateKeySquares($key);
    
    // Preprocess the ciphertext
    $ciphertext = preg_replace('/[^a-z]/i', '', $ciphertext);
    $ciphertext = strtolower($ciphertext);

    // Split the ciphertext into digraphs
    $digraphs = str_split($ciphertext, 2);

    // Decrypt each digraph
    $plaintext = '';
    foreach ($digraphs as $digraph) {
        $char1 = $digraph[0];
        $char2 = $digraph[1];
        
        // Find the coordinates of each character in the key square
        $char1Coords = findCharInKeySquare($keySquare, $char1);
        $char2Coords = findCharInKeySquare($keySquare, $char2);
        
        // If both characters are in the same row, shift them left by one column
        if ($char1Coords['row'] == $char2Coords['row']) {
            $newCol1 = ($char1Coords['col'] + 4) % 5;
            $newCol2 = ($char2Coords['col'] + 4) % 5;
            $plaintext .= $keySquare[$char1Coords['row']][$newCol1] . $keySquare[$char2Coords['row']][$newCol2];
        }
        // If both characters are in the same column, shift them up by one row
        else if ($char1Coords['col'] == $char2Coords['col']) {
            $newRow1 = ($char1Coords['row'] + 4) % 5;
            $newRow2 = ($char2Coords['row'] + 4) % 5;
            $plaintext .= $keySquare[$newRow1][$char1Coords['col']] . $keySquare[$newRow2][$char2Coords['col']];
        }
        // Otherwise, form a rectangle and swap the first and second characters' columns
        else {
            $plaintext .= $keySquare[$char1Coords['row']][$char2Coords['col']] . $keySquare[$char2Coords['row']][$char1Coords['col']];
        }
    }

    return $plaintext;
}

// Helper function to generate the key square
function generateKeySquares($key) {
    $key = preg_replace('/j/i', 'i', $key);
    $key = preg_replace('/[^a-z]/i', '', $key);
    $key = strtolower($key);
    $keyChars = str_split($key);

    // Fill in the key square with the remaining letters of the alphabet
    $alphabet = 'abcdefghiklmnopqrstuvwxyz';
    $alphabetChars = str_split($alphabet);
    $keySquare = array();

    foreach ($keyChars as $keyChar) {
        if (!in_array($keyChar, $keySquare)) {
            $keySquare[] = $keyChar;
        }
    }

    foreach ($alphabetChars as $alphabetChar) {
        if (!in_array($alphabetChar, $keySquare)) {
            $keySquare[] = $alphabetChar;
        }
    }

    // Convert the key square to a 5x5 grid
    $keySquare = array_chunk($keySquare, 5);

    return $keySquare;
}

// Helper function to find the row and column of a character in the key square
function findCharInKeySquare($keySquare, $char) {
    $charRow = 0;
    $charCol = 0;

    // Find the row and column of the character in the key square
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            if ($keySquare[$i][$j] == $char) {
                $charRow = $i;
                $charCol = $j;
                break 2;
            }
        }
    }

    return array('row' => $charRow, 'col' => $charCol);
}




$ciphertext = 'RSSPNTGNPDKCHMMGQKCHRIGRLGSY';
$keys = 'PADMABRIDGE';

$plaintexts = playfairDecrypt($ciphertext, $keys);
echo $plaintexts; // Output: 'rmfzhbxjgm'


