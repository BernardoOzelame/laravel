<?php

namespace App\Http\Controllers;

use App\Mail\FuncionarioCadastrado;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FuncionariosController extends Controller {
    public function index() {
        $dados = Funcionario::get(); 
        // eloquent = comandos da model (get(), create(), where(), orderBy(), all())
        // get() = acesso normal aos não apagados
        // onlyTrashed()->get() = pega apenas os dados que foram apagados 
        // withTrashed()->get() = pega todos os dados (mesmo apagados)
        return view('funcionarios/index', [ 
            'funcionarios' => $dados,
        ]); 
    }

    public function cadastrar() {
        return view('funcionarios/cadastrar');
    }

    public function gravar(Request $form) {
        $img = $form->file('imagem')->store('funcionarios', 'imagens');
        
        $dados = $form->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'departamento' => 'required',
            'salario' => 'required|decimal:0,3',
            'imagem' => 'required'
        ]);
        $dados['imagem']= $img;

        // Funcionario::create($dados);
        
        Mail::to('alguem@batata.com')->send(new FuncionarioCadastrado());
        return;

        // return redirect()->route('funcionarios');
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
