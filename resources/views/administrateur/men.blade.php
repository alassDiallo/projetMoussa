<div class="col-xs-3 mr-2 bg-primary"  id="menu">
    <div class="sidebar-toggle-box text-right">
        <div class="fa fa-navicon tooltips mr-4" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
	<table  class="table table-md">
		<tr>
        <th><a href=""><i class="fa fa-home mr-2 align-right" ></i>Accueil</a></th>
		</tr>
	<tr>
    <th><div class="dropdown dropright">
        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-users mr-2"></i>Categorie
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item" href="{{ route('categorie.create') }}" type="button">Ajouter une Categorie</a>
          <a class="dropdown-item" href="{{ route('categorie.index') }}" type="button">Lister nos categories</a>
        </div>
      </div>
      </th>
	</tr>
	<tr>
    <th><div class="dropdown dropdown">
        <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user mr-2"></i>Produits
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item" href="{{ route('produits.create') }}" type="button">Ajouter un produit</a>

          <a class="dropdown-item" href="{{ route('listeProduit') }}" type="button">Lister nos Produits</a>
        </div>
      </div></th>
    </tr>
    <tr>
		<th><div class="dropdown dropright">
            <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user mr-2"></i>Commandes
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item" href="{{ route('commande.index') }}" type="button">Lister les commandes</a>
              <a class="dropdown-item" href="" type="button"></a>
              <a class="dropdown-item" href="" type="button"></a>
            </div></th>
	</tr>
<tr>
    <th><a style="color:white;" >Stockage</a></th>
</tr>
	<tr>
		<th><a href=""><i class="fa fa-lock mr-2"></i>Compte</a></th>
	</tr>
	<tr>
		<th><a href=""><span class="fa fa-sign-out mr-2"></span>Deconexion</span></a></th>
	</tr>
</table>
</div>
