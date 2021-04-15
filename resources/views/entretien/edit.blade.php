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
    <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div id="ui">
                    <h2 class="text-center" style="text-decoration: underline;">Formulaire de modification</h2>
                        <form class="form-group" action="{{route('updatestagiaire')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                    
                            <input type="text" readonly="true" class="form-control" id="id" name="id" value="{{ $entretiens->id}}" hidden/>
                                <div>
                                    <label for="participants" class="label" >Participants</label>
                                    <textarea class="form-control @error('participants') is-invalid @enderror" placeholder="Entrer le nom des participants" id="participants" rows="5" name="participants">{{ $entretiens->participants}}</textarea>
                                    @error('participants')
                                        <div class="invalid-feedback">{{ $errors->first('participants')}}</div>
                                    @enderror
                                </div>
                                    
                                <div class="col-lg-6">
                                    <label for="number" class="label" >Telephone</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ $entretiens->number}}" />
                                    @error('number')
                                        <div class="invalid-feedback">{{  @errors->first('number') }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="mail" class="label" >E-Mail</label>
                                    <input type="email" class="form-control @error('mail') is-invalid @enderror"  name="mail" id="mail" value="{{ $entretiens->mail}}" />
                                    @error('mail')
                                        <div class="invalid-feedback">{{  @errors->first('mail') }}</div>
                                    @enderror
                                </div>
                               
                                <label for="domaine_id" class="label" >Domaine</label>
                                <div>
                                    <select class="form-control" name="domaine_id" id="domaine_id">
                                        @foreach ($domaines as  $domaine )
                                            <option value="{{ $domaine->id }}">{{ $domaine->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                   
                                    <br/>
                                </div>
                                <div>
                                <label for="presentation">Présentation du candidat en une minute</label>
                                    <textarea class="form-control @error('presentation') is-invalid @enderror" placeholder="presentation ici" id="presentation" rows="5" name="presentation">{{ $entretiens->presentation}}</textarea>
                                    @error('presentation')
                                        <div class="invalid-feedback">{{  @errors->first('presentation') }}</div>
                                    @enderror
                                </div>

                                
                                <label for="pourquoi_defarsci">Pourquoi Defasr Sci?</label>
                                    <textarea class="form-control" placeholder="commentaire ici" id="pourquoi_defarsci" rows="5" name="pourquoi_defarsci" required>{{ $entretiens->pourquoi_defarsci}}</textarea>

                                    <div>
                                        <label for="part">Qu'attendez-vous de DEFAR Sci?</label>
                                        <textarea class="form-control  @error('part') is-invalid @enderror" placeholder="laissez un commentaire ici" id="part" rows="5" name="part">{{ $entretiens->part}}</textarea>
                                        @error('part')
                                            <div class="invalid-feedback">{{  @errors->first('part') }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="objectifs">Quels sont vos objectifs dans 5 ans ?</label>
                                        <textarea class="form-control @error('objectits') is-invalid @enderror" placeholder="laissez un commentaire ici" id="objectifs" rows="5" name="objectifs">{{ $entretiens->objectifs}}</textarea>
                                        @error('objectits')
                                            <div class="invalid-feedback">{{  @errors->first('objectits') }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div> 
                                        <label for="manques">Avez-vous des manques?</label>
                                        <textarea class="form-control @error('manques') is-invalid @enderror" placeholder="laissez un commentaire ici" id="manques" rows="5" name="manques">{{ $entretiens->manques}}</textarea>
                                        @error('manques')
                                            <div class="invalid-feedback">{{  @errors->first('manques') }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label for="atouts">Quels sont vos atouts?</label>
                                        <textarea class="form-control @error('atouts') is-invalid @enderror" placeholder="laissez un commentaire ici" id="atouts" rows="5" name="atouts">{{ $entretiens->atouts}}</textarea>
                                        @error('atouts')
                                            <div class="invalid-feedback">{{  @errors->first('atouts') }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="connaissance_defarsci">Comment connaissez-vous DEFAR Sci?</label>
                                        <textarea class="form-control @error('connaissance_defarsci') is-invalid @enderror" placeholder="laissez un commentaire ici" id="connaissance_defarsci" rows="5" name="connaissance_defarsci">{{ $entretiens->connaissance_defarsci}}</textarea>
                                        @error('connaissance_defarsci')
                                            <div class="invalid-feedback">{{  @errors->first('connaissance_defarsci') }}</div>
                                        @enderror
                                    </div>

                                    <label>Durée de la formation</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio"  name="dureeFormation" id="dureeF" value="1mois" {{ ($entretiens->dureeFormation =="1mois")? "checked" : "" }} >
                                            <label class="form-check-label" for="dureeF">
                                                1 mois
                                            </label>
                                        </div>
                                            
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio" name="dureeFormation" id="dureeD" value="2mois" {{ ($entretiens->dureeFormation =="2mois")? "checked" : "" }}>
                                            <label class="form-check-label" for="dureeD">
                                                2mois
                                            </label>
                                        </div>
                                            
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio" name="dureeFormation" id="dureeE" value="3mois" {{ ($entretiens->dureeFormation =="3mois")? "checked" : "" }} >
                                            <label class="form-check-label" for="dureeE">
                                                3mois
                                            </label>
                                           
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6">
                                        <label for="modalite_paiement" class="label" >Modalité de paiement</label>
                                        <input type="text" class="form-control @error('modalite_paiement') is-invalid @enderror"  name="modalite_paiement" id="modalite_paiement" value="{{ $entretiens->modalite_paiement}}" />
                                        @error('modalite_paiement')
                                            <div class="invalid-feedback">{{  $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="mensualite" class="label" >Mensualite</label>
                                        <input type="text" class="form-control @error('mensualite') is-invalid @enderror "  name="mensualite" id="mensualite" value="{{ $entretiens->mensualite}}" />
                                        @error('mensualite')
                                            <div class="invalid-feedback">{{  $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <label>Horaire de travail</label>

                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio"  name="horaire_travail" id="horaire_travailA"   value="08h-13h" {{ ($entretiens->horaire_travail =="08h-13h")? "checked" : "" }}>
                                            <label class="form-check-label" for="horaire_travailA">
                                                08h-13h
                                            </label>
                                            
                                        </div>
                                            
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio"  name="horaire_travail" id="horaire_travailF"   value="13h-18h" {{ ($entretiens->horaire_travail =="13h-18h")? "checked" : "" }}>
                                            <label class="form-check-label" for="horaire_travailF">
                                                13h-18h
                                            </label>
                                            @error('horaire_travail')
                                            <div class="invalid-feedback">{{  $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <label>Souffrez-vous d'une maladie ou d'une allergie?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('maladie') is-invalid @enderror" type="radio"  name="maladie" id="maladieF" value="1" onclick= "afficher()" {{ ($entretiens->maladie =="1")? "checked" : "" }}>
                                            <label class="form-check-label" for="maladieF">
                                                Oui
                                            </label>
                                            <div class="d-none" id="reply">
                                                <label for="demande" class="label" >Le quel ou les quels?</label>
                                                <textarea class="form-control @error('demande') is-invalid @enderror" placeholder="laissez un commentaire ici" id="demande" rows="3" name="demande">{{ $entretiens->demande}}</textarea>
                                               
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('maladie') is-invalid @enderror" type="radio"  name="maladie" id="maladieD" value="0" {{ ($entretiens->maladie =="0")? "checked" : "" }}>
                                                <label class="form-check-label" for="maladieD">
                                                Non
                                            </label>
                                            @error('maladie')
                                            <div class="invalid-feedback">{{  $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="number_urgence" class="label" >Quel numero appeler en cas d'urgence?</label>
                                        <input type="text" class="form-control @error('number_urgence') is-invalid @enderror"  name="number_urgence" id="number_urgence" value="{{$entretiens->number_urgence}}"/>
                                        @error('number_urgence')
                                            <div class="invalid-feedback">{{  $message }}</div>
                                        @enderror 
                                    </div>  
                                        <div class="col-lg-6">
                                            <label for="dateDebut" class="label" >Debut stage</label>
                                            <input type="date" class="form-control @error('dateDebut') is-invalid @enderror" id="dateDebut" name="dateDebut" value="{{$entretiens->dateDebut}}" required />
                                            @error('dateDebut')
                                            <div class="invalid-feedback">{{  $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <label for="image" class="label" >Image</label>
                                            <input type="file" class="form-control"  name="image" id="image" value="{{$entretiens->image}}"/>
                                        </div>
                            </div>
                            <br/>
                            <div class="form-group text-center">
                                <button type="submit"  class="btn"  style="background-color:#e74c3c; color:white">Modifier</button>
                                <a   class="btn btn-primary" href="{{route('voir_stagiaire')}}">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
            </div>
@endsection
