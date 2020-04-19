@extends('administrateur.app')
@section('content')


<!--<div class="col-md-4">
    <a href="malade.php">
        <div class="link">
          <i class="fa fa-users"></i>
          <div class="clear"></div><span>Ajoutez un Patient</span>
       </div>
    </a>
  </div>

   <div class="col-md-4">
    <a href="consultation.php">
        <div class="link">
          <i class="fa fa-plus"></i>
          <div class="clear"></div><span>Effectuez une consulation</span>
       </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="traitement.php">
        <div class="link">
          <i class="fa fa-ambulance"></i>
          <div class="clear"></div><span>Traitement</span>
       </div>
    </a>
  </div>
  <div class="col-md-4">
    <a href="laboratoire.php">
        <div class="link">
          <i class="fa fa-medkit"></i>
          <div class="clear"></div><span>Laboratoire</span>
       </div>
    </a>
  </div>

   <div class="col-md-4">
    <a href="Medecins.php">
        <div class="link">
          <i class="fa fa-user"></i>
          <div class="clear"></div><span>Ajoutez un Medecins</span>
       </div>
    </a>
  </div>

   <div class="col-md-4">
    <a href="operation.php">
        <div class="link">
          <i class="fa fa-cog"></i>
          <div class="clear"></div><span>Operation</span>
       </div>
    </a>
  </div>!-->
  <div class="col-md-12" id="status">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-users ml-4"></i>
              <div class="count">{{ App\Models\Produit::all()->count() }}</div>
              <div class="title"><h4>{{ Str::plural('Produit',App\Models\Produit::all()->count())}}</h4>
                            </div><!--/.info-box-->
          </div><!--/.col-->

    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box yellow-bg">
            <i class="fa fa-university ml-4"></i>
            <div class="count">{{ App\Models\Categorie::all()->count() }}</div>
            <div class="title"><h4>{{ Str::plural('Categorie',App\Models\Categorie::all()->count())}}</h4></div>
          </div><!--/.info-box-->
        </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box greenLight-bg">
              <i class="fa fa-eye ml-4"></i>
              <div class="count">{{ App\Models\Commande::all()->count() }}</div>
              <div class="title"><h4>{{ Str::plural('Commande',App\Models\Commande::all()->count())}}</h4></div>
              <div class="text-right">
                {{ App\Models\Commande::where('sexe','homme')->count() }} {{ Str::plural('homme',App\Models\Produit::where('sexe','homme')->count())}}</div>
                <div class="text-right">{{ App\Models\Commande::where('sexe','femme')->count() }} {{ Str::plural('femme',App\Models\Commande::where('sexe','femme')->count())}}</div>
            </div><!--/.info-box-->
          </div>
      </div>
</div>
  @endsection
