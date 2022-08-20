<?php
include_once "components/validate.php";

function outputUser(array $user = []) {
    foreach($user as $key => $request) {
        echo "[$key] => $request <br>";
    }
}

function validate(array $user = []): array {
    $rules = [
        'first_name' => [
            'type' => 'string', 'min' => 8, 'max' => 255, 'first_letter' => 'upper'
        ],
        'email' => [
            'type' => 'email',
        ],
        'password' => [
            'type' => 'password', 'min' => 8, 'max' => 255
        ]
    ];


    return validateHelper($rules, $user);
}