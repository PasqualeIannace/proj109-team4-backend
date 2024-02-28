import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

 function confirmDelete() {
      
    //secondo metodo con modal ma modal vuoto e inselezionabile //Invia il modulo di eliminazione quando viene cliccato
     document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
         document.getElementById('delete-form').submit();
     });

    //primo metodo con if funzionava con allert //in index versione senza js
//         if (confirm("Sei sicuro di voler eliminare questo elemento?")) {
//             document.getElementById('delete-form').submit();
//         }    
 }

    


