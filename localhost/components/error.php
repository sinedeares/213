<?php

function outputError(array $errors = []) {
    echo "<pre style='padding: 20px; background: red; color: white; font-size: 2em;'>";

    foreach ($errors as $error) {
        echo $error . "<br>";
    }

    echo "</pre>";
}