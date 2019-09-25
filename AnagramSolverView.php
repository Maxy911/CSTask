<?php
	require_once __DIR__. "/AnagramSolver.php";
	
	
	$dict					= file_get_contents("./english_58000_lowercase.txt");				// Load the contents of dictionary file
	$dictArray				= str_replace("\r\n", " ", $dict);									// Replace new lines by space \r\n  --> " "
	
	$AnagramSolver			= new AnagramSolver;												// Initialize the class
	$inputWord				= "documenting";													// Provide the input word to be searched for anagrams
	$result 				= $AnagramSolver->searchForAnagrams($inputWord, $dictArray);		// Parse input word and dictionary to our class method to return array of anagrams
	
	
	
	
	echo "<pre>";																				// Basic browser-pretty formatting of arrays
	echo "Two-word anagrams of “".$inputWord."” are:";
	$AnagramSolver->returnUniqueAnagramPairs($inputWord, $result, false);						// Print out all two-pair anagrams (false if for returning content and not an array)
	echo "</pre>";
?>