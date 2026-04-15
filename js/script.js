document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('modifier').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('picture').click();
    });

    document.getElementById('picture').addEventListener('change', function() {
        this.form.submit();
    });
});