<?php 
/**
 *  De maneira resumida são esses códigos que fazem as URL's amigáveis funcionarem
 */
    require_once "generic/autoload.php"; #carregamento do autoloader
    
    $param = $_GET['param'] ?? 'tarefa/listar';
    $parts = explode("/", $param);
    $controller = $parts[0] ?? 'tarefa';
    $action = $parts[1] ?? 'listar';
    $id = $parts[2] ?? null;

    $controllerClass = ucfirst($controller). "Controller";
    $actionMethod = $action ?? "listar";

    if (class_exists($controllerClass) && method_exists($controllerClass, $actionMethod)){
        $ctrl = new $controllerClass();
        if ($id) {
            $ctrl->$actionMethod($id);
        } else {
            $ctrl->$actionMethod();
        }
    } else {
        echo "Rota inválida!";
    }
?>