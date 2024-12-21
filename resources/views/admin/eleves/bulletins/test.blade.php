@extends('layouts.main')

@section('title', 'Bulletin | ' . config('app.name'))
@section('content')
{{-- {{dd($notes_par_cours_et_periode)}} --}}
<div class="dashboard-content-one">
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
                    <td colspan="14">
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
                    <td colspan="14">
                        <div class="row container">
                            <div class="col-4">
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
                            <div class="col-4">
                                <div class="form-group ">
                                    <label>ELEVE:<b>..{{strtoupper($eleve->nom)}} {{strtoupper($eleve->postnom)}}
                                            {{strtoupper($eleve->prenom)}}<label></b>
                                </div>
                                <div class="form-group">
                                    <label>NE(E) A:<b>.{{ date("d-m-Y", strtotime($eleve->date_naissance))}} .</label>
                                    </b>
                                </div>
                                <div class="form-group">
                                    <span>SEXE:</b>{{strtoupper($eleve->sexe)}}
                                </div>
                                <div class="form-group">
                                    <span>NUM PERM:</b> {{strtoupper($eleve->matricule)}}
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <span>SECTION:<b>{{strtoupper($eleve->section_name)}}</b>
                                </div>
                                <div class="form-group">
                                    <span>OPTION:<b>{{strtoupper($eleve->option_name)}}</b>
                                </div>
                                <div class="form-group">
                                    <span>CLASSE:<b>{{strtoupper($eleve->classe_name)}}</b>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="14" align='center'><b>BULLETIN DE: {{strtoupper($eleve->option_name)}}
                            {{strtoupper($eleve->classe_name)}}, ANNEE
                            SCOLAIRE: {{strtoupper($annee->annee)}} </b></td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="3">
                        <h4><br>BRANCHES</h4>
                    </td>
                    <td colspan="4" align="center"><b>PREMIER SEMESTRE</b></td>
                    <td colspan="4" align="center"><b>DEUXIEME SEMESTRE</b></td>
                    <td align="center" rowspan="3" class="px-0"><b>TOTAL</b></td>
                    <td rowspan="13" class="px-2 bg-secondary"></td>
                    <td rowspan="2" colspan="2">Repechage</td>
                </tr>
                <tr>
                    <td colspan="2">SEMESTRE</td>
                    <td rowspan="2" align="center" style="margin-top: 50px;">MEx</td>
                    <td rowspan="2" align="center">TOT</td>
                    <td colspan="2">SEMESTRE</td>
                    <td rowspan="2" align="center" style="margin-top: 50px;">MEx</td>
                    <td rowspan="2" align="center">TOT</td>

                </tr>
                <tr>
                    
                    {{-- <td>1èP</td>
                    <td>2èP</td>
                    <td>3èP</td>
                    <td>4èP</td> --}}
                    @foreach ($periodes as $periode)
                    <td>{{ $periode }}</td>
                @endforeach
                    <td>%</td>
                    <td>sign.prof</td>
                </tr>

                <?php
            $var=0;$pond=0;$pond2=0;
            $top1=0;$top2=0; $top3=0;
            $maxg=0;$pour=0;
            $total=0;$total2=0;$total3=0;$total4=0;$totale1=0;$totale2=0;
             
              foreach ($notes_par_cours_et_periode as $ligne) {
                $pond=$ligne['ponderation'];
                $maxg +=$pond;
                if ($var==0) {?>
                <tr><b>
                        <td colspan="2"><b>MAXIMA</td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?= $pond*2 ?>
                        </td>
                        <td>
                            <?= $pond*4 ?>
                        </td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?= $pond*2 ?>
                        </td>
                        <td>
                            <?= $pond*4 ?>
                        </td>
                        <td>
                            <?= $pond*8 ?>
                        </td>
                        <td></td>
                        <td></td>
                    </b>
                </tr>
                <tr>
                    <td colspan="2">
                        <?=$ligne['cours_name']?>
                    </td>
                    <?php
                    foreach ($ligne['notes'] as $data){
                        $note = $data;
                    }
                        $total += $top1=$top1 + $note;
                    
                      ?>
                    <td>
                        <?=$note?>
                    </td>

                    <?php 
                        //2ep $notes_periode2 par periode1
                        
                    if(isset($notes_periode2)){
                        foreach ($notes_periode1 as $note){
                            $note2 = $note;
                        }
                        $top1=$top1 +  $note2; 
                        $total2=$note2;
                    }else{
                        $note2 = 0;
                    }
                        ?>
                    <td>
                        <?=$note2?>
                    </td>
                    <?php
                        //1es $notes_sem1 par periode1
                        $top1=$top1 + $note; 
                        $totale1=$note;?>

                    <td>
                        <?=$note?>
                    </td>
                    <td>
                        <?=$top1?>
                    </td>
                    <!-- ================2eme semestre========================== -->
                    <?php
            
              //3ep $notes_periode2 par periode1
              $top2 +=  $note;
            $total3=$note;
            ?>
                    <td>
                        <?=$note?>
                    </td>
                    <?php  
                    //4ep $notes_periode2 par periode1
            $top2 += $note;
            $total4=$note; ?>

                    <td>
                        <?=$note?>
                    </td>
                    <?php //2es $notes_periode2 par periode1 
             $top2 += $note;
             $totale2=$note; ?>
                    <td>
                        <?=$note?>
                    </td>
                    <td>
                        <?=$top2?>
                    </td>
                    <td>
                        <?=$top2+$top1 ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $var=1;
                 $pond2=$pond;
              }
              elseif ($pond==$pond2) {?>
                <tr>
                    <td colspan="2">
                        <?=$ligne['cours_name']?>
                    </td>
                    <?php //1ere p $notes_periode2 par periode1  
              $total +=$top1=$note; ?>
                    <td>
                        <?=$note?>
                    </td>
                    <?php //2e p $notes_periode2 par periode1 
            $top1=$top1 + $note; 
            $total2 +=$note;?>
                    <td>
                        <?=$note?>
                    </td>
                    <?php  //1es $notes_periode2 par periode1 
            $top1=$top1 + $note;
            $totale1 +=$note; ?>

                    <td>
                        <?=$note?>
                    </td>
                    <td>
                        <?=$top1?>
                    </td>
                    <!-- ==========================2eme semestre==================================== -->
                    <?php //3ep $notes_periode2 par periode1 
            $total3 +=$top2 = $note; 
            $total3 +=$note;?>
                    <td>
                        <?=$note?>
                    </td>
                    <?php //4ep $notes_periode2 par periode1 
            $total4 += $top2 += $note; 
            $total4 +=$note;?>

                    <td>
                        <?=$note?>
                    </td>
                    <?php //2es $notes_periode2 par periode1  
            $totale2 +=$top2 += $note; 
            $totale2 +=$note;?>
                    <td>
                        <?=$note?>
                    </td>
                    <td>
                        <?=$top2?>
                    </td>
                    <td>
                        <?=$top2+$top1 ?>
                    </td>
                    <td></td>
                    <td></td>
                    <?php }
             else{
             ?>
                <tr><b>
                        <td colspan="2"><b>MAXIMA</b></td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?= $pond*2 ?>
                        </td>
                        <td>
                            <?= $pond*4 ?>
                        </td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?=$pond?>
                        </td>
                        <td>
                            <?= $pond*2 ?>
                        </td>
                        <td>
                            <?= $pond*4 ?>
                        </td>
                        <td>
                            <?= $pond*8 ?>
                        </td>
                        <td></td>
                        <td></td>
                    </b>
                </tr>
                <tr>
                    <td colspan="2">
                        <?=$ligne['cours_name']?>
                    </td>
                    <?php //1ere p $notes_periode2 par periode1  
             $total += $top1=$note; ?>
                    <td>
                        <?=$note?>
                    </td>
                    <?php //2e p $notes_periode2 par periode1 
            $top1=$top1 + $note;
            $total2 +=$note; ?>
                    <td>
                        <?=$note?>
                    </td>
                    <?php  //1es $notes_periode2 par periode1 
            $top1=$top1 + $note;
            $totale1 +=$note; ?>

                    <td>
                        <?=$note?>
                    </td>
                    <td>
                        <?=$top1?>
                    </td>
                    <!-- ===================2eme semestre================================ -->
                    <?php //3ep $notes_periode2 par periode1 
             $top2 = $note; 
             $total3 +=$note;?>
                    <td>
                        <?=$note?>
                    </td>
                    <?php //4ep $notes_periode2 par periode1 
             $top2 += $note;
             $total4 +=$note; ?>

                    <td>
                        <?=$note?>
                    </td>
                    <?php //2es $notes_periode2 par periode1  
            $top2 += $note;
            $totale2 +=$note; ?>
                    <td>
                        <?=$note?>
                    </td>
                    <td>
                        <?=$top2?>
                    </td>
                    <td>
                        <?=$top2+$top1 ?>
                    </td>
                    <td></td>
                    <td></td>
                    <?php
           $pond2=$pond;
         }  } ?>


                <tr>
                    <td colspan="2"><b>MAX. GENERAL</b></td>
                    <td><b>
                            <?=$maxg?>
                        </b></td>
                    <td><b>
                            <?=$maxg?>
                        </b></td>
                    <td><b>
                            <?=$maxg*2?>
                        </b></td>
                    <td><b>
                            <?=$maxg*4?>
                        </b></td>
                    <td><b>
                            <?=$maxg?>
                        </b></td>
                    <td><b>
                            <?=$maxg?>
                        </b></td>
                    <td><b>
                            <?=$maxg*2?>
                        </b></td>
                    <td><b>
                            <?=$maxg*4?>
                        </b></td>
                    <td><b>
                            <?=$maxg*8?>
                        </b></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2"><b>TOTAUX</b></td>
                    <td><b>
                            <?=$total?>
                        </b></td>
                    <td><b>
                            <?=$total2?>
                        </b></td>
                    <td><b>
                            <?=$totale1?>
                        </b></td>
                    <td><b>
                            <?=$totale1+$total+$total2?>
                        </b></td>
                    <td><b>
                            <?=$total3?>
                        </b></td>
                    <td><b>
                            <?=$total4?>
                        </b></td>
                    <td><b>
                            <?=$totale2?>
                        </b></td>
                    <td><b>
                            <?=$totale2+$total3+$total4?>
                        </b></td>
                    <td><b>
                            <?=$totale2+$total3+$total4+$totale1+$total+$total2?>
                        </b></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td colspan="2"><b>POURCENTAGE</b></td>
                    <td><b>
                            <?php $pour=($total*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($total2*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($totale1*100)/($maxg*2);
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($totale1+$total+$total2)*100/($maxg*4);
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($total3*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($total4*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($totale2*100)/($maxg*2);
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($totale2+$total3+$total4)*100/($maxg*4);

                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td><b>
                            <?php $pour=($totale2+$total3+$total4+$totale1+$total+$total2)*100/($maxg*8);
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
                        </b></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td colspan="2"><b>PLACE/NbrE</b></td>
                    <td>
                        <?php echo $rang1;?>
                    </td>
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
                    <td colspan="2"><b>APPLICATION</b></td>
                    <td>B</td>
                    <td>B</td>
                    <td class="px-2 bg-secondary"></td>
                    <td class="px-2 bg-secondary"> </td>
                    <td>B</td>
                    <td>B</td>
                    <td class="px-2 bg-secondary"></td>
                    <td class="px-2 bg-secondary"></td>
                    <td class="px-2 bg-secondary"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"><b>CONDUITE</b></td>
                    <td>B</td>
                    <td>B</td>
                    <td class="px-2 bg-secondary"></td>
                    <td class="px-2 bg-secondary"></td>
                    <td>B</td>
                    <td>B</td>
                    <td class="px-2 bg-secondary"></td>
                    <td class="px-2 bg-secondary"></td>
                    <td class="px-2 bg-secondary"></td>
                    <td class="px-2 bg-secondary"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"><b>SIGN RESPO</b></td>
                    <td colspan="5"></td>
                    <td colspan="5"></td>
                    <td></td>
                    <td></td>

                </tr>

                <tr>
                    <td colspan="14">
                        <div class="row container">
                            <div class="col-4"><br>
                                <!-- <b>(1)RESULTATS AU TENAFEP (6e ANNEE)</b><br> -->
                                <label for="">L'ELEVE PASSE DANS LA CLASSE SUPERIEURE(1)</label><br>
                                <label for="">L'ELEVE A ECHOUE (1)</label><br>
                                <label for="">L'ELEVE DOUBLE LA CLASSE(1)</label><br>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class="form-group">
                                    <span>FAIT A .......,LE......./....../......</span>
                                </div><br><br>
                                <div align="center" class="form-group">
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
@endsection