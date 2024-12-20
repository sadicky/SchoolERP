@extends('layouts.main')

@section('title', 'Bulletin | ' . config('app.name'))
@section('content')

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
                    <div class="col-6">
                        <div class="form-group ">
                            <label>PROVINCE:</b>...<?= $data['ec_prov']?>.....
                        </div>
                        <div class="form-group">
                            <label>VILLE:</b>...<?=strtoupper($data['ec_ville'])?>...................
                        </div>
                        <div class="form-group">
                            <span>COMMUNE:</b>...KADUTU...
                        </div>
                        <div class="form-group">
                            <span>ECOLE:</b>..<?=strtoupper($data['ec_nom'])?>........................................................................................
                        </div>
                        <div class="form-group">
                            <span>CODE:</b>..<?= $data['ec_mat']?>..................................................................................
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group ">
                            <label>ELEVE:</b>..<?=strtoupper($data['e_nom'])?>......................................................<label>SEXE:..<?=strtoupper($data['e_sexe'])?>..</b>
                        </div>
                        <div class="form-group">
                            <label>NE(E) A:</b>.<?=date("d-m-Y", strtotime($data['e_dat'])) ?>...........................................................................<label>LE .../.../.....</b>
                        </div>
                        <div class="form-group">
                            <span>CLASSE:</b>....<?=strtoupper($data['cl_nom'])?>......................................................................................
                        </div>
                        <div class="form-group">
                            <span>NUM PERM:</b>..<?= $data['ec_arrete']?>......................................................................
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td  colspan="14" align='center'><b>BULLETIN DE LA: <?=strtoupper($data['cl_nom'])?> ANNEE SCOLAIRE: <?=$var4['an_nom']?></b></td>
        </tr>
        <tr>
            <td colspan="2" rowspan="3"><h4><br>BRANCHES</h4></td>
            <td colspan="4" align="center"><b>PREMIER TRIMESTRE</b></td>
            <td colspan="4" align="center"><b>DEUXIEME TRIMESTRE</b></td>
            <td  align="center" rowspan="3" class="px-0"><b>TOTAL</b></td>
            <td rowspan="13" class="px-2 bg-secondary"></td>
            <td rowspan="2" colspan="2">Repechage</td>

            


        </tr>
        <tr>
            <td colspan="2">TR</td>
            <td rowspan="2" align="center" style="margin-top: 50px;">MEx</td>
            <td rowspan="2" align="center">TOT</td>
            <td colspan="2">TR</td>
            <td rowspan="2" align="center" style="margin-top: 50px;">MEx</td>
            <td rowspan="2" align="center">TOT</td>
             
        </tr>
        <tr>
           
            <td>1èP</td>
            <td>2èP</td>
            <td>3èP</td>
            <td>4èP</td>
            <td>%</td>
            <td>sign.prof</td>
           
            

        </tr>
        
            <?php
            $var=0;$pond=0;$pond2=0;
            $top1=0;$top2=0; $top3=0;
            $maxg=0;$pour=0;
            $total=0;$total2=0;$total3=0;$total4=0;$totale1=0;$totale2=0;
               $q=all_note_cours($data['cl_id']);
              while ($row=$q->fetch()){
                $pond=$row['c_pond'];
                $maxg +=$row['c_pond'];
                if ($var==0) {?>
              <tr><b>
            <td colspan="2"><b>MAXIMA</td>
            <td><?=$row['c_pond']?></td>
            <td><?=$row['c_pond']?></td>
            <td><?= $row['c_pond']*2 ?></td>
            <td><?= $row['c_pond']*4 ?></td>
            <td><?=$row['c_pond']?></td>
            <td><?=$row['c_pond']?></td>
            <td><?= $row['c_pond']*2 ?></td>
            <td><?= $row['c_pond']*4 ?></td>
            <td><?= $row['c_pond']*8 ?></td>
            <td></td>
            <td></td></b>
            </tr> 
            <tr>           
            <td colspan="2"><?=$row['c_nom']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"1ep"); 
             $total += $top1=$top1 + $aff['note']; ?>
            <td><?=$aff['note']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"2ep");
             $top1=$top1 + $aff['note']; 
             $total2=$aff['note'];?>
             <td><?=$aff['note']?></td>
            <?php  $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"1es"); 
            $top1=$top1 + $aff['note']; 
            $totale1=$aff['note'];?>
           
            <td><?=$aff['note']?></td>
            <td><?=$top1?></td>
            <!-- ================2eme semestre========================== -->
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"3ep");
            $top2 += $aff['note'];
            $total3=$aff['note'];?>
            <td><?=$aff['note']?></td>
            <?php  $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"4ep");
            $top2 += $aff['note'];
            $total4=$aff['note']; ?>

            <td><?=$aff['note']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"2es"); 
             $top2 += $aff['note'];
             $totale2=$aff['note']; ?>
            <td><?=$aff['note']?></td>
            <td><?=$top2?></td>
            <td><?=$top2+$top1 ?></td>
            <td></td>
            <td></td>
           </tr>
             <?php $var=1;
                 $pond2=$row['c_pond'];
              }
              elseif ($pond==$pond2) {?>
            <tr>           
            <td colspan="2"><?=$row['c_nom']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"1ep"); 
              $total +=$top1=$aff['note']; ?>
            <td><?=$aff['note']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"2ep");
            $top1=$top1 + $aff['note']; 
            $total2 +=$aff['note'];?>
             <td><?=$aff['note']?></td>
            <?php  $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"1es"); 
            $top1=$top1 + $aff['note'];
            $totale1 +=$aff['note']; ?>
           
            <td><?=$aff['note']?></td>
            <td><?=$top1?></td>
            <!-- ==========================2eme semestre==================================== -->
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"3ep");
            $total3 +=$top2 = $aff['note']; 
            $total3 +=$aff['note'];?>
            <td><?=$aff['note']?></td>
            <?php  $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"4ep");
            $total4 += $top2 += $aff['note']; 
            $total4 +=$aff['note'];?>

            <td><?=$aff['note']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"2es"); 
            $totale2 +=$top2 += $aff['note']; 
            $totale2 +=$aff['note'];?>
            <td><?=$aff['note']?></td>
            <td><?=$top2?></td>
            <td><?=$top2+$top1 ?></td>
            <td></td>
            <td></td>
             <?php }
             else{
             ?>
             <tr><b>
            <td colspan="2"><b>MAXIMA</b></td>
            <td><?=$row['c_pond']?></td>
            <td><?=$row['c_pond']?></td>
            <td><?= $row['c_pond']*2 ?></td>
            <td><?= $row['c_pond']*4 ?></td>
            <td><?=$row['c_pond']?></td>
            <td><?=$row['c_pond']?></td>
            <td><?= $row['c_pond']*2 ?></td>
            <td><?= $row['c_pond']*4 ?></td>
            <td><?= $row['c_pond']*8 ?></td>
            <td></td>
            <td></td></b>
            </tr> 
            <tr>           
            <td colspan="2"><?=$row['c_nom']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"1ep"); 
             $total += $top1=$aff['note']; ?>
            <td><?=$aff['note']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"2ep");
            $top1=$top1 + $aff['note'];
            $total2 +=$aff['note']; ?>
             <td><?=$aff['note']?></td>
            <?php  $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"1es"); 
            $top1=$top1 + $aff['note'];
            $totale1 +=$aff['note']; ?>
           
            <td><?=$aff['note']?></td>
            <td><?=$top1?></td>
            <!-- ===================2eme semestre================================ -->
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"3ep");
             $top2 = $aff['note']; 
             $total3 +=$aff['note'];?>
            <td><?=$aff['note']?></td>
            <?php  $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"4ep");
             $top2 += $aff['note'];
             $total4 +=$aff['note']; ?>

            <td><?=$aff['note']?></td>
            <?php $aff=all_note_eleve($data['cl_id'],$data['e_id'],$data['id_an'],$row['c_id'],"2es"); 
            $top2 += $aff['note'];
            $totale2 +=$aff['note']; ?>
            <td><?=$aff['note']?></td>
            <td><?=$top2?></td>
            <td><?=$top2+$top1 ?></td>
            <td></td>
            <td></td>
       <?php
           $pond2=$row['c_pond'];
         }  } ?>
        
       
        <tr>
            <td colspan="2"><b>MAX. GENERAL</b></td>
            <td><b><?=$maxg?></b></td>
            <td><b><?=$maxg?></b></td>
            <td><b><?=$maxg*2?></b></td>
            <td><b><?=$maxg*4?></b></td>
            <td><b><?=$maxg?></b></td>
            <td><b><?=$maxg?></b></td>
            <td><b><?=$maxg*2?></b></td>
            <td><b><?=$maxg*4?></b></td>
            <td><b><?=$maxg*8?></b></td>
            <td></td>
           <td></td>
        </tr>

        <tr>
            <td colspan="2"><b>TOTAUX</b></td>
            <td><b><?=$total?></b></td>
            <td><b><?=$total2?></b></td>
            <td><b><?=$totale1?></b></td>
            <td><b><?=$totale1+$total+$total2?></b></td>
            <td><b><?=$total3?></b></td>
            <td><b><?=$total4?></b></td>
            <td><b><?=$totale2?></b></td>
            <td><b><?=$totale2+$total3+$total4?></b></td>
            <td><b><?=$totale2+$total3+$total4+$totale1+$total+$total2?></b></td>
            <td></td>
           <td></td>
            
        </tr>
        <tr>
            <td colspan="2"><b>POURCENTAGE</b></td>
            <td><b><?php $pour=($total*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($total2*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($totale1*100)/($maxg*2);
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($totale1+$total+$total2)*100/($maxg*4);
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($total3*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($total4*100)/$maxg;
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($totale2*100)/($maxg*2);
                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($totale2+$total3+$total4)*100/($maxg*4);

                 $nb=0;
                 $nb = number_format($pour, 1, ',', ' '); 
                 echo $nb."%"; ?>
            </b></td>
            <td><b><?php $pour=($totale2+$total3+$total4+$totale1+$total+$total2)*100/($maxg*8);
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
            <td><?php $pl=classement_eleve($data['cl_id'],$data['e_id'],$data['id_an'],"1ep"); 
              echo $pl;?></td>
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
@endsection