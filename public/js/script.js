
document.addEventListener('DOMContentLoaded', function() {
    const ageInput = document.getElementById('age');
    
    if (ageInput) {
        ageInput.addEventListener('input', function() {
            if (this.value < 1) {
                this.value = 1;
            }
        });

        const form = ageInput.closest('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const age = parseInt(ageInput.value);
                
                if (age < 1) {
                    e.preventDefault();
                    alert('L\'âge ne peut pas être négatif!');
                    ageInput.focus();
                    return false;
                }
                
                if (age > 150) {
                    e.preventDefault();
                    alert('Veuillez entrer un âge valide!');
                    ageInput.focus();
                    return false;
                }
            });
        }
    }
});