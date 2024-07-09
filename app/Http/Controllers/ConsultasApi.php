<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class ConsultasApi extends Controller
{
    public function consultaCnpj(String $cnpj)
    {


        $client = new Client();
        $data = [];

        try {
            $response = $client->get("https://receitaws.com.br/v1/cnpj/{$cnpj}");

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $data = json_decode($response->getBody(), true);
            } else {
                $data = ['mensagem' =>  "Erro na requisição. Código de status: {$statusCode}"];
            }
        } catch (Exception $e) {
            $data = ['mensagem' => "Erro ao fazer a requisição: " . $e->getMessage()];
        }

        // Retorne os dados como JSON
        return response()->json($data);
    }

    public function consultaCep(String $cep)
    {


        $client = new Client();

        try {
            $response = $client->get("https://viacep.com.br/ws/$cep/json/");

            $statusCode = $response->getStatusCode();

            $data = [];


            if ($statusCode == 200) {
                $data = json_decode($response->getBody(), true);
            } else {
                $data = ['mensagem' =>  "Erro na requisição. Código de status: {$statusCode}"];
            }
        } catch (Exception $e) {
            $data = ['mensagem' => "Erro ao fazer a requisição: " . $e->getMessage()];
        }

        // Retorne os dados como JSON
        return response()->json($data);
    }
}
