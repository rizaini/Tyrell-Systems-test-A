<?php
// Get input from user
$num_players = readline("Enter the number of players: ");

// Validate input
if ($num_players <= 0) {
  die("Input value does not exist or value is invalid");
}

// Create deck of cards
$cards = array();
$suits = array("S", "H", "D", "C");
$faces = array("A", 2, 3, 4, 5, 6, 7, 8, 9, "X", "J", "Q", "K");
foreach ($suits as $suit) {
  foreach ($faces as $face) {
    array_push($cards, $suit.$face);
  }
}

// Shuffle deck
shuffle($cards);

// Deal cards
$num_cards_per_player = floor(count($cards) / $num_players);
$num_extra_cards = count($cards) % $num_players;
$current_player = 1;
foreach ($cards as $card) {
  if ($current_player <= $num_extra_cards) {
    $cards_per_player = $num_cards_per_player + 1;
  } else {
    $cards_per_player = $num_cards_per_player;
  }

  if (!isset($players[$current_player])) {
    $players[$current_player] = array();
  }
  array_push($players[$current_player], $card);

  if (count($players[$current_player]) == $cards_per_player) {
    $current_player++;
  }
}

// Print cards for each player
foreach ($players as $player => $cards) {
  echo "Player " . $player . ": " . implode(",", $cards) . "\n";
}
?>
