@stack('scripts')

<script>
    const avatarBtn = document.getElementById('avatarBtn');
    const dropdown = document.getElementById('profileDropdown');
    const chevron = document.getElementById('avatarChevron');

    avatarBtn.addEventListener('click', e => {
        e.stopPropagation();
        const isOpen = dropdown.classList.toggle('open');
        chevron.classList.toggle('open', isOpen);
    });

    document.addEventListener('click', () => {
        dropdown.classList.remove('open');
        chevron.classList.remove('open');
    });
</script>
