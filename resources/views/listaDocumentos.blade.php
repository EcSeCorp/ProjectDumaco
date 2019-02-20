@extends('layouts.index')

@section('content')
<div class="container-fluid">
                <table>
                                <caption>Lista de Documentos</caption>
                                <thead>
                                    <tr>
                                    <th scope="col">Documento</th>
                                    <th scope="col">P. Avance</th>
                                    <th scope="col">P. Aprobado</th>
                                    <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="miTabla">
                                        @foreach($documentosprueba as $doc)
                                        <form method="POST" action = "{{ route('mostrardocumento') }}" target="_blank">
                                            <tr>
                                                <td scope="row">{{ $doc->VC_NOMBRE_DOCUMENTO}}</td>
                                                <td>100</td>        
                                                <td>100</td>
                                                <td>
                                                <input type="hidden" name = "id_doc" value="{{ $doc->CH_ID_DOCUMENTO}}" />
                                                <input type="hidden" name = "id_tarea" value = "{{ $tarea->CH_ID_LINK}}"/>
                                                <a><input type="submit" value="D"></a>
                                                </td>
                                            </tr>
                                            </form>
                                        @endforeach 
                                    </tbody>
                </table>
</div>
@endsection
