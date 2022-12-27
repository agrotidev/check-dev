<?php

namespace App\Http\Controllers\Admin\Imports;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DepartamentoImportController extends Controller
{
    public function index()
    {
        return view('admin.pages.imports.departamento.index');
    }

    public function importExcel(Departamento $departamento, Request $request)
    {
        // dd($request->file('file')->getClientOriginalExtension());


        $validator = Validator::make($request->all(), [
            'file' => 'required|max:5000|mimes:xlsx,xls'

        ]);

        if ($validator->passes()) {

            // $dateTime = date('Ymd_His');
            $file = $request->file('file');
            // $fileName = $dateTime . '-' . $file->getClientOriginalName();
            // $savePath = public_path('/upload/');
            // $file->move($savePath, $fileName);


            $arquivo =  IOFactory::load($file);
            $data = $arquivo->getActiveSheet()->toArray();
            $line=0;
            $created=0;
            $updated=0;


            foreach ($data as $item)
            {          
                // Se as quantidades de colunas estiverem corretas
                if (count($item)==2)
                {
                    // Se a linha for zero desconsidero      
                    if ($line==0)
                    {

                    }
                    // Pego somente os dados que estão na planilha
                    if ($line>0 and $line <=3)
                    {
                        // Crio as variaveis correspondente para cada linha coluna
                        $cod_departamento = $item[0];
                        $nome = $item[1];

                        // echo " $cod_departamento | nome | $ativo <br>";

                        // Consulto o departamento pelo codigo da importação
                        $depart = $departamento->where('cod_departamento', $cod_departamento)->first();
                        
                        // Verifico se já existe o departamento no sistema
                        if (!empty($depart))
                        {   
                            // Se nome do departamenot estiver sido alterado, então ignora a alteração
                            if ($depart->nome != $nome) {

                            } else {
                                // Se existe atualizo o departamento
                                $depart->update([
                                    'cod_departamento' => $cod_departamento,
                                    'nome' => $nome,
                                ]);
                            }
                            
                            $updated++; 
                        } else {   
                            // Se não existe crio o departamento                                                 
                            $departamento->create([
                                'cod_departamento' => $cod_departamento,
                                'nome' => $nome,
                            ]);
                            $created++;                           
                        }

                    }
                    $line++;
                } else 
                {
                    return redirect()->back()->with(['error' => 'importacão invalida!']);
                }
            } 
            
            return redirect(route('admin.departamento.index'))->with(['success' => "Foi criando $created registros e atualizado $updated registro"]);
            // return redirect()->back()->with(['success' => $request->file('file')->getClientOriginalExtension()]);
        } else {
            return redirect()->back()->with(['error' => "Erro ao atualizar no arquivo tipo ".$request->file('file')->getClientOriginalExtension()]);
        }
    }
}
