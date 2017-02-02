<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!--  xmlns:date="http://exslt.org/dates-and-times"
                extension-element-prefixes="date" -->


    <xsl:output
            method="html"
            encoding="UTF-8"
            doctype-public="-//W3C//DTD HTML 4.01//EN"
            doctype-system="http://www.w3.org/TR/html4/strict.dtd"
            indent="yes"></xsl:output>


    <xsl:template match="/">

        <script type="text/javascript">




          $.get( "location.php", function(data) {

          var data_json = jQuery.parseJSON(data);

              var map = L.map('mapid').setView([data_json.lat, data_json.lon], 13);

              L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {}).addTo(map);

              <xsl:apply-templates select="carto/markers/marker"/>


          })
          .done(function(data) {

          })
          .fail(function() {
            console.log("probleme api");
            swal({
              title: "Error!",
              text: "probleme avec l'api de la carte!",
              type: "error",
              confirmButtonText: "Cool"
            });
          })
          .always(function() {

          });





        </script>
    </xsl:template>


    <xsl:template match="carto/markers/marker">

      $.get("station_id.php?id=<xsl:value-of select="./@number"/>",function(data){

          var details_json = jQuery.parseJSON(data);

        L.marker([  <xsl:value-of select="./@lat"/>,   <xsl:value-of select="./@lng"/>]).addTo(map)
        .bindPopup("<xsl:value-of select="./@name"/> <br />"
          +" place disponible : "+details_json.available +"<br />"
          +" place total  : "+details_json.total);
      }).fail(function() {
        console.log("probleme api");
        swal({
          title: "Error!",
          text: "probleme avec l'api des stations de velostan!",
          type: "error",
          confirmButtonText: "Cool"
        });
      });

    </xsl:template>





</xsl:stylesheet>
