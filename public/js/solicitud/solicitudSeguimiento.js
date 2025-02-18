        src="https://code.jquery.com/jquery-3.6.0.min.js";
        src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js";
        src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js";
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js";
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js";

            function cambiarColorFondoEstatus(select) {
                var estatus = select.value;
        
                //select.classList.remove('bg-danger', 'bg-warning', 'bg-success', 'bg-light');
                select.style.backgroundColor = ''; // Elimina cualquier color previo


        
                if (estatus == 1) { // PENDIENTE
                    //select.classList.add('bg-danger'); 
                    select.style.backgroundColor = '#ffcccc'; 
                } else if (estatus == 2) { // EN PROCESO
                    //select.classList.add('bg-warning'); 
                    select.style.backgroundColor = '#ffeb99'; 
                } else if (estatus == 3) { // TERMINADO
                    //select.classList.add('bg-success'); 
                    select.style.backgroundColor = '#c1f0c1'; 
                } else { // Si no hay selección, fondo blanco
                    //select.classList.add('bg-light'); // Blanco
                    select.style.backgroundColor = '#f8f9fa'; 
                }
            }
        
            // Cambiar el color de fondo cuando la página se carga según el valor inicial de $solicitud->idEstatus
            window.onload = function() {
                var select = document.getElementById('idEstatus');
                cambiarColorFondoEstatus(select);
            };

            
            
