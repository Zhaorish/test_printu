<?php
//#1 task
//my code start
function hashOrder($number) {
   $hash = (($number * 96827451) % 10000000);
   return sprintf('%07u', $hash);
}
//my code end


//Test start
$unique = [];

echo "Starting test ....".PHP_EOL;
$start = microtime(true);

for ($i=1; $i<=9999999; $i++) {
  $result = hashOrder($i);

  if (!preg_match("/^[0-9]{7}$/", $result)) {
    throw new InvalidArgumentException("Result {$result} does not match regex");
  }

  if (!empty($unique[$result])) {
    throw new InvalidArgumentException("Colision detected for key {$i}:{$unique[$result]} and result {$result}");
  }

  $unique[$result] = $i;
}

$time_elapsed_secs = microtime(true) - $start;

if ($time_elapsed_secs > 60) {
  throw new InvalidArgumentException("Could not finish test in 60 seconds");
}

echo "Finished in {$time_elapsed_secs}";
//end of #1 task

//#2 task
//my code start
function findUniqueString($string_name){
   $string_name_arr = str_split($string_name);
   if (count($string_name_arr) <= 100000){
      if (preg_match("#^[a-z]*$#", $string_name)) {
         $counted_values = array_count_values($string_name_arr);
         foreach ($counted_values as $key => $value){
            if($value == 1){
               $first_unique_letter = $key;
               $number_of_first_unique_letter = array_search($key, $string_name_arr);
               return $number_of_first_unique_letter+1;
            }
         }
         return -1;
      } else {
         return "Proszę używać tylko małych angielskich liter";
      }
   } else{
      return "Wiersz za duży! nie więcej niż 100 000 znaków";
   }
}
//my code end

//test start
echo findUniqueString('hashthegame');
//end of #2 task
