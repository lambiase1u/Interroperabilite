<?php


header('Access-Control-Allow-Origin: *');


return 'L.marker([  <xsl:value-of select="./@lat"/>,   <xsl:value-of select="./@lng"/>]).addTo(map)
.bindPopup("<xsl:value-of select="./@name"/>");';


 ?>
