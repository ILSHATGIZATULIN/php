<?php

$question = '';
$answers = [];
$result = '';


$steps = [
    [
        'id' => 1,
        'question' => 'Влево или вправо?',
        'answers' => [
            [
                'text' => 'Влево',
                'function' => 'next',
                'next_step' => 2,
            ],
            [
                'text' => 'Вправо',
                'function' => 'next',
                'next_step' => 2,
            ],
        ],
    ],
    [
        'id' => 2,
        'question' => 'Прыгать или бежать?',
        'answers' => [
            [
                'text' => 'Прыгать',
                'function' => 'endgame',

            ],
            [
                'text' => 'бежать',
                'function' => 'next',
                'next_step' => 3,
            ],
        ],
    ],

    [
        'id' => 3,
        'question' => 'Вперед или назад?',
        'answers' => [
            [
                'text' => 'Вперед',
                'function' => 'endgame',

            ],
            [
                'text' => 'назад',
                'function' => 'win',

            ],
        ],
    ],
];
function findNextStep ($id, $steps){
    $step =null; // создание переменой
    foreach ($steps as $_step){// цикл
        if ($_step ['id']==$id){ // если id шага желаемому
            $step =$_step; // запись в переменную
        }
    }
    return $step;
}
function generateQuestions($step){

    return $step ['question'];
}

function generateAnswers($step)
{
    return $step ['answers'];
}
if (isset ($_POST['submit'])) {
    $answer = json_decode( $_POST['answer'], true);
    if ($answer ['function']==='next'){
        $step = findNextStep($answer['next_step'], $steps);
        $question = generateQuestions($step);
        $answers = generateAnswers($step);
    } else if ($answer['function']==='endgame') {
        $result = 'вы проиграли';
    } else if ($answer['function']==='win'){
            $result = 'вы победили';
        }

} else {
    $step = findNextStep(1, $steps);
    $question = generateQuestions($step);
    $answers = generateAnswers($step);
}