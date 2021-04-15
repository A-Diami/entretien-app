@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn bg-dark text-white mb-2" href="{{route('entretien')}}">Retour</a>
    <div class="table-responsive-xxl">
        <table class="table text-cente">
        <thead id=header>
            <th>Participants</th>
            <th>Date entretien</th>
            <th>Debut de stage</th>
            <th>Photo</th>
            <th class="text-center">Actions</th>
 	</thead>
 	<tbody style="background-color: #F4F6F7;">
 		 @foreach ($entretiens as $entretien )
                        <tr>
                            
                            <td>{{ $entretien->participants }}</td>
                            <td>{{ $entretien->created_at->format('d/m/Y') }}</td>
                            <td>{{ $entretien->dateDebut }}</td>
                            <td class="text-center">
                                @if ($entretien->image)
                                    <img src="{{ asset('photo/' .$entretien->image ??  'photo/default.png')}}"  style="height: 50px" />

                                @endif
                            </td>
                            <td class="text-center">
                               <!-- Button trigger modal -->
                                <a href="" class="show-modal btn btn-success mr-2" data-toggle="modal"  data-target="#exampleModal{{ $entretien->id }}">
                                    View
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $entretien->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color:#e74c3c;"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="ui">
                                    
                                           
                                                <div class="table-responsive-xxl ">
                                                    <table class="table text-white">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Participants:</span> {{  $entretien->participants }}</th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Date d'entretrien:</span> {{ $entretien->created_at->format('d/m/Y a H:m')}}</th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Mail:</span> {{  $entretien->mail }} </th>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Connaissance DEFAR Sci: </span><br/>  {{  $entretien->connaissance_defarsci }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Vos atouts: </span> <br/> {{  $entretien->atouts }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Objectifs: </span> <br/>  {{  $entretien->objectifs }} </th>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Presentation:</span> <br/> {{  $entretien->presentation }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Qu'attendez-vous de DEFARSCI:</span> <br/> {{  $entretien->part }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Vos manques:</span> <br/> {{  $entretien->manques }} </th>

                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Telephone: </span><br/>  {{  $entretien->number }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Durée de la formation:</span> <br/> {{  $entretien->dureeFormation }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Date de debut: <br/> {{  $entretien->dateDebut }} </th> 
                                                    </tr>
                                                    <tr>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Horaire de travail:</span> <br/> {{  $entretien->horaire_travail }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Modalite de paiement:</span> <br/> {{  $entretien->modalite_paiement }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Mensualite:</span> <br/> {{  $entretien->mensualite }} </th> 
                                                    </tr>

                                                    <tr>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Maladie ou allergie:</span> <br/> {{  $entretien->maladie }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Tel urgence:</span> <br/> {{  $entretien->number_urgence }} </th>
                                                        <th scope="col"><span style="text-decoration:underline;color:khaki">Domaine:</span> <br/> {{  $entretien->domaine_id }} </th> 
                                                    </tr>
                                                </thead>
                                                    </table>
                                                </div>
                                            
                                            
                                           
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" style="background-color:#e74c3c; color:white"  data-dismiss="modal">Fermer </button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                                <a href="{{ route('edit.getStagiaire', ['id' => $entretien->id] ) }}" class="btn mr-2" style="background-color:#e74c3c; color:white">Edit</a> 
                            </td>
                        </tr>
                    @endforeach
 		 	</tbody>
        </table>

    </div>
  
               
       
 </div> 
   
@endsection