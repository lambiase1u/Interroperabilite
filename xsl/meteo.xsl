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
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

            </head>
            <body>
                <div class="container-fluid">
                <table  class="table" style="width:800px" border="1">

                <thead>
                    <tr>
                        <th>Hour</th>
                        <th>Date</th>
                        <th>Temperature</th>
                    </tr>
                </thead>
                <tbody>
                <xsl:apply-templates select="previsions/echeance[@hour=6]
                | previsions/echeance[@hour=9] | previsions/echeance[@hour=12] | previsions/echeance[@hour=15]
                | previsions/echeance[@hour=18] | previsions/echeance[@hour=21] | previsions/echeance[@hour=24]"/>

                </tbody>
                </table>
                </div>
            </body>
        </html>
    </xsl:template>


    <xsl:template match="previsions/echeance[@hour=6]
    | previsions/echeance[@hour=9] | previsions/echeance[@hour=12] | previsions/echeance[@hour=15]
    | previsions/echeance[@hour=18] | previsions/echeance[@hour=21] | previsions/echeance[@hour=24]
    ">

        <!--  <xsl:variable name="currentDate" select="substring(date:date(),0,11)"/>
          <xsl:variable name="date" select="substring(./@timestamp,0, 11)"/>

           <xsl:choose>
              <xsl:when test="$currentDate=$date ">

               </xsl:when>
              <xsl:otherwise>

              </xsl:otherwise>
          </xsl:choose>

 <div class="panel panel-default col-lg-4">
            <div class="panel-body">
                Basic panel example
            </div>
        </div>

              -->
                <tr>
                    <td>
                        <xsl:value-of select="./@hour"/>
                    </td>


                    <td>
                        <xsl:value-of select="./@timestamp"/>
                    </td>

                    <td>
                        <xsl:value-of select="./temperature/level[@val='sol'] - 273.15"/> °
                    </td>
                </tr>

    </xsl:template>

</xsl:stylesheet>