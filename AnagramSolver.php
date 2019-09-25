<?php
	class AnagramSolver{
		//Function to compare two strings and return boolean if they are (or not) anagram of each other. The sequence of strings is not important
		function is_anagram($comp1, $comp2){
			return count_chars($comp1, 1) == count_chars($comp2, 1) ? true : false;
		}
		
		
		
		
		
		
		
		// Main function of class AnagramSolver which returns array of all possible anagrams
		function searchForAnagrams($input, $comparation){
			strlen($input) == 1 ? die("Input is too short, no anagrams can be found.") : null;	// If the length of input string is 1 - break;
			
			$allAnagrams				= array();							// Initialize an empty array to be filled with all possible anagrams
			$inputArray 				= str_split($input);				// Split input word into array, chunks of 1, char by char
			sort($inputArray);												// Sort the input array a-Z ascending
			$comparationArray			= explode(" ", $comparation);		// Turn dictionary into an array
			

			
			foreach ($comparationArray as $comp){							// Foreach loop for dictionary array
				$compArray				= str_split($comp);					// Split dictionary word into array, chunks of 1, char by char
				$comparationSorted		= $compArray;						// Pseudo-var for soring purpose
				sort($comparationSorted);									// Sorting the dictionary word (array) a-Z ascending
				$unSorted				= implode($compArray);				// Keep the unsorted (original) word from dictionary to be included into array if anagram is found
				
				
				// Compare the two arrays (input word array and dictionary word array)
				if(array_intersect($comparationSorted, $inputArray) === array_unique($comparationSorted)){
					$allAnagrams[]		= $unSorted;						// Place the unsorted word from dictionary into a return array
				}
			}
			
			
			return $allAnagrams;											// Return all anagrams as an array for use
		}
		
		
		
		
		
		
		
		
		function returnUniqueAnagramPairs($inputWord, $result, $returnArr = false){
			$paired					= array();															// We'll keep all already paired words in this array
			$returnArray			= array();
			
			
			for($i = 0; $i < count($result); $i++){														// Get the loop to go through all anagrams
				for($x = $i+1; $x < count($result); $x++){												// Compare the anagrams to find only unique
					
					
					
					if($this->is_anagram($result[$i]. $result[$x], $inputWord)){						// Check if word pair combines an anagram
						if(
							!in_array($result[$i], $paired) 											// Check if first word is already used
							&& 
							!in_array($result[$x], $paired)												// Check if second word is already used
						){
							// If all criteria is met - print out our unique two-pair anagram (if $returnArr is false - for test purposes)
							if($returnArr == false){													// If we only want to return an array and not to display content
								echo "\r\n\t". $result[$i]. " ". $result[$x];
							}
							
							$returnArray[]		= $result[$i]. " ". $result[$x];
							
							$paired[]		= $result[$i];												// Keep the first word in our array (not to be used on next occurence)
							$paired[]		= $result[$x];												// Keep the second word in our array (not to be used on next occurence)
						}
					}
					
				}
			}
			
			
			if($returnArr == true){
				return $returnArray; 																	// Return the array for tests
			}
		}
	}
	
	
	
?>