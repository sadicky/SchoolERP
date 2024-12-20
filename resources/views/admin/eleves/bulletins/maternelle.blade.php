@extends('layouts.main')

@section('title', 'Bulletin | ' . config('app.name'))
@section('content')

<div class="dashboard-content-one" style="padding-top: 20px">
<div class="card height-auto">
    <div class="card-body">
    <table class="table table-bordered table-condensed">
        <tr> 
            <td colspan="23">   
                <div class="row">         
             <div class="col-2">
                <img src="{{asset('assets/img/drc.png')}}" height="50px" alt="drapeau rdc">
            </div>  
                <div class="col-8" align="center" style="padding-top: 50px">
                <h3>REPUBLIQUE DEMOCRATIQUE DU CONGO<br>
                MINISTERE DE L'ENSEIGNEMENT PRIMAIRE, SECONDAIRE ET PROFESSIONNEL</h3> <br>&nbsp;
            </div>            
            <div class="col-2">             
                <img src="{{asset('assets/img/dev.png')}}" height="50px" alt="drapeau rdc">
            </div>  
            </div> 
            </td>
        </tr>
        <tr> 
            <td colspan="23">
                <div class="row">
                    <div class="col-2"><b> N ID:</b></div>
                    <div class="col-8">
                            <table class="table table-bordered" border="1px" width="100%">
                                <tr>
                                    <td><b>6</b></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </table>
                        </div>                        
                    <div class="col-2"></div>
                </div>
            </td>
        </tr>
        <tr> 
            <td colspan="23">
                <div class="row container">
                    <div class="col-6">
                        <div class="form-group ">
                            <label>PROVINCE: &nbsp;<b>SUD-KIVU</b>
                        </div>
                        <div class="form-group">
                            <label>VILLE:&nbsp;<b>KAMANYOLA</b>
                        </div>
                        <div class="form-group">
                            <span>COMMUNE:&nbsp;<b>KAMANYOLA</b>
                        </div>
                        <div class="form-group">
                            <span>ECOLE:&nbsp;<b>LOMITA</b>
                        </div>
                        <div class="form-group">
                            <span>CODE:&nbsp;<b>89340483</b>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group ">
                            <label>ELEVE:</b>..............................................................................................<label>SEXE:..............</b>
                        </div>
                        <div class="form-group">
                            <label>NE(E) A:</b>..............................................................................................<label>LE .../.../.....</b>
                        </div>
                        <div class="form-group">
                            <span>CLASSE:</b>.....................................................................................................................
                        </div>
                        <div class="form-group">
                            <span>NUM PERM:</b>..............................................................................................................
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td  colspan="23" align='center'><b>BULLETIN DE L'ELEVE: DEGRE MATERNELLE......................</b></td>
        </tr>
        <tr>
            <td rowspan="2" colspan="2"><b>GROUPE I</b></td>
            
            <td><strong>TRIMESTRE</strong></td>
            <td width="10">1èP</td>
            <td width="10">2èP</td>
            <td width="10">3èP</td>
            <td width="10">Total</td>
            <td width="10">Qual.</td>
            <td width="10">Coul.</td>
        </tr>
        <tr>
            <td>MAXIMA</td>
            <td>4</td>
            <td>4</td>
            <td>4</td>
            <td>12</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="10">01</td>
            <td colspan="2" width="20">Activités de schémas corporels</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        
        <tr>
            <td >02</td>
            <td colspan="2">Activités de schémas corporels</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td >03</td>
            <td colspan="2">Activités de schémas corporels</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           
        </tr>
      
       <tr>
            <td colspan="3" align="center"><b>SOUS-TOTAL</b></td>
            <td>|</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
       <tr>
            <td colspan="2" align="center"><b>GROUPE II</b></td>
            <td>MAXIMA</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
       
           
        <tr>
            <td >04</td>
            <td colspan="2">Activités de schémas corporels</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td >05</td>
            <td colspan="2">Activités de schémas corporels</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
         <tr>
            <td colspan="3" align="center"><b>SOUS-TOTAL</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
       <tr>
            <td colspan="2" align="center"><b>GROUPE III</b></td>
            <td>MAXIMA</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
       <tr>
            <td >06</td>
            <td colspan="2">Activités de schémas corporels</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
         <tr class="hiden">
            <td >07</td>
            <td colspan="2">Activités de schémas corporels</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
         <tr>
            <td colspan="3" align="center"><b>SOUS-TOTAL</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
        <tr>
            <td colspan="2" rowspan="3" align="center" style="margin-bottom: 100px;"><b>Appreciation General</b></td>
            <td><b>TOTAL GEN.</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td ><b>Qualité</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
        <tr>
            <td><b>Couleur</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
        <tr>
           <td colspan="3" align="center"><b>Signatures</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
        
   
        <tr>
            <td >Trimastre</td>
            <td>Instituteur</td>
            <td>Parent</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
        <tr>
          
            <td>1ère <!-- Trimestre --></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
          
            <td>2ème <!-- Trimestre --></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
          
           <td>3ème <!-- Trimestre --></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" >Légende Qual : Appréciation qualitative</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
       <tr>
            <td colspan="3" >Coul :couleur correspondante</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
   
       
        <tr>
            <td colspan="3">
                       <b>Observation:</b><br><br>
                        <label for="">(1)Biffer la mention obtenu</label><br>
                        <p>Note Importante: le bulletin est sans valeur si il est surchargé</p><br>
                    
                    </td>
                    <td colspan="6">
                          <p>FAIT à .....................,Le......../....../.......</p>
                        <br>
                         <p>Seau de l'Ecole&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Le(La)Directeur(ce)</p>
                     </td>
              </tr>
           <tr>
               <td colspan="9" align="center">
                 Interdiction formelle de reproduire ce bulletin avec ...........par la loi
                 </td>
              </tr>    
    </table>
</div>
</div>
</div>
@include('admin.eleves.modals.create')
@endsection