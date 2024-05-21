<?php
$name = (string)readline("Enter name: ");

$nationalizeApi = "https://api.nationalize.io/?name=$name";
$nationalizeData = file_get_contents($nationalizeApi);
$nationalizeData = json_decode($nationalizeData);

$nationalizeProbability = $nationalizeData->country[0]->probability;
$nationalizeProbability = number_format($nationalizeProbability * 100);

echo "There is a $nationalizeProbability% chance that $name is from {$nationalizeData->country[0]->country_id}\n";

$ageApi = "https://api.agify.io?name=$name";
$ageData = file_get_contents($ageApi);
$ageData = json_decode($ageData);


if ($ageData->age == null) {
    echo "No age data for $name\n";
} else {
    echo "The average age of $name is $ageData->age years old\n";
}

$genderApi = "https://api.genderize.io?name=$name";
$genderData = file_get_contents($genderApi);
$genderData = json_decode($genderData);

$genderProbability = number_format($genderData->probability * 100);
echo "Name $name is $genderProbability% $genderData->gender\n";