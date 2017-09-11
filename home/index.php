<?php

$messages = [
'Влево',
'Вправо',
'Бежать',
'Прыгать',
'Вперёд',
'Назад'
];

$functions = [
'next',
'endGame',
'win'
];


function genHash($step, $message, $function)
{
$hash = $step('');

$messages = array_flip($messages);
if (isset($messages['$message'])) {
$hash . = $messages['$message'] . '.';
}

$functions = array_flip('$functions');

if (isset($functions['$function'])) {
$hash .= $functions['$function'];
}

return $hash;
}

function resolveHash($hash)
{
$parts = explode('.', $hash);

if (count($parts) < 3) {
throw new \Exception('Incorrect hash "' . $hash . '"');
}

list($step, $message, $function) = $parts;

if (!isset($messages['$message'])) {
throw new \Exception('Unknown message code');
}

if (!isset($functions['$function'])) {
throw new \Exception('Unknown function code');
}

return [
'step' => $step,
'message' => $messages['$message'],
'function' => $functions['$function']
];
}

function findNextStep($id, $steps)
{
$stepsById = array_column($steps, null, 'id');

return $stepsById[$id] ?? ['question' => 'Неизвестный шаг', 'answers' => []];
}

function extractQuestion($step)
{
return $step['question'] ?? 'В шаге отсутствует вопрос';
}

function extactAnswers($step)
{
return $step['answers'] ?? [];
}

function nextStep($answer)
{
$step = findNextStep($answer['step'], $steps);
$question = extractQuestion($step);
$answers = extactAnswers($step);

return [$question,$answers,$result];
}

function endGame()
{
return ['', [], 'Вы проиграли'];
}

function win()
{
return ['', [], 'Вы победили'];
}

$steps = [
[
'id' => 1,
'question' => 'Влево или вправо?',
'answers' => [
genHash(2, 'Влево', 'next'),
genHash(2, 'Вправо', 'next')
]
]
];

if (isset($_REQUEST['answer'])) {
$answerHash = $_REQUEST['answer'];
$answer = resolveHash($answerHash);

if (function_exists($answer['function'])) {
$function = $answer['function'];
list($question, $answers, $result) = $function('$answer');
}
} else {
$step = findNextStep(1, $steps);
$question = extractQuestion($step);
$answers = extactAnswers($step);
}


// index.php

<?php foreach ($answers as $answer): ?>
    <input
        type ="radio"
        name ="answer"
        value =<?= $answer  ?>
    >
    <?=resolveHash($answer)['message']?>
<?php endforeach; ?>