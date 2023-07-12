<?php

select e.id, e.club_id, e.nombre, c.territorialRFEF, c.observaciones
from equipo e 
inner join club c on c.id=e.club_id
inner join partido p on p.equipoLocal_id=e.id
where c.localidad_id=1 and c.pais_id=60 and territorialRFEF<>'00' group by e.club_id 

?>