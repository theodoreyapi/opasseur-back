<div class="page-header">
    {{-- Gauche : icône + titre + sous-titre --}}
    <div class="page-header-left">
        <div class="page-header-icon">
            <i class="bi {{ $icone }}"></i>
        </div>
        <div>
            <h4 class="page-header-title">{{ $titleHeader }}</h4>
            <span class="page-header-sub">{{ $description }}</span>
        </div>
    </div>

    {{-- Droite : profil avec dropdown --}}
    <div class="page-header-right">
        <div class="profile-wrapper">

            {{-- Bouton avatar --}}
            <button class="avatar-btn" id="avatarBtn" type="button">
                {{--  @if (Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}"
                                class="avatar-img">
                        @else
                            <div class="avatar-initials">
                                {{ strtoupper(substr("Yapi", 0, 2)) }}
                            </div>
                        @endif --}}

                <div class="avatar-initials">
                    {{ strtoupper(substr('Yapi', 0, 2)) }}
                </div>

                <div class="avatar-info">
                    <span class="avatar-name">Name</span>
                    {{-- <span class="avatar-role">{{ Auth::user()->role ?? 'Utilisateur' }}</span> --}}
                    <span class="avatar-role">Admin</span>
                </div>
                <i class="bi bi-chevron-down avatar-chevron" id="avatarChevron"></i>
            </button>

            {{-- Dropdown --}}
            <div class="profile-dropdown" id="profileDropdown">

                {{-- En-tête --}}
                <div class="dd-header">
                    <div class="dd-avatar-row">
                        {{-- @if (Auth::user()->photo)
                                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="dd-avatar-img"
                                        alt="">
                                @else
                                    <div class="dd-avatar-initials">
                                        {{ strtoupper(substr("Yapi", 0, 2)) }}
                                    </div>
                                @endif --}}

                        <div class="dd-avatar-initials">
                            {{ strtoupper(substr('Yapi', 0, 2)) }}
                        </div>

                        <div>
                            <p class="dd-name">Name</p>
                            <p class="dd-email">Email</p>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="dd-section">
                    <a href="#" class="dd-item">
                        <i class="bi bi-person"></i>
                        Mon profil
                    </a>
                    <a href="#" class="dd-item">
                        <i class="bi bi-gear"></i>
                        Paramètres
                    </a>
                </div>

                <div class="dd-separator"></div>

                <div class="dd-section">
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="dd-item dd-item--danger">
                            <i class="bi bi-box-arrow-right"></i>
                            Se déconnecter
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
