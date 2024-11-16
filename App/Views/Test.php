<?php 
// JSON
$users = [
    '{"UserID" : 1, "POSTID" : 1 , "POST" : "Hoom nay toi rot do ... " }',
    '{"UserID" : 2, "POSTID" : 2 , "POST" : "Hoom nay toi rot do ... " }',
    '{"UserID" : 3, "POSTID" : 3 , "POST" : "Hoom nay toi rot do ... " }',
];

$users_array = [];
foreach ($users as $user){
    array_push($users_array, json_decode($user, true));

}
echo ('<pre>');
print_r($users);
echo ('</pre>');

echo ('<pre>');
var_dump($users_array);
echo ('</pre>');

foreach ($users_array as $user){
    echo $user['UserID'];
}
?>