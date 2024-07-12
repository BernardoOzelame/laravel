<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller {
    public function index() {
        $dados = Funcionario::all();
        return view('funcionarios/index', [ 
            'funcionarios' => $dados,
        ]); 
    }

    public function cadastrar() {
        return view('funcionarios/cadastrar');
    }

    public function gravar(Request $form) {
        $dados = $form->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'departamento' => 'required',
            'salario' => 'required|decimal:0,3'
        ]);
        Funcionario::create($dados);
        
        return redirect()->route('funcionarios');
    }

    public function editar(Funcionario $func) {
        return view('funcionarios/editar', ['func' => $func]);
    }

    public function editarGravar(Request $form, Funcionario $func){
        $dados = $form->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'departamento' => 'required',
            'salario' => 'required|decimal:0,3'
        ]);

        $func->fill($dados);
        $func->save();
        return redirect()->route('funcionarios');
    }

    public function apagar (Funcionario $func){  // mostra na tela para o usuário confirmar
        return view('funcionarios/apagar', [
            'funcionario' => $func,
        ]);
    }

    public function deletar (Funcionario $func){  // efetivamente apaga os dados do banco
        $func->delete();
        return redirect()->route('funcionarios');
    }
}
