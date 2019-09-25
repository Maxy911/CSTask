<?php
	require_once __DIR__. "/../AnagramSolver.php";
	
	
	class AnagramSolverTest extends PHPUnit_Framework_TestCase{
		
		function test_returnUniqueAnagramPairs_short(){
			$AnagramSolver			= new AnagramSolver;
			$inputWord				= "a";
			$result 				= $AnagramSolver->searchForAnagrams($inputWord, "a");
			$testResult				= $AnagramSolver->returnUniqueAnagramPairs($inputWord, $result, true);
			
			$this->assertEquals("Input is too short, no anagrams can be found.", $testResult);
		}
		
		
		function test_returnUniqueAnagramPairs_OnePair(){
			$AnagramSolver			= new AnagramSolver;
			$inputWord				= "documenting";
			$result 				= $AnagramSolver->searchForAnagrams($inputWord, "ducting omen");
			$testResult				= $AnagramSolver->returnUniqueAnagramPairs($inputWord, $result, true);
			
			$this->assertEquals(["ducting omen"], $testResult);
		}
		
		
		function test_returnUniqueAnagramPairs_NoPair(){
			$AnagramSolver			= new AnagramSolver;
			$inputWord				= "documenting";
			$result 				= $AnagramSolver->searchForAnagrams($inputWord, "xyz");
			$testResult				= $AnagramSolver->returnUniqueAnagramPairs($inputWord, $result, true);
			
			$this->assertEquals([], $testResult);
		}
		
		
		
		function test_returnUniqueAnagramPairs_Pairs(){
			$AnagramSolver			= new AnagramSolver;
			$inputWord				= "documenting";
			$result 				= $AnagramSolver->searchForAnagrams($inputWord, "ceding mount coding unmet");
			$testResult				= $AnagramSolver->returnUniqueAnagramPairs($inputWord, $result, true);
			
			$this->assertEquals(["ceding mount", "coding unmet"], $testResult);
		}
	}
?>
