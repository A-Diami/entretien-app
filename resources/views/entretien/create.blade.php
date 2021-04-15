@extends('layouts.app')

@section('extra-js')
    <script>
        function afficher(){
                let element = document.getElementById("reply");
                element.classList.toggle('d-none');
        }
    </script>
@endsection
@section('content')
    <div class="container">
        <div class=" offset-3">
            <a type="button" class="btn" href="{{ route('voir_stagiaire') }}" style="background-color:#e74c3c; color:white">Stagiaires</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Ajout de domaine
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un domaine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addform">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Domaine</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn" style="background-color:#e74c3c; color:white">Ajouter</button>
                        </div>
                    </form>
                </div>
               
                </div>
            </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div id="ui">
                    <h2 class="text-center">Formulaire d'enregistrement</h2>
                        <form class="form-group" id="stagiaireForm" action="{{ route('storestagiaire') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <label for="participants" class="label" >Participants</label>
                                    <textarea class="form-control @error('email') is-invalid @enderror" placeholder="Entrer le nom des participants" id="participants" rows="5" name="participants" required></textarea>
                                <div class="col-lg-6">
                                    <label for="number" class="label" >Telephone</label>
                                    <input type="text" class="form-control" id="number" name="number" required />
                                </div>
                                <div class="col-lg-6">
                                    <label for="mail" class="label" >E-Mail</label>
                                    <input type="email" class="form-control"  name="mail" id="mail" required/>
                                </div>
                               
                                <label for="domaine_id" class="label" >Domaine</label>
                               
                                    <select class="form-control" name="domaine_id" id="domaine_id" required>
                                        <option value="0">Entrer votre choix</option>
                                        @foreach ($domaines as  $domaine )
                                        <option value="{{ $domaine->id }}">{{ $domaine->name}}</option>
                                        @endforeach
                                    </select>
                                <br/>
                                    <label for="presentation">Présentation du candidat en une minute</label>
                                    <textarea class="form-control" placeholder="presentation ici" id="presentation" rows="5" name="presentation" required></textarea>
                                    
                                    <label for="pourquoi_defarsci">Pourquoi Defasr Sci?</label>
                                    <textarea class="form-control" placeholder="commentaire ici" id="pourquoi_defarsci" rows="5" name="pourquoi_defarsci" required></textarea>

                                    <label for="part">Qu'attendez-vous de DEFAR Sci?</label>
                                    <textarea class="form-control" placeholder="laissez un commentaire ici" id="part" rows="5" name="part" required></textarea>

                                    <label for="objectifs">Quels sont vos objectifs dans 5 ans ?</label>
                                    <textarea class="form-control" placeholder="laissez un commentaire ici" id="objectifs" rows="5" name="objectifs" required></textarea>

                                    <label for="manques">Avez-vous des manques?</label>
                                    <textarea class="form-control" placeholder="laissez un commentaire ici" id="manques" rows="5" name="manques" required></textarea>
                                    
                                    <label for="atouts">Quels sont vos atouts?</label>
                                    <textarea class="form-control" placeholder="laissez un commentaire ici" id="atouts" rows="5" name="atouts" required></textarea>

                                    <label for="connaissance_defarsci">Comment connaissez-vous DEFAR Sci?</label>
                                    <textarea class="form-control" placeholder="laissez un commentaire ici" id="connaissance_defarsci" rows="5" name="connaissance_defarsci" required></textarea>
                                       
                                    <div>
                                    <br/>
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  name="dureeFormation" id="dureeF" value="1mois" {{ old('dureeFormation') == '1mois' ? 'checked' : ''}} required checked>
                                            <label class="form-check-label" for="dureeF">
                                               1 mois
                                            </label>
                                        </div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dureeFormation" id="dureeD" value="2mois" {{ old('dureeFormation') == '2mois' ? 'checked' : ''}} required  >
                                                <label class="form-check-label" for="dureeD">
                                                    2mois
                                                </label>
                                               
                                            </div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="dureeFormation" id="dureeE" value="3mois" {{ old('dureeFormation') == '3mois' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="dureeE">
                                                    3mois
                                                </label>
                                               
                                            </div>
                                    </div>
                                   
                                    <div class="col-lg-6">
                                        <label for="modalite_paiement" class="label" >Modalité de paiement</label>
                                        <input type="text" class="form-control"  name="modalite_paiement" id="modalite_paiement" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="mensualite" class="label" >Mensualite</label>
                                        <input type="text" class="form-control"  name="mensualite" id="mensualite" required />
                                        <br/>
                                    </div>
                                    
                                    <label>Horaire de travail</label><br/>

                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  name="horaire_travail" id="horaire_travailA" value="08h-13h" {{ old('horaire_travail') == '08h-13h' ? 'checked' : ''}} required checked>
                                            <label class="form-check-label" for="horaire_travailA">
                                                08h-13h
                                            </label>
                                        </div>
                                            
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  name="horaire_travail" id="horaire_travailF" value="13h-18h" {{ old('horaire_travail') == '13h-18h' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="horaire_travailF">
                                                13h-18h
                                            </label>
                                        </div>
                                    </div>
                                   
                                    <label>Souffrez-vous d'une maladie ou d'une allergie?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  name="maladie" id="maladieF" value="1" {{ old('maladie') == '1' ? 'checked' : ''}} onclick="afficher()" required checked>
                                            <label class="form-check-label" for="maladieF">
                                                Oui
                                            </label>
                                            <div class="d-none" id="reply">
                                                <label for="demande" class="label" >Le quel ou les quels?</label>
                                                <textarea class="form-control" placeholder="laissez un commentaire ici" id="demande" rows="3" name="demande"></textarea>

                                            </div>
                                    </div>
                                        
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  name="maladie" id="maladieD" value="0" {{ old('maladie') == '0' ? 'checked' : ''}} required checked>
                                            <label class="form-check-label" for="maladieD">
                                                Non
                                            </label>
                                            
                                           
                                        </div>
                                    </div>
                                        <label for="number_urgence" class="label" >Quel numero appeler en cas d'urgence?</label>
                                        <input type="text" class="form-control"  name="number_urgence" id="number_urgence" required/>
                                        
                                        <div class="col-lg-6">
                                            <label for="dateDebut" class="label" >Debut stage</label>
                                            <input type="date" class="form-control" id="dateDebut" name="dateDebut" required />
                                           
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <label for="image" class="label" >Image</label>
                                            <input type="file" class="form-control"  name="image" id="image"/>
                                        </div>
                            </div>
                            <br/>
                            <button type="submit"  class="btn btn-success btn-block btn-lg" >Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
    </div>

   
    <script>
        $(document).ready(function () {
            
            $('#addform').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        type:"POST",
                        url:"{{ route('domaine.add') }}",
                        data: $('#addform').serialize(),
                        success: function(response){
                            console.log(response)
                            $('#staticBackdrop').modal('hide'),
                            swal({
                                    title: "Domaine crée!",
                                    icon: "success",
                                });
                            clearDataDomaine();
                        },
                        error: function(error){
                            console.log(error)
                        }
                    });
            });

            function clearDataDomaine(){
                $('#name').val('');
            }

            // function clearDataEntretien(){
            //     $('#participants').val('');
            //     $('#mail').val('');
            //     $('#number').val('');
            //     $('#presentation').val('');
            //     $('#connaissance_defarsci').val('');
            //     $('#part').val('');
            //     $('#objectifs').val('');
            //     $('#atouts').val('');
            //     $('#dureeFormation').val('');
            //     $('#dateDebut').val('');
            //     $('#horaire_travail').val('');
            //     $('#modalite_paiement').val('');
            //     $('#mensualite').val('');
            //     $('#demande').val('');
            //     $('#maladie').val('');
            //     $('#number_urgence').val('');
            //     $('#image').val('');
            //     $('#domaine_id').val('');
            // }
            
            // $('#stagiaireForm').on('submit', function(e){
            //     e.preventDefault();
            //    $.ajax({
            //        type:"POST",
            //        url: "/addEntretien",
            //        data: $('#stagiaireForm').serialize(),
            //        success:function(response){
            //            console.log('response');
            //            alert("Donnees ajoutees");
            //            clearDataEntretien();
            //        },
            //             error: function(error){
            //                 console.log(error)
            //             }
            //    })
            // })
        })
    </script>

@endsection