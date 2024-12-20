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
                            <label>ELEVE:</b>...<label>SEXE:..............</b>
                        </div>
                        <div class="form-group">
                            <label>NE(E) A:</b>...<label>LE .../.../.....</b>
                        </div>
                        <div class="form-group">
                            <span>CLASSE:</b>..........................
                        </div>
                        <div class="form-group">
                            <span>NUM PERM:</b>...................
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td  colspan="23" align='center'><b>BULLETIN DE L'ELEVE: DEGRE TERMINAL(6eme ANNEE) ANNEE SCOLAIRE:......................</b></td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2"><h4><br>BRANCHES</h4></td>
            <td colspan="7" align="center"><b>PREMIER TRIMESTRE</b></td>
            <td colspan="6" align="center"><b>DEUXIEME TRIMESTRE</b></td>
            <td colspan="6" align="center"><b>TROISIEME TRIMESTRE</b></td>
            <td colspan="2" align="center"><b>TOTAL</b></td>
        </tr>
        <tr>
            <td>MT</td>
            <td>1èP</td>
            <td>2èP</td>
            <td>MEx</td>
            <td>PO</td>
            <td>MTr</td>
            <td>PO</td>
            <td>3èP</td>
            <td>4èP</td>
            <td>ME</td>
            <td>PO</td>
            <td>MTr</td>
            <td>PO</td>
            <td>5èP</td>
            <td>6èP</td>
            <td>ME</td>
            <td>PO</td>
            <td>MTr</td>
            <td>PO</td>
            <td>Max</td>
            <td>Pts</td>
        </tr>
        <tr>
            <td colspan="2">RELIGION</td>
            <td>10</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
            <td colspan="2">E C M</td>
            <td>10</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2">EDUCAVIE</td>
            <td>10</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2">ELOC.VOC.RECI</td>
            <td>6</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="23">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><b>SOUS-TOTAL</b></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2"><b>MAX. GENERAL</b></td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2"><b>POURCENTAGE</b></td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2"><b>PLACE/NbrE</b></td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2"><b>APPLICATION</b></td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2"><b>CONDUITE</b></td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2"><b>CONDUITE</b></td>
            <td></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td colspan="2"><b>SIGN. INSTIT.</b></td>
            <td colspan="6"></td>
            <td colspan="6"></td>
            <td colspan="9"></td>
        </tr>
        <tr>
            <td colspan="2"><b>SIGN. RESPO.</b></td>
            <td colspan="6"></td>
            <td colspan="6"></td>
            <td colspan="9"></td>
        </tr>
        <tr>
            <td colspan="23">
                <div class="row container">
                    <div class="col-4"><br>
                        <b>(1)RESULTATS AU TENAFEP (6e ANNEE)</b><br>
                        <label for="">L'ELEVE PASSE DANS LA CLASSE SUPERIEURE(1)</label><br>
                        <label for="">L'ELEVE A ECHOUE (1)</label><br>
                        <label for="">L'ELEVE DOUBLE LA CLASSE(1)</label><br>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="form-group">
                            <span>FAIT A ...........................,LE......./....../......</span>
                        </div><br><br>
                        <div  align="center" class="form-group">
                            <span>LE CHEF D'ETABLISSEMENT<br>NOM ET SIGNATURE</span>
                        </div><br><br><br>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
</div>
</div>
@include('admin.eleves.modals.create')
@endsection