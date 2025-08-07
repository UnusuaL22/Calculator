<?php
$num = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'display-num':
            if(isset($_POST['value'])) {
                $num = $_POST['value'];
                echo htmlspecialchars($num); 
            } 
            break;
        case 'clear':
            $num = '0';
            echo htmlspecialchars($num);
            break;
        case 'calculate':
            if(isset($_POST['value'])) {
                $equation = $_POST['value'];
                $equation = str_replace(['×', '÷' , '−'], ['*', '/', '-'], $equation);
                
                $result= eval('return ' .$equation . ';');
                echo htmlspecialchars($result);
            }
            break;
    default:
            echo 'Invalid action';
            break;
    }
}
?>

