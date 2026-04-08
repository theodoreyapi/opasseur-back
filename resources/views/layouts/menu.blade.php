 <div id="sidebar-wrapper">
     <div class="sidebar-brand">
         <div class="brand-logo">O'P</div>
         <div class="brand-text">
             <h5>O'Passage</h5>
             <span>Backoffice</span>
         </div>
     </div>

     <div class="nav-section-title">Gestion</div>
     <ul class="sidebar-nav">
         <li><a href="{{ url('index') }}" class="{{ Route::is('index') ? 'active' : '' }}"><i class="bi bi-grid-1x2"></i>
                 Tableau de bord</a></li>
         <li><a href="{{ url('opasseurs') }}" class="{{ Route::is('opasseurs') ? 'active' : '' }}"><i
                     class="bi bi-people"></i> O'Passeur</a></li>
         <li><a href="{{ url('hote') }}" class="{{ Route::is('hote') ? 'active' : '' }}"><i class="bi bi-people"></i>
                 Hôte</a></li>
         <li><a href="{{ url('pays') }}" class="{{ Route::is('pays') ? 'active' : '' }}"><i class="bi bi-globe"></i>
                 Pays & Communes</a></li>
         <li><a href="{{ url('hotels') }}" class="{{ Route::is('hotels') ? 'active' : '' }}"><i
                     class="bi bi-building"></i> Hôtels</a></li>
         <li><a href="{{ url('rooms') }}" class="{{ Route::is('rooms') ? 'active' : '' }}"><i
                     class="bi bi-door-open"></i> Chambres</a></li>
         <li><a href="{{ url('reservation') }}" class="{{ Route::is('reservation') ? 'active' : '' }}"><i
                     class="bi bi-calendar-check"></i> Réservations</a></li>
         <li><a href="{{ url('paiement') }}" class="{{ Route::is('paiement') ? 'active' : '' }}"><i
                     class="bi bi-credit-card"></i> Paiements</a></li>
     </ul>

     <div class="nav-section-title">Commercial</div>
     <ul class="sidebar-nav">
         <li><a href="{{ url('promo') }}" class="{{ Route::is('promo') ? 'active' : '' }}"><i class="bi bi-tags"></i>
                 Codes Promo</a></li>
         <li><a href="{{ url('abonnement') }}" class="{{ Route::is('abonnement') ? 'active' : '' }}"><i
                     class="bi bi-award"></i> Abonnements</a></li>
         <li><a href="{{ url('avis') }}" class="{{ Route::is('avis') ? 'active' : '' }}"><i class="bi bi-star"></i>
                 Avis</a></li>
         <li><a href="{{ url('') }}" class="{{ Route::is('') ? 'active' : '' }}"><i class="bi bi-heart"></i>
                 Favoris</a></li>
     </ul>

     <div class="nav-section-title">Paramètres</div>
     <ul class="sidebar-nav">
         <li><a href="{{ url('page-legale') }}" class="{{ Route::is('page-legale') ? 'active' : '' }}"><i
                     class="bi bi-file-earmark-text"></i> Pages légales</a></li>
         <li><a href="{{ url('roles') }}"class="{{ Route::is('roles') ? 'active' : '' }}"><i
                     class="bi bi-shield-plus"></i> Rôles & permissions</a></li>
         <li><a href="{{ url('admins') }}" class="{{ Route::is('admins') ? 'active' : '' }}"><i
                     class="bi bi-file-earmark-text"></i> Admins</a></li>
         <li><a href="{{ url('notifications') }}"class="{{ Route::is('notifications') ? 'active' : '' }}"><i
                     class="bi bi-file-earmark-text"></i> Notifications</a></li>
         <li><a href="{{ url('settings') }}" class="{{ Route::is('settings') ? 'active' : '' }}"><i
                     class="bi bi-file-earmark-text"></i> Paramètres</a></li>
     </ul>

     <div class="sidebar-footer">
         © {{ date('Y') }} O'Passage
     </div>
 </div>
