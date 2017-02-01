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
          })
          .always(function() {

          });





        </script>
    </xsl:template>


    <xsl:template match="carto/markers/marker">

        //tableau avec les places libres par station
      $.get( "http://www.velostanlib.fr/service/stationdetails/nancy/<xsl:value-of select="./@number"/>", function(xml) {


      });





        L.marker([  <xsl:value-of select="./@lat"/>,   <xsl:value-of select="./@lng"/>]).addTo(map)
        .bindPopup("<xsl:value-of select="./@name"/>");


    </xsl:template>





</xsl:stylesheet>
