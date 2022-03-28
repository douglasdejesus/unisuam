<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Services\PersonService;
use Log;

class PersonController extends Controller
{
    protected $service;

    public function __construct(PersonService $service)
    {
        $this->service = $service;
    }

    public function getAll() {
        $data = $this->service->getAll();
        return response()->json($data, 200);
    }
  
    public function create(PersonRequest $request) {
        $this->service->create($request);
        return response()->json([
            'message' => "Registro inserido com sucesso!",
            'status' => true
        ], 200);
    }
  
    public function delete($id) {
        $this->service->delete($id);
        return response()->json([
            'message' => "Registro excluído com sucesso!",
            'status' => true
        ], 200);
    }
  
    public function get($id) {
        $data = $this->service->get($id);
        return response()->json($data, 200);
    }
  
    public function update(PersonRequest $request, $id) {
        $qtd = $this->service->validatorCPF($request['cpf'], $id);
        if ($qtd > 0) {
            return response()->json([
                'message' => "Este CPF já esta sendo usado!",
                'status' => false
            ], 200);
        }
        $this->service->update($request, $id);
        return response()->json([
            'message' => "Registro atualizado com sucesso!",
            'status' => true
        ], 200);
    }

    public function changeStatus($id, $statusId) {
        $this->service->changeStatus($id, $statusId);
        return response()->json([
            'message' => "Status alterado com sucesso!",
            'status' => true
        ], 200);
    }
}
