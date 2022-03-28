<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonService 
{

    const STATUS_INICIADA = 1;  
    const STATUS_EM_PROCESSO = 2;
    const STATUS_FINALIZADA = 3;

    public function validatorCPF($cpf, $id) {
        return Person::where('cpf', $cpf)->where('id', '<>', $id)->count();
    }

    public function getAll() {
        try {
        $data = Person::with('status')->get();
        return $data;
        } catch (\Exception $e) {  
            return $e->getMessage();
        }
    }

    public function get($id) {
        try {
            $data = Person::find($id);
            $status = $data->status->first();
            $descricao = $status->description;
            $data->description = $descricao;
            return $data;
        } catch (\Exception $e) {  
            return $e->getMessage();
        }
    }

    public function create($request) {
        try {
            $data['name'] = $request['name'];
            $data['cpf'] = $request['cpf'];
            $data['email'] = $request['email'];
            $data['phone'] = $request['phone'];
            $data['status_id'] = self::STATUS_INICIADA;
            Person::create($data);
        } catch (\Exception $e) {  
            return $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            Person::find($id)->delete();
        } catch (\Exception $e) {  
            return $e->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            $data['name'] = $request['name'];
            $data['cpf'] = $request['cpf'];
            $data['email'] = $request['email'];
            $data['phone'] = $request['phone'];
            Person::find($id)->update($data);
        } catch (\Exception $e) {  
            return $e->getMessage();
        }
    }

    public function changeStatus($id, $statusId) {
        try {
            $data['status_id'] = $statusId;
            Person::find($id)->update($data);
        } catch (\Exception $e) {  
            return $e->getMessage();
        }
    }

}