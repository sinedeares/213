<?php
/**
 *
 * RULES is array RULE
 * RULE:
 *     'type' => 'string' | 'email' | 'integer'
 *     'min'  => 0
 *     'max'  => 255
 *     'first_letter' => 'upper' | 'lower' | 'unset'
 * @param array $rules
 * @param array $data
 * @return array
 */
function validateHelper(array $rules = [], array $data = []): array {
    $error = [];
    foreach($data as $key => $item) {
        $rule = $rules[$key];

        foreach ($rule as $name_rule => $value) {
            switch ($name_rule) {
                case 'type':
                    switch ($value) {
                        case 'email':
                            if (filter_var($item, FILTER_VALIDATE_EMAIL) === false) {
                                $error[] = "Не соответствует тип у поля $key. Должен быть: $value";
                            }
                            break;

                        case 'password': break;

                        default:
                            if (gettype($item) != $value) {
                                $error[] = "Не соответствует тип у поля $key. Должен быть: $value";
                            }
                    }
                    break;
                case 'min':
                    if (mb_strlen($item) < $value) {
                        $error[] = "Поле: $key должно быть минимум $value симоволов";
                    }

                    break;
                case 'max':
                    if (mb_strlen($item) > $value) {
                        $error[] = "Поле: $key должно быть максимум $value симоволов";
                    }
                    break;
                case 'first_letter':
                    $first_letter = $item[0];

                    switch ($value) {
                        case "upper":
                            if ($first_letter !== mb_strtoupper($first_letter)) {
                                $error[] = "В поле $key первый символ, должен быть с большой буквы";
                            }
                            break;


                    }

                break;
            }
        }
    }

    $is_success = true;
    if (count($error) > 0) {
        $is_success = false;
    }

    return [
        'is_success' => $is_success,
        'error' => $error
    ];
}

function validate_min(string $data = '', int $min = 6): bool
{
    return mb_strlen($data) >= $min;
}

function validate_type($data, string $type = 'string'): bool {
    switch ($type) {
        case "email":
            return filter_var($data, FILTER_VALIDATE_EMAIL);
        case "password":
            return gettype($data) === "string";
        default:
            return gettype($data) === $type;
    }
}





















//function validate_min($data, int $min = 0): bool {
//    return mb_strlen($data) < $min;
//}
//
//function validate_max($data, int $max = 0): bool {
//    return mb_strlen($data) > $max;
//}
//
//function validate_type($data, string $type = 'string'): bool {
//    switch ($type) {
//        case 'email':
//            if (filter_var($data, FILTER_VALIDATE_EMAIL) === false) {
//                return false;
//            }
//            break;
//
//        case 'password': break;
//
//        default:
//            if (gettype($data) != $type) {
//                return false;
//            }
//    }
//    return true;
//}