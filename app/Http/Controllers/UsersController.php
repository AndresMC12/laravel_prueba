<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class UsersController extends BaseController
{
    //Creacion de controladores: 
    // se crearon dos controladores los cuales obtendran la informacion de una base datos dada por la api conectados.
    //el controlador index tendra el control en el acceso con un token y se el que enviara al codigo index los datos de diversos usuarios y mostrarlos en la tabla.
    public function index(){
        $data['title'] = 'Test';
        $data['info'] = [];
        $response = [];
        
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9eyJ0ZXN0IjozMjE0MTIsInVzZXIiOiJmM3IyIn0NcPLPRLSvfszQwtxZLyypsm3Y56ELRdppqYXDv2Hagk'; //token de seguridad, sin este token no se puede acceder a la informacion
        $client = new Client([
            'base_uri' => 'https://test.conectadosweb.com.co'
        ]);
        try {
            $response = $client->request('GET', "/users/{$token}");          //El control de errores,  esta seccion de codigo obtiene la informacion de la base de datos siempre y cuando el token este en la url
            $data['info'] = json_decode($response->getBody()->getContents());//de lo contrario arrojara el error de token incorrecto.
        } catch (\Throwable $th) {
            $response = [
                'statusCode' => 401,
                'message' => $th->getMessage(),
                'userMessage' => 'Token incorrecto.'
            ];
        }
        // dd($response['userMessage']);
        return view('users.index',$data);                                    //El envio de datos genericos de cada uno de los usuarios a la vista web
    }
    // El segundo controlador redirecciona a cualquier usuario al historial de transacciones con client_id
    public function showDetails($client_id){
        $data['title_card'] = 'Users Details';
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9eyJ0ZXN0IjozMjE0MTIsInVzZXIiOiJmM3IyIn0NcPLPRLSvfszQwtxZLyypsm3Y56ELRdppqYXDv2Hagk';
        $client = new Client([
            'base_uri' => 'https://test.conectadosweb.com.co'
        ]);
        
        $response = $client->request('GET', "users/{$token}/transaction/{$client_id}"); 
        $data['details_urs'] = json_decode($response->getBody()->getContents());   //configuracion de la respuesta en la url que redireccionar al historial de transaccion del usuario
        // dd($data['details_urs']);
        return view('users.details_users',$data);
    }
}