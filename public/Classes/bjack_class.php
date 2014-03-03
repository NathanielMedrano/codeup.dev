<?php

	class blackjack {

		function buildDeck($suits, $cards) {
			  shuffle($suits);
			  shuffle($cards);

			foreach ($suits as $key => $suit):
			       foreach ($cards as $c =>$card):
			             $variables[$suit][] = $card . '_' . $suit; 
			       endforeach;
			endforeach;

			return $variables;

		}

		// determine if a card is an ace
		// return true for ace, false for anything else
		function cardIsAce($card, $hand) {
		  
		  if ($card == 'A') {
		  	
		  	if (($hand + 11) <= 21) {
		  		return 11;
		  	} elseif (($hand + 1) <= 21)) {
		  		return 1;
		  	}


		  }

		}

		// determine the value of an individual card (string)
		// aces are worth 11
		// face cards are worth 10
		// numeric cards are worth their value
		function getCardValue($card) {
		  
		  	$card = $card[0];

			switch ($card) {

		    case 'A':
		        return 'A';
		        break;
		    case '2':
		        return 2;
		        break;
		    case '3':
		        return 3;
		        break;
		    case '4':
		        return 4;
		        break;
		    case '5':
		        return 5;
		        break;
		    case '6':
		        return 6;
		        break;
		    case '7':
		        return 7;
		        break;
		    case '8':
		       return 8;
		        break;
		    case '9':
		        return 9;
		        break;
		    case '10':
		         return 10;
		        break;
		    case 'J':
		        return 10;
		        break;
		    case 'Q':
		        return 10;
		        break;
		    case 'K':
		        return 10;
		        break;
			}

		}

		function getHandTotal($hand) {
		  
			$total = array_sum($hand);

			return $total;


		}

		// draw a card from the deck into a hand
		// pass by reference (both hand and deck passed in are modified)
		function drawCard(&$deck) {
		  		
		  	$count = count($deck);

		  	$rand = rand(1, &$count);

			$card = array_splice($deck, $rand);


		}

		// print out a hand of cards
		// name is the name of the player
		// hidden is to initially show only first card of hand (for dealer)
		// output should look like this:
		// Dealer: [4 C] [???] Total: ???
		// or:
		// Player: [J D] [2 D] Total: 12
		function echoHand($hand, $name, $hidden = false) {
		  


		}

	}