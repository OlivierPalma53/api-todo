<?php

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group("/api/v1", function(){
    $this->get("/todos", function(Request $request, Response $response, array $args){
        $table = $this->get("db")->table("tarefas");
        $result = $table->get();
        $todos = ["ToDoList" => $result];

        return $response->withStatus(200)->withJson($todos);

    });

    $this->post("/todos", function(Request $request, Response $response, array $args){

        $data = $request->getParsedBody();
        $todo = [];
        if(count($data['nome'])){
            //array_push($todo, $data['nome']);
            $todo = ["nome" => $data['nome']];
            $table =  $this->get("db")->table("tarefas");
            $tarefa = $table->insert($todo);
            $response->withStatus(200);//->withJson($tarefa);
            return $response;
        }

        $resposta = ["erro" => "falta o parametro nome"];
        $response = $response->withStatus(500)->withJson($resposta);
        return $response;

    });

    $this->delete("/todos/{id}", function(Request $request, Response $response, array $args){
       $id = $args['id'];
       $table = $this->get('db')->table("tarefas");
       $table->where('id', $id)->delete();
       return $response->withStatus(200);
    });
});

